<!DOCTYPE html>
<html>
<head>
    <title>Registationfrom</title>
     
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script  type="text/javascript" src="assets/bootstrap/js/jquery.js"></script>
    <script  type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 
</head>
<body>
  <h3 align="center" class="display-3">Admin Register</h3>

<div class="container col-6">
  
<form action="register.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputName">Name</label>
    <input name="name" type="text" class="form-control" placeholder="name" autofocus required>
  </div>
  <div class="form-group">
    <label for="exampleInputName">Mobile Number</label>
    <input name="phone_number" type="text" class="form-control" placeholder="Mobile Number"  maxlength="10" required>
  </div>
  <div class="form-group">
    <label for="exampleInputName">User name</label>
    <input name="uname" type="text" class="form-control" placeholder="user name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">Example file input</label>
    <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1" required>
  </div>
  <button type="submit"name="submit" class="btn btn-primary">Submit</button>
  <a class="btn btn-success" href="login.php" role="button">Login</a>
  </form>
</div>
<?php
   if (isset($_POST['submit'])) {
    include('dbcon.php');
    $name=$_POST['name'];
    $phone_number=$_POST['phone_number'];
  	$uname=$_POST['uname'];
   	$email=$_POST['email'];
   	$password=$_POST['password'];
      $imagename=$_FILES['image']['name'];
      $tempname=$_FILES['image']['tmp_name'];
      move_uploaded_file($tempname, "dataimg/$imagename");
      $sql_u="SELECT * FROM `assigment` WHERE user_name='$uname'";
      $sql_run= mysqli_query($con, $sql_u)or die(mysqli_error($con));
      if (mysqli_num_rows($sql_run) > 0) {
?>
<script>swal("User Name already exits!", "You clicked the button!", "error");
   		
</script>
<?php
      }
      else{	

   	$qry="INSERT INTO `assigment`(`name`,`phone_number`,`user_name`,`password`,`email`,`image`) VALUES ('$name','$phone_number','$uname','$password','$email','$imagename')";
       $run= mysqli_query($con,$qry)or die(mysqli_error($con));
       echo $run;

   	if($run==true){
   		?>
   		<script type="text/javascript">
               swal({
             title: "Register Successfully",
             text: "You clicked the button!",
             icon: "success",
             button: "ok",
          });
        </script>

     <?php
   }
   	else{
   		echo "error";
   	}
   	
   }
   }
?>


  
  
</div>

</body>
</html>
