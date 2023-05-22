<?php

require_once 'connection.php';
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

$books = mysqli_query($conn, $sql);


if(isset($_GET["thumbnail"])){
    $thumbnail = $_GET["thumbnail"];
    $sql = "SELECT * FROM book_data WHERE thumbnail = '$thumbnail'";
    $result = $conn->query($sql);


    if($result->num_rows > 0){
        $row = mysqli_fetch_assoc($result);
        $thumbnail = $row['thumbnail'];
        $title = $row['title'];
        $subtitle = $row['subtitle'];
        $author = $row['authors'];
        $year = $row['published_year'];
        $description = $row['description'];

        $book_info_array = array('$title, $subtitle, $author, $year, $description');

        $book_info_json = json_encode($book_info_array); 

        echo $book_info_json;
    }
}


// $thumbnail = $_GET['thumbnail'];

// // Perform a SELECT query to search for the image in your database
// $sql = "SELECT * FROM book_data WHERE thumbnail = '$thumbnail'";
// $result = $conn->query($sql);

// // Build an array of the search results to return as JSON
// $data = array();
// if ($result->num_rows > 0) {
//   while($row = $result->fetch_assoc()) {
//     $data[] = $row;
//   }
// }

// // Close the database connection
// $conn->close();

// // Return the search results as JSON
// header('Content-Type: application/json');
// echo json_encode($data);







?>