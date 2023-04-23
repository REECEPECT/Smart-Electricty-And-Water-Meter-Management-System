<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header>
        <div class="navbar">
            <div class="logo"><a href="#">Unilink Smart Solutions</a></div>
            <ul class="links">
                <li><a href="Hero">Place Order</a></li>
                <li><a href="about">About</a></li>
                <li><a href="services">Services</a></li>
                <li><a href="contact">Contact</a></li>
            </ul>
           <a href="php/login.php" class="action_btn">Get Started</a>
            <div class="toggle_btn">
            <i class="fa-solid fa-bars"></i>
            </div>
        </div>
        <div class="dropdown_menu">
                <li><a href="hero">Home</a></li>
                <li><a href="about">About</a></li>
                <li><a href="services">Services</a></li>
                <li><a href="contact">Contact</a></li>
                <li><a href="php/login.php" class="action_btn">Get Started</a></li>
        </div>
    </header>
    <main>
    <section id = "hero">
        <h1>Welcome</h1>
        <p>This is the main page of Unilink Smart Solutions Pty(Ltd) <br>
            Proceed to login or register new account with us.
        </p>
    </section>
    </main>
    <script>
        const toggleBtn = document.querySelector('.toggle_btn')
        const toggleBtnIcon = document.querySelector('.toggle_btn i')
        const dropDownMenu = document.querySelector('.dropdown_menu')

        toggleBtn.onclick = function() {
            dropDownMenu.classList.toggle('open')
            const isOpen = dropDownMenu.classList.contains('open')
            toggleBtnIcon.classList = isOpen ? 'fa-solid fa-xmark' : 'fa-solid fa-bars';
        }
    </script>
</body>
</html>