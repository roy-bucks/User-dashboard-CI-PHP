<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Profile</title>
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
        width: 700px;
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
        display: block;
        font-weight: bold;
      }
      .create{
        margin-left: 100px;
      }
      .password, .form1{
        display: inline-block;
        vertical-align: top;
      }
      .password{
        margin-left: 200px;
        margin-top: 30px;
      }
      .desc{
        width: 650px;
        height: 100px;
        resize: none;
      }
      .desc_btn{
        margin-left: 600px;
      }
      .profile{
        font-size: 20px;
      }
      .form1{
        margin-top: 30px;
      }
      .user_info_save{
        margin-left: 150px;
      }
      .btn{
        font-weight: bold;
        text-align: center;
      }
      .pass_btn{
        margin-left: 90px;
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
          <a class="brand" >Test App</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li><a href="<?=base_url('admin')?>">Dashboard</a></li>
              <li><a href="<?=base_url("accounts/edit_profile/"."{$data['Id']}")?>">Profile</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="container2">
    <p class="profile">Profile</p>
    <form method="post" action="<?=base_url("accounts/update_profile/"."{$data['Id']}")?>">
      <div class="form1">
        <p>Edit informtaion</p>
        <label>Email Address</label>
        <input type="text" name="email" value="<?= $data['email'] ?>">
        <label>First Name</label>
        <input type="text" name="first_name" value="<?= $data['first_name']?>">
        <label>Last Name</label>
        <input type="text" name="last_name" value="<?= $data['last_name']?>"><br>
         <label>User type</label>
        <select name="user_type">
          <option>Normal</option>
<?php if($user_type['user_type'] == "Admin"){ ?>
          <option>Admin</option>
<?php  } ?>
        </select><br>
        <input class="user_info_save btn" type="submit" name="send" value="Save">
      </div>
      <div class="password">
        <p>Password</p>
        <label>password</label>
        <input type="password" name="password" value="<?=$data['password']?>">
        <label>confirm password</label>
        <input type="password" name="passconf"><br>
        <input class="btn pass_btn" type="submit" name="send" value="Update password">  
      </div>
        <p>Description</p>
        <textarea class="desc" name="description" ><?=$data['description']?></textarea><br>
        <input class="btn desc_btn" type="submit" name="send" value="Save">
    </form>
    </div>
  </body>
</html>