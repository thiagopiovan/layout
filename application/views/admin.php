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
            echo "Olá <b id='welcome'><i>" . $username . "</i> !</b>";
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

    <hr>

    <div id="add-record">
        <p><a href="<?php echo site_url('login'); ?>">Home</a> | <a href="<?php echo site_url('login/add_records'); ?>">Add Records</a></p>
    </div>

    <hr>

    <div id="records"> 
        <table border='1' cellpadding='4' style="width: 100%;">
            <tr>
                <th>ID</th>
                <th>Text</th>
                <th>Action</th>
            </tr>
            <?php foreach ($records as $data): ?>
                <tr>
                    <td><?php echo $data['id']; ?></td>
                    <td><?php echo $data['text']; ?></td>
                    <td>
                        <a href="<?php echo site_url('login/view/'.$data['id']); ?>">View</a> | 
                        <a href="<?php echo site_url('login/edit/'.$data['id']); ?>">Edit</a> | 
                        <a href="<?php echo site_url('login/delete/'.$data['id']); ?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>