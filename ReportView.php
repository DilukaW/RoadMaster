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
                                    <li class='scroll-to-section'><a href='ReportMain.php' class='active'>Report</a></li>
                                    <li class='scroll-to-section'><a href='profile.php' >Profile</a></li>
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
                    <h2 style= " font-family:Aachen BT; font-size:35px ;">Report <em>Details</em></h2>
                   <br>
                   <br>
                    <p>List of all of the Reports You Have Made and Their Status of Acceptance.</p>
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
						      <th width='100px'>Report ID</th>
						      <th width='150px'>Cause</th>
						      <th width='200px'>Details</th>
						      <th width='200px'>Date</th>
						      <th>Police Status</th>
                              <th>Insurance Status</th>
						      <th>RDA Status</th>
						      <th>&nbsp;</th>

						    </tr>
						  </thead>
						  <tbody>
                              <?php
                                $Did = $userdata['Driver_Id'];
                                $sqry="SELECT * FROM report where Driver_Id = $Did";

                                if(!($squ= mysqli_query($con,$sqry)))
                                {
                                    echo"Data retrival failed";
                                }
                                while( $row = mysqli_fetch_assoc($squ) )
                                {
                                  $rid = $row['Rep_Id'];
                                  $did = $row['Driver_Id'];
                                  if(empty($row['P_Id'])){
                                    $pid = 'Pending...';
                                }
                                else{
                                    
                                    $sqry2 = "SELECT * FROM rep_pol where Rep_Id ='$rid'";
                                    if(!($squ2= mysqli_query($con,$sqry2)))
                                    {
                                        echo"Data retrival failed";
                                    }
                                    
                                    while( $row2 = mysqli_fetch_assoc($squ2) )
                                    {
                                        
                                        $pid = "{$row2['Status']}";
                                        
                                    }
                                    
                                    
                                }
                                if(empty($row['In_Id'])){
                                    $inid = 'Pending...';
                                }
                                else{
                                    
                                    $sqry3 = "SELECT * FROM rep_in where Rep_Id ='$rid'";
                                    if(!($squ3= mysqli_query($con,$sqry3)))
                                    {
                                        echo"Data retrival failed";
                                    }
                                    
                                    while( $row3 = mysqli_fetch_assoc($squ3) )
                                    {
                                        
                                        $inid = "{$row3['Status']}";
                                        
                                    }
                                    
                                    
                                }
                                if(empty($row['RDA_Id'])){
                                    $rdaid = 'Pending...';
                                }
                                else{
                                    
                                    $sqry4 = "SELECT * FROM rep_rda where Rep_Id ='$rid'";
                                    if(!($squ4= mysqli_query($con,$sqry4)))
                                    {
                                        echo"Data retrival failed";
                                    }
                                    
                                    while( $row4 = mysqli_fetch_assoc($squ4) )
                                    {
                                        
                                        $rdaid = "{$row4['Status']}";
                                        
                                    }
                                    
                                    
                                }
                                  
                                echo" 
                                <tr class='alert' role='alert'>
                                <th scope='row'>$rid</th>
                                <td>{$row['Cause']}</td>
                                <td>{$row['Details']}</td>
                                <td>{$row['Date_of_Acc']}</td>
                                <td>$pid</td>
                                <td>$inid</td>
                                <td>$rdaid</td>
                                <td width='100px'>
                                    
  
                                  <div class='main-button scroll-to-section'>
                                  <form action='ReportFull.php' method='POST'>
                                  <input type='hidden' name='rid' value='$rid' >
                                    <input type='Submit' value='See More'>
                                    </form>
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
            <div class="col-lg-2 offset-lg-9" style=" margin-left: 700px; margin-right: auto;">
                <div class="trainer-item">
                    <div >
                    <div class="main-button"><a style= " font-family:Aachen BT " href="ReportMain.php">Go Back</a></div>
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