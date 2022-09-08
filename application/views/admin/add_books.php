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
    <link rel="stylesheet" href="<?=base_url('assets/css/admin/add_book.css')?>">
    <title>Add Book</title>
</head>
<body>
    <div class="add_book_container">
        <div class="search">
            <h3>Welcome, <?= $this->session->userdata('first_name');?> | <a href="<?= base_url('users/logout');?>">Logout</a></h3>
            <div class="dropdown">
                <button class="dropbtn">Add Books</button>
                <div class="dropdown-content">
                    <a href="<?= base_url('messenger');?>">Messsenger</a>
                    <a href="<?= base_url('add_book');?>">Add Books</a>
                    <a href="<?= base_url('book_list');?>">Book List</a>
                    <a href="<?= base_url('issue_request');?>">Issue Requests</a>
                    <a href="<?= base_url('return_request');?>">Return Request</a>
                    <a href="<?= base_url('renew_request');?>">Renew Request</a>
                    <a href="<?= base_url('student_list');?>">Students List</a>
                </div>
            </div>
        </div>
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
        <div class="add_book">
            <h3>Add Book</h3>
            <form action="<?=base_url('admins/process_add_book');?>" method="post">
            <div class="add">
                    <p>Accesion</p>
                    <input type="text" name="accesion">
                </div>
                <div class="add">
                    <p>Title</p>
                    <input type="text" name="title">
                </div>
                <div class="add">
                    <p>Publisher</p>
                    <input type="text" name="publisher">
                </div>
                <div class="add">
                    <p>Year</p>
                    <input type="text" name="year">
                </div>
                <div class="add">
                    <p>Availability</p>
                    <input type="text" name="availability">
                </div>
                <input type="submit" value="Add">
            </form>
        </div>
        
    </div>
</body>
</html>