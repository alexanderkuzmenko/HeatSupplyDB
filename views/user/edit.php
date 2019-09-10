<section id="register-section">
  <div class="container">
    <h1 class="text-center">Редагування профілю</h1>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title text-center">Редагування профілю користувача <?= $user->firstName?> <?= $user->lastName?></h5>
        
        <form action="/profile/edit" method="post" enctype="multipart/form-data">
          <div class="row justify-content-center">
            <div class='col-md-3'>
              <img src="<?= $user->imageFullPath; ?>" class="rounded">
              <div class="form-group mt-4">
                <input type='file' class="form-control-file"  name='image' id="form-image">
              </div>
            </div>
            <div class="col-md-6">

              <div class="form-group row">
                <label for="form-email" class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-8">
                  <input type="email" name="email" id="form-email" class="form-control" placeholder="Email" required="required" value='<?= isset($user->email) ? $user->email : ""; ?>'>
                </div>
              </div>

              <div class="form-group row">
                <label for="form-last-name" class="col-sm-4 col-form-label">Прізвище</label>
                <div class="col-sm-8">
                  <input type="text" name="last_name" id="form-last-name" class="form-control" placeholder="Прізвище" pattern="[A-Za-zА-Яа-яЇїЄєЁёІі\d]{2,}" required="required" value='<?= isset($user->lastName) ? $user->lastName : ""; ?>'>
                </div>
              </div>

              <div class="form-group row">
                <label for="form-first-name" class="col-sm-4 col-form-label">Ім'я</label>
                <div class="col-sm-8">
                  <input type="text" name="first_name" id="form-first-name" class="form-control" placeholder="Ім'я" pattern="[A-Za-zА-Яа-яЇїЄєЁёІі\d]{2,}" required="required" value='<?= isset($user->firstName) ? $user->firstName : ""; ?>'>
                </div>
              </div>

              <div class="form-group row">
                <label for="form-middle-name" class="col-sm-4 col-form-label">По батькові</label>
                <div class="col-sm-8">
                  <input type="text" name="middle_name" id="form-middle-name" class="form-control" placeholder="По батькові" pattern="[A-Za-zА-Яа-яЇїЄєЁёІі\s]{2,}" value='<?= isset($user->middleName) ? $user->middleName : ""; ?>'>
                </div>
              </div>

              <div class="form-group row">
                <label for="form-phone" class="col-sm-4 col-form-label">Телефон</label>
                <div class="col-sm-8">
                  <input type="text" name="phone" id="form-phone" class="form-control" placeholder="(000)-00-00-000" pattern='\(\d\d\d\)-\d\d-\d\d-\d\d\d' required="required" value='<?= isset($user->phone) ? $user->phone : ""; ?>'>
                </div>
              </div>

              <div class="form-group row">
                <label for="form-address" class="col-sm-4 col-form-label">Адреса</label>
                <div class="col-sm-8">
                  <input type="text" name="address" id="form-address" class="form-control" placeholder="Адреса" pattern='[A-Za-zА-Яа-яЁёЇїЄєІі\s\.\']{2,}' required="required" value='<?= isset($user->address) ? $user->address : ""; ?>'>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group text-center">
                <input type="submit" class="btn btn-primary mt-4" value="Submit">   
              </div>
            </div>
          </div>
        </form>
        
      </div>
    </div>
  </div>
</section>