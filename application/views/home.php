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
      .signin{
      	margin-left: 900px;
      }
  </style>

</head>
<body>
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="/">Test App</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li><a href="/">Home</a></li>
              <li class="signin"><a href="signin">Signin</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <div class="container">
      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <h1>Welcome to the Test</h1>
        <p>We're going to build a cool application using a MVC framework! This application was buld by Village 88 folks.</p>
        <p><a class="btn btn-primary btn-large" href="register">Start &raquo;</a></p>
      </div>
      <!-- Example row of columns -->
      <div class="row">
        <div class="span4">
          <h2>Manage Users</h2>
           <p>Using this application, you'll learnhow to add, remove, and edit users for the applicationm </p>
        </div>
        <div class="span4">
          <h2>Leave messages</h2>
           <p>Users will be able to leave a message to anoetehr user using the appication </p>
       </div>
        <div class="span4">
          <h2>Edit Users information</h2>
          <p>Admins will be able to edit another user's information (email,adddress, first name,last name etc).</p>
        </div>
      </div>
    </div>
  </body>
</html>