<?php

  session_start();

  if(!isset($_SESSION['username_u'])){
    header('location:../index.html');
  }
?>

<?php

    include '../assets/connection.php';

    if(isset($_POST['submit'])){
        $address = $_POST['eventaddress'];
        $glocation = $_POST['gmaploc'];
        $shortinfo = $_POST['shortinfo'];
        $biginfo = $_POST['eventbiginfo'];
        $file = $_FILES['file'];

        $filename = $file['name'];
        $filepath = $file['tmp_name'];
        $fileerror = $file['error'];

        if($fileerror == 0){
            $destfile = 'upload/'.$filename;

            move_uploaded_file($filepath,$destfile);

            $insertquery = "insert into events(eventaddress,eventlocationmap,shortinfo,brieinfo,img) values('$address','$glocation','$shortinfo','$biginfo','$destfile')";

            $query = mysqli_query($con,$insertquery);

            if($query){
                echo "inserted";
                header('location:addevent.php');
            }else{
                echo "not inserted";
            }
        }
    }

?>