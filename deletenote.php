
 <?php
 require 'includes/config.php';

  	$id = $_POST['id'];
  	
  	$sql="DELETE FROM notepad WHERE id=:id";
  	$query=$conn->prepare($sql);
  	$query->execute([':id'=>$id]);
 
 
?><div style="padding-bottom:10px;position:static;"> <?php include('includes/header.php');?></div>




<div class='container'>
    <center><h5 style="color:blue">NotePad</h5></center>
    
    <div align="right"><button class="btn btn-link" id="togglebtn"><a href='add_note.php'>+ Add</a></button></div>
    
    <div id="kenya" style="margin:auto;float:none" class="col col-md-6">
    
         
       
        <div id="morelinks">
            
            
            
            
        <?php
        
        
        require 'includes/config.php';
        
        $sql="SELECT * FROM notepad order by id desc Limit 10";

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
			
echo "<p  class='alert alert-$color' style='margin-bottom:-1px;color:black !important'><a href='view_note.php?id=$number'>$comment->title</a>  </p>";


	echo "<p id='a$comment->id' align='center' style='color:blue !important' class='alert alert-warning'> 
	
	
	


<i  data-id='$comment->id' class='fa fa-eye fa-lg view' aria-hidden='true'></i>
	
	&nbsp; &nbsp;&nbsp; &nbsp; 
	
	

<i  data-id='$comment->id' class='fa fa-trash fa-lg delete' aria-hidden='true'></i> </p>";

}
?>
        </div>
      
    </div>
<br>

<?php

$sql45="SELECT * FROM notepad";

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
        
        
<!--load more-->
<script>

$(document).ready(function(){
 
	var limits=10;
$("#loadmore").click(function(){

	limits=limits+10;
	
$.ajax({
url:'morenotes.php',
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
	 $('.view').click(function(){
     
   var el = this;
   
   var id = $(this).data('id');
   
   
   
   window.location.href='view_note.php?id='+id;
   
   
	 });
	});
</script>





<script type="text/javascript">
 $('.delete').click(function(){
   var el = this;
  
   // Delete id
   var id = $(this).data('id');
  	$.ajax({
  	  url: 'deletenote.php',
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


