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
    <link rel="stylesheet" href="<?=base_url('assets/css/students/request_sents.css')?>">
    <title>Request Sent</title>
    <script>
            // $(document).ready(function(){

            //     $(document).on('keyup', 'input', function(){
            //         $(this).parent("form").submit();
            //     });
            
            //     $(document).on('submit','form', function(){
            //         $.post($(this).attr('action'), $(this).serialize(), function(res){
            //             $('#books').html(res);
            //         });
            //         return false;
            //     });	
            // });
	</script>
</head>
<body>
    <div id="books">
        <div class="request_sent_container">
            <div class="search">
                <h3>Welcome, <?= $this->session->userdata('name');?> | <a href="<?= base_url('users/logout');?>"> Logout</a></h3>
                <form class="form" action="<?= base_url()?>students/search" method="post">
                    <input type="text" placeholder="Search Book's title" name="search">
                </form>
                <div class="dropdown">
                    <button class="dropbtn">Messages</button>
                    <div class="dropdown-content">
                        <a href="<?= base_url('messages') ?>">Messages</a>
                        <a href="<?= base_url('borrowed_books') ?>">Borrowed Books</a>
                        <a href="<?= base_url('students') ?>">Books</a>
                        <a href="<?= base_url('process_previously_borrowed_books') ?>"> Previously Borrowed Books</a>
                    </div>
                </div>
            </div>
            <div class="view_all">
                <a href="<?= base_url('students') ?>">View all books</a>
            </div>
            <div id="sent">
                <img src="<?=base_url('assets/img/sent.png')?>" alt="request-sent-image">    
                <p><?= $this->session->flashdata('sent')?></p>
                <a href="<?= base_url('students')?>">Okay</a>
            </div>
            <div class="data">
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
                            <td>
<?php                       
                                if($row['availability'] > 0)
                                    echo "<p class='green'>Available</p>";
                                else
                                    echo "<p class='red'>Borrowed</p>";
?>
                            </td>
                            <td>
<?php                       if($row['availability'] > 0) 
                                    echo "<a class=\"borrow\" href=\"students/process_borrow_book/".$row['id']."\">Issue</a>";
                                else
                                    echo "<p></p>";                                
?>                          </td>
                        </tr>
<?php               }   ?>
                    </tbody>
                </table>    
            </div>
        </div>
    </div>
</body>
</html>