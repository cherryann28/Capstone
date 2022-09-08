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
    <link rel="stylesheet" href="<?=base_url('assets/css/admin/update.css')?>">
    <title>Add Book</title>
</head>
<body>
    <div class="add_book_container">
        <div class="search">
            <h3>Welcome, <?= $this->session->userdata('first_name');?> | <a href="<?= base_url('users/logout');?>"> Logout</a></h3>
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
        <div class="update_book">
            <h3>Update Details</h3>
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
            <form action="<?= base_url('admins/process_update');?>/<?= $book['id'] ?>" method="post">
            <input type="hidden" name="id" value="<?= $book['id'] ?>">
            <div class="update">
                    <p>Accesion</p>
                    <input type="text" name="accesion" value="<?= $book['accesion'] ?>">
                </div>
                <div class="update">
                    <p>Title</p>
                    <input type="text" name="title" value="<?= $book['title'] ?>">
                </div>
                <div class="update">
                    <p>Publisher</p>
                    <input type="text" name="publisher" value="<?= $book['publisher'] ?>">
                </div>
                <div class="update">
                    <p>Year</p>
                    <input type="text" name="year" value="<?= $book['year'] ?>">
                </div>
                <div class="update">
                    <p>Availability</p>
                    <input type="text" name="availability" value="<?= $book['availability'] ?>">
                </div>
                <input type="submit" value="Update">
            </form>
        </div>      
    </div>
</body>
</html>