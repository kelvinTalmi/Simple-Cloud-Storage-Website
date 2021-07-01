<?php
session_start();


if(!isset($_SESSION["talmicloud"])) {
  echo "<script>window.location.href='index.php'</script>";
}

require 'includes/config.php';



if(isset($_POST['update'])){
   
     $pass=md5($_POST['pass']);
     
     $update="UPDATE password SET setpassword=:pass";
     
     $updatestmt=$conn->prepare($update);
    if($updatestmt->execute([':pass'=>$pass])){
         
         $message='Password updated successfully';
         $alert='alert alert-warning';
     }else{
         $message='Something went wrong';
          $alert='alert alert-danger';
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
     <center><h4 class='alert alert-primary'>MENU</h4>
     
    <p> <a href='links.php' class='btn btn-success'>Links</a></p>
     <p> <a href='files.php' class='btn btn-danger'>Files</a></p>
     <p> <a href='notepad.php' class='btn btn-warning'>Notepad</a></p>
     
     
     <div class='alert alert-primary'>
         <p align='center'  id='message' style='color:green'><?= $message ?></p>
         <form method='post'>
    
       
       
            <label><b>Change Password</b></label> 
             <input name="pass" class='form-control' type='password'> <br>
             <button class='btn btn-info' name='update'>Update</button>
             
         </form>
         
         
         
     </div>
     
     
     
     
     
     
     
     </center>
     
     
     
     
     
 </div>
    
	</body>
	
	</html>
