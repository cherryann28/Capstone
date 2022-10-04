<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url('assets/css/create_accoun.css')?>">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <title>Create Account</title>
    <style>
        #success{
            color: green;
            background-color: #ffff;
            top: 50px;
            right: 210px;
            position: absolute;
            font-weight: bold;
            font-size: 12px;
        }
        #errors{
            color: red;
            position: absolute;
            right: 200px;
            font-size: 14px;
            background-color: #ffff;
            font-weight: bold;
            /* border-radius: 10px; */
            margin-top: 30px;
            z-index: 1;
        }
    </style>
</head>
<body>
    <div class="create_container">
        <div class="header">
            <div id="errors">
<?php
        if($this->session->flashdata('errors'))
        {
            foreach($this->session->flashdata('errors') as $value)
            { ?>
                <p><?= $value ?></p>
<?php       }
        } ?>
            </div>
            <div id="success">
<?php
        if($this->session->flashdata('success'))
        {
            foreach($this->session->flashdata('success') as $value)
            {  ?>
                <p><?= $value ?></p>
<?php       }
        } ?>
            </div>
            <a class="login" href="<?=base_url('users');?>">Login</a>
            <h1>Create Account</h1>
            <div class="create_form"> 
                <form action="<?= base_url('users/process_create_account');?>" method="post">
                    <div class="input-div">
                        <div>
                            <h5>School ID</h5>
                            <input class="input" type="text" name="school_id">
                        </div>
                    </div>
                    <div class="input-div">
                        <div>
                            <h5>Name</h5>
                            <input class="input" type="text" name="name">
                        </div>
                    </div>
                    <div class="input-div">
                        <div>
                            <h5>Phone Number</h5>
                            <input class="input" type="text" name="contact_number">
                        </div>
                    </div>
                    <div class="input-div">
                        <div>
                            <h5>Are you a student or faculty?</h5>
                            <select name="user_level">
                                <option value="">Select</option>
                                <option value="student">Student</option>
                                <option value="faculty">Faculty</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="input-div">
                        <div>
                            <h5>School E-mail</h5>
                            <input class="input" type="text" name="email">
                        </div>
                    </div>
                    <div class="input-div">
                        <div>
                            <h5>Password</h5>
                            <input class="input" type="password" name="password">
                        </div>
                    </div>
                    <input type="submit" class="btn" value="Create Account">
                </form>
            </div>
        </div>
        <div class="about">
            <h2>About</h2>
            <p>Library system is the digital way to borrow, returned and check your favorite book if it's available.</p>
        </div>
    </div>
</body>
</html>
	