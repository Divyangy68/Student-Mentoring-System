<?php
    //include 'loginCheck.php';
    include '../includes/connection.php';
    $email = $_SESSION['student_email'];
    $sql="SELECT * FROM student where email='$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $status = $row['data_status'];
        if($status==0){
            // redirect to form if data not filled or not approved
            echo "<script>window.location='url'</script>";
        }else{
            // redirect to form if data filled and approve
            echo "<script>window.location='url'</script>";
        }
    } else {
        // if query is not executed redirect to page
        echo "<script>window.location='url'</script>";
    }
?>