<form id="travellerForm">
  <?php $travellers = $adults + $children;
  for ($i = 1; $i <= $travellers; $i++) {
    $isAdult = $i <= $adults;
    $travellerType = $isAdult ? 'Adult' : 'Child';
    $index = $isAdult ? $i : $i - $adults;
  ?>
    <div class="row <?= ($i > 1) ? 'mt-30' : '' ?>">
      <h5><?= $travellerType . ' ' . $index ?></h5>
      <div class="col-md-2 col-sm-12">
        <label for="traveller-<?= $i + 1 ?>-title" class="text-14 text-light-1">Title</label>
        <select name="title[]" id="traveller-<?= $i + 1 ?>-title" class="form-select" style="padding:5px; border:1px solid #ddd; border-radius:5px;">
          <option value="Mr">Mr</option>
          <option value="Miss">Miss</option>
          <option value="Mrs">Mrs</option>
        </select>
      </div>
      <div class="col-md-4 col-sm-12">
        <label for="traveller-<?= $i + 1 ?>-first-name" class="text-14 text-light-1">First Name</label>
        <input type="text" name="first-name[]" id="traveller-<?= $i + 1 ?>-first-name" class="form-control" required style="padding:5px; border:1px solid #ddd; border-radius:5px;">
        <span class="error text-danger first-name-error"></span>
      </div>
      <div class="col-md-4 col-sm-12">
        <label for="traveller-<?= $i + 1 ?>-first-name" class="text-14 text-light-1">Middle Name(optional)</label>
        <input type="text" name="middle-name[]" id="traveller-<?= $i + 1 ?>-middle-name" class="form-control" required style="padding:5px; border:1px solid #ddd; border-radius:5px;">
      </div>
      <div class="col-md-4 col-sm-12">
        <label for="traveller-<?= $i + 1 ?>-last-name" class="text-14 text-light-1">Last Name</label>
        <input type="text" name="last-name[]" id="traveller-<?= $i + 1 ?>-last-name" class="form-control" required style="padding:5px; border:1px solid #ddd; border-radius:5px;">
        <span class="error text-danger last-name-error"></span>
      </div>
      <div class="col-md-4 col-sm-12">
        <label for="traveller-<?= $i + 1 ?>-date-of-birth" class="text-14 text-light-1">Date of Birth</label>
        <input type="date" name="dob[]" id="traveller-<?= $i + 1 ?>-date-of-birth" class="form-control" required style="padding:5px; border:1px solid #ddd; border-radius:5px;">
        <span class="error text-danger dob-error"></span>
      </div>
    </div>
  <?php } ?>
</form>

<form id="contactDetails">
  <div class="row y-gap-10">
    <div class="col-lg-3">
      <?php $countryCodes = fetchCountryCodes($con); ?>
      <label for="traveller-country-code" class="text-14 text-light-1">Country Code</label>
      <select class="form-select form-select-lg select2"
        data-placeholder="Search Country Code"
        name="traveller-country-code"
        id="traveller-country-code">
        <option value="" disabled selected>Search Country Code</option>
        <?php foreach ($countryCodes as $countryCode) { ?>
          <option value="<?= $countryCode['dial_code'] ?>" <?= ($countryCode['name'] == 'Canada') ? 'selected' : '' ?>>
            <?= $countryCode['name'] ?> (<?= $countryCode['dial_code'] ?>)
          </option>
        <?php } ?>
      </select>
    </div>
    <div class="col-lg-4">
      <label for="traveller-mobile-number" class="text-14 text-light-1">Mobile Number</label>
      <input type="tel" name="traveller-mobile-number" id="traveller-mobile-number" class="form-control" required style="padding:5px; border:1px solid #ddd; border-radius:5px;">
    </div>
    <div class="col-lg-4">
      <label for="traveller-email" class="text-14 text-light-1">Email</label>
      <input type="email" name="traveller-email" id="traveller-email" class="form-control" required style="padding:5px; border:1px solid #ddd; border-radius:5px;">
    </div>
  </div>
</form>

<form id="billingDetails">
  <div class="row y-gap-10 justify-between">
    <div class="col-lg-12">
      <div class=" mt-15">
        <div class="row y-gap-10">
          <div class="col-lg-12">
            <label for="billing-address" class="text-14 text-light-1">Billing Address</label>
            <input type="text" name="billing-address" id="billing-address" class="form-control" style="    padding:5px; border:1px solid #ddd; border-radius:5px;">
          </div>
          <div class="col-lg-6">
            <label for="billing-city" class="text-14 text-light-1">City</label>
            <input type="text" name="billing-city" id="billing-city" class="form-control" style="    padding:5px; border:1px solid #ddd; border-radius:5px;">
          </div>
          <div class="col-lg-6">
            <label for="traveller-country" class="text-14 text-light-1">Country</label>
            <input type="text" name="traveller-country" id="traveller-country" class="form-control" style="     padding:5px; border:1px solid #ddd; border-radius:5px;">
          </div>
          <div class="col-lg-6">
            <label for="traveller-zipcode" class="text-14 text-light-1">Zipcode</label>
            <input type="number" name="traveller-zipcode" id="traveller-zipcode" class="form-control" style="     padding:5px; border:1px solid #ddd; border-radius:5px;">
          </div>
          <div class="col-lg-6">
            <label for="traveller-phone" class="text-14 text-light-1">Phone</label>
            <input type="tel" name="traveller-phone" id="traveller-phone" class="form-control" style="     padding:5px; border:1px solid #ddd; border-radius:5px;">
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<button type="submit" class="button px-30 fw-400 text-14 -blue-1 bg-blue-1 h-50 text-white">Submit</button>