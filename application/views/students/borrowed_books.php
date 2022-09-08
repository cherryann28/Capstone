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
    <link rel="stylesheet" href="<?=base_url('assets/css/students/borrowe.css')?>">
    <title>Borrowed Books</title>
</head>
<body>
    <div class="borrowed_container">
        <div class="search">
            <h3>Welcome, <?= $this->session->userdata('first_name');?> |<a href="<?= base_url('users/logout');?>"> Logout</a></h3>
            <form action="">
                <input type="text" placeholder="Search Book's title">
            </form>
            <div class="dropdown">
                <button class="dropbtn">Borrowed Books</button>
                <div class="dropdown-content">
                    <a href="<?= base_url('messages') ?>">Messages</a>
                    <a href="<?= base_url('borrowed_books') ?>">Borrowed Books</a>
                    <a href="<?= base_url('students') ?>">Books</a>
                    <a href="<?= base_url('process_previously_borrowed_books') ?>"> Previously Borrowed Books</a>
                </div>
            </div>
        </div>
        <p><?= $this->session->flashdata('sent')?></p>
        <div class="borrowed_books">
            <table>
                <thead>
                    <tr>
                        <th>Accesion</th>
                        <th>Title</th>
                        <th>Issued Date</th>
                        <th>Due Date</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
<?php                
                        foreach($borrows as $borrow){
?>
                        <tr>
                            <td><?= $borrow['accesion'] ?></td>
                            <td><?= $borrow['title'] ?></td>
                            <td><?= $borrow['date_of_issue'] ?></td>
                            <td><?= $borrow['due_date'] ?></td>
                            <td>
<?php

                            if($borrow['renewals_left']) {
 ?>
                                <!-- echo "<a id=\"accept\" href=\"students/process_renew_book/".$borrow['book_id']."\">Renew</a>"
                                 -->
                                 <a id="accept" href="<?= base_url('students/process_renew_book')?>/<?= $borrow['book_id'] ?>">Renew</a> 
<?php                       
                            } 
?>
                            </td>
                            <td>
                                <a id="" href="<?= base_url('students/process_return_book')?>/<?= $borrow['book_id'] ?>">Return</a>
                            </td>
                        </tr>
<?php               }   ?>     
                 
                </tbody>
            </table>    
		</div>
    </div>
</body>
</html>