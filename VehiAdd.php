<?php 
     session_start();

      include("connection.php");
      include("functions.php");

      
      if($_SERVER['REQUEST_METHOD'] == "POST")
      {
          //declaring variables for the user inputs

          
          
          $type = $_POST['Type'];
          $make = $_POST['Make'];
          $model = $_POST['Model'];
          $vreg = $_POST['RegNo'];
          $incom = $_POST['Incom'];
          $inpn = $_POST['InPn'];
          $did  = $_SESSION['D_Id']; 
          $tdate = date("y/m/d");   

          



                          if(!empty($model) && !empty($vreg)&& !empty($inpn) )
                          {

                              //save to the database
                              $query = "insert into vehicle 
                                (Registration_No,Insurance_Company,Insurance_Policy_No,Type,Make,Model,Driver_Id,Date)
                                    values ('$vreg','$incom','$inpn','$type','$make','$model','$did','$tdate' )";

                              mysqli_query($con, $query);

                              header("Location: Profile.php");
                              die;
                          }else
                          {
                              echo "Please enter some valid information!";
                              
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

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
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
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            
                            <?php
                                if(!(isset($_SESSION['D_Id']))){echo"
                                    
                                    <li class='main-button'><a href='Login.php'>Log In</a></li>";
                                }
                                else{echo"
                                    <li class='scroll-to-section'><a href='ReportMain.php'>Report</a></li>
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

  <!-- ***** Call to Action Start ***** -->
  <section class="section" id="features">
    <div class="container" >
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
  
                <div class="section-heading">
                    <h2 style= "font-size:35px ; font-family:Aachen BT">Add <nbsp><nbsp><em> VEHICLE</em></h2>
                    <br>
                    <br>
                    

                    <form method = "post">
                    <table border=0>
                      
                        <tr height="60px">
                            <td width="400px" >
                               <h6> Vehicle Type:</h6>
                            </td>
                            <td width="500px">
                                <select name="Type" id="Type">
                                    <option value="Bike">Bike</option>
                                    <option value="Car">Car</option>
                                    <option value="Bus">Bus</option>
                                    <option value="Truck">Truck</option>
                                    <option value="3-Wheeler">3-Wheeler</option>
                                    <option value="Van">Van</option>
                                    <option value="Other">Other</option>
                                  </select>
                            </td>
                        </tr>
        
                        <tr height="60px">
                            <td>
                               <h6> Vehicle Make:</h6>
                            </td>
                            <td>
                            <select name="Make" id="Make">
                                    <option value="Toyota">Toyota</option>
                                    <option value="Nissan">Nissan</option>
                                    <option value="Honda">Honda</option>
                                    <option value="Yamaha">Yamaha</option>
                                    <option value="Mitsubishi">Mitsubishi</option>
                                    <option value="Mahindra">Mahindra</option>
                                    <option value="Tata">Tata</option>
                                    <option value="Suzuki">Suzuki</option>
                                    <option value="Mazda">Mazda</option>
                                    <option value="Isuzu">Isuzu</option>
                                    <option value="Hino">Hino</option>


                                    <option value="Other">Other</option>
                                  </select>
                            </td>
                        </tr>
        
                        <tr height="60px">
                            <td>
                               <h6> Vehicle Model:</h6>
                            </td>
                            <td>
                                <input type="text" name="Model" placeholder=" Ex: Hornet, Vezel, Leaf" pattern="[a-zA-Z0-9]+" required>
                            </td>
                        </tr>
        
                        <tr height="60px">
                            <td>
                                <h6> Vehicle Registration No</h6>
                            </td>
                            <td>
                                <input type="text" name="RegNo" placeholder=" Ex: WPBBA7689" pattern="([A-Z]{4,6}[0-9]{4})|([A-Z]{2,3}[0-9]{2,3}-[0,9]{4})" required>
                            </td>
                        </tr>
        
                        <tr height="60px">
                            <td>
                               <h6> Insurance Company</h6>
                            </td>
                            <td>
                                <select name="Incom" id="Incom">
                                    <option value="Sri_Lanka_Insurance">Sri Lanka Insurance</option>
                                    <option value="Janashakthi_Insurance">Janashakthi Insurance</option>
                                    <option value="Ceylinco">Ceylinco</option>
                                    <option value="Assetline_Leasing">Assetline Leasing</option>
                                    <option value="Peoples_Insurance">People's Insurance PLC</option>
                                    <option value="Vallible_Finance">Vallible_Finance</option>


                                  </select>
                            </td>
                        </tr>
        
                        <tr height="60px">
                            <td>
                                <h6>Insurance Policy Number</h6>
                            </td>
                            <td>
                                <input type="text" name="InPn" placeholder=""  required>
                            </td>
                        </tr>	
                

               
                        <tr height="60px">
                            <td colspan=2 align="center">
                                <br>
                                
                                    <div class="main-button scroll-to-section">
                                    <input style= " font-family:Aachen BT ; border-color:white; " type="Submit" value="Add Vehicle">
                                    <!--  -->
                                    </div>
                                
                                
                                
                
                            </td>
        
                        </tr>
                    </table>
                    
                    </form>
                    </div>
                </div>   
            </div>
        </div>
    </div>
</section>
<!-- ***** Call to Action End ***** -->

    
    <!-- ***** Footer Start ***** -->
    <footer>
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <p>Copyright &copy; 2022 Road Master
                  
                  - Designed by <a rel="nofollow" href="Home.php" class="tm-text-link" >Code Brigade</a></p>

                  
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