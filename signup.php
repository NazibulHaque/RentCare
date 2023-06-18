<?php
	session_start();
	$conn = new mysqli('localhost', 'root', '', 'sms_db');

	if(isset($_POST['submit'])){
		$users_first_name 		= $_POST['users_first_name'];
		$users_last_name 		= $_POST['users_last_name'];
		$users_email 			= $_POST['users_email'];
		$users_password 		= $_POST['users_password'];
		$passwordagain  = $_POST['passwordagain'];
		$password 	= $users_password;
		
		$emptymsg1 = $emptymsg2 = $emptymsg3 = $emptymsg4 = $emptymsg5 = $pasmatchmsg = '';
		
		
		if(empty($users_first_name)){
			$emptymsg1 = 'Write Firstname';
		}
		if(empty($users_last_name)){
			$emptymsg2 = 'Write Lastname';
		}
		if(empty($users_email)){
			$emptymsg3 = 'Write email';
		}
		if(empty($users_password)){
			$emptymsg4 = 'Write password';
		}
		if(empty($passwordagain)){
			$emptymsg5 = 'Write password Again';
		}		
		
		if(!empty($users_first_name) && !empty($users_last_name) && !empty($users_email) && !empty($users_password) && !empty($passwordagain)){
			if($users_password !== $passwordagain){
				$pasmatchmsg = 'Password does not match!';
			}else{
				$pasmatchmsg='';
				$sql = "INSERT INTO users(user_first_name, user_last_name, user_email, user_password) 
						VALUES('$users_first_name', '$users_last_name', '$users_email', '$md5password')";
			
				if($conn->query($sql) == TRUE){
					header('location:login.php');
					$_SESSION['signupmsg']='Sign Up Complete. Please Log in now.';
				}else{
					echo 'data not inserted';
				}
			}
		}else{
			$emptymsg = 'Fill up all fields';
		}
		
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
	</head>
	
	<body>
		<div class="container">
			<div class="container" style="margin-top:50px">
				<h3 class="text-center">Registration System</h3>
			</div>
			<div class="container" style="margin-top:50px">
				<div class="row">
					<div class="col-sm-4">
						
					</div>
					<div class="col-sm-4">
						<div class="container bg-light p-4">
							<form action="" method="POST">
							<div class="mt-2 pb-2">
								<label for="firstname">First Name:</label>
								<input type="name" name="users_first_name" class="form-control" placeholder="Your First Name" value="<?php if(isset($_POST['submit'])){echo $users_first_name; } ?>">
								<span class="text-danger"><?php if(isset($_POST['submit'])){ echo $emptymsg1; }?></span>
							</div>
							<div class="mt-2 pb-2">
								<label for="users_last_name">Last Name:</label>
								<input type="name" name="users_last_name" class="form-control" placeholder="Your Last Name" value="<?php if(isset($_POST['submit'])){echo $lastname; } ?>">
								<span class="text-danger"><?php if(isset($_POST['submit'])){ echo $emptymsg2; }?></span>
							</div>
							<div class="mt-2 pb-2">
								<label for="email">Email:</label>
								<input type="email" name="users_email" class="form-control" placeholder="Enter your email" value="<?php if(isset($_POST['submit'])){echo $email; } ?>">
								<span class="text-danger"><?php if(isset($_POST['submit'])){ echo $emptymsg3; }?></span>
							</div>
							<div class="mt-1 pb-2">
								<label for="password">Password:</label>
								<input type="password" name="users_password" class="form-control" placeholder="Enter New password" >
								<span class="text-danger"><?php if(isset($_POST['submit'])){ echo $emptymsg4; }?></span>
							</div>
							<div class="mt-1 pb-2">
								<label for="password">Password Again:</label>
								<input type="password" name="passwordagain" class="form-control" placeholder="Enter password Again" >
								<span class="text-danger"><?php if(isset($_POST['submit'])){ echo $emptymsg5.''.$pasmatchmsg; }?></span>
							</div>
							<div class="mt-1 pb-2">
								<button name="submit" class="btn btn-success">Sign In</button>
							</div>
							<div class="mt-1 pb-2">
								Alrady have an account? <a href="login.php" class="text-decoration-none">Login</a>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						
					</div>
				</div>
			</div>
		</div>
	</body>
</html>