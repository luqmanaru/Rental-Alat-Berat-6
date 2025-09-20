<!DOCTYPE html>
<html>
<head>
    <title>Login Rental Alat Berat</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'; ?>">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url('<?php echo base_url().'assets/images/bg.jpg'; ?>');
            background-size: cover;
            background-position: center;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            animation: fadeIn 1s ease-in-out;
        }
        .login-header {
            margin-bottom: 30px;
        }
        .alert {
            margin-top: 20px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s, border-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        input[type="text"], input[type="password"] {
            height: 45px;
            border-radius: 5px;
            border: 1px solid #ddd;
            padding: 10px;
        }
        input[type="submit"] {
            height: 45px;
            border-radius: 5px;
            border: none;
        }
    </style>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'; ?>"></script>
</head>
<body>
    <div class="login-container">
        <center class="login-header">
            <h2>WEBSITE RENTAL ALAT BERAT</h2>
            <h3>LOGIN</h3>
        </center>
        <?php
        if(isset($_GET['pesan'])){
            if($_GET['pesan'] == "gagal"){
                echo "<div class='alert alert-danger'>Login gagal! Username dan password salah.</div>";
            } else if($_GET['pesan'] == "logout"){
                echo "<div class='alert alert-success'>Anda telah logout.</div>";
            } else if($_GET['pesan'] == "belumlogin") {
                echo "<div class='alert alert-warning'>Silahkan login dulu.</div>";
            }
        }
        ?>
        <div class="panel panel-default">
         <div class="panel-body">
          <br/>
          <br/>
          <form method="post" action="<?php echo base_url().'welcome/login'; ?>">
            <div class="form-group">
              <input type="text" name="username" placeholder="username" class="form-control">
              <?php echo form_error('username'); ?>
            </div>
            <div class="form-group">
              <input type="password" name="password" placeholder="password" class="form-control">
              <?php echo form_error('password'); ?>
            </div>
            <div class="form-group">
              <input type="submit" value="Login" class="btn btn-primary">
            </div>
          </form>
        </div>
      </div>
    </div>
</body>
</html>
