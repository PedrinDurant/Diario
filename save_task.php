<?php include("db.php");

    if(isset($_POST['guardado'])){
        $title = $_POST['title'];
        $description = $_POST['description'];
        $id = $_SESSION['user_id'];
        $query = "INSERT INTO tasks(title, description, usuario_id) VALUES('$title','$description','$id')";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die('fallo al guardar tareas');
        }
        header("Location: intasks.php");     
    }

?>
