<?php 
include("../../includes/connection.php");

    if(isset($_POST['submit']))
    {        
        $fname=mysqli_real_escape_string($conn,$_POST['fname']);
        $mname=mysqli_real_escape_string($conn,$_POST['mname']);
        $lname=mysqli_real_escape_string($conn,$_POST['lname']);
        $gender=mysqli_real_escape_string($conn,$_POST['gender']);
        $bdate=mysqli_real_escape_string($conn,$_POST['bdate']);
        $rollno=mysqli_real_escape_string($conn,$_POST['rollno']);
        $currentstudy=mysqli_real_escape_string($conn,$_POST['currentstudy']);
        $currentsem=mysqli_real_escape_string($conn,$_POST['currentsem']);
        $email=mysqli_real_escape_string($conn,$_POST['email']);
        $mobileno=mysqli_real_escape_string($conn,$_POST['mobileno']);
        $parentmobileno=mysqli_real_escape_string($conn,$_POST['parentmobileno']);
        $address=mysqli_real_escape_string($conn,$_POST['address']);
        $language=mysqli_real_escape_string($conn,$_POST['language']);
        $medium=mysqli_real_escape_string($conn,$_POST['medium']);
        $school=mysqli_real_escape_string($conn,$_POST['school']);
        $tenmarks=mysqli_real_escape_string($conn,$_POST['tenmarks']);
        $twelvemarks=mysqli_real_escape_string($conn,$_POST['twelvemarks']);
        $diplomamarks=mysqli_real_escape_string($conn,$_POST['diplomamarks']);
        $jee=mysqli_real_escape_string($conn,$_POST['jee']);
        $hobbies=mysqli_real_escape_string($conn,$_POST['hobbies']);
        $award=mysqli_real_escape_string($conn,$_POST['award']);
        // $image = $_FILES['image']['tmp_name'];
        // $picture=addslashes(file_get_contents($image));
        $sem1=mysqli_real_escape_string($conn,$_POST['sem1']);
        $sem2=mysqli_real_escape_string($conn,$_POST['sem2']);
        $sem3=mysqli_real_escape_string($conn,$_POST['sem3']);
        $sem4=mysqli_real_escape_string($conn,$_POST['sem4']);
        $sem5=mysqli_real_escape_string($conn,$_POST['sem5']);
        $sem6=mysqli_real_escape_string($conn,$_POST['sem6']);
        $sem7=mysqli_real_escape_string($conn,$_POST['sem7']);
        $sem8=mysqli_real_escape_string($conn,$_POST['sem8']);
        $fsem1=mysqli_real_escape_string($conn,$_POST['fsem1']);
        $fsem2=mysqli_real_escape_string($conn,$_POST['fsem2']);
        $fsem3=mysqli_real_escape_string($conn,$_POST['fsem3']);
        $fsem4=mysqli_real_escape_string($conn,$_POST['fsem4']);
        $fsem5=mysqli_real_escape_string($conn,$_POST['fsem5']);
        $fsem6=mysqli_real_escape_string($conn,$_POST['fsem6']);
        $fsem7=mysqli_real_escape_string($conn,$_POST['fsem7']);
        $fsem8=mysqli_real_escape_string($conn,$_POST['fsem8']);
        


        $query="INSERT INTO profile (email,fname,mname,lname,gender,
                bdate,rollno,course,number,parentnumber,address,
                language,mediumInstruction,school,tenper,12per,
                diploma,jee,hobbies,award,sem1,sem2,sem3,
                sem4,sem5,sem6,sem7,sem8,ktsem1,ktsem2,ktsem3,
                ktsem4,ktsem5,ktsem6,ktsem7,ktsem8,currentsem) VALUES
                 ('$email','$fname','$mname','$lname','$gender','$bdate',
                 '$rollno','$currentstudy','$mobileno',
                 '$parentmobileno','$address','$language',
                 '$medium','$school','$tenmarks','$twelvemarks',
                 '$diplomamarks','$jee','$hobbies',
                 '$award','$sem1','$sem2',
                 '$sem3','$sem4','$sem5','$sem6','$sem7',
                 '$sem8','$fsem1','$fsem2','$fsem3','$fsem4',
                 '$fsem5','$fsem6','$fsem7','$fsem8','$currentsem')";
        $result=mysqli_query($conn,$query);
        if($result)
        {
            $query="UPDATE student SET profileset = '1' WHERE email='$email'";
            $result=mysqli_query($conn,$query);
            if($result)
            {
                $_SESSION['profileset']==1;
                header('Location:../index.php');
            }
            

        }

    }
?>