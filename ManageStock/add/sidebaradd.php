<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <div class="navbar-brand">Thai Orange</div><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarCollapse" href="#"><i class="fa fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" action="./Checkout.php">
            <button type="button" class="btn btn-danger"><span class="fa fa-times mr-3"></span>ออกจากระบบ</button>
                </div>
            </form>
        </nav>
        <!-- Sideabar -->
<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" class="sb-sidenav accordion sb-sidenav-dark">
				<!-- <div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div> -->
        <?php $stts = $_SESSION["status"];
        $status = "Administrator";
        if($stts=='Admin'){ ?>
	  		<h1><div class="logo"><?php echo $status; ?></div></h1>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="../Main.php"><span class="fa fa-angle-left mr-3"></span> กลับ</a>
          </li>
        </ul>
        <?php }else{ ?>
          <h1><div class="logo"><?php echo $_SESSION["Fname"]." ".$_SESSION["Lname"]; ?></div></h1>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="../Main.php"><span class="fa fa-angle-left mr-3"></span> กลับ</a>
          </li>
        </ul>
      <?php  } ?>
    	</nav>