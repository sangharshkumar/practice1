<?php
// create connection
$conn = mysqli_connect("localhost", "root", "", "practice1");


// if($conn){
//     echo "success";
// }

if(!$conn){
    die("connetion failed" . mysqli_connect_error());
}
echo "success <hr>";

// $sql = "SELECT * FROM student";
// $result = mysqli_query($conn, $sql);
// if(mysqli_num_rows($result)>0)
// {

//     while($row = mysqli_fetch_assoc($result)){
        
//         echo "  ID: " . $row['id'];
//         echo "  NAME: " . $row['name'];
//         echo "  CLASS:" . $row['class'];
//         echo "  ADDRESS:" . $row['address'];
//         echo "<hr>";
               
//     }
// }
// else{
//     echo "0 results";
// }

if(isset($_REQUEST['delete'])){
$sql = "DELETE FROM student WHERE id ={$_REQUEST['id']}";
    if(mysqli_query($conn, $sql)){
        echo "Record Deleted";

    }
    else{
        echo "Error occur";
    }
}


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>practice</title>
  </head>
  <body>
    <div class="container">
    <?php

$sql = "SELECT * FROM student";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
    echo '<table class="table">';
    echo "<thead>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>NAME</th>";
    echo "<th>CLASS</th>";
    echo "<th>ADDRESS</th>";
    echo "<th>Action</th>";
    echo "</tr>";
    echo "</thead>";

    echo "<tbody>";
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["class"] . "</td>";
        echo "<td>" . $row["address"] . "</td>";
        echo '<td><form action="" method="POST"><input type="hidden" name="id" value=' . $row['id'] . '><input type="submit" class="btn btn-sm btn-danger" name="delete" value="Delete"></form></td>';
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";

}
    
    ?>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>