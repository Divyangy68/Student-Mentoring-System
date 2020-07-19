<?php 
session_start();
include("../../includes/connection.php");
if(isset($_POST['query_submit']))
{
    $subject=mysqli_real_escape_string($conn,$_POST['subject']);
    $msg=mysqli_real_escape_string($conn,$_POST['message']);
    $email=$_SESSION['student_email'];
    $mentorid=$_SESSION['student_mentor'];
    $query="INSERT INTO query (email,mentor_id,subject,message,status,datetime) VALUES ('$email','$mentorid','$subject','$msg',0,CURRENT_TIMESTAMP());";
    $result=mysqli_query($conn,$query);
    if($result)
    {
        // $id = $_SESSION['qid'];
        // $sql = "UPDATE query SET status='0' WHERE id='$id'";
        // $result1 = mysqli_query($conn, $sql);
        // if($result1)
        // {
?>
    <script>window.location.href ="../PendingQuery.php";</script>
<?php
        // }
    }
}
?>