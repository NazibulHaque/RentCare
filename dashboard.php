<?php 
	session_start();
	echo '<h1>Welcome '.$_SESSION['users_first_name'].' '.$_SESSION['users_last_name'].'</h1>';
?>
<p><a href="logout.php">Log Out</a></p>