<?php

  session_start();

  if(!isset($_SESSION['username_u'])){
    header('location:../index.html');
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Add Events</title>
    <link rel="stylesheet" href="add-image.css">
  </head>
  <body>
    
  <?php include('../assets/header.php') ?>
    
    
    <div class="new">
    <div class="container-fluid table-area">
      <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-dark">
              <tr class="text-center text-white">
                <th scope="col">Event Address</th>
                <th scope="col">Goole Map Location</th>
                <th scope="col">Short Description</th>
                <th scope="col">Big Description</th>
                <th scope="col">Images</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php
                include '../assets/connection.php';
                $selectQuery = "select * from events";
                $query = mysqli_query($con , $selectQuery);
                while($result = mysqli_fetch_array($query)){
                  ?>

              <tr class=" form-content text-center text-white">
                <td class="text-dark"><?php echo $result['eventaddress'];?></td>
                <td class="text-dark"><?php echo $result['eventlocationmap'];?></td>
                <td class="text-dark"><?php echo $result['shortinfo'];?></td>
                <td class="text-dark"><?php echo $result['brieinfo'];?></td>
                
                <td><img src="<?php echo $result['img'];?>" width="100" height="100"></td>
                <td class="text-white"><a href="update.php?update=<?php echo $result['id']; ?>"><i class="fa fa-edit"></i></a></td>
                <td class="text-white"><a href="delete.php?deleteData=<?php echo $result['id']; ?>"><i class="fa fa-trash"></i></a></td>
                
              </tr>

                  <?php
                }
                ?>
            </tbody>
        </table>
      </div>
    </div>
    </div>



   <div class="container-fluid add-image">
    <div class="container add-image-form">
      <center>
        <div class="title">
          <h1 class="text-white">Add Events</h1>
        </div>
      </center>
    <?php
          if(isset($_SESSION['username_u'])){
            echo '<div class="container">
              <div class="upload-form">
                  <form action="upload.php" method="post" enctype="multipart/form-data">
                  
                      <div class="mb-3">
                          <input type="text" class="form-control" name="eventaddress" placeholder="Event Address">
                      </div>
                      <div class="mb-3">
                          <input type="text" class="form-control" name="gmaploc" placeholder="Enter Google map location">
                      </div>
                      <div class="mb-3">
                          <input type="text" class="form-control" name="shortinfo" placeholder="Event Short Information">
                      </div>
                      <div class="mb-3">
                          <input type="text" class="form-control" name="eventbiginfo" placeholder="Event Big Info">
                      </div>
                      <div class="mb-3">
                          <input type="file" class="form-control" name="file">
                      </div>
                      
                      <center>
                         <button type="submit" name="submit" class="btn">Submit</button>
                      </center>
                  </form>
              </div>
          </div>' ;
          }
      ?>
    </div>
   </div>
   <footer>
    <div class="footer text-center">
      <h5>All Rights Reserved</h5>
    </div>
   </footer>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>