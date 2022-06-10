<?php
     session_start();

     include("connection.php");
     include("functions.php");
     $userdata=check_login($con);
     $userdata2 = User_data($con);

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
  
    <title>Road Master</title>
<!--

CSS files

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/test2.css">
    
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap1.css" />
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="assets/css/responsive.css" rel="stylesheet" />

    </head>

    
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <!-- <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div> -->
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
      <div class="container">
          <div class="row">
              <div class="col-12">
              <nav class="main-nav">
                      <!-- ***** Logo Start ***** -->
                      <a href="Home.php" class="logo">Road<em> Master</em></a>
                      <!-- ***** Logo End ***** -->
                      <!-- ***** Menu Start ***** -->
                      <ul class="nav">
                            <li class="scroll-to-section"><a href="home.php">Home</a></li>
                            
                            <?php
                                if(isset($_SESSION['D_Id'])){echo"
                                    <li class='scroll-to-section'><a href='ReportMain.php' >Report</a></li>
                                    <li class='scroll-to-section'><a href='profile.php' >Profile</a></li>
                                    <li class='main-button'><a href='logout.php'>Log Out</a></li>
                                    ";
                                }
                                else if(isset($_SESSION['P_Id'])){echo"
                                    <li class='scroll-to-section'><a href='Accidents.php' >Accidents</a></li>
                                    <li class='scroll-to-section'><a href='AnalyticsMain.php' >Analytics</a></li>
                                    <li class='scroll-to-section'><a href='profileuser.php'  class='active'>Profile</a></li>
                                    <li class='main-button'><a href='logout.php'>Log Out</a></li>
                                    ";
                                }
                                else if(isset($_SESSION['In_Id'])){echo"
                                    <li class='scroll-to-section'><a href='Accidents_Ins.php' >Accidents</a></li>
                                    <li class='scroll-to-section'><a href='profileuser.php'  class='active'>Profile</a></li>
                                    <li class='main-button'><a href='logout.php' >Log Out</a></li>
                                    ";
                                }
                                else if(isset($_SESSION['RDA_Id'])){echo"
                                    <li class='scroll-to-section'><a href='Accidents.php' >Accidents</a></li>
                                    <li class='scroll-to-section'><a href='profileuser.php'  class='active'>Profile</a></li>
                                    <li class='main-button'><a href='logout.php'>Log Out</a></li>
                                    ";
                                }
                                else{echo"
                                    <li class='main-button'><a href='LoginType2.php'>Log In</a></li>";}
                                ?>
                            
                        </ul>    
                      <a class='menu-trigger'>
                          <span>Menu</span>
                      </a>
                      <!-- ***** Menu End ***** -->
                  </nav>
              </div>
          </div>
      </div>
  </header>
  <!-- ***** Header Area End ***** -->
<br>
<br>
<br>
<br>


<div class="layout_padding">

    <section class="layout_padding story_section ">
    <div class="container-fluid ">
        <div class="row">
        <!-- <div class=" col-md-6">
            <div>
            <img class="img-fluid" src="images/security.jpg" alt="" />
            </div> -->
        </div>
        <div class="col-lg-5 offset-lg-5 " >
        <div class="box">
            <br>
            <br>
		<p><img src="assets/img2/avatar.jpg" style="width: 150px; border-radius:75px"></p>
        <br>
        <br>

		<div id="ho2"> <h2 style= " font-family:Aachen BT; font-size:35px ;">My Profile</h2></div>
			<br>
            <br>
            <br>
                                </div>
        </div>
        <div class="col-lg-8 offset-lg-4" style=" margin-left: 430px; margin-right: auto;">
		<form ><fieldset disabled="disabled" style="color: #000;">


			<?php
            if( !empty($userdata) ){
                			
                if(!isset($_SESSION['In_Id'])){
                    echo"
                		<table class='pdtable'>
                			<tr height='40px'><td width = '280px' ><label><h5>Name</h5></label></td><td><input type='text' name='fname' value='{$userdata2['Name']}'></td></tr>
                			<tr height='40px'><td><label><h5>User Type</h5></label></td><td><input type='text' name='fname' placeholder='{$userdata2['User_type']}'></td></tr>
                			<tr height='40px'><td><label><h5>Contact No</h5></label></td><td><input type='text' name='fname' placeholder='{$userdata2['Contact_no']}'></td></tr>
                            <tr height='40px'><td><label><h5>E-mail</h5></label></td><td><input type='text' name='fname' placeholder='{$userdata2['Email']}'></td></tr>
                            <tr height='40px'><td><label><h5>Designation</h5></label></td><td><input type='text' name='fname' placeholder='{$userdata['Designation']}'></td></tr>
                            


                            
                		</table>";}
                else{
                    echo"
                		<table class='pdtable'>
                			<tr height='40px'><td width = '280px' ><label><h5>Name</h5></label></td><td><input type='text' name='fname' value='{$userdata2['Name']}'></td></tr>
                			<tr height='40px'><td><label><h5>User Type</h5></label></td><td><input type='text' name='fname' placeholder='{$userdata2['User_type']}'></td></tr>
                			<tr height='40px'><td><label><h5>Company</h5></label></td><td><input type='text' name='fname' placeholder='{$userdata['Company']}'></td></tr>
                			<tr height='40px'><td><label><h5>Contact No</h5></label></td><td><input type='text' name='fname' placeholder='{$userdata2['Contact_no']}'></td></tr>
                            <tr height='40px'><td><label><h5>E-mail</h5></label></td><td><input type='text' name='fname' placeholder='{$userdata2['Email']}'></td></tr>
                            <tr height='40px'><td><label><h5>Designation</h5></label></td><td><input type='text' name='fname' placeholder='{$userdata['Designation']}'></td></tr>
                            


                            
                		</table>";

                }
                }

        ?>
            </fieldset>
        </form>
        <br>
        <br>
        </div>
        


        <br>
        <br>

    </section>

</div>

    
    <!-- ***** Footer Start ***** -->
    <footer>
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <p>Copyright &copy; 2022 Road Master - Designed by <a rel="nofollow" href="Home.php" class="tm-text-link" >Code Brigade</a></p>

                  
              </div>
          </div>
      </div>
  </footer>

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/mixitup.js"></script> 
    <script src="assets/js/accordions.js"></script>
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

  </body>
</html>