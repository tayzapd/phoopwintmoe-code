<?php 
include 'config.php';
session_start();

$error = $_FILES['photo']['error'];
$ptname = $_FILES['photo']['name'];
$tmp = $_FILES['photo']['tmp_name'];
$type = $_FILES['photo']['type'];

try {
    if($type == "image/jpeg" || $type =="image/png"){
        move_uploaded_file($tmp, "img/$ptname");
        $userName = "Tayza";
        $userEmail = "Tayza";
        mysqli_query($conn,"INSERT INTO `user` (name,email,phato) VALUES ('$userName','$userEmail','$ptname')");
    }else{
    }
} catch(\Exception $e) {
    echo "$e";
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"  >
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center mt-5">
        <div class="card shadow-lg" style="width: 18rem;">
            <img src="img/manu.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h2>User Profile</h2>
            </div>
            <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="input-group">
                    <input type="file" name="photo" id="" class="form-control">
                    <button class="btn btn-secondary">Upload</button>
                </div>
            </form>
            <div class="border border-1 w-100 p-4 mt-5">
                <div>
                    <h3><?php echo $_SESSION['username']?></h3>
                </div>
                <div class="mt-1">
                    <b>email:</b>
                    <span><?php echo $_SESSION['email']?></span>
                </div>
                <button class="btn btn-danger mt-5">
                    <a href="logout.php" class="text-decoration-none text-white">Logout</a>
                </button>
            </div>
            </div>
        </div>

        


        <?php if(file_exists("img/$ptname")):?>
        
        <?php endif?>

        

        
    </div>
</body>
</html>