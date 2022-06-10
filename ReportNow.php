<?php 
     session_start();

      include("connection.php");
      include("functions.php");

      
      if($_SERVER['REQUEST_METHOD'] == "POST")
      {
          //declaring variables for the user inputs

          
          $did = $_SESSION['D_Id'];
          $doa = $_POST['DOA'];
          $toa = $_POST['TOA'];
          $cause = $_POST['Cause'];
          $details = $_POST['Details'];
          $_SESSION['doa'] = $doa;

          



                          if(!empty($did) && !empty($doa)&& !empty($cause) )
                          {

                              //save to the database
                              $query = "insert into report (Driver_Id,Cause,Details,Date_of_Acc,Time_of_Acc) values ('$did','$cause','$details','$doa','$toa' )";
                              mysqli_query($con, $query);
                              

                              $qry2 = "SELECT * FROM report where Driver_Id = '$did' AND Date_of_Acc = '$doa' ";
                              $result2 = mysqli_query($con,$qry2);
                              if($result2 && mysqli_num_rows($result2) > 0)
                                {

                                    $Report_data = mysqli_fetch_assoc($result2);
                                    $repID = $Report_data['Rep_Id'];
                                }
                                $query3 = "insert into veh_rep (Vehicle_Id,Rep_Id) values ('$vreg','$repID' )";
                                mysqli_query($con, $query3);

                              

                              header("Location: ReportPic.php");
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
                            <li class="scroll-to-section"><a href="Home.php" >Home</a></li>
                            
                            <?php
                                if(!(isset($_SESSION['D_Id']))){echo"
                                    
                                    <li class='main-button'><a href='Login.php'>Log In</a></li>";
                                }
                                else{echo"
                                    <li class='scroll-to-section'><a href='ReportMain.php' class='active'>Report</a></li>
                                    <li class='scroll-to-section'><a href='profile.php' >Profile</a></li>
                                    <li class='main-button'><a href='logout.php'>Log Out</a></li>
                                    ";}
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
                    <h2  style= " font-family:Aachen BT; font-size:35px ;">Create <nbsp><nbsp><em> Report</em></h2>
                   <br>
                   <br>

                    <p>We are sorry for your unfortunate incident. Try to fill out every necessary detail.</p>



                    <form method = "post">
                    <table border=0>
                      
                        
        
                        <tr height="60px">
                            <td width="400px">
                               <h6> Date of Accident</h6>
                            </td>
                            <td width="600px">
                                <input type="Date" name="DOA" placeholder="Enter The Date of Accident" required>
                            </td>
                        </tr>
        
                        <tr height="60px">
                            <td>
                               <h6> Time of Accident</h6>
                            </td>
                            <td>
                                <input type="time" name="TOA" placeholder="Enter The Time of Accident" >
                            </td>
                        </tr>
        
                        <tr height="60px">
                            <td>
                               <h6> Cause</h6>
                            </td>
                            <td>
                                <select name="Cause" id="Cause">
                                    <option value="Speeding">Speeding</option>
                                    <option value="Drunk-Driving">Drunk-Driving</option>
                                    <option value="Bad Weather">Bad Weather</option>
                                    <option value="Distractions">Distractions</option>
                                    <option value="Other">Other</option>

                                  </select>
                            </td>
                        </tr>
        
                        <tr height="60px">
                            <td>
                                <h6>Details of the Accident</h6>
                            </td>
                            <td>
                                <textarea name="Details" id="Details" cols="30" rows="3" placeholder="Enter Special details about the accident. recommended for 'other' causes."></textarea>
                                
                            </td>
                            
                        </tr>
                        <br>

                        <tr height="30px"><td>

                        </td></tr>
                        
                        
               
                        <tr height="60px">
                            <td colspan=2 align="center">
                                <div class="main-button scroll-to-section">
                                <input style= " font-family:Aachen BT ; border-color:white; " type="Submit" value="Next Page">
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