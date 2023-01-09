<?php include("db.php") ?>
<?php include("includes/header.php") ?>



<?php if(isset($_SESSION['message'])){ ?>
  <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
    <?= $_SESSION['message']?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span   span aria-hidden="true">&times;</span>
      </button>
  </div>
<?php session_unset();} ?>


<body>

<div class="container p-7">
  <div class="row-md-3">
    <div class="col-sm-4">
      <div class="card">
        <div class="card-body">
          <h3 class="card-text">welcome to your daily notes</h3>
          <a href="login.php" class="btn btn-primary">Login</a> or 
          <a href="signup.php" class="btn btn-primary">SignUp</a>
        </div>
      </div>
    </div>
  </div> 
</div>

   

</body>

<?php include("includes/footer.php") ?>