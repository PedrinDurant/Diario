<?php include("db.php") ?>
<?php include('includes/header.php') ?>

<?php 
    if(isset($_SESSION['user_id'])){
        $user = null;
        $id = $_SESSION['user_id'];
        $query = "SELECT * FROM userss WHERE id=$id";
        $result = mysqli_query($conn,$query);
        if($result->num_rows > 0){
            $row = mysqli_fetch_assoc($result);
            $user= $row;
        }
    }
?>

<?php if(!empty($user)){ ?>
    <div class ="container">
        <h5>Hola, Bienvenido a notas dias o tablas de tareas <?php echo $user['email']; ?> </h5>
        <h5><a href="logout.php">Logout</a></h5>
    </div>
<?php }?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-body">
                <form action="save_task.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Ingresta el titulo">
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control" placeholder="Ingresa la descripcion"></textarea>
                    </div> 
                    <div class="form-group">
                        <input type="submit" class="btn btn-success btn-block" name="guardado" value="guardar">
                    </div>    
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <th>Titulo</th>
                    <th>descripcion</th>
                    <th>Fecha de creacion</th>
                    <th>operaciones</th>
                </thead>
                <body>
                    <?php  // relacionar los id de usuario y la tablas
                     
                            $id = $_SESSION['user_id'];
                            $query = "SELECT * FROM tasks INNER JOIN userss WHERE tasks.usuario_id = $id";
                            $result = mysqli_query($conn,$query);
                            while($row = mysqli_fetch_array($result)){?>
                                <tr>
                                    <td> <?php echo $row['title']; ?> </td>
                                    <td> <?php echo $row['description']; ?> </td>
                                    <td> <?php echo $row['created_at']; ?> </td>
                                    <td>
                                        <a href="edit_task.php?idt=<?php echo $row['idt']?>" class="btn btn-dark" >
                                            edit
                                        </a>
                                        <a href="delete_task.php?idt=<?php echo $row['idt']?>" class="btn btn-dark" >
                                            delete
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>                     
                </body>
            </table>
        </div>
    </div>
</div>
<!-- SELECT nombres, ape_paterno, ape_materno FROM alumnos
INNER JOIN cursos 
WHERE alumnos.id_curso = cursos.id_curso               //04122793928 -->





<?php include('includes/footer.php')?>