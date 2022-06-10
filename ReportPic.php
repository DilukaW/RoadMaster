<?php 
     session_start();

      include("connection.php");
      include("functions.php");

      
      if($_SERVER['REQUEST_METHOD'] == "POST")
      {
          //declaring variables for the user inputs

          
          $did = $_SESSION['D_Id'];
          $doa = $_SESSION['doa'];
          $vreg = $_POST['VReg'];
        

          



                          if(!empty($vreg)  )
                          {

                              $qry2 = "SELECT * FROM report where Driver_Id = '$did' AND Date_of_Acc = '$doa' ";
                              $result2 = mysqli_query($con,$qry2);
                              

                              $qry3 = "SELECT * FROM vehicle where Driver_Id = '$did' AND Registration_No = '$vreg' ";
                              $result3 = mysqli_query($con,$qry3);

                              if($result2 && mysqli_num_rows($result2) > 0)
                                {

                                    $Report_data = mysqli_fetch_assoc($result2);
                                    $repID = $Report_data['Rep_Id'];
                                }
                                if($result3 && mysqli_num_rows($result3) > 0)
                                {

                                    $Report_data2 = mysqli_fetch_assoc($result3);
                                    $vID = $Report_data2['Vehicle_Id'];
                                }

                                $query3 = "insert into veh_rep (Vehicle_Id,Rep_Id) values ('$vID','$repID' )";
                                
                                mysqli_query($con, $query3);

                              
                                
                                
                              
                            
                            }
                          else
                          {
                              echo "Please enter some valid information!";
                              
                              
                          }

                        

                          $errors = array();
                          $uploadedFiles = array();
                          $extension = array("jpeg","jpg","png","gif");
                          $bytes = 1024;
                          $KB = 1024;
                          $totalBytes = $bytes * $KB;
                          mkdir("upload/$repID");
                          $UploadFolder = "upload/$repID";
                           
                          $counter = 0;
                           
                          foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name){
                              $temp = $_FILES["files"]["tmp_name"][$key];
                              $name = $_FILES["files"]["name"][$key];
                               
                              if(empty($temp))
                              {
                                  break;
                              }
                               
                              $counter++;
                              $UploadOk = true;
                               
                              if($_FILES["files"]["size"][$key] > $totalBytes)
                              {
                                  $UploadOk = false;
                                  array_push($errors, $name." file size is larger than the 1 MB.");
                              }
                               
                              $ext = pathinfo($name, PATHINFO_EXTENSION);
                              if(in_array($ext, $extension) == false){
                                  $UploadOk = false;
                                  array_push($errors, $name." is invalid file type.");
                              }
                               
                              if(file_exists($UploadFolder."/".$name) == true){
                                  $UploadOk = false;
                                  array_push($errors, $name." file is already exist.");
                              }
                               
                              if($UploadOk == true){
                                    move_uploaded_file($temp,$UploadFolder."/".$name);
                                    $insert = "INSERT into rep_pic(rep_id,file_name) values($repID,'$name')";
                                    if(mysqli_query($con, $insert)){
                                        ;
                                    }
                                    else{
                                      echo 'Error: '.mysqli_error($con);
                                    }
                                  
                                  array_push($uploadedFiles, $name);
                              }
                          }
                           
                          if($counter>0){
                              if(count($errors)>0)
                              {
                                  echo "<b>Errors:</b>";
                                  echo "<br/><ul>";
                                  foreach($errors as $error)
                                  {
                                      echo "<li>".$error."</li>";
                                  }
                                  echo "</ul><br/>";
                              }                                                        
                          }
                          else{
                              echo "Please, Select file(s) to upload.";
                          }
                          header("Location: Home.php");
                          die;
                        
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

  <!-- ***** Call to Action Start ***** -->
  <section class="section" id="features">
    <div class="container" >
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading">
                    <h2 style= "font-size:50px ; font-family:Aachen BT">Create <nbsp><nbsp><em> Report</em></h2>
                    <br>
                    <br>
                    <p>We are sorry for your unfortunate incident. Try to fill out every necessary detail.</p>



                    <form method = "post" enctype="multipart/form-data">
                    <table border=0>
                      
                        <tr height="60px">
                            <td width="400px" >
                               <h6> Vehicle Reg. No.</h6>
                            </td>
                            <td width="600px">
                            
                                <input type="text" name="VReg" placeholder="Enter Vehicle Reg. No" required>
                            </td>
                            
                        </tr>
                        <tr height="60px">
                        <td  width="400px">
                               <h6> Upload Images</h6>
                            </td>
                        <td width="600px">
                                <input type="file" name="files[]" id="file"  multiple="multiple" style="margin-left: 100px;">
                            </td>
                        </tr>
                        
                        <br>

                        <tr height="30px"><td>

                        </td></tr>
                        
                        
               
                        <tr height="60px">
                            <td colspan=2 align="center">
                                <div class="main-button scroll-to-section">
                                <input style= " font-family:Aachen BT ; border-color:white; " type="Submit" value="Report">
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