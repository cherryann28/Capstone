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
    <link rel="stylesheet" href="<?=base_url('assets/css/admin/book_lists.css')?>">
    <title>Admin Page</title>
</head>
<body>
    <div class="book_details_container">
        <div class="search">
            <h3>Welcome, <?= $this->session->userdata('first_name');?> | <a href="<?= base_url('users/logout');?>"> Logout</a></h3>
            <form action="<?= base_url()?>admins/search" method="post">
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
        <div class="data">
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
                <tbody>
<?php
                foreach($books as $row){
?>
                    <tr>
                        <td><?= $row['accesion'] ?></td>
                        <td><?= $row['title'] ?></td>
                        <td><?= $row['publisher'] ?></td>
                        <td><?= $row['year'] ?></td>
                        <td><?= $row['availability'] ?></td>
                        <td><a id="edit" href="<?= base_url('admins/edit');?>/<?= $row['id']?>">Edit</a></td>
                    </tr>
<?php           }   ?>
                </tbody>
            </table>    
		</div>
    </div>
</body>
</html>