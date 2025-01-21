<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaAN7k2Ly13bF3z0nHybNfZ1W0yPzRdfynjLYS+55K8BOv0mYl5ZBj1z4Bf" crossorigin="anonymous">
    <link rel="stylesheet" href="cart.css">
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
        <button class = "navbtn"><i class="fa-solid fa-bars"></i> <a href = "contact.php"> CONTACT US</a> </button>
        <div class = "shop"><a href = "cart.php">
                <i class="fa-solid fa-cart-shopping"></i>
                <span class = "count">0</span>
              </a></div>
        </div>
    <div class="click">
        <a id = "list" href = "index.html"> about</a>
      <a id = "list" href = "products.html"> products</a>
      <a id = "list" href = "contact.php"> contact</a>
      <a id = "list" href = "cart.php"> cart</a>
    </div>
    
    </header>

<div class="space">
<?php
session_start();

// Initialize cart if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];

    // Add or update item in cart
    if (!isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] = array(
            'name' => $product_name,
            'price' => $product_price,
            'quantity' => 1
        );
    } else {
        $_SESSION['cart'][$product_id]['quantity']++;
    }

    // Redirect to cart page
    header('Location: cart.php');
    exit();
}

// Display cart contents
echo "<h2>Your Cart</h2>";
if (!empty($_SESSION['cart'])) {
    echo "<table>";
    echo "<tr><th>Product</th><th>Price</th><th>Quantity</th><th>Total</th></tr>";
    foreach ($_SESSION['cart'] as $id => $product) {
        $total = $product['price'] * $product['quantity'];
        echo "<tr>";
        echo "<td>{$product['name']}</td>";
        echo "<td>\${$product['price']}</td>";
        echo "<td>{$product['quantity']}</td>";
        echo "<td>\${$total}</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>Your cart is empty.</p>";
}
?>




<?php require('db.php'); ?>
<div class="container mt-4">
    <h1 class="text-center">Upload and Display Images</h1>

    <!-- Form to upload images -->
    <form action="" method="POST" enctype="multipart/form-data" class="mb-4">
        <div class="form-group">
            <label for="image">Select Image:</label>
            <input type="file" name="image" id="image" class="form-control" required>
        </div>
        <button type="submit" name="upload" class="btn btn-primary">Upload</button>
    </form>

    <!-- Section to display uploaded images -->
    <h2>Uploaded Images:</h2>
    <div class="row">
        <?php
        // Fetch and display images from the database
        $query = "SELECT * FROM `images` ORDER BY `uploaded_at` DESC";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <div class='col-md-3 mb-4'>
                <img src='images/{$row['image_name']}' alt='Image' class='img-thumbnail'>
                <form action='' method='POST' class='mt-2'>
                    <input type='hidden' name='image_id' value='{$row['id']}'>
                    <input type='hidden' name='image_name' value='{$row['image_name']}'>
                    <button type='submit' name='delete' class='btn btn-danger btn-sm'>Delete</button>
                </form>
            </div>";
        }
        ?>
    </div>
</div>

<!-- PHP Logic for Uploading Image -->
<?php
if (isset($_POST['upload'])) {
    //Get the uploaded file
    $image = $_FILES['image'];

    //Validate file type and size (optional)
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($image['type'], $allowed_types)) {
        echo "<script>alert('Invalid file type. Only JPEG, PNG, and GIF are allowed.');</script>";
        exit;
    }
    if ($image['size'] > 8 * 1024 * 1024) { // 8 MB limit
        echo "<script>alert('File size exceeds 8MB.');</script>";
        exit;
    }

   // Move the uploaded file to the "images" folder
    $target_dir = "images/";
    $image_name = time() . '_' . basename($image['name']); // Avoid duplicate file names
    $target_file = $target_dir . $image_name;

    if (move_uploaded_file($image['tmp_name'], $target_file)) {
        //Insert file name into the database
        $query = "INSERT INTO images (image_name) VALUES ('$image_name')";
        if (mysqli_query($con, $query)) {
            echo "<script>alert('Image uploaded successfully!');window.location.href='';</script>";
        } else {
            echo "<script>alert('Failed to save image to database.');</script>";
        }
    } else {
        echo "<script>alert('Failed to upload image.');</script>";
    }
}

//PHP Logic for Deleting Image
if (isset($_POST['delete'])) {
    $image_id = $_POST['image_id'];
    $image_name = $_POST['image_name'];

    // Delete the image file from the images folder
    $image_path = "images/" . $image_name;
    if (file_exists($image_path)) {
        unlink($image_path); // Remove the file
    }

   // Delete the record from the database
    $delete_query = "DELETE FROM images WHERE id = $image_id";
    if (mysqli_query($con, $delete_query)) {
        echo "<script>alert('Image deleted successfully!');window.location.href='';</script>";
    } else {
        echo "<script>alert('Failed to delete image from database.');</script>";
    }
}
// ?>
</div>
<script src ="cart.js"></script>
</body>
</html>