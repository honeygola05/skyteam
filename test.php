<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Square – Multiple Payment Methods</title>
  <script src="https://sandbox.web.squarecdn.com/v1/square.js"></script>
  <style>
    body { font-family: system-ui, Arial, sans-serif; padding: 20px; }
    .row{margin:10px 0}
    #pay-btn[disabled]{opacity:.6;cursor:not-allowed}
    .methods { display:flex; gap:10px; margin:10px 0 6px; }
    .methods button { padding:8px 12px; border:1px solid #ccc; background:#f8f8f8; cursor:pointer }
    .methods button.active { background:#e8f0ff; border-color:#84a9ff }
    .panel { display:none; margin:10px 0 }
    .panel.active { display:block }
    #status{margin-top:16px;font-weight:bold}
  </style>
</head>
<body>
  <h2>Pay Demo (Sandbox)</h2>

  <div class="row">
    <label>Amount:&nbsp;</label>
    <input id="amount" type="text" value="10.00" />
    <select id="currency">
      <option value="CAD" selected>CAD</option>
      <option value="USD">USD</option>
      <option value="GBP">GBP</option>
      <option value="EUR">EUR</option>
    </select>
  </div>

  <div class="row">
    <label>Country Code:&nbsp;</label>
    <input id="countryCode" type="text" value="CA" style="width:60px" />
    &nbsp;Postal/ZIP:&nbsp;<input id="postalCode" type="text" value="M5V 2T6" style="width:120px" />
  </div>

  <div class="methods">
    <button type="button" data-method="card" class="active">Card</button>
    <button type="button" data-method="applePay" id="applePayTab" style="display:none">Apple Pay</button>
    <button type="button" data-method="googlePay" id="googlePayTab" style="display:none">Google Pay</button>
    <button type="button" data-method="cashAppPay" id="cashAppTab" style="display:none">Cash App Pay</button>
  </div>

  <!-- Card panel -->
  <div id="panel-card" class="panel active">
    <div id="card-container"></div>
  </div>

  <!-- Apple Pay panel (button rendered here if available) -->
  <div id="panel-applePay" class="panel">
    <div id="apple-pay-button"></div>
  </div>

  <!-- Google Pay panel -->
  <div id="panel-googlePay" class="panel">
    <div id="google-pay-button"></div>
  </div>

  <!-- Cash App Pay panel -->
  <div id="panel-cashAppPay" class="panel">
    <div id="cash-app-button"></div>
  </div>

  <button id="pay-btn">Pay</button>
  <div id="status"></div>

  <script>
    const appId = "sandbox-sq0idb-my_IckzE3pMBU4fX0BDjCg";
    const locationId = "L8KP8EQQGZ9TT";

    let payments, card, applePay, googlePay, cashAppPay;
    let activeMethod = "card";

    const $ = sel => document.querySelector(sel);
    const $$ = sel => Array.from(document.querySelectorAll(sel));
    const showStatus = msg => { $("#status").innerText = msg; };
    const dollarsToCents = s => Math.round(parseFloat(s) * 100);

    // Tabs
    $$(".methods button").forEach(btn => {
      btn.addEventListener("click", () => {
        $$(".methods button").forEach(b => b.classList.remove("active"));
        btn.classList.add("active");
        activeMethod = btn.dataset.method;
        $$(".panel").forEach(p => p.classList.remove("active"));
        $("#panel-" + activeMethod).classList.add("active");
        showStatus("");
      });
    });

    async function init() {
      try {
        payments = window.Square.payments(appId, locationId);

        // CARD
        card = await payments.card();
        await card.attach("#card-container");

        // APPLE PAY
        try {
          applePay = await payments.applePay();
          const canApple = await applePay.canMakePayment();
          if (canApple) {
            $("#applePayTab").style.display = "";
            const btn = await applePay.attach("#apple-pay-button");
            btn.addEventListener("click", () => doPay("applePay"));
          }
        } catch (_) {}

        // GOOGLE PAY
        try {
          googlePay = await payments.googlePay();
          const canGoogle = await googlePay.canMakePayment();
          if (canGoogle) {
            $("#googlePayTab").style.display = "";
            const btn = await googlePay.attach("#google-pay-button");
            btn.addEventListener("click", () => doPay("googlePay"));
          }
        } catch (_) {}

        // CASH APP PAY
        try {
          cashAppPay = await payments.cashAppPay({
            redirectURL: window.location.href, // for auth redirect
            referenceId: String(Date.now())
          });
          const canCash = await cashAppPay.canMakePayment();
          if (canCash) {
            $("#cashAppTab").style.display = "";
            const btn = await cashAppPay.attach("#cash-app-button");
            btn.addEventListener("click", () => doPay("cashAppPay"));
          }
        } catch (_) {}

        // Pay button (card method by default)
        $("#pay-btn").addEventListener("click", () => doPay(activeMethod));
      } catch (e) {
        showStatus("Initialization failed: " + (e.message || e));
      }
    }

    async function doPay(method) {
      const btn = $("#pay-btn");
      btn.disabled = true;
      showStatus("Processing...");

      const amountStr = ($("#amount").value || "").trim();
      const currency = ($("#currency").value || "CAD").trim().toUpperCase();
      const countryCode = ($("#countryCode").value || "").trim().toUpperCase();
      const postalCode = ($("#postalCode").value || "").trim();

      if (!/^\d+(\.\d{2})$/.test(amountStr)) {
        showStatus("Amount must look like 10.00");
        btn.disabled = false; return;
      }

      try {
        let sourceId, verificationToken;

        if (method === "card") {
          // tokenize
          const tok = await card.tokenize();
          if (tok.status !== "OK") {
            const errs = (tok.errors || []).map(e => e.message).join("; ");
            throw new Error("Card tokenization failed: " + (errs || tok.status));
          }
          sourceId = tok.token;

          // verifyBuyer (3-DS)
          const verificationDetails = {
            amount: amountStr,         // must be STRING
            currencyCode: currency,    // e.g., "CAD"
            intent: "CHARGE",
            billingContact: {
              countryCode,
              postalCode
            }
          };
          const v = await payments.verifyBuyer(sourceId, verificationDetails);
          verificationToken = v?.token;
          if (!verificationToken) throw new Error("Verification failed: token missing");
        } else if (method === "applePay") {
          const res = await applePay.tokenize({
            total: { amount: amountStr, label: "Example Store" }
          });
          if (res.status !== "OK") throw new Error("Apple Pay failed: " + res.status);
          sourceId = res.token;
        } else if (method === "googlePay") {
          const res = await googlePay.tokenize({
            total: { amount: amountStr, label: "Example Store" }
          });
          if (res.status !== "OK") throw new Error("Google Pay failed: " + res.status);
          sourceId = res.token;
        } else if (method === "cashAppPay") {
          // Starts the approval flow; returns a token when the customer authorizes
          const res = await cashAppPay.tokenize({
            total: { amount: amountStr, label: "Example Store" },
          });
          if (res.status !== "OK") throw new Error("Cash App Pay failed: " + res.status);
          sourceId = res.token;
        } else {
          throw new Error("Unsupported method: " + method);
        }

        // server charge
        const cents = dollarsToCents(amountStr);
        const resp = await fetch("process_payment.php", {
          method: "POST",
          headers: { "Content-Type": "application/json", "Accept": "application/json" },
          body: JSON.stringify({
            sourceId,
            locationId,
            amount: cents,
            currency,
            verificationToken // only present for card
          })
        });

        const data = await resp.json().catch(() => ({}));
        if (resp.ok && data?.success) {
          showStatus("Payment successful. ID: " + data.payment_id);
          btn.style.display = "none";
        } else {
          throw new Error(data?.message || "Payment failed");
        }
      } catch (e) {
        showStatus(e.message || String(e));
        btn.disabled = false;
      }
    }

    // HTTPS required in prod (localhost ok in dev)
    init();
  </script>
</body>
</html>
