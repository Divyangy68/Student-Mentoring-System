<?php
    include '../includes/connection.php';
    $id = $_GET['id'];
    if(isset($id))
    {
        //echo $id."<br>";
        $sql1 = "SELECT * from student where id='$id'";
        $result = mysqli_query($conn, $sql1);
        if ($result)
        {
            $r1 = mysqli_num_rows($result);
            $mentor_id = $r1['mentor_id'];

            $sql2 = "SELECT * from mentor where id='$mentor_id'";
            $result1 = mysqli_query($conn, $sql2);
            if($result1)
            {
                $r2 = mysqli_num_rows($result1);
                $totalallocation = $r2['totalallocated'];
                $total = $totalallocation-1;

                $sql3 = "UPDATE mentor SET totalallocated='$total' where id='$mentor_id'";
                $result2 = mysqli_query($conn, $sql3);
                if($result2)
                {
                    $sql = "DELETE FROM student WHERE id='$id'";
                    if (mysqli_query($conn, $sql)) 
                    {
                        echo "<script>alert('Records Deleted !')</script>";
                        header("location:ListStudent.php");
                    }
                    else
                    {
                        echo "<script>alert('No Records Found !')</script>";
                        header("location:ListStudent.php");
                    }
                }
            }
        }
    }
?>