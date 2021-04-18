<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sign in</title>
  <link rel="stylesheet" type="text/css" href="https://getbootstrap.com/2.0.2/assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://getbootstrap.com/2.0.2/assets/css/bootstrap-responsive.css">
</head>
	<style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .signin{
      	margin-left: 900px;
      }
      .container2{
        margin-left: 450px;
        outline: 1px solid silver;
        width: 400px;
        height: auto;
        padding: 20px;
        margin-top: 100px;
        box-shadow: 0px 0px 40px 20px #b2b2b2;
      }
      .signin_p{
        font-weight: bold;
      }
      .register_link{
        margin-left: 200px;
      }
      .error{
        color: red;
      }
    </style>
    <link rel="stylesheet" type="text/css" href="https://getbootstrap.com/2.0.2/assets/css/bootstrap.css">
   	<link rel="stylesheet" type="text/css" href="https://getbootstrap.com/2.0.2/assets/css/bootstrap-responsive.css">
</head>
<body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          </a>
          <a class="brand" href="/">Test App</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li><a href="/">Home</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container2">
      <p class="signin_p">Signin</p>
        <form method="post" action="accounts/signin_process">
          <label>Email Address</label>
          <input type="text" name="email">
          <label>Password</label>
          <input type="password" name="password"><br>
          <input class="btn" type="submit" name="send" value="Signin">
        </form>
        <?= $this->session->flashdata('errors')?>
        <a class="register_link" href="register">Don't have an Account? Register</a>      
    </div>
  </body>
</html>