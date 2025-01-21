<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Restaurant</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="contact2.css">
</head>
<body>
    <header>
        <div class="navbar">
        <a href ="index.html"> about </a>
        <a href = "products.html"> products</a>
        <div class="img">
       
            <img src = "https://images.prismic.io/lantanacafe/793c238b-0b08-44fa-a5e2-add6f3ebaef6_eat+curious+logo.png?auto=compress,format"
            class = "logoeat">
        </a>
        </div>
        <a href = "cart.php">cart</a>
        <div class = "shop"><a href = "cart.php">
                <i class="fa-solid fa-cart-shopping"></i>
                <span class = "count">0</span>
              </a></div>
        <button class = "navbtn"><i class="fa-solid fa-bars"></i> <a href = "contact.php"> CONTACT US</a> </button>
        </div>
    <div class="click">
        <a id = "list" href = "index.html"> about</a>
      <a id = "list" href = "products.html"> products</a>
      <a id = "list" href = "contact.php"> contact</a>
      <a id = "list" href = "cart.php"> cart</a>
    </div>
    
    </header>
    <div class="container">
        <h2>We'd Love to Hear From You!</h2>
        <form action =""method ="POST"class="con-form">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Your Name" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Your Email" required>

            <label for="message">Message</label>
            <textarea id="message" name="message" placeholder="Your Message" required></textarea>

            <button type="submit" name = "send" >Send Message</button>
        </form>
    </div>
   <footer>
        <p>&copy; 2025 Your Restaurant Name</p>
    </footer>
    
    <?php require('db.php'); ?>

<?php
if (isset($_POST['send'])) {
    $frm_data = filtration($_POST);
    $q = "INSERT INTO `con_form`(`name`, `email`, `message`) VALUES (?,?,?)";
    $values = [$frm_data['name'], $frm_data['email'], $frm_data['message']];
    $res = insert($q, $values, 'sss');
    if ($res == 1) {
        echo "<script>alert('Email sent successfully');</script>";
    } else {
        echo "<script>alert('Failed to send email. Try again later!');</script>";
    }
        // Redirect to avoid form resubmission
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
}


?>


    <script src ="contact2.js"></script>     
</body>
</html>
