<?php 

    session_start();

        include("connection.php");
        include("functions.php");


        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            //something was posted
            $email = $_POST['email'];
            $pass1 = $_POST['password'];
            $password = hash('md5',$pass1);

            if(!empty($email) && !empty($password) )
            {

                //read from database
                $query = "select * from driver where Email = '$email' limit 1";
                $result = mysqli_query($con, $query);

                if($result)
                {
                    if($result && mysqli_num_rows($result) > 0)
                    {

                        $user_data = mysqli_fetch_assoc($result);
                        
                        if($user_data['Password'] == $password)
                        {

                            $_SESSION['D_Id'] = $user_data['Driver_Id'];
                            header("Location: home.php");
                            die;
                        }
                    }
                }
                
                echo "\nwrong username or password!";
            }else
            {
                echo "\nwrong username or password!";
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
    <!-- responsive style -->
    <link href="assets/css/responsive.css" rel="stylesheet" />

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
                                    
                                    <li class='main-button'><a href='LoginType2.php'>Log In</a></li>";
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
  <br>
  <br> 

<div class="layout_padding">
    <section class="layout_padding story_section ">
        <div class="container-fluid">
            <div class="row">
            <!-- <div class=" col-md-6">
                <div>
                <img class="img-fluid" src="images/security.jpg" alt="" />
                </div> -->
            </div>  
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading">
                    <h2 style= "font-size:50px ; font-family:Aachen BT">Log <nbsp><nbsp><em> In</em></h2>
                    <br>
                    <br>
                    <form method = "post">
                        <table border=0>
                          
                            <tr height="100px">
                                <td width="1000px">
                                    <h6 style= "font-family:Aachen BT" >Email:</h6>
                                 </td>
                                 <td width="400px">
                                     <input style= "border:2px solid" type="email" name="email" placeholder="        Enter Your E-mail" required>
                                 </td>
                            </tr>
                            <tr height="60px">
                                <td>
                                    <h6 style= "font-family:Aachen BT">&nbsp      &nbsp    Password:</h6>
                                </td>
                                <td>
                                    <input style= "border:2px solid" type="password" name="password" placeholder="     Enter Your Password" required id="password">
                                </td>
                            </tr>
                            <tr height="150px">
                                <td colspan=2 align="center">
                                    <div class="main-button scroll-to-section">
                                    <input style= " font-family:Aachen BT ; border-color:white" type="Submit" value="Log in">
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <a href="Signin.php" style= "font-size:15px ; font-family:Aachen BT; color:black;">Create an account!</a>
                    </form>
                    <br> 
                    <br> 
                    
                    </div>
                </div>   
            </div>
        </div>
    </section>
</div>

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