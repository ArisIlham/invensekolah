<!-- https://Github.com/YasinDehfuli
	 https://Codepen.io/YasinDehfuli
	 -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SIMIS</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f8f9fa;
      background-image: url('https://cdn5.f-cdn.com/contestentries/1578585/21468461/5d62b49ac544b_thumb900.jpg');
    }

    .login-container {
      margin-top: 5%;
      margin-bottom: 5%;
    }

    .login-form-1 {
      background-color: #ffffff;
      padding: 30px;
      box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
    }

    .login-form-1 h3 {
      text-align: center;
      margin-bottom: 20px;
    }

    .login-form-1 .btnSubmit {
      font-weight: 600;
      width: 100%;
      border-radius: 30px;
      padding: 10px 30px;
      border: none;
      background-color: #0062cc;
      color: #ffffff;
    }

    .login-form-1 .btnSubmit:hover {
      background-color: #0492c2;
    }

    .login-form-1 .btnForgetPwd {
      color: #0062cc;
      font-weight: 600;
      text-decoration: none;
    }

    .login-form-1 .btnForgetPwd:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <div class="container login-container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="login-form-1">
          <h3>Login</h3>
          <form action="<?php echo base_url('login/aksi_login'); ?>" method="post">
            <div class="form-group">
              <input type="text" class="form-control" id="username" name="username" placeholder="Username" required />
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="password" name="password" placeholder="Password" required />
            </div>
            <?php

            if ($this->session->flashdata('msg')) :
              echo $this->session->flashdata('msg');
            endif

            ?>
            <div class="form-group" id="button">
              <input type="submit" class="btnSubmit" value="Login" />
            </div>
            <div class="form-group" id="linksParent">
              <a class="">daftar</a> <br>
              <a class="">Forget Password?</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>