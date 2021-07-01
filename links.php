
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

    
	<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
 
  <script src="src/facebox.js" type="text/javascript"></script>


 <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<style>
    
    button{text-decoration: none !important}
</style>
</head>






<body id="refresh">
    
   
<div style="padding-bottom:10px;position:static;"> <?php include('includes/header.php');?></div>




<div class='container-fluid'>
    <center><h5 style="color:blue">Links</h5></center>
    
    <div align="right">
        <button class="btn btn-link" id="togglebtn">+ Add</button>
        </div>
   
    <div id="kenya" style="margin:auto;float:none" class="col col-md-6">
        
    <div style="display:none" id="add_link">
         <div align="right"><button class="btn btn-link" id="hide">&#10006;</button></div>
        <!--<form method="post">-->
            
           
            <label><b>Title</b></label>
            <input name="title" class="form-control" id="title">
            
            <label><b>Link</b></label>
            <input name="link" class="form-control" id="link"> <br>
            
            <center><button  class="btn btn-success" name="add" id="add">Add</button></center> <br>
           </div>
        <!--</form>-->
         <div id="alertp">
        <div id="morelinks" class='morelinks'>
        <?php
        require 'includes/config.php';
        $sql="SELECT * FROM links order by id desc Limit 10";

$query=$conn->prepare($sql);

$query->execute();

$comments=$query->fetchAll();
foreach($comments as $comment){

			
echo "<p id='t$comment->id'  style='margin-bottom:-1px;color:black;font-weight:bold !important' class='alert alert-danger'>$comment->title</p>";

			

echo "<p id='l$comment->id'  style='margin-bottom:-1px;color:blue !important' class='alert alert-danger'><a href='$comment->link'>$comment->link</a></p>"; 

	echo "<p id='a$comment->id' align='center' style='color:blue !important' class='alert alert-warning'> 
	
	
	<i  id='s$comment->id' style='padding-right:1.6em;display:none' data-id='$comment->id' class='fa fa-lg fa-floppy-o save' aria-hidden='true'></i>


<i  data-id='$comment->id' class='fa fa-edit fa-lg edit' aria-hidden='true'></i>
	
	&nbsp; &nbsp;&nbsp; &nbsp; 
	
	

<i  data-id='$comment->id' class='fa fa-trash fa-lg delete' aria-hidden='true'></i></p>"; 	



}


?>


<!--contenteditable-->
		

        
        
        
        </div>
    </div>
<br>

<?php

$sql45="SELECT * FROM links";

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
       
</div>
        </div>
        
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 
	<script type='text/javascript'>
 $('.edit').click(function(){
     
     
     
   var el = this;
  
	
   
   var id = $(this).data('id');
   
   var title='t'+id;
   var link='l'+id;
   var action='a'+id;
   var save='s'+id;
   
   
   
 var contenteditable = document.getElementById(title).contentEditable;
  var contenteditable2 = document.getElementById(link).contentEditable;
 
 if(contenteditable == 'inherit' || contenteditable == 'false'){
  document.getElementById(title).contentEditable = true;
  document.getElementById(link).contentEditable = true;
  
  document.getElementById(link).style.border ="1px solid orange";
    document.getElementById(title).style.border ="1px solid orange";
    document.getElementById(action).style.borderTop ="1px solid orange";
    document.getElementById(save).innerHTML = "";
     document.getElementById(save).style.display ="inline-block";
        
    // $(#save).css('display','inline-block');
   
   
 }else{
  document.getElementById(title).contentEditable = false;
  document.getElementById(link).contentEditable = false;
 }
});
</script>


<script type="text/javascript">
 $('.delete').click(function(){
   var el = this;
  
   // Delete id
   var id = $(this).data('id');
  	$.ajax({
  	  url: 'editdelete.php',
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

	<!--add-->
	<script>
	   $(document).ready(function(){
	$("#add").click(function(){
	            
	           
	            
var title=document.getElementById('title').value;
var link=document.getElementById('link').value;
	             
	            $.ajax({
	                
	                url:'check.php',
	                type:'POST',
	                cache: false,
	                
	                 beforeSend: function(){
                $('#add').attr("disabled","disabled");
                $('#add_link').css("opacity",".5");
            },
            
            complete:function(){
                
                $('#add').attr("disabled",false);
                $('#add_link').css("opacity","");
                $("#add_link input").each(function() {
      this.value = "";
  })
            },

	                
	                data:{title1:title,link1:link},
	                    
	                success:function(data){
	                    
	                                
	                    
	                    $("#refresh").html(data);
	                 
	                  
	     
	    
	                }
	                
	               
	            });
 
	        });
	        
	    });
	    
	    
	    
	    
	</script>
	
	<!--update-->
	
	<script>
	$(document).ready(function(){
	 $('.save').click(function(){
     
   var el = this;
  
   var id = $(this).data('id');
	            var l='l'+id;
	           var t='t'+id;
	           var s='s'+id;
	           var a='a'+id;
	            
var title=document.getElementById(t).textContent;
var link=document.getElementById(l).textContent;
	             
	            $.ajax({
	                
	                url:'update1.php',
	                type:'POST',
	                cache: false,
	                
	                 beforeSend: function(){
              
                $('body').css("opacity",".5");
            },


	                
	                data:{title:title,link:link,id:id},
	                    
	                success:function(data){
	                      $('#refresh').css("opacity","");
	                    document.getElementById(s).innerHTML = "&nbsp;Saved";
	                 
	                  document.getElementById(t).contentEditable = false;
  document.getElementById(l).contentEditable = false;
  
  document.getElementById(l).style.border ="1px solid #E4A0F7";
    document.getElementById(t).style.border ="1px solid #E4A0F7";
    document.getElementById(a).style.borderTop ="1px";
  
	     
	    
	                }
	                
	               
	            });
 
	        });
	});
	    
	    
	    
	    
	</script>
	
	
	
	<!--loadmore-->
	
	<script>

$(document).ready(function(){
	var limits=10;
$("#loadmore").click(function(){

	limits=limits+10;
	
$.ajax({
url:'morelinks.php',
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

	</div>
	</body>
	</html>
