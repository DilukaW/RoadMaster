<?php
     session_start();

     include("connection.php");
     include("functions.php");
     //check_login($con);
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

    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
    </script>

    </head>
    
    <body>
    
    <!-- ***** Preloader Start (shows the loading page for 2secs)***** -->
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
                        <a href="Home.php" class="logo">ROAD<em> MASTER</em></a>
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
                                    <li class='scroll-to-section'><a href='AnalyticsMain.php' class='active' >Analytics</a></li>
                                    <li class='scroll-to-section'><a href='profileuser.php' >Profile</a></li>
                                    <li class='main-button'><a href='logout.php'>Log Out</a></li>
                                    ";
                                }
                                else if(isset($_SESSION['In_Id'])){echo"
                                    <li class='scroll-to-section'><a href='Accidents.php'  >Accidents</a></li>
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

    <section class="section" id="trainers">
    
    <div class="container">
        <br><br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="col-lg-8 offset-lg-2">
            
                <?php
                $sqry="SELECT * FROM report ";
                
                    $bw = 0;
                    $sp = 0;
                    $dd = 0;
                    $dis = 0;
                    $other = 0;
                    
                if(!($squ= mysqli_query($con,$sqry)))
                    {
                        echo"Data retrival failed";
                    }
                while( $row = mysqli_fetch_assoc($squ) )
                    {
                        $cause = $row['Cause'];
                        
                        switch ($cause){
                            case "Bad Weather":
                                $bw++ ;
                                break;
                            case "Speeding":
                                $sp++ ;
                                break;
                            case "Drunk-Driving":
                                $dd++ ;
                                break;
                            case "Distractions":
                                $dis++ ;
                                break;
                            case "Other":
                                $other++ ;
                                break;

                        }
                            
                    }
                
                
                  echo"                  
                                      
            <canvas id='myChart' style='width:120%;max-width:1000px'></canvas>
            <script>
                var xValues = ['Bad Weather', 'Speeding', 'Drunk-Driving', 'Distractions', 'Other'];
                var yValues = [$bw, $sp, $dd, $dis, $other];
                var barColors = [
                '#b91d47',
                '#00aba9',
                '#2b5797',
                '#e8c3b9',
                '#1e7145'
                ];

                new Chart('myChart', {
                type: 'pie',
                data: {
                    labels: xValues,
                    datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                    }]
                },
                options: {
                    title: {
                    display: true,
                    text: 'Causes for the Accidents To Take Place'
                    }
                }
                });
            </script>";
            ?>
        </div>  
    </div>
</section>
<br>
<br>
<br><br>
        <br>
        <br>
        <br><br>
    
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