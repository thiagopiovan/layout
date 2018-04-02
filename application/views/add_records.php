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
	<title>Add records</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
</head>
<body>

    <div id="add-record">
        <p><a href="<?php echo site_url('login'); ?>">Home</a> | <a href="<?php echo site_url('login/add_records'); ?>">Add Records</a></p>
    </div>
 
<?php echo validation_errors(); ?>
 
<?php echo form_open('login/add_records'); ?>    
    <table>
        <tr>
            <td><label for="text">Text</label></td>
            <td><textarea name="text" rows="10" cols="40"></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Create a record" /></td>
        </tr>
    </table>    
</form>

</body>
</html>