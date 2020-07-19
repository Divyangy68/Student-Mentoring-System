<?php 
include("../../includes/connection.php");
session_start();
if(isset($_POST['submit1']))
{
    $a=isset($_POST['a']) ? 'yes' : 'no';
    $b=isset($_POST['b']) ? 'yes' : 'no';
    $c=isset($_POST['c']) ? 'yes' : 'no';
    $d=isset($_POST['d']) ? 'yes' : 'no';
    $e=isset($_POST['e']) ? 'yes' : 'no';
    $f=isset($_POST['f']) ? 'yes' : 'no';
    $g=isset($_POST['g']) ? 'yes' : 'no';
    $personal=mysqli_real_escape_string($conn,$_POST['personal']);
    $study=mysqli_real_escape_string($conn,$_POST['study']);
    $career=mysqli_real_escape_string($conn,$_POST['career']);
    $other=mysqli_real_escape_string($conn,$_POST['other']);
    $email=mysqli_real_escape_string($conn,$_SESSION['student_email']);
    $query="INSERT INTO review(email,poorperf,attendance,course,
            subject,ufm,language,misbehaviour,personal,study,career,other,datetime) 
            VALUES ('$email',
            '$a','$b','$c','$d','$e','$f','$g','$personal','$study','$career','$other',CURRENT_TIMESTAMP())";
    $result=mysqli_query($conn,$query);
    if($result)
    {
        $sql = "UPDATE student SET studentreview='1' WHERE email='$email'";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            echo "<script>alert('Review Submitted Successfully')</script>";
            echo "<script>window.location='../index.php'</script>";
        }
    }
}
?>