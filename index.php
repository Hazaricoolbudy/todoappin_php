
<!-- INSERT INTO `note` (`s_no`, `title`, `desc`, `time`) VALUES (NULL, 'buy fruits', ' go to the market and by the fruits', current_timestamp()); insert query -->

<?php
$servername= "localhost";
$username="root";
$password="";
$database="notes";
$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn){
  die( "database is not connected". mysqli_connect_error($conn));
}
else {
 
 
}

if($_SERVER['REQUEST_METHOD'] =='POST'){
  
  $title = $_POST['title'];
  $description = $_POST['desc'];
  $sql="INSERT INTO `note` ( `title`, `description`) VALUES ( '$title', '$description')";
  $result = mysqli_query($conn,$sql);
 
  if($result){
    echo "added Successfully";
  }
  else{
    echo "errors";
  }
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

    <title>ToDoList</title>
  </head>
  <body>
       <!-- nav bar starting  -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
                           
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
      
      <!-- navbar end  -->


      <!-- form starting  -->
      <div class="container my-5">
          <h3 >Add a Notes</h3>
        <form action="" method="post">
            <div class="mb-3">
              <label for="title" class="form-label">Note Title</label>
              <input type="text" class="form-control" id="title" aria-describedby="emailHelp" name="title">
              
            </div>
            
            <div class="form-group shadow-textarea">
                <label for="desc">Note Descriptions</label>
                <textarea class="form-control z-depth-1 my-2" id="desc" name="desc" rows="3" placeholder="Write something here..."></textarea>
              </div>
            
            <button type="submit" class="btn btn-primary my-3 mx-2">Submit</button>
          </form>
      </div>



      <!-- form end  -->
      <!-- data from database start form  -->

    <div class="container">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">S_no</th>
      <th scope="col">Title</th>
      <th scope="col">Descriptions</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    $sql ="SELECT * FROM `note`";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
      echo  "<tr>
      <th scope='row'>".$row['s_no']."</th>
      <td>".$row['title']."</td>
      <td>".$row['description']."</td>
      <td>Action</td>
    </tr>";
      // $row['s_no'].".Title \n".$row['title']." "."description \n"." ".$row['description'];
    }
    
    
    ?>
   
    
  </tbody>
</table>

    <!-- <?php 
    $sql ="SELECT * FROM `note`";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
      echo  $row['s_no'].".Title \n".$row['title']." "."description \n"." ".$row['description'];
    }
    
    
    ?> -->
        
    </div>

      <!-- data from database end form  -->



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
  </body>
</html>