

<?php
session_start();


if(!isset($_SESSION["talmicloud"])) {
   echo "<script>window.location.href='index.php'</script>";
}

require 'includes/config.php';

$time=time();


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
         <p align='center' id='successful' style='display:none' class='alert alert-warning'>Note Added Successfully</p>
       
       
        <p align='center' style='display:none' id='error'  class='alert alert-secondary'></p>
       
       
<form id='note'>
    
    
 <div  style='text-align:center' class='alert alert-success '>
     
     <button class='btn btn-primary'><a style='color:white;text-decoration:none' href="notepad.php?t=<?php echo $time ?>">Back</a></button>
     <input type='reset' value='Discard' class='btn btn-danger' ></input>
 
 <span id='save'><b class='btn btn-success'>Save</b></span>
 
 
 
 
 </div> 
<div style='height:100% !important' class="card">
  
     
  <input  style='font-weight:bold;text-align:center' placeholder='Add title' id='title' type='text' class='form-control'>
   

    <textarea style='height:100% ' id='description' placeholder='Add description' class='form-control'></textarea>
   
    
    
    
</div>
</form>
</div>











     



        


       <br><br>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
        	<!--add-->
	<script>
	   $(document).ready(function(e){
	$("#save").click(function(e){
	            
	           
	            
var title=document.getElementById('title').value;
var description=document.getElementById('description').value;
	             
	            $.ajax({
	                
	                url:'checknote.php',
	                type:'POST',
	                cache: false,
	                
	                 beforeSend: function(){
                $('#add').attr("disabled","disabled");
                $('#add_link').css("opacity",".5");
                
                if(title===''){
                    $('#error').css('display','block');
                    document.getElementById('error').innerHTML='Title is missing';
                    e.preventDefault();
                     return false;
                    
                }else if(description===''){
                    $('#error').css('display','block');
                    document.getElementById('error').innerHTML='Description is missing';
                    e.preventDefault();
                     return false;
                }else{
                    
                }
                
                
            },
            
             beforeSend: function(){
               
                $('#note').css("opacity",".5");
            },
           
            complete:function(){
                
               
                $('#note').css("opacity","");
               
            },

	                
	                data:{title1:title,description1:description},
	                    
	                success:function(data){
	                     $('#error').css('display','none');
	                             $('#successful').css('display','block');
	                    
	                  
	                  
	     
	    
	                }
	                
	               
	            });
 
	        });
	        
	    });
	    
	    
	    
	    
	</script>

	</body>
	
	</html>
