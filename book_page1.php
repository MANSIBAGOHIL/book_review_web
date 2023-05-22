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
    <title>Book Description Page</title>
    <link rel="stylesheet" type="text/css" href="./book_page1.css">
  </head>

  <body>
  <?php
        while($row = mysqli_fetch_assoc($books)){
    ?>
    <h1>Book Description Page</h1>
    <div class="book-container">
      <img src="<?php echo $row['thumbnail']; ?>" alt="Book photo" class="book-photo">
      <div class="book-details">  
        <h2 class="book-title">Book Title</h2>
        <label><?php echo $row['title']; ?></label>
        <h3 class="book-subtitle">Book Subtitle</h3>
        <label><?php echo $row['subtitle']; ?></label>
        <p class="book-author">Author Name</p>
        <label><?php echo $row['authors']; ?></label>
        <p class="book-publishing-year">Publishing Year</p>
        <label><?php echo $row['published_year']; ?></label>
        <p class="book-description">
          Book Description
          <label><?php echo $row['description']; ?></label>
        </p>
        <div class="book-buttons">
          <button class="buy-button">Buy Now</button>
          <button class="add-to-cart-button">Add to Cart</button>
        </div>
      </div>
    </div>
    <?php
        }
    ?> 
    <script src="search_script.js"></script>
  </body>
</html>
