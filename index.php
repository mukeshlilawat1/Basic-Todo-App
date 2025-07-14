 <?php

  $insert = false;
  $update = false;
  $delete = false;
  //  connect to the database
  $servername = "localhost";
  $username = "root";
  $password = "1215";
  $database = "todoappdb";

  $conn = mysqli_connect($servername, $username, $password, $database);

  if (!$conn) {
    die("Sorry we failed to connect. " . mysqli_connect_error());
  }
  // echo $_SERVER['REQUEST_METHOD'];
  // echo $_POST['snoEdit'];
  // echo $_GET['update'];
  // exit();


  if (isset($_GET['delete'])) {
    $sno = $_GET['delete'];
    echo $sno;
    $delete = true;
    $sql = "DELETE FROM `notes` WHERE `sno` =  $sno";
    $result = mysqli_query($conn, $sql);
  }

  if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_POST['snoEdit'])) {
      echo "Yes";
      // udpate the records
      $sno = $_POST['snoEdit'];
      $title = $_POST['title'];
      $description = $_POST["description"];

      // sql query to be executed
      $sql = "UPDATE `notes` SET `title`= '$title' , `description` = '$description'  WHERE `notes`.`sno` = $sno ";
      $result = mysqli_query($conn, $sql);

      if ($result) {
        $update = true;
      } else {
        echo "we could not update the record successfully";
      }
    } else {
      $title = $_POST["title"];
      $description = $_POST["description"];

      $sql = "INSERT INTO `notes` (`title`, `description`) VALUES ('$title', '$description')";
      $result = mysqli_query($conn, $sql);

      if ($result) {
        $insert = true;
      } else {
        echo "the record was not inserted successfully beacause of this error --> " . mysqli_error();
      }
    }
  }
  ?>


 <!doctype html>
 <html lang="en">

 <head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

   <title>Basic-Todo-App</title>
   <link rel="icon" type="image/png" href="pngimg.com - php_PNG34.png">

   <link rel="stylesheet" href="//cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css">

 </head>

 <body>
   <!-- Button trigger modal -->
   <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
     Launch static backdrop modal
   </button> -->

   <!-- Corrected Modal -->
   <div class="modal fade" id="editModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <!-- Fix this ID -->
           <h5 class="modal-title" id="editModalLabel">Edit Todo</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
           <form action="/Crud/index.php" method="POST">
             <input type="hidden" name="snoEdit" id="snoEdit">
             <div class="form-group">
               <label for="title">Todo Task</label>
               <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
             </div>
             <div class="form-group">
               <label for="desc">Todo Description</label>
               <textarea class="form-control" id="description" name="description" rows="3"></textarea>
             </div>
             <button type="submit" class="btn btn-primary">Update Todo</button>
           </form>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           <button type="button" class="btn btn-primary">Understood</button>
         </div>
       </div>
     </div>
   </div>


   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
     <a class="navbar-brand" href="#"><img src="to-do-list.png" alt="php logo" height="40" width="40" /></a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarScroll">
       <ul class="navbar-nav mr-auto my-2 my-lg-0 navbar-nav-scroll" style="max-height: 100px;">
         <li class="nav-item active">
           <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="#">Service</a>
         </li>

         <li class="nav-item">
           <a class="nav-link" href="#">About</a>
         </li>

         <li class="nav-item">
           <a class="nav-link" href="#">Documents</a>
         </li>

         <li class="nav-item">
           <a class="nav-link" href="#">Help Us</a>
         </li>
         <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
             Contact Us
           </a>
           <ul class="dropdown-menu">
             <li><a class="dropdown-item" href="#">FeedBack</a></li>
             <li><a class="dropdown-item" href="#">contact to call</a></li>
             <li>
               <hr class="dropdown-divider">
             </li>
             <li><a class="dropdown-item" href="#">Contact to Email</a></li>
           </ul>
         </li>
       </ul>
       <form class="d-flex">
         <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search">
         <button class="btn btn-outline-success" type="submit">Search</button>
       </form>
     </div>
   </nav>

   <?php
    if ($insert) {
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> Your Todo Has Been inserted Successfully
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
    }
    ?>

   <?php
    if ($delete) {
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> Your Todo Has Been deleted Successfully
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
    }
    ?>

   <?php
    if ($update) {
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> Your Todo Has Been updated Successfully
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>";
    }
    ?>

   <div class="container my-4">
     <h3>Add Your Task</h3>
     <form action="/Crud/index.php" method="POST">
       <div class="form-group">
         <label for="title"> Todo Task</label>
         <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
       </div>
       <div class="form-group">
         <label for="desc">Todo Description</label>
         <textarea class="form-control" id="description" name="description" rows="3"></textarea>
       </div>
       <button type="submit" class="btn btn-primary">Add Todo</button>
     </form>
   </div>

   <div class="container my-4">
     <table class="table" id="myTable">
       <thead>
         <tr>
           <th scope="col">S-No</th>
           <th scope="col">Title</th>
           <th scope="col">Description</th>
           <th scope="col">Action</th>
         </tr>
       </thead>
       <tbody>

         <?php
          $sql = "SELECT * FROM `notes`";
          $result = mysqli_query($conn, $sql);
          $sno = 0;
          while ($row = mysqli_fetch_assoc($result)) {
            $sno = $sno + 1;
            echo "
            <tr>
           <th scope='row'>" . $sno . "</th>
           <td>" . $row['title'] . "</td>
           <td>" . $row['description'] . "</td>
           <td> <button class='delete btn btn-sm btn-primary' id=d" . $row['sno'] . ">Delete</button> <button class='edit btn btn-sm btn-primary' id=" . $row['sno'] . ">Edit</button></td>
         </tr>
        ";
            // echo $row['sno'] . ". Title " . $row['title'] . "Description is " . $row['description'];
            // echo "<br>";
          }


          ?>
       </tbody>
     </table>
   </div>

   <hr />
   <!-- Optional JavaScript; choose one of the two! -->

   <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
   <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
   <script src="//cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>

   <script>
     let table = new DataTable('#myTable');
   </script>

   <script src="App.js"></script>

   <!-- Option 2: Separate Popper and Bootstrap JS -->
   <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
 </body>

 </html>