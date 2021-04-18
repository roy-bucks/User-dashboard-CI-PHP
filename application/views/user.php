<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home page</title>
  <link rel="stylesheet" type="text/css" href="https://getbootstrap.com/2.0.2/assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://getbootstrap.com/2.0.2/assets/css/bootstrap-responsive.css">
	<style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .logoff{
      	margin-left: 700px;
      }
      .container2{
        outline: 1px solid silver;
        height: auto;
        padding: 20px;
        margin-top: 50px;
        width: 90%;
        margin-left: 3%;
        box-shadow: 0px 0px 40px 20px #b2b2b2;
      }
      .signin_p{
        font-weight: bold;
      }
      table{
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }
      td, th{
        border: 1px solid #ddd;
        padding: 8px;
      }
      th{
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
      }
      .container2 p{
        display: inline-block;
      }
      .edit{
        margin-left: 1000px;
      }
      table, th{
        text-align: center;
      }
    </style>
</head>
<body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          </a>
          <a class="brand" href="#">Test App</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li><a href="user">Dashboard</a></li>
              <li><a href="accounts/edit_profile/<?= $this->session->userdata['id'] ?>">Profile</a></li>
              <li class="logoff"><a href="destroy">logoff</a></li>
              <li><a>User ID: <?=$this->session->userdata['id'] ?></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container2">
      <p>Users</p>
      <a class="edit" href="accounts/edit_profile/<?= $this->session->userdata['id'] ?>">Edit your account</a>
      <table>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Created at</th>
          <th>User level</th>  
        </tr>
        <tr>
<?php   foreach(array_reverse($data) as $value){?>
          <td><?=$value['Id']?></td>
          <td><a href="user_info/<?=$value['Id']?>"><?= $value['first_name']." ".$value['last_name']?></a></td>
          <td><?=$value['email']?></td>
          <td><?=date("F j, Y, g:i a",strtotime($value['created_at']))?></td>
          <td><?=$value['user_type']?></td>
        </tr>
<?php   } ?>

      </table>
    </div>
  </body>
</html>