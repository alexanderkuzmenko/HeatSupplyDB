<section id="user-profile">
  <div class="container">
    <h1 class="text-center">Профіль користувача бази даних</h1>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title text-center"><?= $user->firstName?> <?= $user->lastName?></h5>
        <div class="row justify-content-center">
          <div class='col-md-3'>
            <img src="<?= $user->imageFullPath; ?>" class="rounded">
          </div>
          <div class="col-md-6">

            <table class="table bordered">
              <tbody>
                <tr>
                  <th scope="row">Прізвище</th>
                  <td><?= $user->lastName?></td>
                </tr>
                <tr>
                  <th scope="row">Ім'я</th>
                  <td><?= $user->firstName; ?></td>
                </tr>
                <tr>
                  <th scope="row">По батькові</th>
                  <td><?= $user->middleName; ?></td>
                </tr>
                <tr>
                  <th scope="row">Email</th>
                  <td><?= $user->email; ?></td>
                </tr>
                <tr>
                  <th scope="row">Телефон</th>
                  <td><?= $user->phone; ?></td>
                </tr>
                <tr>
                  <th scope="row">Адреса</th>
                  <td><?= $user->address; ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="row">
          <div class="col text-center">
            <a href="/profile/edit" class="btn btn-primary mt-4">Редагувати профіль</a>   
          </div>
        </div>

      </div>
    </div>    
  </div>
</section>