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
    <link rel="stylesheet" href="<?=base_url('assets/css/students/requests.css')?>">
    <title>Search Book</title>
</head>
<body>
    <div class="request_container">
        <div class="search">
            <h3>Welcome, <?= $this->session->userdata('name');?> | <a href="<?= base_url('users/logout');?>"> Logout</a></h3>
            <form action="">
                <input type="text" placeholder="Search Book's title">
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
        <div class="request_form">
            <form action="<?= base_url('students/process_update');?>/<?= $book['id'] ?>" method="post">
            <input type="hidden" name="id" value="<?= $book['id'] ?>">
                <div class="request">
                    <p>Accesion</p>
                    <input type="text" name="accesion" value="<?= $book['accesion'] ?>">
                </div>
                <div class="request">
                    <p>Title</p>
                    <input type="text" name="title" value="<?= $book['title'] ?>">
                </div>
                <div class="request">
                    <p>Publisher</p>
                    <input type="text" name="publisher" value="<?= $book['publisher'] ?>">
                </div>
                <div class="request">
                    <p>Year</p>
                    <input type="text" name="year" value="<?= $book['year'] ?>">
                </div>
                <input type="submit" value="Update">
            </form>
        </div>
    </div>
</body>
</html>