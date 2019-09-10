<section id="account-delete-section">
  <div class="container">
    <h1 class="text-center">Підтвердіть видалення рахунку</h1>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title text-center">Видалення рахунку № <?= $account->accountId; ?><br>
          користувача <?= $user->firstName?> <?= $user->lastName?></h5>
        <div class="row justify-content-center">
          <div class="col text-center">
            <a href="/account/delete/<?= $account->accountId?>/submit" class="btn btn-primary mt-4">Видалити</a>
            <a href="/accounts" class="btn btn-primary mt-4">Відмовитись</a>
          </div>
        </div>

      </div>
    </div>    
  </div>
</section>