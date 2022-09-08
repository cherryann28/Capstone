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
    <!-- <link rel="stylesheet" href="assets/css/font-awesome/css/all.css"> -->
    <link rel="stylesheet" href="assets/css/login.css">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <title>Login</title>
    <style>
        #invalid{
            position: absolute;
            right: 80px;
            top: 25px;
            color: red;
        }
        #errors{
            color: red;
            position: absolute;
            top: 10px;
        }
    </style>
</head>
<body>
    <div class="login_container">
        <div class="header">
            <a class="create_account" href="<?=base_url('users/create');?>">Create Account</a>
            <div class="logo">
                <img src="assets/img/logo.png" alt="sjc-logo">
                <h1>PHINMA SAINT JUDE COLLEGE LIBRARY SYSTEM</h1>
            </div>
           
            <div class="login_form">
                <div id="errors">
<?php
    if($this->session->flashdata('errors'))
    {
        foreach($this->session->flashdata('errors') as $value)
        { ?>
            <p><?= $value ?></p>
<?php   }
    } ?>
                </div>
                <h2>Login</h2>
                <p id="invalid"><?= $this->session->flashdata('invalid')?></p>
                <form action="<?=base_url('users/login_process');?>" method="post">
                <div class="input-div one">
					<div>
						<h5>Email</h5>
						<input class="input" type="text" name="email">
					</div>
				</div>
				<div class="input-div two">
					<div>
						<h5>Password</h5>
						<input class="input" type="password" name="password">
					</div>
				</div>
				<input type="submit" class="btn" value="Login">
                </form>
            </div>
        </div>
        <div class="total">
            <div class="books">
                <h3><?= $books_total['availability'] ?></h3>               
                <p>Books</p>
            </div>
            <div class="borrowed">
                <h3><?= $borrowed['id'] ?></h3>
                <p>Borrowed</p>
            </div>
            <div class="returned">
                <h3><h3><?= $returned['id'] ?></h3></h3>
                <p>Returned</p>
            </div>
        </div>
    </div>
</body>
</html>
	