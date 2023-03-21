<?php

    session_start();


?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="login-signup.css">
</head>
<body>

<?php
      include '../assets/header.php';
      include '../assets/connection.php';
      if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $email = "select * from admin where admin_username = '$username' and password = '$password'";
        $query = mysqli_query($con , $email);

        $email_count = mysqli_num_rows($query);

        $email_pass = mysqli_fetch_assoc($query);
        $_SESSION['username'] =$email_pass['admin_username'];

        if($email_count==1){
            echo "login successful";
            header('location:../admin/addBlogs.php');
          }else{
            echo "password incorrect";
          }
      }
      
    ?>
    
    
    <div class="container-fluid background shadow-lg   rounded">
        
     <div class="container login-signup-form-height-width">
      <div class="card background-color">
        <div class="card-header text-center">
          Admin Login Form
        </div>
        <img src="../img/login.gif" class="card-img-top img-fluid" alt="...">
        <div class="card-body">
    
          <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);  ?>" method="POST">
            <div class="mb-3">
              <label class="form-label">Username</label>
              <input type="text" class="form-control" placeholder="Type your username" name="username" required>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1"  placeholder="Type youe Password here...." name="password" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
          </form>
        </div>

      </div>
     </div>
        
    </div>

    <?php
      include '../assets/footer.php';
   ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>