<?php

  include 'conn.php';
 $q = "select * from crudtable ";

    $query = mysqli_query($con,$q);

   $res = mysqli_fetch_array($query);
  if(isset($_POST['done'])){

   $id = $_GET['id'];
  $firstname=$_POST['firstname'];
  $lastname=$_POST['lastname'];
  $email=$_POST['email'];
  $gender=$_POST['gender'];
  $mobile=$_POST['mobile'];
  $image=$_FILES['image']['name'];
  $image_type=$_FILES['image']['type'];
 if($image_type=='image/png')
  {
  $q = " update crudtable set id=$id, firstname='$firstname', lastname='$lastname', email='$email',gender='$gender', mobile='$mobile', image='$image' where id=$id  ";

   $query = mysqli_query($con,$q);
   move_uploaded_file($_FILES['image']['tmp_name'],"upload/".$image);
   header('location:fetch.php');
 }
 else{
    echo 'Image type is not correct';
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
  
  <form method="post" enctype="multipart/form-data" accept="image/*">
   
   <br><br><div class="card">
    
    <div class="card-header bg-dark">
     <h1 class="text-white text-center">  Update Records </h1>
    </div><br>

     <label> First name: </label>
    <input type="text" name="firstname" class="form-control" value="<?=  $res['firstname'];?>"> <br>

     <label> Last Name: </label>
    <input type="text" name="lastname" class="form-control" value="<?= $res['lastname'];?>"> <br>

    <label> Email: </label>
    <input type="email" name="email" class="form-control" value="<?= $res['email'];?>"> <br>
    <label> Gender: </label>
     <input type="radio"  name="gender" checked="<?php 
        if($res["gender"]=='Male' || $res["gender"]=='Female')
        {
           echo "checked";
        }
        else{
           echo "Unchecked";
        }
    ?>" ><?php 
        if($res["gender"]=='Male')
        {
           echo 'Male<input type="radio" name="gender" value="Female">Female';
        }
        elseif($res["gender"]=='Female'){
           echo 'Female<input type="radio" name="gender" value="Male">Male';
        }
    ?>
    
    <br>
    <label> Mobile: </label>
    <input type="number" name="mobile" class="form-control" value="<?= $res['mobile'];?>"> <br>
    <label> Image: </label><img src="upload/<?php echo $res['image']; ?>" style="height:50px; width:50px;"/>
    <input type="file" name="image" class="form-control" > <br>
     <button class="btn btn-success" type="submit" name="done"> Submit </button><br>

    </div>
  </form>
 </div>
</body>
</html>
