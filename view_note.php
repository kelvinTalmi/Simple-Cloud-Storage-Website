

<?php
session_start();


if(!isset($_SESSION["talmicloud"])) {
   echo "<script>window.location.href='index.php'</script>";
}


require 'includes/config.php';

$time=time();

$message='';
$alert='';







if(isset($_POST['update'])){
    $id=$_GET['id'];
    $title=$_POST['title'];
     $description=$_POST['description'];
     
     $update="UPDATE notepad SET title=:title,description=:description WHERE id=:id";
     
     $updatestmt=$conn->prepare($update);
    if(
     $updatestmt->execute([':title'=>$title,':description'=>$description,':id'=>$id])){
         
         echo "<script> document.getElementById('message').style.display='block' </script>";
         $message='Note updated successfully';
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
    input[type='text']::placeholder
    {   
        text-align: center;      /* for Chrome, Firefox, Opera */
    }
    
    
     textarea::placeholder
    {   
        text-align: center;      /* for Chrome, Firefox, Opera */
    }
    button{text-decoration: none !important}
</style>
</head>

<body id='refresh'>
<div style="padding-bottom:10px;position:static;"> <?php include('includes/header.php');?></div>




<div class='container'>
    <center><h5 style="color:blue">Add Note</h5></center>
    
    
    
    <div id="kenya" style="margin:auto;float:none" class="col col-md-6">
        
         <p align='center'  id='message' class='<?= $alert ?>'> <?= $message ?></p>
       
       
       
       
       
<form method='post'>
    <div  style='text-align:center' class='alert alert-success '>
     
     <button class='btn btn-primary'><a style='color:white;text-decoration:none' href="notepad.php?t=<?php echo $time ?>">Back</a></button>
  <!--<button class='btn btn-danger' name='delete'>Delete</button>-->
 
<button class='btn btn-success' name='update'>Update</button>
 
 
 
 
 </div> 
    <?php
    $id=$_GET['id'];
    $sql="SELECT * FROM notepad WHERE id=:id";
$result=$conn->prepare($sql);
$result->execute([':id'=>$id]);
$row=$result->fetchAll();

foreach($row as $rows){

    
    
    ?>
 
<div style='height:100% !important' class="card">
  
     
  <input  value="<?= $rows->title  ?>"    style='font-weight:bold;text-align:center' placeholder='Add title' name='title' type='text' class='form-control'>
   

    <textarea style='height:100% ' name='description' placeholder='Add description' class='form-control'><?= $rows->description  ?></textarea>
   
    
    
    
</div>

</form>
</div>

<?php } ?>









     



        


       <br><br>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
        	<!--add-->


	</body>
	
	</html>
