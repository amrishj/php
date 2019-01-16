<?php

include 'conn.php';

extract($_POST);
if(isset($_POST['done']))
{
  $image_size=$_FILES['image']['size'];
  $image=$_FILES['image']['name'];
  $image_type=$_FILES['image']['type'];
  
if($image_type=='image/png' && $image_size>1024)
  {
    $q = " INSERT INTO crudtable(firstname, lastname, email, gender, mobile, image, dat) VALUES ( '$firstname','$lastname','$email','$gender','$mobile','$image',NOW() )";

  $query = mysqli_query($con,$q);
  move_uploaded_file($_FILES['image']['tmp_name'],"upload/".$image);
  echo "<script>alert('Inserted Successfully');</script>";
  header("location: fetch.php");
  }
  else{
    echo 'Image type is not correct and image should be less than 1kb';
  }
}

?>

<!DOCTYPE html>
<html>
<head>
 <title></title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>

  <div class="col-lg-6 m-auto">
  
  <form method="post" enctype="multipart/form-data">
      <br><br><div class="card">
    
    <div class="card-header bg-dark">
     <h1 class="text-white text-center">  Insert Record </h1>
    </div><br>
     <label> First Name: </label>
    <input type="text" name="firstname" class="form-control" placeholder="Enter Name Here"> <br>
     <label> Last Name: </label>
    <input type="text" name="lastname" class="form-control"> <br>
    <label> Email: </label>
    <input type="email" name="email" class="form-control"> <br>
    <label> Gender: </label>
     <input type="radio"  name="gender" checked value="Male">Male<input type="radio" value="Female"  name="gender" >Female<br>
     <label> Mobile: </label>
    <input type="number" name="mobile" class="form-control"> <br>
    <label> Attach: </label>
    <input type="file" name="image" class="form-control" > <br>
     <button class="btn btn-success" type="submit" name="done"> Submit </button><br>
    </div>
  </form>
 </div>
</body>
</html>