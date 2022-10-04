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
        <link rel="stylesheet" href="<?=base_url('assets/css/admin/issue_request.css')?>">
        <title>Requests</title>
    </head>
    <body>
        <div class="request_container">
            <div class="search">
                <h3>Welcome, <?= $this->session->userdata('name');?> | <a href="<?= base_url('users/logout');?>"> Logout</a></h3>
                <div class="dropdown">
                    <button class="dropbtn">Issue Requests</button>
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
                <h2>Issue Requests</h2>
                <table>
                    <thead>
                        <tr>
                        <th>Student ID</th>
                        <th>Accesion</th>
                        <th>Book</th>
                        <th>Availability</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
                        foreach($records as $record) {
?>
                        <tr>
                            <td><?= $record['school_id'] ?></td>
                            <td><?= $record['accesion'] ?></td>
                            <td><?= $record['title'] ?></td>
                            <td><?= $record['availability'] ?></td>
                            <td>
<?php 
                                if($record['user_level'] == 'faculty'){
?>
                                    <a id="accept" href="<?= base_url('admins/process_accept_faculty')?>/<?= $record['id']?>/<?= $record['book_id']?>/<?= $record['school_id']?>">Accept</a>  
<?php                           }
                                else if ($record['user_level'] == 'student') {
?>
                                    <a id="accept" href="<?= base_url('admins/process_accept_student')?>/<?= $record['id']?>/<?= $record['book_id']?>/<?= $record['school_id']?>">Accept</a>  
<?php                           }   ?>
                                    <a id="decline" href="<?= base_url('admins/process_decline')?>/<?= $record['id'] ?>/<?= $record['school_id'] ?>">Decline</a>
                            </td>
                        </tr>
<?php               }       ?>

                    </tbody>
                </table>    
            </div>

        </div>
    </body>
</html>