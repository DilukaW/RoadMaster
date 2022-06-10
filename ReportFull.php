<?php
     session_start();

     include("connection.php");
     include("functions.php");
     $userdata=check_login($con);
     

     if($_SERVER['REQUEST_METHOD'] == "POST"){
         $rid = $_POST['rid'];
         //$did = $_POST['did'];

        if(!empty($rid)){
            $qry ="SELECT * FROM report where Rep_Id = $rid";
            if(!($squ= mysqli_query($con,$qry))){
                echo"Data retrival failed";

            }
            $qry2 ="SELECT * FROM rep_pic where Rep_Id = $rid";
            if(!($squ2= mysqli_query($con,$qry2))){
                echo"Data retrival failed";

            }
            
        }
     }
     
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
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" />
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/style3.css" rel="stylesheet" />



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
                                    <li class='scroll-to-section'><a href='ReportMain.php' class='active'>Report</a></li>
                                    <li class='scroll-to-section'><a href='profile.php' >Profile</a></li>
                                    <li class='main-button'><a href='logout.php'>Log Out</a></li>
                                    ";
                                }
                                else if(isset($_SESSION['P_Id'])){echo"
                                    <li class='scroll-to-section'><a href='Accidents.php' >Accidents</a></li>
                                    <li class='scroll-to-section'><a href='AnalyticsMain.php' >Analytics</a></li>
                                    <li class='scroll-to-section'><a href='profileuser.php' >Profile</a></li>
                                    <li class='main-button'><a href='logout.php'>Log Out</a></li>
                                    ";
                                }
                                else if(isset($_SESSION['In_Id'])){echo"
                                    <li class='scroll-to-section'><a href='Accidents.php' >Accidents</a></li>
                                    <li class='scroll-to-section'><a href='profileuser.php' >Profile</a></li>
                                    <li class='main-button'><a href='logout.php'>Log Out</a></li>
                                    ";
                                }
                                else if(isset($_SESSION['RDA_Id'])){echo"
                                    <li class='scroll-to-section'><a href='Accidents.php' >Accidents</a></li>
                                    <li class='scroll-to-section'><a href='profileuser.php' >Profile</a></li>
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
<br>

  <div class="w3-content" style="max-width:800px">
  <h2>Photos of the Accident:</h2>
    <!-- <img class="mySlides" src="assets/Img2/Sl21 Ps.jpg" style="width:100%">
    <img class="mySlides" src="assets/Img2/Sl16Ps.jpg" style="width:100%"> -->
    <?php
     while( $row2 = mysqli_fetch_assoc($squ2) ){
         $src = "upload/{$row2['rep_id']}/{$row2['file_name']}";
        echo "<img class='mySlides' src='$src' style='width:100%'>";
     }
    ?>
  </div>
  
  <div class="w3-center">
    <div class="w3-section">
    <button class="w3-button w3-light-grey" onclick="plusDivs(-1)">❮ Prev</button>
    <button class="w3-button w3-light-grey" onclick="plusDivs(1)">Next ❯</button>
  </div>

  </div>
  
  <script>
  var slideIndex = 1;
  showDivs(slideIndex);
  
  function plusDivs(n) {
    showDivs(slideIndex += n);
  }
  
  function currentDiv(n) {
    showDivs(slideIndex = n);
  }
  
  function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");
    if (n > x.length) {slideIndex = 1}    
    if (n < 1) {slideIndex = x.length}
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";  
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" w3-red", "");
    }
    x[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " w3-red";
  }
  </script>

<div class="layout_padding">

    <section class="layout_padding story_section ">
    <div class="container-fluid">
        <div class="row">
        <!-- <div class=" col-md-6">
            <div>
            <img class="img-fluid" src="images/security.jpg" alt="" />
            </div> -->
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-lg-5 offset-lg-1">
                <form ><fieldset  disabled="disabled" style="color: #000;">

                
                    <?php
                    if( !empty($userdata) ){
                                    echo"
                                <table class='pdtable'>
                                    <h2>Driver Details</h2>
                                    <tr height='40px'><td width = '280px' ><label><h5>Name</h5></label></td><td><input type='text' name='fname' value='{$userdata['Name']}'></td></tr>
                                    <tr height='40px'><td><label><h5>Gender</h5></label></td><td><input type='text' name='fname' placeholder='{$userdata['Gender']}'></td></tr>
                                    <tr height='40px'><td><label><h5>Driver's License</h5></label></td><td><input type='text' name='fname' placeholder='{$userdata['Licence_No']}'></td></tr>
                                    <tr height='40px'><td><label><h5>E-mail</h5></label></td><td><input type='text' name='fname' placeholder='{$userdata['Email']}'></td></tr>
                                    <tr height='40px'><td><label><h5>Contact No.</h5></label></td><td><input type='text' name='fname' placeholder='{$userdata['Contact_No']}'></td></tr>

                                    
                                </table>";}

                ?>
                    </fieldset>
                </form>
                <br>
                <br>
            </div>
            <div class="col-lg-5 ">
                <form ><fieldset  disabled="disabled" style="color: #000;">

                
                    <?php
                    while( $row = mysqli_fetch_assoc($squ) ){
                                    echo"
                                <table class='pdtable'>
                                    <h2>Report Details</h2>
                                    <tr height='40px'><td width = '280px' ><label><h5>ID</h5></label></td><td><input type='text' name='fname' value='{$row['Rep_Id']}'></td></tr>
                                    <tr height='40px'><td><label><h5>Cause</h5></label></td><td><input type='text' name='fname' placeholder='{$row['Cause']}'></td></tr>
                                    <tr height='40px'><td><label><h5>Details</h5></label></td><td><textarea  name='tex' rows='2' cols='30' placeholder='{$row['Details']}'></textarea></td></tr>
                                    <tr height='40px'><td><label><h5>Date</h5></label></td><td><input type='text' name='fname' placeholder='{$row['Date_of_Acc']}'></td></tr>
                                    <tr height='40px'><td><label><h5>Time</h5></label></td><td><input type='text' name='fname' placeholder='{$row['Time_of_Acc']}'></td></tr>

                                    
                                </table>";}

                ?>
                    </fieldset>
                </form>
                <br>
                <br>
            </div>
        </div>
        

    
        <br>
        <br>

    </section>

</div>
<br>
<br>
    
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