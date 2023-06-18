<?php
session_start();
//require_once('EMAIL.php');
error_reporting(0);
include('includes/dbconnection.php');
include('../phpmailer/index.php');

function generateRandomString($length = 6) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
    //$contactno=$_POST['mobilenumber'];
    $email=$_POST['email'];

        $query=mysqli_query($con,"select ID from tbladmin where  Email='$email' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['onetimeuse']= generateRandomString();

      $verifynum=$_SESSION['onetimeuse'];
        $veriURl = "http://localhost/gitpgas/admin/reset-password.php";
        $p1="?e=";
        $p2="&v=";
        //sentMail($email,"<a href=".$url.">verify</a>");        
       sentMail($email,$verifynum, $veriURl,$p1,$p2);
       echo "<script>alert('Check Your Email For Reset Your Password')</script>";
       header("location:login.php");
 

    }
    else{
      $msg="This Email is not registered. Please try again.";
    }
  }
  ?>
                                       
<!DOCTYPE html>
<head>
<title>Paying Guest Accomodation System | Forgot </title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.css">
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
  <h2>Forgot Password</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="login">
      <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
      <input type="email" class="ggg" name="email" placeholder="Enter Email Address" required="true">
      <!-- <input class="ggg"  type="text" name="contactno" required="" placeholder="Mobile Number">
      -->
      
      
        <div class="clearfix"></div>
        <input type="submit" value="RESET" name="submit">
    </form>
    <p><a href="login.php">Sign In</a></p>
</div>
</div>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
