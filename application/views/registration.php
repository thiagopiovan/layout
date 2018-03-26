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
	<title>Registration</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
</head>
<body>

    <div id="main">
        <div id="login">
            <h2>Registration </h2>
            <hr/>
            <?php
                echo "<div class='error_msg'>";
                echo validation_errors();
                echo "</div>";
                echo form_open('login/new_registration');
                echo form_label('Crie um usuário : ');
                echo"<br/>";
                echo form_input('username');
                echo "<div class='error_msg'>";

                if (isset($message_display)) {
                    echo $message_display;
                }

                echo "</div>";
                echo"<br/>";
                echo form_label('Email : ');
                echo"<br/>";

                $data = array(
                    'type' => 'email',
                    'name' => 'email'
                );

                echo form_input($data);
                echo"<br/>";
                echo"<br/>";
                echo form_label('Password : ');
                echo"<br/>";
                echo form_password('password');
                echo"<br/>";
                echo"<br/>";
                echo form_submit('submit', 'Cadastrar-se');
                echo form_close();
            ?>
            <a href="<?php echo base_url() ?> ">Entrar</a>
        </div>
    </div>

</body>
</html>