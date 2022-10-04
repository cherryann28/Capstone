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
    <link rel="stylesheet" href="<?=base_url('assets/css/admin/current.css')?>">
    <title>Admin Currently Issued Books</title>
</head>
<body>
    <div class="currently_issued_books_container">
        <div class="search">
            <h3>Welcome, <?= $this->session->userdata('name');?> | <a href="<?= base_url('users/logout');?>"> Logout</a></h3>
            <form action="" method="post">
                <input type="text" placeholder="Enter Student ID/Book Name/Accesion" name="search">
            </form>
            <div class="dropdown">
                <button class="dropbtn">Currently Issued Books</button>
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
                        <th>Student ID</th>
                        <th>Accesion</th>
                        <th>Book Name</th>
                        <th>Issue Date</th>
                        <th>Due Date</th>
                        <th>Dues</th>
                    </tr>
                </thead>
                <tbody>
<?php
                foreach($currently_issued_books as $row){
?>
                    <tr>
                        <td><?= $row['school_id'] ?></td>
                        <td><?= $row['accesion'] ?></td>
                        <td><?= $row['title'] ?></td>
                        <td><?= $row['date_of_issue'] ?></td>
                        <td><?= $row['due_date'] ?></td>
                        <td>
<?php                       if( $row['dues'] > 0)
                                echo "<font color='red'>".$row['dues']."</font>";
                            else
                                echo "<font color='green'>0</font>";
?>           
                    </tr>
<?php           }   ?>
                </tbody>
            </table>    
		</div>
    </div>
</body>
</html>