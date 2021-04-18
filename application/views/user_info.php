<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User Information</title>
	<style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
     
      .user_info{
        background-color: #3e4444;
        box-shadow: 0px 0px 40px 20px #b2b2b2;
        height: 800px;
        width: 300px;
        padding: 10px;
        margin-top: -20px;
        color: white;
        display: inline-block;
        position: fixed;
      }
      .profile_name{
        margin-top: 100px;
        margin-left: 70px;
        font-weight: bold;
        font-size: 15px;
      }
      .label{
        list-style: none;
      }
      .user_details{
        margin-top: 25px;
      }
      .message_section{
        display: inline-block;
        vertical-align: top; 
        margin-left: 350px;
      }
      .post{
        margin-left: 200px;
      }
      .say{
        font-weight: bold;
        font-size: 15px;
        width: 800px;
      }

      .message_box{
        resize: none;
        width: 600px;
        height: 100px;
        background-color: #deeaee;
        border-radius: 10px;
        box-shadow: 0px 0px 20px 5px #b2b2b2;
      }
      .post_btn{
        margin-left: 570px;
        padding: 5px;
        font-weight: bold;
        background-color: green;
        color: white;
      }
      .feed{
        margin-left: 100px;
      }
      .post_message{
        width: 400px;
        border-radius: 10px;
        resize: none;
        background-color: #ffef96 !important;

      }
      .time_diff{
        margin-left: 170px;
      }
      .comment_feed{
        margin-left: 70px;
      }
      .comment_box{
        width: 340px;
        border-radius: 10px;
        resize: none;
        background-color: #92a8d1 !important;
        display: block;
      }
      .comment_box_input{
        width: 340px;
        border-radius: 10px;
        resize: none;
        background-color: #c0ded9;
        margin-left: 450px;
      }
      .comment_btn{
        margin-left: 740px;
        padding: 5px;
        background-color: blue;
        border-radius: 10px;
        color: white;
        font-weight: bold;
        width: 25px;
        box-shadow: 0px 0px 20px 5px #b2b2b2;  
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
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Test App</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li><a href=<?=base_url('admin')?>>Dashboard</a></li>
              <li><a href="accounts/edit_profile/<?= $this->session->userdata['id'] ?>">Profile</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container2">
      <div class="user_info">
        <p class="profile_name"><?= $data['first_name']." " .$data['last_name']?></p>
        <ul class="user_details">
          <li>Registered at</li>
          <li class="label"><?=date("F j, Y, g:i a",strtotime($data['created_at']))?></li>
          <hr>
          <li>User ID Number</li>
          <li class="label"><?= $data['Id'] ?></li>
          <hr>
          <li>Email address:</li>
          <li class="label"><?= $data['email']?></li>
          <hr>
          <li>Description:</li>
          <li class="label"><?= $data['description']?></li>
          <hr>
        </ul>
      </div>

      <div class="message_section">
        <div class="post">
          <p class="say">Leave a message for <?= $data['first_name']?></p>
          <form class="form_post" method="post" action="<?=base_url('wall/save_message')?>">
            <input type="hidden" name="account_id" value="<?=$data['Id']?>">
            <textarea class="message_box "name="message"></textarea><br>
            <input class="post_btn" type="submit" name="send" value="Post">
          </form>
        </div>
        <div class="feed">
<?php  foreach($message as $value){ 
    $timestamp = strtotime($value['created_at']); 
     $strTime = array("second", "minute", "hour", "day", "month", "year");
     $length = array("60","60","24","30","12","10");
     $currentTime = time();
     if($currentTime >= $timestamp) {
        $diff     = time()- $timestamp;
        for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
          $diff = $diff / $length[$i];
        }
        $diff = round($diff); ?>
      <h6 class="name_message"><?=$value['name']." wrote"?><span class="time_diff"><?= $diff . " " . $strTime[$i] . "(s) ago "; ?></span></h6>
<?php   } 
      ?>
        <textarea class="post_message" readonly><?=$value['message']?></textarea>

          <div class="comment_feed">
<?php     foreach($comment as $comment_data){
            if($comment_data['message_id'] == $value['Id']){ ?>
              <textarea class="comment_box" readonly><?=" ".$comment_data['name']." - ".$comment_data['comment']?></textarea>
<?php       }?>
<?php     }?>
          </div>
          <form method="post" action="<?=base_url('wall/save_comment')?>">
            <input type="hidden" name="account_id" value="<?=$data['Id']?>">
            <input type="hidden" name="message_id" value="<?= $value['Id']?>">
            <textarea class="comment_box_input" name="comment"></textarea><br>
            <input class="comment_btn" type="submit" value="comment">
          </form>
<?php  } ?>
        </div>
      </div>
  </body>
</html>