<?php
//Connecting to the Database
$servername="127.0.0.1";
$username="root";
$password="Bbim@1030";
$database="notes";

//Global variable
$insert = false;
$update = false;
$delete = false;

//Create a connection
$conn = mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    die("Sorry we failed to connect" . mysqli_connect_error());
}



if(isset($_GET['delete'])){
   
    $sno = $_GET['delete'];


    $sql = "DELETE FROM `notes` WHERE `notes`.`sno` = '$sno' " ;
    $result = mysqli_query($conn,$sql);
     


    if($result){
        $update = true;
    }
}



if($_SERVER['REQUEST_METHOD'] == 'POST'){

 if(isset($_POST['sno-edit'])){

    //UPDATING RECORD
    
    
    $updatedSno = $_POST['sno-edit'];
    $updateTitle = $_POST['title-edit'];
    $updatedDescription = $_POST['desc-edit'];

    

    $sql = "UPDATE `notes` SET `title` = '$updateTitle' ,`description` = '$updatedDescription' WHERE `notes`.`sno` = '$updatedSno' ";

    $result = mysqli_query($conn,$sql);

    if($result){
      $update = true;
    }
     

 }
 else{


$_title =  $_POST['title'];
$_description =  $_POST['desc'];

$sql =  "INSERT INTO `notes` (`title`, `description`) VALUES ('$_title','$_description')";
$result = mysqli_query($conn,$sql);

if(!$result){
    echo "Data not inserted" . mysqli_error($conn);
}
else{
    $insert = true;
}
 }

};





?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NOTES APP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">



</head>

<body>
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit This Note</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="index.php" method="POST">
                        <input type="hidden" name="sno-edit" id="sno-edit">
                        <div class="form-group">
                            <div class="mb-3 mt-3">
                                <label for="title" class="form-label">Note Title</label>
                                <input type="text" class="form-control" id="title-edit" name="title-edit" required>
                            </div>
                            <div class="mb-3">
                                <label for="desc" class="form-label">Note Description</label>
                                <textarea class="form-control" id="desc-edit" name="desc-edit" rows="3"
                                    required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Note</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- You can add additional buttons here -->
                </div>
            </div>
        </div>
    </div>











    <!-- <h1>Hello, world!</h1> -->
    <nav class="navbar bg-body-success navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">NOTES APP</span>
        </div>
    </nav>

    <?php

    if($insert){
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Record Inserted Successfully!</strong> 
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    };

    ?>


<?php

if($update){
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    <strong>Record Updated Successfully!</strong> 
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
};

?>

<?php

if($delete){
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    <strong>Record Updated Successfully!</strong> 
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
};

?>







    <div class="container ">
        <h3 class="mt-3">Add Note</h3>
        <form action="index.php" method="POST">
            <div class="form-group">
                <div class="mb-3 mt-3">
                    <label for="title" class="form-label">Note Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label">Note Description</label>
                    <textarea class="form-control" id="desc" name="desc" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add Note</button>
            </div>
        </form>
        <div class="contianer mt-3">

        </div>

        <table class="table" id="example">
            <thead>
                <tr>
                    <th scope="col">SNO</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php

                   $sql = "SELECT * FROM `notes`";
                   $result = mysqli_query($conn,$sql);
                   $sno = 0;


                    while($row = mysqli_fetch_assoc($result)){
                   // echo  "Hello  " . $row['name'] . "  Welcome to  " . $row['dest'];
                    // echo  $row['sno'] . "  Title = " . $row['title'] . "  Description = " . $row['description']; 
                    $sno = $sno + 1;
                    echo "<tr>
                    <th scope='row' sno = ".$row['sno'].">" . $sno . "</th>
                    <td>" . $row['title'] . "</td>
                    <td>" . $row['description'] . "</td>
                    <td>" . " <button  type='button' class='edit-button btn btn-sm btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>
                    <i class='fas fa-edit'></i> Edit
                  </button>&nbsp; &nbsp; <button type='button' class='dlt-button btn btn-sm btn-danger'>
                  <i class='fas fa-trash-alt'></i> Delete
                  </button>" . "</td>
                    </tr>";
                 
                   
                     };

?>


            </tbody>
        </table>





    </div>
    <br>




    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>

    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script src="edit-modal.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 
</body>

</html>