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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="<?=base_url('assets/css/admin/search_no_result.css')?>">
    <title>Search Book</title>
</head>
<body>
    <div id="books">
        <div class="search_book_container">
            <div class="search">
                <h3>Welcome, <?= $this->session->userdata('first_name');?> | <a href="<?= base_url('users/logout');?>">Logout</a></h3>
                <form class="form" action="<?= base_url()?>admins/search" method="post">
                    <input type="text" placeholder="Search Book's title" name="search">
                </form>
                <div class="dropdown">
                    <button class="dropbtn">Book List</button>
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
            <div class="view_all">
                <a href="<?= base_url('admins') ?>">View all books</a>
            </div>
            <!-- <div class="data">
                <table>
                    <thead>
                        <tr>
                            <th>Accesion</th>
                            <th>Title</th>
                            <th>Publisher</th>
                            <th>Year</th>
                            <th>Availability</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>    -->
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