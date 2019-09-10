<section id="account-form">
  <div class="container">
    <h1 class="text-center"><?= $title ?></h1>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title text-center">Заповніть дані форми</h5>

        <div class="row justify-content-center">
          <div class="col-md-6">
            <form method='post' action='/account/submit'>
              
              <?php if (isset($account->accountId)): ?>
              <div class="form-group row">
                <label for="form-account-id" class="col-sm-4 col-form-label">Account ID</label>
                <div class="col-sm-8">
                  <input type='text' class="form-control"  readonly="readonly" name='account_id' id="form-account-id" value='<?= isset($account->accountId) ? $account->accountId : 0; ?>'>
                </div>
              </div>
              <?php endif; ?>

              <div class="form-group row">
                <label for="form-city" class="col-sm-4 col-form-label">City</label>
                <div class="col-sm-8">
                  <input type='text' class="form-control"  name='city' id="form-city" value='<?= $account->city; ?>' pattern="[\-A-Za-zА-Яа-яЇїЄєЁёІі\s]{2,}" required="required">
                </div>
              </div>

              <div class="form-group row">
                <label for="form-street" class="col-sm-4 col-form-label">Street</label>
                <div class="col-sm-8">
                  <input type='text' class="form-control"  name='street' id="form-street" value='<?= $account->street; ?>' pattern="[\-A-Za-zА-Яа-яЇїЄєЁёІі\s]{2,}" required="required">
                </div>
              </div>

              <div class="form-group row">
                <label for="form-house" class="col-sm-4 col-form-label">House</label>
                <div class="col-sm-8">
                  <input type='text' class="form-control"  name='house' id="form-house" value='<?= $account->house; ?>' pattern="[\-A-Za-zА-Яа-яЇїЄєЁёІі\d]{2,10}" required="required">
                </div>
              </div>

              <div class="form-group row">
                <label for="form-appartment" class="col-sm-4 col-form-label">Appartment</label>
                <div class="col-sm-8">
                  <input type='text' class="form-control"  name='appartment' id="form-appartment" value='<?= $account->appartment; ?>' pattern="[\-A-Za-zА-Яа-яЇїЄєЁёІі\d]{2,10}" required="required">
                </div>
              </div>

              <div class="form-group text-center mt-4">
                <input type='hidden' name='action' value='<?php echo $action; ?>'>
                <input type='submit' class="btn btn-primary" value="Надіслати">
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

