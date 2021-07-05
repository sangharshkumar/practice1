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
if(isset($_REQUEST['submit'])){
//    checking for empty fields
if(($_REQUEST['name']=="") || ($_REQUEST['class']=="") || ($_REQUEST['address']=="")){
    echo "<small>Fill all fields..</small><hr>"; 

}
else{
    $name = $_REQUEST['name'];
    $class = $_REQUEST['class'];
    $address = $_REQUEST['address'];
    $sql = "INSERT INTO student (name, class, address) VALUES('$name', '$class', '$address')";
    if(mysqli_query($conn, $sql)){
        echo "New Record inserted successfully";
    }
    else{
        echo "Unable to insert";
    }
}
}



// $sql = "INSERT INTO student (name, class, address) VALUES('rohit', '10', 'bihar')";
// if(mysqli_query($conn, $sql)){
//     echo "new Record successful";
// }
// else{
//     echo "unable to insert into database";
// }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>User Form</title>
  </head>
  <body>
    <div class="container">
    <div class="row">
    <div class="col-sm-6=4">
    <form action="" method="post">
    <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" id="name">
    </div>
    <div class="form-group">
    <label for="class">Class</label>
    <input type="text" class="form-control" name="class" id="class">
    </div>
    <div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control" name="address" id="address">
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    
    </form>
    </div>
    <div class="col-sm-6 offset-sm-2">
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
    echo "</tr>";
    echo "</thead>";

    echo "<tbody>";
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["class"] . "</td>";
        echo "<td>" . $row["address"] . "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";

}
    
    
    ?>
    </div>
    </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>