<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
  <link rel="stylesheet" type="text/css" href="https://getbootstrap.com/2.0.2/assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://getbootstrap.com/2.0.2/assets/css/bootstrap-responsive.css">
	<style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .signin{
      	margin-left: 900px;
      }
      .container2{
        margin-left: 350px;
        outline: 1px solid silver;
        width: 600px;
        height: auto;
        padding: 20px;
        margin-top: 50px;
        background-color: white;
        box-shadow: 0px 0px 40px 20px #b2b2b2;
      }
      .signin_p{
        font-weight: bold;
      }
      .user_info{
        display: inline-block;
        margin-top: 20px;
      }
      .user_pass{
        display: inline-block;
        vertical-align: top;
        margin-left: 70px;
        margin-top: 20px;
      }
      .description{
        margin-top: 10px;
      }
      .description textarea{
        width: 600px;
        height: 100px;
        resize: none;
      }
      .btn{
        margin-left: 538px;
      }
      .error{
        color: red;
      }
      .login_link{
        margin-left: 400px;
      }
    </style>
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
      <p class="signin_p">Register</p>
        <form method="post" action="accounts/register_process">

          <div class="user_info">
            <label>Email Address</label>
            <input type="email" name="email">
            <label>First name</label>
            <input type="text" name="first_name">
            <label>Last Name</label>
            <input type="text" name="last_name">
          </div>

          <div class="user_pass">
            <label>Password</label>
            <input type="password" name="password">
            <label>Confirm Password</label>
            <input type="password" name="passconf">
          </div>

          <div class="description">
            <label>Tell something about yourself</label>
            <textarea name="description"></textarea>
          </div>

          <input class="btn" type="submit" name="send" value="Register">
        </form>
        
      <?= $this->session->flashdata('errors')?>
     <a class = "login_link" href="/signin">already have an account? Login</a>     
    </div>

  </body>
</html>