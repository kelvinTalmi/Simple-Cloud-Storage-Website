

<?php
session_start();
if(!isset($_SESSION["talmicloud"])) {
   echo "<script>window.location.href='index.php'</script>";
}

require 'includes/config.php';



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
    <center><h5 style="color:blue">Files</h5></center>
    
    <div align="right"><button class="btn btn-link" id="togglebtn">+ Add</button></div>
    
    <div id="kenya" style="margin:auto;float:none" class="col col-md-6">
    <div style="display:none" id="add_link">
         <div align="right"><button class="btn btn-link" id="hide">&#10006;</button></div>
        <form id="form1" method="post">
            
           
            <label><b>Title</b></label>
            <input name="title" class="form-control" id="title">
            
            <label><b>File</b></label>
            <input type="file" name="imageupload" class="form-control" id="imageupload"> <br>
            
            <center><input type="submit" class="btn btn-success submitBtn"  value="Add"></center><br>
           </div>
             <p id="alertp"></p>
        </form>
        <div id="morelinks">
            
            
            
            
        <?php
        
        
        require 'includes/config.php';
        
        $sql="SELECT * FROM files order by id desc Limit 10";

$query=$conn->prepare($sql);

$query->execute();

$comments=$query->fetchAll();
foreach($comments as $comment){

$number=$comment->id;
 if(($number % 2) == 0){  
            $color='primary';
        }else{  
            $color='danger';
        }  
			
echo "<p id='t$comment->id' class='alert alert-$color' style='margin-bottom:-1px;color:black !important'><a href='files/$comment->filename'>$comment->title</a>  </p>";



		echo "<p id='a$comment->id' align='center' style='color:blue !important' class='alert alert-warning'> 
	
	
<i  id='s$comment->id' style='padding-right:1.6em;display:none' data-id='$comment->id' class='fa fa-lg fa-floppy-o save' aria-hidden='true'></i>	


<i  data-id='$comment->id' class='fa fa-edit fa-lg edit' aria-hidden='true'></i>
	
	&nbsp; &nbsp;&nbsp; &nbsp; 
	
	

<i  data-id='$comment->id' class='fa fa-trash fa-lg delete' aria-hidden='true'></i></p>"; 	
		



		

}
?>
        </div>
        </div>
    </div>
<br>

<?php

$sql45="SELECT * FROM files";

$query46=$conn->prepare($sql45);

$query46->execute();



$rows47=$query46->rowCount();

if($rows47>10){

?>
<div id="loader">
<center><button class="bt btn-primary d-flex align-content-center" id="loadmore">Load More</button></center>
</div>

  <?php } ?>
        


       <br><br>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
        
        
        
        
        
        
        <!--- update js-->
        
        
        	<script type='text/javascript'>
 $('.edit').click(function(){
    
   var el = this;
  
   var id = $(this).data('id');
   
   var title='t'+id;
  
   var action='a'+id;
   var save='s'+id;
  
 var contenteditable = document.getElementById(title).contentEditable;
 
 
 if(contenteditable == 'inherit' || contenteditable == 'false'){
  document.getElementById(title).contentEditable = true;

    document.getElementById(title).style.border ="1px solid orange";
    document.getElementById(action).style.borderTop ="1px solid orange";
    document.getElementById(save).innerHTML = "";
     document.getElementById(save).style.display ="inline-block";
        
    // $(#save).css('display','inline-block');
   
   
 }else{
  document.getElementById(title).contentEditable = false;
  
 }
});
</script>
        
        
        
        
        <!-- add link modification-->
        
<script>
$(document).ready(function(){
  $("#togglebtn").click(function(){
    $("#add_link").css('display','block');
    
  });
});


$(document).ready(function(){
  $("#hide").click(function(e){
      e.preventDefault();
    $("#add_link").css('display','none');
    
  });
});
</script>

        
      <!--update-->
	
	<script>
	$(document).ready(function(){
	 $('.save').click(function(){
     
   var el = this;
  
   var id = $(this).data('id');
	            
	           var t='t'+id;
	           var s='s'+id;
	           var a='a'+id;
	            
var title=document.getElementById(t).textContent;

	             
	            $.ajax({
	                
	                url:'updatef.php',
	                type:'POST',
	                cache: false,
	                
	                 beforeSend: function(){
              
                $('body').css("opacity",".5");
            },


	                
	                data:{title:title,id:id},
	                    
	                success:function(data){
	                      $('#refresh').css("opacity","");
	                    document.getElementById(s).innerHTML = "&nbsp;Saved";
	                 
	                  document.getElementById(t).contentEditable = false;
  
    document.getElementById(t).style.border ="1px solid #E4A0F7";
    document.getElementById(a).style.borderTop ="1px";
  
	     
	    
	                }
	                
	               
	            });
 
	        });
	});
	    
	    
	    
	    
	</script>
        
        
        <!-- delete-->


<script type="text/javascript">
 $('.delete').click(function(){
   var el = this;
  
   // Delete id
   var id = $(this).data('id');
  	$.ajax({
  	  url: 'editdeletef.php',
  	  type: 'POST',
  	  data: {
    	'delete': 1,
    	'id': id,
      },
      
      beforeSend: function(){
              
                $('body').css("opacity",".5");
                
                
            },
      success: function(response){
       
    $("#refresh").html(response);
	  $('body').css("opacity","");
       
       
      }
  	});
  });
</script>
        
        
        
        

<!--- add -->

	<script type="text/javascript">
$(document).ready(function (e){
$("#form1").on('submit',(function(e){
e.preventDefault();
$.ajax({
url: "checkfiles.php",
type: "POST",
data:  new FormData(this),
contentType: false,
cache: false,
processData:false,


 beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                $('#form1').css("opacity",".5");
            },
            
            complete:function(){
                
                $('.submitBtn').attr("disabled",false);
                $('#form1').css("opacity","");
                  $('#form1').trigger("reset");
            },


success: function(data){
  
$("#refresh").html(data);

},
error: function(){} 	        
});
}));
});
</script>
	
	
	
	<!-- load more-->
<script>

$(document).ready(function(){
	var limits=10;
$("#loadmore").click(function(){

	limits=limits+10;
	
$.ajax({
url:'morefiles.php',
type:'POST',

data:{
limit:limits
},
success:function(data){
$("#refresh").html(data);
}

});
	

	});

});



</script>
	</body>
	
	</html>
