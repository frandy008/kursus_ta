<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>
  <div class="container login-row">
    <div class="row">
      <div class="col-md-4 offset-md-4 text-center text-success">
        <i class="bi bi-shop icon-login"></i>
        <h3>Aplikasi Kios Sederhana</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 offset-md-4">
        <div class="card">
          <div class="card-header bg-success text-white">Login</div>
          <div class="card-body">
            <?php
            if (isset($_GET['f'])) {
            ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal !</strong> Kombinasi username dan password tidak sesuai !
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php } ?>
            <form action="proses/login-proses.php" method="POST">
              <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" autocomplete="off" class="form-control form-control-sm">
              </div>
              <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control form-control-sm">
              </div>
              <div class="mb-3 d-flex justify-content-end">
                <button class="btn btn-sm btn-success">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>