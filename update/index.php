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
if(isset($_REQUEST['update'])){
if(($_REQUEST['name']=="") || ($_REQUEST['class']=="") || ($_REQUEST['address']==""))
{
    echo "<small>Fill all fields..</small><hr>"; 

}
else
{
    $name = $_REQUEST['name'];
    $class = $_REQUEST['class'];
    $address = $_REQUEST['address'];

$sql = "UPDATE student SET name = '$name', class = '$class', address = '$address' WHERE id = {$_REQUEST['id']}";
if(mysqli_query($conn, $sql))
{
    echo "updated";
}
else{
    echo "not updated";
}
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

    <title>update</title>
  </head>
  <body>
    <div class="container">
    <div class="row">
    <div class="col-sm-4">
    <?php
    if(isset($_REQUEST['edit'])){
    $sql = "SELECT * FROM student WHERE id = {$_REQUEST['id']}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    }
    ?>
    <form action="" method="post">
    <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" id="name" value="<?php if(isset($row["name"])){ echo $row["name"];}?>">
    </div>

    <div class="form-group">
    <label for="class">Class</label>
    <input type="text" class="form-control" name="class" id="class" value="<?php if(isset($row["class"])){ echo $row["class"];}?>">
    </div>
    <div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control" name="address" id="address" value="<?php if(isset($row["address"])){ echo $row["address"];}?>">
    </div>

    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">


    <button type="submit" class="btn btn-primary" name="update">Update</button>
    
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
        echo '<td><form action="" method="POST"><input type="hidden" name="id" value=' . $row['id'] . '><input type="submit" class="btn btn-sm btn-danger" name="edit" value="edit"></form></td>';
        echo "</tr>";
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