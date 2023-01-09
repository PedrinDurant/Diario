<?php include("db.php"); ?>
<?php include("includes/header.php"); ?>

<?php 

    if(isset($_GET['idt'])){ // esto lo hago para poder visualizar la tarea que quiero editar y tener sus datos y mostrarlos al momento antes de editar
        $id = $_GET['idt'];
        $query = "SELECT * FROM tasks WHERE idt = $id";
        $result = mysqli_query($conn,$query);

        if(mysqli_num_rows($result)==1){
            $row = mysqli_fetch_array($result);
            $title = $row['title'];
            $description = $row['description'];
        }

    }


    if(isset($_POST['update'])){
        $id = $_GET['idt'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $query ="UPDATE tasks set title = '$title', description = '$description' WHERE idt =$id";
        $result = mysqli_query($conn,$query);
        if(!$result){
            die('Fallo al editar las tareas');
        }
        header("Location: intasks.php");
    }


?>




<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit_task.php?idt=<?php echo $_GET['idt']; ?>" method="POST">
                        <div class="form-grop">
                                <input type="text" name="title" value="<?php echo $title; ?>" class="form-control" placeholder="edita el titulo">
                                <textarea name="description" rows="2" class="form-control" placeholder="edita la descripcion"> <?php echo $description; ?> </textarea>
                                <input type="submit"  name="update" class="btn btn-success btn-block" value="Updatee">
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include("includes/footer.php"); ?>