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
    <link rel="stylesheet" href="<?=base_url('assets/css/admin/accept_renewal.css')?>">
    <title>Accept Renewals</title>
</head>
<body>
    <div class="renew_request_container">
        <div class="search">
            <h3>Welcome, <?= $this->session->userdata('first_name');?> | <a href="<?= base_url('users/logout');?>"> Logout</a></h3>
            <div class="dropdown">
                <button class="dropbtn">Renew Requests</button>
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
        <div id="renew_request">
                <img src="<?=base_url('assets/img/sent.png')?>" alt="request-sent-image">    
                <p><?= $this->session->flashdata('renew')?></p>
                <a href="<?= base_url('renew_request')?>">Okay</a>
        </div>
        <div class="data">
            <h2>Renew Requests</h2>
            <table>
                <thead>
                    <tr>
                       <th>Student ID</th>
                       <th>Accesion</th>
                       <th>Book Name</th>
                       <th>Renewals Left</th>
                       <th></th>
                    </tr>
                </thead>
                <tbody>
<?php
                    foreach($renews as $renew) {
?>
                    <tr>
                        <td><?= $renew['school_id'] ?></td>
                        <td><?= $renew['accesion'] ?></td>
                        <td><?= $renew['title'] ?></td>
                        <td><?= $renew['renewals_left'] ?></td>
                        <td>
                            <?php
                                if($renew['renewals_left'] > 0)
                            ?>
                            <a id="accept" href="<?= base_url('admins/process_renewal')?>/<?= $renew['id'] ?>/<?= $renew['id'] ?>/<?= $renew['school_id']?>">Accept</a>
                        </td>
                    </tr>
<?php               }
?>                    
                </tbody>
            </table>    
		</div>
    </div>
</body>
</html>