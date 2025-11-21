<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Square Web Payments SDK -->
    <script defer src="https://sandbox.web.squarecdn.com/v1/square.js"></script>

    <style>
        #card-container {
            margin-top: 10px;
        }
    </style>
</head>
<body>

<!-- Payment Status -->
<div id="payment-status" class="mt-3 ms-5"></div>

<!-- Bootstrap Payment Popup -->
<div class="modal fade" id="paymentModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3">

            <div class="modal-header">
                <h5 class="modal-title">Complete Your Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div id="card-container"></div>

                <!-- PAY BUTTON -->
                <button id="payBtn" class="btn btn-success w-100 mt-3">
                    Pay Now
                </button>
            </div>

        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
let payments, card;

// Setup Square Payments
async function setupSquare() {
    const appId = "sandbox-sq0idb-my_IckzE3pMBU4fX0BDjCg";
    const locationId = "L8KP8EQQGZ9TT";

    if (!window.Square) {
        alert("Square Web Payments SDK failed to load.");
        return;
    }

    payments = Square.payments(appId, locationId);

    card = await payments.card();
    await card.attach("#card-container");
}

// Automatically open the payment popup on page load
window.onload = function () {
    const modal = new bootstrap.Modal(document.getElementById("paymentModal"));
    modal.show();
    setupSquare();
};

// Pay button click event
document.getElementById("payBtn").addEventListener("click", async function () {

    document.getElementById("payBtn").innerHTML = "Processing...";

    const status = document.getElementById("payment-status");

    try {
        const result = await card.tokenize();

        if (result.status !== "OK") {
            status.innerHTML = "<span class='text-danger'>Failed: " + result.errors[0].message + "</span>";
            return;
        }

        let payload = {
            sourceId: result.token,
            amount: <?= $_SESSION['amount'] ?>,
            currency: "<?= $_SESSION['currency'] ?>",
            order_id: "<?= $_GET['o_id'] ?>"
        };

        const response = await fetch("process_payment.php", {
            method: "POST",
            headers: {"Content-Type": "application/json"},
            body: JSON.stringify(payload)
        });

        const data = await response.json();

        if (data.status === "SUCCESS") {
            status.innerHTML = "<span class='text-success'>Payment Successful! ID: " + data.payment_id + "</span>";
        } else {
            status.innerHTML = "<span class='text-danger'>Payment Failed: " + data.message + "</span>";
        }

    } catch (error) {
        status.innerHTML = "<span class='text-danger'>" + error.message + "</span>";
    }

    document.getElementById("payBtn").innerHTML = "Pay Now";
});
</script>

</body>
</html>
