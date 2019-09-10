<section id="accounts">
  <div class="container">
    <h1 class="text-center">Мої рахунки</h1>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title text-center">Рахунки користувача <?= $user->firstName?> <?= $user->lastName?></h5>
        <div class="row justify-content-center">
          <div class='col-md-8'>
            <a href="/account/new" class="btn btn-primary m-2 float-right"><i class="fas fa-plus"></i></a>
            <table class="table table-bordered">
              <tr class="success">
                <th>Місто</th>
                <th>Вулиця</th>
                <th>Будинок</th>
                <th>Квартира</th>
                <th>Дія</th>
              </tr>
              <?php foreach($accounts as $key => $accountItem): ?>
                <tr>
                  <td>
                    <span><?= $accountItem['city']; ?></span>
                  </td>
                  <td>
                    <span><?= $accountItem['street']; ?></span>
                  </td>
                  <td>
                    <span><?= $accountItem['house']; ?></span>
                  </td>
                  <td>
                    <span><?= $accountItem['appartment']; ?></span>
                  </td>
                  <td>
                    <a href="/account/edit/<?= $accountItem['account_id']; ?>" class="btn btn-success">
                      <i class="fas fa-edit"></i>
                    </a>
                    <a href="/account/delete/<?= $accountItem['account_id']; ?>" class="btn btn-danger">
                      <i class="fas fa-times"></i>
                    </a>
                  </td>
                </tr>
              <?php endforeach;?>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>



</section>
