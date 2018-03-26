<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<?php
    if (isset($this->session->userdata['logged_in'])) {
        $username = ($this->session->userdata['logged_in']['username']);
        $email = ($this->session->userdata['logged_in']['email']);
    } else {
        header("location: login");
    }
?>
<head>
	<meta charset="utf-8">
	<title>Admin</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
</head>
<body>

    <div id="profile">
        <?php
            echo "Hello <b id='welcome'><i>" . $username . "</i> !</b>";
            echo "<br/>";
            echo "<br/>";
            echo "Bem-vindo!";
            echo "<br/>";
            echo "<br/>";
            echo "Seu nome de usuário é " . $username;
            echo "<br/>";
            echo "Seu email é " . $email;
            echo "<br/>";
        ?>
        <b id="logout"><a href="logout">Desconectar-se</a></b>
    </div>

    <br/>

</body>
</html>