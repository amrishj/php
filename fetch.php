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

  <div class="container">
 <div class="col-lg-12">
  <br><br>
  <h1 class="text-center" > Display  Data in a Table </h1>
  <br>
  <a href="insert.php"><button class="btn btn-primary">Add data</button></a>
  <table  id="tabledata" class=" table table-striped table-hover table-bordered">
   
   <tr class="bg-success text-white text-center">
    
    <th> Id </th>
    <th> FirstName </th>
    <th> LastName </th>
    <th> Email </th>
    <th> Gender </th>
    <th> Mobile </th>
    <th> Image </th>
    <th> Delete </th>
    <th> Update </th>

    </tr >

  <?php

    include 'conn.php'; 
   $q = "select * from crudtable ";

    $query = mysqli_query($con,$q);
    $num=1;
    while($res = mysqli_fetch_array($query)){
    
 ?>
   <tr class="text-center">
    <td> <?php echo $num++;  ?> </td>
    <td> <?php echo $res['firstname'];  ?> </td>
    <td> <?php echo $res['lastname'];  ?> </td>
    <td> <?php echo $res['email'];  ?> </td>
    <td> <?php echo $res['gender'];  ?> </td>
    <td> <?php echo $res['mobile'];  ?> </td>
    <td> <img src="upload/<?php echo $res['image']; ?>" style="height:50px; width:50px;"/> </td>
   
    <td> <button class="btn-danger btn"> <a href="delete.php?id=<?php echo $res['id']; ?>" class="text-white"> Delete </a>  </button> </td>
    <td> <button class="btn-primary btn"> <a href="update.php?id=<?php echo $res['id']; ?>" class="text-white"> Update </a> </button> </td>

    </tr>

   <?php 
   
   }

   ?>
   
  </table>  

  </div>
 </div>


</body>
</html>