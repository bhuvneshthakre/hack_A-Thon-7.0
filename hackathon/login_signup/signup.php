<?php
  session_start();
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="login-signup.css">
</head>
<body>

   
<?php
      include '../assets/header.php';
      include '../assets/connection.php';

      if(isset($_POST['submit'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $mobile = mysqli_real_escape_string($con, $_POST['number']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        
        $pass = password_hash($password , PASSWORD_BCRYPT);
        $cpass = password_hash($cpassword , PASSWORD_BCRYPT);

        $emailquery = " select * from users where email='$email' ";
        $query = mysqli_query($con,$emailquery);

        $emailcount = mysqli_num_rows($query);

        if($emailcount>0){
          echo "email already exist";
        }else{
          if($password === $cpassword){
            $insertquery = "insert into users(email,password,cpassword) values('$email','$pass','$cpass')";

            $iquery = mysqli_query($con,$insertquery);

            if($iquery){
              ?>
      
              <script>
                  alert("inserted successful");
                  location.replace("login.php");
              </script>
          <?php
            
          }else{
              ?>
              <script>
                  alert("inserted not successful")
              </script>
          <?php
          }
          }else{
            echo "password does not match";
          }
        }

      }

   ?>


    <div class="container-fluid background">
        
      <div class="container login-signup-form-height-width">
       <div class="card background-color shadow-lg   rounded">
         <div class="card-header text-center">
           SignUp
         </div>
         <img src="../img/signup.gif" class="card-img-top img-fluid" alt="...">
         <div class="card-body">
          <p class="card-text text-danger">Register yourself to make a purchase</p>

          <form action="<?php  echo htmlentities($_SERVER['PHP_SELF']);  ?>" method="POST">
            <div class="mb-3">
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Type your E-mail here...." name="email" required>
            </div>
            <div class="mb-3">
              <input type="password" class="form-control"  placeholder="Type your Password here...." name="password" required>
            </div>
            <div class="mb-3">
              <input type="password" class="form-control"  placeholder="Type your Password here...." name="cpassword" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>

          </form>
        </div>

        <div class="card-footer">
          <p>Alredy have Accout&#63; <a href="login.php">Click Here</a></p>
        </div>
      </div>
         
     </div>

     <?php
      include '../assets/footer.php';
   ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>