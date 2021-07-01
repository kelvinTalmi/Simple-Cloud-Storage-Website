

<?php

require 'includes/config.php';


if(isset($_SESSION["talmicloud"])) {
   echo "<script>window.location.href='menu.php'</script>";
}
if(isset($_POST['submit'])){
    
    $password=md5($_POST['password']);
    
    $query='SELECT setpassword FROM password WHERE setpassword=:password1';
    $result=$conn->prepare($query);
    $result->execute([':password1'=>$password]);
    $rows=$result->rowCount();
   
    
    if($rows>0){
        session_start();
     $_SESSION["talmicloud"]=time();
    echo  "<script>window.location.href='menu.php'</script>";
           
    }else{
        
          $message='wrong password';
         $alert='alert alert-warning';
    }
}


    ?>

<! DOCTYPE HTML>
<html>
<head>
 <meta charset="UTF-8">

  <meta name="author" content="Talmi">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


 <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<style>
    
    button{text-decoration: none !important}
</style>
</head>

<body id='refresh'>
<div style="padding-bottom:10px;position:static;"> <?php include('includes/header.php');?></div>




<div class='container'>
   <div style="margin:auto;float:none" class="col-md-5">
       <div class="card">
          <center><div class="card-header"><b>WorkSpace LogIn</b></div></center>
          <div class="card-body">
              <center><span id='messsage' class='<?= $alert ?>'><?= $message ?></span></center>
              <form method="post">
              <label>Password</label>
              <input type='password' class='form-control' name='password'><br>
              
              <center><button class='btn btn-success' name='submit'>Log In</button></center>
              </form>
              
              
          </div>
           
           
       </div>
       
       
   </div>
   </div>
        
        
	</body>
	
	</html>
