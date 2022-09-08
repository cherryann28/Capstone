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
    <link rel="stylesheet" href="<?=base_url('assets/css/admin/message.css')?>">
    <title>Admin Messenger</title>
</head>
<body>
    <div class="messenger_container">
        <div class="search">
            <h3>Welcome, <?= $this->session->userdata('first_name');?> | <a href="<?= base_url('users/logout');?>"> Logout</a></h3>
            <div class="dropdown">
                <button class="dropbtn">Messenger</button>
                <div class="dropdown-content">
                    <a href="<?= base_url('messenger');?>">Messenger</a>
                    <a href="<?= base_url('add_book');?>">Add Books</a>
                    <a href="<?= base_url('book_list');?>">Book List</a>
                    <a href="<?= base_url('issue_request');?>">Issue Requests</a>
                    <a href="<?= base_url('return_request');?>">Return Request</a>
                    <a href="<?= base_url('renew_request');?>">Renew Request</a>
                    <a href="<?= base_url('student_list');?>">Students List</a>
                </div>
            </div>
        </div>
        <div class="send_message">
            <h3>Send Message</h3>
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
            <form action="<?= base_url('admins/process_message')?>" method="post">
                <div class="student_id">
                    <p>Student ID</p>
                    <input type="text" name="school_id">
                </div>
                <p>Message</p>
                <textarea name="content" id="" cols="30" rows="10"></textarea>
                <input type="submit" value="Send">
            </form>
        </div>
        
    </div>
</body>
</html>