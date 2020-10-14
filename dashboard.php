<?php
session_start();
   if( !isset($_SESSION['uid']))
   {
    header('location:index.php');
   }

   include('dbcon.php');
   $id=($_SESSION['uid']);
      
      $qry="SELECT * FROM `assigment` WHERE id='$id'";
      $run= mysqli_query($con,$qry)or die(mysqli_error($con));
   $row=mysqli_num_rows($run);
   if($row>0){
       $data= mysqli_fetch_assoc($run);
   }
?>
   
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
     
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Dashboard</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="logout.php">Logout<span class="sr-only">(current)</span></a>
      </li>
     
      
  </div>
      
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<div align="center"  class="card" style="width:200px">
<h4 class="card-title">Photograohy</h4>
  <img class="card-img-top" src="dataimg/<?php echo $data['image']; ?>" alt="Card image">
  <h4 class="card-title"><?php echo $data['name']; ?></h4>
    
  </div>
</div>
<div class="container" style="margin-top: 15px; float:left;">
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">mobile_number</th>
      <th scope="col">Email</th>
      <th scope="col">User Name</th>
      <th scope="col">password</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?php echo $data['id'];?></td>
      <td><?php echo $data['name'];?></td>
      <td><?php echo $data['phone_number'];?></td>
      <td><?php echo $data['email'];?></td>
      <td><?php echo $data['user_name']?></td>
      <td><?php echo $data['password']?></td>
    </tr>
   
  </tbody>
</table>
</div>



    <script  type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script  type="text/javascript" src="assets/bootstrap/js/jquery.js"></script>

</body>
</html>