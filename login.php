<?php include("db.php") ?>
<?php include("includes/header.php") ?>

<?php 

    if(isset($_SESSION['user_id'])){
        header("Location: intasks.php");
    }    

    $message='';
    if(!empty($_POST['email']) && !empty($_POST['password'])){
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $query = "SELECT * FROM userss WHERE email = '$email' AND password = '$password'";
        $records = mysqli_query($conn, $query);
        if($records->num_rows > 0){
            $row = mysqli_fetch_assoc($records);
            $_SESSION['user_id']=$row['id'];
            header('Location: login.php');
        }else{
            $message = 'no correo o contrasena incorrectas';
            header("Location: login.php");
        } 
        
    }

?>

<?php  if(!$message): ?>
    <p> <?php echo $message; ?> </p>
<?php endif; ?>

<body>
   
<div class="container p-4">
    <div class="col-md-4">
        <div class="card card-body">
            <form action="login.php" method="POST">
                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="Enter your email" autofocus>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Enter your password">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success btn-block" value="send">
                </div>
            </form>
        </div>
    </div>
</div>
 

</body>

<?php include("includes/footer.php") ?>