<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>New Account</title>
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
        margin-left: 400px;
        outline: 1px solid silver;
        width: 600px;
        height: auto;
        padding: 20px;
        margin-top: 50px;
        box-shadow: 0px 0px 40px 20px #b2b2b2;
      }
      .signin_p{
        font-weight: bold;
      }
      .dashboard, .create{
        margin-left: 300px;
        background-color: green;
        padding: 5px;
        font-weight: bold;
        color: white;
        text-align: center;
      }
      .container2 p{
        display: inline-block;
        font-weight: bold;
      }
      .create{
        margin-left: 100px;
        margin-top: 70px;
      }
      .error{
        color: red;
      }
      .user_data, .password{
        display: inline-block;
        vertical-align:  top;
        margin-top: 10px;
      }
      .password{
        margin-left: 60px;
      }

    </style>
</head>
<body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          </a>
          <a class="brand">Test App</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li><a href="admin">Dashboard</a></li>
              <li><a href="new_user">Profile</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container2">
      <p>Add a new user</p>
      <a class="dashboard" href="admin"> Return to dashboard</a>
        <form method="post" action="/accounts/adding_new_user_process">
          <div class="user_data">
            <label>Email Address</label>
            <input type="email" name="email">
            <label>First name</label>
            <input type="text" name="first_name">
            <label>Last Name</label>
            <input type="text" name="last_name">
          </div>
          <div class="password">
            <label>Password</label>
            <input type="password" name="password">
            <label>Confirm Password</label>
            <input type="password" name="passconf"><br>
            <input class="create" type="submit" name="send" value="Create">
        </div>
        </form> 
        <?= $this->session->flashdata('errors')?>   
    </div>
  </body>
</html>