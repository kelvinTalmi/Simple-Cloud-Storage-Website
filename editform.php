
<?php
	include('includes/config.php');
	$id=$_GET['id'];
	
	if(isset($_POST['update'])){
	
	$title=$_POST['title'];
$link=$_POST['link'];


$sql="UPDATE links set title=:title,link=:link WHERE id=:id";

$query=$conn->prepare($sql);

if($query->execute([':title'=>$title,':link'=>$link,':id'=>$id])){
    
    echo "fuck you";
}
	
	}
	
	
	
	
	$result = $conn->prepare("SELECT * FROM links WHERE id= :id");

	$result->execute([':id'=> $id]);
	foreach($result as $results){
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


   

<form method="post">
Title<br>
<input type="text" style="text-transform:uppercase;width:100% !important" id='title' name="title" value="<?php echo $results->title ?>" required /><br>
<input type="text"  style="text-transform:uppercase;width:100%" id='lid' name="lid" value="<?php echo $results->id ?>" required />

Link<br>
<input type="text" style="text-transform:uppercase;width:100%" id='link' name="link" value="<?php echo $results->link ?>" required /><br>

<br>






<center><button name='update' id="update" >Update</button> </center>

</form>
<?php
	}
?>



    
   
	
<!--	<script>-->
<!--	   $(document).ready(function(){-->
<!--	$("#update").click(function(){-->
	            
	           
<!--	  var lid=document.getElementById('lid').value;          -->
<!--var title=document.getElementById('title').value;-->
<!--var link=document.getElementById('link').value;-->
	             
<!--	            $.ajax({-->
	                
<!--	                url:'update1.php',-->
<!--	                type:'POST',-->
<!--	                cache: false,-->
	                
<!--	                 beforeSend: function(){-->
<!--                $('#add').attr("disabled","disabled");-->
<!--                $('#add_link').css("opacity",".5");-->
<!--            },-->
            
<!--            complete:function(){-->
                
<!--                $('#update').attr("disabled",false);-->
<!--                $('#add_link').css("opacity","");-->
               
<!--            },-->

	                
<!--	                data:{title1:title,link1:link,lid:lid},-->
	                    
<!--	                success:function(data){-->
	                    
	                                
<!--	                   $('#morelinks').html(data)-->
	                 
	                  
	     
	    
<!--	                }-->
	                
	               
<!--	            });-->
 
<!--	        });-->
	        
<!--	    });-->
	    
	    
	    
	    
<!--	</script>-->
	
	 
    
    














