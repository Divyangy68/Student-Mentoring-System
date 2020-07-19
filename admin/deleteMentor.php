<?php
    include '../includes/connection.php';
    $id = $_GET['id'];
    if(isset($id))
    {
        $sql = "DELETE FROM mentor WHERE id='$id'";
        $sql1 = "UPDATE student SET mentor_id='0' where mentor_id='$id'";
        
        if (mysqli_query($conn, $sql1) AND mysqli_query($conn, $sql)) 
        {
            echo "<script>alert('Records Deleted !');</script>";
            header("location:ListMentor.php");
        }
        else
        {
            echo "<script>alert('No Records Found !');</script>";
            header("location:ListMentor.php");
        }
    }
?>