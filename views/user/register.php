<section id="register-section">
  <div class="container">
    <h1 class="text-center">Реєстрація</h1>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title text-center">Заповніть дані форми для реєстрації</h5>

        <div class="row justify-content-center">
          <div class="col-md-6">

            <form action="/register" method="post">
              <div class="form-group row">
                <label for="form-email" class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-8">
                  <input type="email" name="email" id="form-email" class="form-control" placeholder="Email" required="required">
                </div>
              </div>

              <div class="form-group row">
                <label for="form-password" class="col-sm-4 col-form-label">Пароль</label>
                <div class="col-sm-8">            
                  <input type="password" name="password" id="form-password" class="form-control" placeholder="Пароль"  required="required" pattern="[_A-Za-z\d]{2,20}">
                </div>
              </div>

              <div class="form-group text-center mt-4">
                <input type="submit" class="btn btn-primary" value="Зареєструватись">
              </div>
            </form>        
          </div>
        </div>
      </div>
    </div>
  </div>
</section>