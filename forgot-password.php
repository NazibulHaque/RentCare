
<?php
session_start();
//require_once('EMAIL.php');
error_reporting(0);
include('includes/dbconnection.php');
include('phpmailer/index.php');

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
  	//echo "alert('')";
  	
    //$contactno=$_POST['mobilenumber'];
    $email=$_POST['email'];

        $query=mysqli_query($con,"select ID from tbluser where  Email='$email' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['onetimeuse']= generateRandomString();

    //  $_SESSION['email']=$email;
    // header('location:reset-password.php');
    //	 echo "<script>alert('" . $email . "')</script>";

//if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //$name = $_POST['name'];
   // $email=$_POST['email'];
    //$pass=$_POST['password'];
  //  $ret = mysqli_query($con, "select name from Demo where Name='$name' || Email='$email'");
   // $result = mysqli_fetch_array($ret);
  //  if ($result > 0) {
   //     $msg = "This name already registered";
   // } else {
     //   $query = mysqli_query($con, "insert into Demo(Name,Email,Password) value('$name','$email','$pass')");
      //  $last_row = mysqli_insert_id($con);
      //  $refCode = generateRandomString();

      //  $query1 = mysqli_query($con, "insert into tblverify(Did,Code,Status) value('$last_row','$refCode','1')");
        //sentMail($email,$refCode);

        $verifynum=$_SESSION['onetimeuse'];
        $veriURl = "http://localhost/gitpgas/reset-password.php";

        //sentMail($email,"<a href=".$url.">verify</a>");        
        $p1="?e=";
		$p2="&v=";

       sentMail($email,$verifynum ,$veriURl,$p1,$p2);
       
       header("location:signin.php");

        /* if ($query) {
          $msg="You have successfully registered";

          }
          else
          {
          $msg="Something Went Wrong. Please try again";
          } */
       // echo "<script>alert('" . $last_row . "')</script>";
       // echo "<script>alert('" . $refCode . "')</script>";
    //}
//}





     	
                         

    }
    else{
      $msg="This Email is not registered. Please try again.";
    }
  }
  ?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	
	<title>RentCare Guest Accomodation System|| User Forget Password</title>

	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
	<!--
			CSS
			============================================= -->
	<link rel="stylesheet" href="css/linearicons.css">=
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/ion.rangeSlider.css" />
	<link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/main.css">
	
</head>

<body>

	<!-- Start Header Area -->
<?php include_once('includes/header.php');?>
	<!-- End Header Area -->

	<!-- start banner Area -->
	<section class="banner-area relative" id="home">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row d-flex text-center align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<p class="text-white link-nav"><a href="index.php">Home </a>
						<span class="lnr lnr-arrow-right"></span> <a href="forgot-password.php">
							Forgot Password</a></p>
					<h1 class="text-white">
						Forgot Password
					</h1>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- Start contact-page Area -->
	<section class="contact-page-area section-gap">
		<div class="container">
			<p style="text-align: center;color: red;font-size: 30px"><strong>Forgot Password</strong></p>
			<div class="row mt-80">
				<p style="font-size:16px; color:red" align="center"> <?php if($msg){echo $msg;}  ?> </p>
				<div class="col-lg-12">
					
					<form class="row contact_form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="login" novalidate="novalidate" >
						<div class="col-md-12">

						
							<div class="form-group">
								<input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" required="true">
							</div>
<!--							<div class="form-group">
								<input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Enter Mobile Number" maxlength="10" pattern="[0-9]{10}" required="true">
							</div>
-->
							
							
						</div>
						
						<div class="col-md-6 text-left">

							<button type="submit" value="login" name="submit" class="btn primary-btn">Verify </button>
						</div>
					</form>
					
					
				</div>
			</div>
		</div>
	</section>
	<!-- End contact-page Area -->

	<!-- start footer Area -->
	<?php include_once('includes/footer.php');?>
	<!-- End footer Area -->

	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/ion.rangeSlider.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>