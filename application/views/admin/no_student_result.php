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
    <link rel="stylesheet" href="<?=base_url('assets/css/admin/student_lists.css')?>">
    <title>Student List</title>
</head>
<body>
    <div class="student_list_container">
        <div class="search">
            <h3>Welcome, <?= $this->session->userdata('name');?> | <a href="<?= base_url('users/logout');?>"> Logout</a></h3>
            <form action="<?= base_url()?>admins/process_search_student" method="post">
                <input type="text" placeholder="Search Student ID" name="search">
            </form>
            <div class="dropdown">
                <button class="dropbtn">Students List</button>
                <div class="dropdown-content">
                    <a href="<?= base_url('messenger');?>">Messsenger</a>
                    <a href="<?= base_url('add_book');?>">Add Books</a>
                    <a href="<?= base_url('book_list');?>">Book List</a>
                    <a href="<?= base_url('issue_request');?>">Issue Requests</a>
                    <a href="<?= base_url('return_request');?>">Return Request</a>
                    <a href="<?= base_url('renew_request');?>">Renew Request</a>
                    <a href="<?= base_url('student_list');?>">Students List</a>
                    <a href="<?= base_url('currently_issued_books');?>">Currently Issued Books</a>
                </div>
            </div>
        </div>
        <div class="view_all">
                <a href="<?= base_url('student_list') ?>">View all Students List</a>
        </div>
                <div class="errors">
<?php
        if($this->session->flashdata('errors'))
        {
            foreach($this->session->flashdata('errors') as $value)
            { ?>
                <h1><?= $value ?></h1>
<?php       }
        } ?>
                </div> 
            </div>
        </div>    
    </div>
</body>
</html>