<?php
     session_start();

     include("connection.php");
     include("functions.php");
     $userdata=check_login($con);

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
    <link href="assets/css/style1.css" rel="stylesheet" />

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
                                if(!(isset($_SESSION['D_Id']))){echo"
                                    
                                    <li class='main-button'><a href='Login.php'>Log In</a></li>";
                                }
                                else{echo"
                                    <li class='scroll-to-section'><a href='ReportMain.php' >Report</a></li>
                                    <li class='scroll-to-section'><a href='profile.php' class='active'>Profile</a></li>
                                    <li class='main-button'><a href='logout.php'>Log Out</a></li>";}
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


    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading">
                    <h2 style= "font-size:35px ; font-family:Aachen BT">Vehicle <em>Details</em></h2>
                   
                    <br>
                    <br>

                    <p>Here's a list of all the vehicles you own. If You want to Change any detail click 'EDIT'.</p>
                </div>
            </div>
        </div>
    </div>
<nobr></nobr>
<section class="ftco-section">
		<div class="container" style="margin-top:-100px;">
			
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table">
						  <thead class="thead-dark">
						    <tr>
						      <th>Registration No.</th>
						      <th>Make</th>
						      <th>Model</th>
						      <th>Type</th>
						      <th>Insurance Company</th>
						      <th>Insurance Policy No</th>

						      <th>&nbsp;</th>
						    </tr>
						  </thead>
						  <tbody>
                              <?php
                                $Did = $userdata['Driver_Id'];
                                $sqry="SELECT * FROM vehicle where Driver_Id = $Did";

                                if(!($squ= mysqli_query($con,$sqry)))
                                {
                                    echo"Data retrival failed";
                                }
                                while( $row = mysqli_fetch_assoc($squ) )
                                {
                                echo" 
                                <tr class='alert' role='alert'>
                                <th scope='row'>{$row['Registration_No']}</th>
                                <td>{$row['Make']}</td>
                                <td>{$row['Model']}</td>
                                <td>{$row['Type']}</td>
                                <td>{$row['Insurance_Company']}</td>
                                <td>{$row['Insurance_Policy_No']}</td>
                                
  
                                <td width='100px'>
                                    <!-- <a href='#' class='close' data-dismiss='alert' aria-label='Close'>
                                  <span aria-hidden='true'><i class='fa fa-close'></i></span> -->
  
                                  <div class='trainer-item'>
                                      <div >
                                          <div class='main-button'><a href='VehiEdit.php'>Edit</a></div>
                                      </div>
                                      
                                  </div>
  
                                
                              </td>
                              </tr>";
                                }
                                

                              ?>
						    
						    
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
        <br>
        <br>
            <div class="col-lg-2 offset-lg-9"  style=" margin-left: 700px; margin-right: auto;">
                <div class="trainer-item">
                    <div >
                    <div class="main-button"><a style= " font-family:Aachen BT; "href="Vehiedit.php">Go Back</a></div>
                    </div>
                    
                </div>
            
	</section>

    
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