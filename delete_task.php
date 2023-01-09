<?php 
    include("db.php");

    if(isset($_GET['idt'])){
        $id = $_GET['idt'];
        $query = "DELETE FROM tasks WHERE idt = $id";
        $result = mysqli_query($conn,$query);
        if(!$result){
            die('fallo al borrar las tareas');
        }

        header("Location: intasks.php");
    }

?>