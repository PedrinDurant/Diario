<?php include("db.php") ?>
<?php include("includes/header.php") ?>

<?php
    $message='';

    if(!empty($_POST['email']) && !empty($_POST['password'])){
       $email = $_POST['email'];
       $password = md5($_POST['password']);
       //$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
       $query="INSERT INTO userss(email,password) VALUE ('$email','$password')";
       $records = mysqli_query($conn, $query);

        if(!$records){
            die('db not connected');
        }else{
            $message = 'Successfully created a new user';
            $_SESSION['message']= $message;
            $_SESSION['message_type'] = 'success';
            header("location: index.php");
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
                <form action="signup.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Enter your password">
                    </div>
                    <div class="form-group">
                        <input type="password" name="confirm_password" class="form-control" placeholder="confirm password">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success btn-block" value="send">
                    </div>
                </form>
                <div class="container center">
                    <h5>SignUp</h5>
                    <span> you have accout?<a href="login.php" class="waves-effect btn-success btn ">Login</a></span>
                </div>
            </div>
        </div>
    </div>
</body>