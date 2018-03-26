<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<?php
	if (isset($this->session->userdata['logged_in'])) {
		header("location: http://localhost:8888/layout/index.php/login/login_process");
	}
?>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
</head>
<body>

<?php
	if (isset($logout_message)) {
		echo "<div class='message'>";
		echo $logout_message;
		echo "</div>";
	}
?>
<?php
	if (isset($message_display)) {
		echo "<div class='message'>";
		echo $message_display;
		echo "</div>";
	}
?>
<div id="main">
	<div id="login">
		<h2>Login Form</h2>
		<hr/>
		<?php echo form_open('login/login_process'); ?>
		<?php
			echo "<div class='error_msg'>";

			if (isset($error_message)) {
				echo $error_message;
			}
			
			echo validation_errors();
			echo "</div>";
		?>
		<label>UserName :</label>
		<input type="text" name="username" id="name" placeholder="username"/><br /><br />
		<label>Password :</label>
		<input type="password" name="password" id="password" placeholder="**********"/><br/><br />
		<input type="submit" value=" Login " name="submit"/><br />
		<a href="<?php echo base_url() ?>index.php/login/registration_show">Cadastrar-se</a>
		<?php echo form_close(); ?>
	</div>
</div>

</body>
</html>