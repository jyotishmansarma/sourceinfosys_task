<!DOCTYPE html>
<html>
<head>
    <title>loginfrom</title>
     
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
  <h4 align="center" class="display-3">User Login</h4>
<div class="container col-6">
  
  <form action="login.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">User Name</label>
    <input type="text" name="uname"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group form-check">
    <input type="checkbox"  class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" name="login"class="btn btn-primary">Login</button>
  <a class="btn btn-success" href="register.php" role="button">Register</a>
</form>

  
  
</div>
    <script  type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script  type="text/javascript" src="assets/bootstrap/js/jquery.js"></script>

</body>
</html>
<?php
   include('dbcon.php');
   if(isset($_POST['login'])){
   	$username=$_POST['uname'];
   	$password=$_POST['password'];
   	$qre ="SELECT * FROM `assigment` WHERE user_name='$username'AND password='$password'";
   	$result=mysqli_query($con,$qre);
   	$row=mysqli_num_rows($result);
   	if($row<1){
   		?>
   		<script>swal("Invalid username or password!", "You clicked the button!", "error");
   		
   	    </script>
   		
   	<?php
   	
   }
   	else{
   		$data=mysqli_fetch_assoc($result);
   		$id=$data['id'];
   		session_start();
   		$_SESSION['uid']=$id;
   		header('location:dashboard.php');
   		
   		   	}
   }
 ?>