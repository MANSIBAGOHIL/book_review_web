<?php
    require_once 'connection.php';
    if (!$conn) {
        die('Connection failed: ' . mysqli_connect_error());
    }
    $sql = "SELECT * FROM book_data";
    $books = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./style.css">
    <title>Product Card Search</title>
</head>

<body>
    
    <div class="container">
    <?php
    $i=0;
        while($row = mysqli_fetch_assoc($books)){
            $i++;
    ?>
    
        <div class="card">
            <a href="./book_page1.php" target="_blank">
                <img src="<?php echo $row['thumbnail']; ?>" id="thumbnail" onclick="find_book()" alt="Product Image">
            </a>
            <h3 class= "title"><?php echo $row['title']; ?></h3>
            
            <div class="price"><h3 class= "title">₹<?php echo $row['num_pages']; ?></h3></div>
            <button>Add to Cart</button>
        </div>
    

    <?php

    if($i==10)
    {
        break;
    }
        }
    ?> 
</div>
        <script src="search_script.js"></script>
    <!-- <script>
   
    </script>-->
</body>

</html>