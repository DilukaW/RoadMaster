<?php 
     session_start();

      include("connection.php");
      include("functions.php");

      
      if($_SERVER['REQUEST_METHOD'] == "POST")
      {
          //declaring variables for the user inputs

          
          
          $Name = $_POST['Name'];
          $email = $_POST['Email'];
          $Con_No = $_POST['Con_no'];
          $NIC = $_POST['NIC'];
          $gender = $_POST['Gender'];
          $License_no = $_POST['License_no'];        
          $pass1=$_POST['password'];
          $password = hash('md5',$pass1);
          



                          if(!empty($Name) && !empty($email)&& !empty($NIC)&& !empty($gender)&& !empty($License_no)&& !empty($Con_No) )
                          {

                              //save to the database
                              $query = "insert into driver (Password,Licence_No,Name,Contact_No,Email,Gender) values ('$password','$License_no','$Name','$Con_No','$email','$gender' )";

                              mysqli_query($con, $query);

                              header("Location: DLogin.php");
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
                            <li class="scroll-to-section"><a href="home.php" class="active">Home</a></li>
                            
                            <?php
                                if(!(isset($_SESSION['D_Id']))){echo"
                                    
                                    <li class='main-button'><a href='Login.php'>Log In</a></li>";
                                }
                                else{echo"
                                    <li class='scroll-to-section'><a href='#rep' >Report</a></li>
                                    <li class='scroll-to-section'><a href='#pro' >Profile</a></li>
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
                    <h2>Sign <nbsp><nbsp><em> In</em></h2>
                    <img src="assets/Img2/line-dec.png" alt="waves">

                    <form method = "post">
                    <table border=0>
                      
                        <tr height="60px">
                            <td width="400px" >
                               <h6> Name</h6>
                            </td>
                            <td width="500px">
                                <input type="text" name="Name" placeholder="Enter Your Name" pattern="[a-zA-Z\s]{4,50}" required>
                            </td>
                        </tr>
        
                        <tr height="60px">
                            <td>
                               <h6> Email</h6>
                            </td>
                            <td>
                                <input type="email" name="Email" placeholder="Enter Your E-mail" required>
                            </td>
                        </tr>
        
                        <tr height="60px">
                            <td>
                               <h6> Contact Number</h6>
                            </td>
                            <td>
                                <input type="text" name="Con_no" placeholder="Enter Your Contact Number" onkeypress='validateConNum(event)' required>
                            </td>
                            <script>
                                function validateConNum(evt) {
                                    var theEvent = evt || window.event;

                                    // Handle paste
                                    if (theEvent.type === 'paste') {
                                        key = event.clipboardData.getData('text/plain');
                                    } else {
                                    // Handle key press
                                        var key = theEvent.keyCode || theEvent.which;
                                        key = String.fromCharCode(key);
                                    }
                                    var regex = /[0-9]{10}/;
                                    if( !regex.test(key) ) {
                                        theEvent.returnValue = false;
                                        if(theEvent.preventDefault) theEvent.preventDefault();
                                    }
                                    }
                            </script>
                        </tr>
        
                        <tr height="60px">
                            <td>
                                <h6> NIC No</h6>
                            </td>
                            <td>
                                <input type="text" name="NIC" placeholder="Enter Your NIC Number" pattern="[0-9]{8,13}[A-Z]?" required>
                            </td>
                            
                        </tr>
        
                        <tr height="60px">
                            <td>
                               <h6> Gender</h6>
                            </td>
                            <td>
                                <select name="Gender" id="Gender">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                  </select>
                            </td>
                        </tr>
        
                        <tr height="60px">
                            <td>
                                <h6>Driver's License Number</h6>
                            </td>
                            <td>
                                <input type="text" name="License_no" placeholder="Enter Your Driver's License Number" pattern="\w{8}" required>
                            </td>
                        </tr>	
                
                        
                        <tr height="60px">
                            <td>
                                <h6>Password</h6>
                            </td>
                            <td>
                                <input type="password" name="password" placeholder="Enter Your Password" pattern="{6,20}" required id="password">
                            </td>
                        </tr>
                        <tr height="60px">
                            <td>
                                <h6>Confirm password</h6> 
                            </td>
                            <td>
                                <input type="password" name="cpass" placeholder="Re-Enter Your Password" required oninput="check(this)">
                                
                                <script language='javascript' type='text/javascript'>
                                    function check(input) {
                                        if (input.value == document.getElementById('password').value) {
                                            input.setCustomValidity('');
                                        } 
                                        else {
                                            input.setCustomValidity('Password Must be Matching.');
                                            
                                        }
                                    }
                                </script>
                            </td>
                        </tr>
               
                        <tr height="60px">
                            <td colspan=2 align="center">
                                <div class="main-button scroll-to-section">
                                <input type="Submit" value="Sign up">
                                <!--  -->
                                </div>
                
                            </td>
        
                        </tr>
                    </table>
                    <a href="DLogin.php">Already have an account!</a>
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