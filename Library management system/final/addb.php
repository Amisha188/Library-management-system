<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    form{
        margin-top: 30px;
        margin-left: 30px;
    }
    input{
        padding-top: 10px;
        padding-bottom: 10px;
        width: 80%;
        padding-left: 20px;
        /* font-size: 100px; */
    }
    input::-webkit-input-placeholder{
        font-size: 20px;
        color: black;
    }
    input:hover{
        background-color: lightgray;
        color:orangered;
        font-size: 20px;
        border-color: orangered;
    }
    .btn{
        font-size: 30px;
    }
    </style>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Add your book...</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add book</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="font-size:30px;">Fill this form for add your book...</h4>
        </div>
        <div class="modal-body">
         <form action="" method="POST">
            <input type="text" placeholder="Book name" required class="bname" name="bname"><br><br>
            <input type="text" placeholder="Author name" required class="aname" name="aname"><br><br>
            <input type="number" placeholder="Total Pages" required name="pno"><br><br>
            <input type="file" required class="btn" name="myfile"><br><br>
            <input type="submit" value="Submit" name="submit">
         </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
<?php

@$bname = $_POST['bname'];
@$aname = $_POST['aname'];
@$page = $_POST['pno'];
@$book = $_POST['book'];
@$submit = $_POST['submit'];

if(isset($bname) && isset($aname) && isset($page) && isset($book) && isset($submit))
{
    $insert = "INSERT INTO `booklist`(`bookname`, `authorname`, `pageno`) VALUES ('$bname', '$aname','$page') ";
    $q = mysqli_query($connect,$insert);
    $name = $_FILES['book']['name'];
    $type = $_FILES['book']['type'];
    $size = $_FILES['book']['size'];
    $tmp_name = $_FILES['book']['tmp_name'];
    if(isset($name))
    {
        if(!empty($name))
        {
            $location = 'C:\xampp\htdocs\hetshree\final';
            if(move_uploaded_file($tmp_name,$location.$name))
            {
                
            }
            else{
                echo "Sorry, something went wrong";
            }
        }else{
            echo "Kindly upload a file";
        }
    }
}

?>