<?php
$token=time();
?>

<div > <nav style="background-color:green;font-weight:bold; !important"  class="navbar  navbar-expand-lg navbar-dark  ">
      <div style="background-color:green; !important"  class="container-fluid">
      <a style="color:red !important" href="index.php">TALMI CLOUD</a> 
      





        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">




		  
		  <li class="nav-item">
              <a style="color:white;" class="nav-link" href="menu.php?<?php echo $token ?>">Home</a>
            </li>

		  <li class="nav-item">
              <a style="color:white;" class="nav-link" href="links.php?<?php echo $token ?>">links</a>
            </li>


		  <li class="nav-item">
              <a style="color:white;" class="nav-link" href="files.php?<?php echo $token ?>">Files</a>
            </li>

<li class="nav-item">
              <a style="color:white;" class="nav-link" href="notepad.php?<?php echo $token ?>">Notepad</a>
            </li>
<?php
if(isset($_SESSION["talmicloud"])) {

?>
<li class="nav-item">
              <a style="color:white;" class="nav-link" href="logout.php">Logout</a>
            </li>
			<?php } ?>

          </ul>
        </div>
      </div>
    </nav>
</div>
