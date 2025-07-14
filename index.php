 <?php
  // INSERT INTO ``notes` (`sno`, `title`, `description`, `Time`) VALUES (NULL, '',current_timestamp())
  //  connect to the database
  $servername = "localhost";
  $username = "root";
  $password = "1215";
  $database = "todoappdb";

  $conn = mysqli_connect($servername, $username, $password, $database);

  if (!$conn) {
    die("Sorry we failed to connect. " . mysqli_connect_error());
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


 </head>

 <body>
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

   <div class="container my-2">
     <h3>Add Your Task</h3>
     <form>
       <div class="form-group">
         <label for="exampleInputEmail1"> Todo Task</label>
         <input type="text" class="form-control" id="todo" name="todo" aria-describedby="emailHelp">
       </div>
       <div class="form-group">
         <label for="desc">Todo Description</label>
         <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
       </div>
       <button type="submit" class="btn btn-primary">Add Todo</button>
     </form>
   </div>

   <div class="container">
     <?php
      $sql = "SELECT * FROM `notes`";
      $result = mysqli_query($conn, $sql);

      while ($row = mysqli_fetch_assoc($result)) {
        echo $row['sno'] . ". Title ". $row['title'] . "Description is ". $row['description'];
        echo "<br>";
      }
      ?>
   </div>


   <!-- Optional JavaScript; choose one of the two! -->

   <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
   <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

   <!-- Option 2: Separate Popper and Bootstrap JS -->
   <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
 </body>

 </html>