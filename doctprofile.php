<?php 
session_start();
$con=mysqli_connect('localhost','root','','healthcare');
$doct_id=$_SESSION['doct_id'];
$query=$con->prepare("SELECT * FROM `doctors` WHERE `userdoc_id`='$doct_id'");
$query->execute();
 $run= $query->get_result();
 $res=$run->fetch_assoc();
 $do_id=$res['id'];
 $special=$res['specialization'];
 $query1=$con->prepare("SELECT * FROM `appointment` WHERE `doc_id`='$do_id'");
$query1->execute();
 $run1= $query1->get_result();
 $row1=$run1->num_rows;
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <link rel="icon" type="image/png" sizes="16x16" href="images/icon.jpg">
     <title>Health - Medical Website Template</title>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="Tooplate">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/animate.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/tooplate-style.css">

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

    <!-- PRE LOADER -->
    <section class="preloader">
         <div class="spinner">

              <span class="spinner-rotate"></span>
              
         </div>
    </section>


    


    <!-- MENU -->
    <section class="navbar navbar-default navbar-static-top" role="navigation">
         <div class="container">

              <div class="navbar-header">
                   <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon icon-bar"></span>
                        <span class="icon icon-bar"></span>
                        <span class="icon icon-bar"></span>
                   </button>

                   <!-- lOGO TEXT HERE -->
                   <a href="index.html" class="navbar-brand"><i class="fa fa-h-square"></i>ealth Center</a>
              </div>

              <!-- MENU LINKS -->
              <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="#" class="smoothScroll">Consultation</a></li>
                         <li><a href="#" class="smoothScroll" data-target="#mymodel" data-toggle="modal">Login/Sign Up</a></li>
                         <li><a href="#about" class="smoothScroll">About Us</a></li>
                         
                    </ul>
               </div>

         </div>
    </section>

    <section data-stellar-background-ratio="3">
<div class="container">
  <div class="row">
  <br>
  <br>
  <div class="col-md-4 col-sm-4">        
  <div id="user_image" class="text-align-center"> 
  </div>
  </div>
  <div class="col-md-8 col-sm-8">
  <h3 style="color: #a5c422;">Appointments</h3>
  <br>
  <div class="table-responsive" style="background-color: #f0f0f0;">
  <table class="table table-borderless">
  <thead>
    <tr>
    <th scope="col">Date</th>
    <th scope="col">Time</th>
    <th scope="col">Name</th>
    <th scope="col">Age</th>
    <th scope="col">Phone</th>
    <th scope="col">Message</th>
    </tr>
  </thead>
  <tbody>
  <?php
  while($res1=$run1->fetch_assoc())
  {
  ?>
  <tr>
      <td scope="row"><?php echo $res1['date']; ?></td>
      <td><?php echo $res1['time']; ?></td>
      <td><?php echo $res1['name']; ?></td>
      <td><?php echo $res1['age']; ?></td>
      <td><?php echo $res1['phn_no']; ?></td>
      <td><?php echo $res1['message']; ?></td>
    </tr>
    <?php
  }
    ?>
    </tbody>
</table>
</div>





<h3 style="color: #a5c422;">Consultations</h3>
  <br>
<div class="table-responsive" style="background-color: #f0f0f0;">
  <table class="table table-borderless">
  <thead>
    <tr>
    <th scope="col">Name</th>
    <th scope="col">Age</th>
    <th scope="col">Gender</th>
    <th scope="col">Current Condition</th>
    <th scope="col">Allergy</th>
    <th scope="col">Title</th>
    <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  <?php
  $query1=$con->prepare("SELECT * FROM `consultation` WHERE `problem`='$special'");
  $query1->execute();
   $run1= $query1->get_result();
   $row1=$run1->num_rows;
  while($res1=$run1->fetch_assoc())
  {
  ?>
  <tr>
      <td scope="row"><?php echo $res1['guest_name']; ?></td>
      <td><?php echo $res1['guest_age']; ?></td>
      <td><?php echo $res1['guest_gender']; ?></td>
      <td><?php echo $res1['guest_currentcon']; ?></td>
      <td><?php echo $res1['guest_allergy']; ?></td>
      <td><?php echo $res1['title']; ?></td>
      <td><a href="giveconsult.php?user=<?php echo $res1['id']; ?>" type="submit" style="background-color: #6b5b95;" class="form-control" >Give Consultation</a></td>
    </tr>
    <?php
  }
    ?>
    </tbody>
</table>
</div>


  </div>
 
  </div>
  </div>
  </section>



    <footer data-stellar-background-ratio="5">
        <div class="container">
             <div class="row">
               


               <div class="col-md-12 col-sm-12 border-top">
                    <div class="col-md-4 col-sm-6">
                        
                    </div>
                    <div class="col-md-6 col-sm-6">
                         
                    </div>
                    <div class="col-md-2 col-sm-2 text-align-center">
                         <div class="angle-up-btn"> 
                             <a href="#top" class="smoothScroll wow fadeInUp" data-wow-delay="1.2s"><i class="fa fa-angle-up"></i></a>
                         </div>
                    </div>   
               </div>
                  
             </div>
        </div>
   </footer>

     <!-- SCRIPTS -->
   <script src="js/jquery.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/jquery.sticky.js"></script>
   <script src="js/jquery.stellar.min.js"></script>
   <script src="js/wow.min.js"></script>
   <script src="js/smoothscroll.js"></script>
   <script src="js/owl.carousel.min.js"></script>
   <script src="js/custom.js"></script>

</body>
</html>
