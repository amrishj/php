<?php
include("conn.php");
//$msg="";
error_reporting(1);
extract($_POST);
// if(isset($_POST['login']))
if(isset($login))
{
   if(!empty($user_id) && !empty($pass))	
	 {
	    $pass=md5($pass);
			$sel=mysqli_query($con,"select * from admin where user_id='$user_id'");
  		$arr=mysqli_fetch_array($sel);
  		if($user_id==$arr['user_id'] && $pass==$arr['pass'])
  		{
  			session_start();
  			$_SESSION['sid']=$user_id;
		
			header("location:fetch.php");
			}
		else{
			$msg="User Name or PASSWORD is not match";
			
			}
	}
		else{
			
			$msg="Plz fill blank fields";
			}
		
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</head>
<body>

<section >
  <form id="form1" name="form1" method="post">
  <h1 class="display-4">Login Here</a></h1>
    <table class=" table table-striped table-hover table-bordered w-25 text-center mt-5" >
      <tr>
        <td colspan="2"><?= $msg; ?></td>
      </tr>
      <tr>
        <th>User ID</th>
        <td><input name="user_id" type="text" required id="id" class="form-control">
      </tr>
      <tr>
        <th>Password</th>
        <td>
          <input name="pass" type="password" required id="pass" class="form-control">        
              
        </td>
      </tr>
   
      <tr>
        <th colspan="2" ><input type="submit" name="login"   value="Login" class="btn btn-primary">
      </th>
      </tr>
     
    </table>
  </form>
</section>
</body>
</html>