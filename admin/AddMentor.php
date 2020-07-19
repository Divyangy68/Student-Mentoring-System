<?php
    include '../includes/connection.php';
?>
<!DOCTYPE html>
<html>
<head>
    <style>
    .btn1 {
        display: inline-block;
        padding: 6px 12px;
        margin-bottom: 0;
        font-weight: normal;
        line-height: 1.42857143;
        text-align: left;
        white-space: nowrap;
        vertical-align: middle;
        touch-action: manipulation;
        cursor: pointer;
        user-select: none;
        background-image: none;
        border: 2px solid;
        border-radius: 5px;
        border-color: white; 
    }
    </style>
</head>
<body>
    <?php
        include 'Header.php';
        include 'Menu.php';
    ?>
    <section class="content" style="padding-left: 15%; padding-top: 6%;">
        <div class="container-fluid">
            <div class="block-header">
                <h2></h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    <div class="card">
                        <div class="header">
                            <h2 style="color: #30d44e;">
                                Add Mentor Information
                            </h2>
                        </div>
                        <div class="body">
                            <form action="#" method="POST">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="col-md-12">
                                        <label for="email_address">Email Address</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="email_address" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2}\.[a-z]{2}$" placeholder="Enter faculty email address" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="name"> Full Name</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="name"  name="name" class="form-control" pattern="[A-Za-z]+" placeholder="Enter faculty name" required>
                                            </div>
                                        </div>
                                    </div>
                                <div class="col-md-3">
                                    <label for="cabin">Cabin No</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="cabin"  name="cabin" pattern="[A-Za-z]{1}[0-9]{3}" class="form-control" placeholder="Cabin No" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="cabin">Max. Student</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="cabin"  name="max" pattern="[0-9]{2}" class="form-control" placeholder="Max. Student" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" style="padding-left: 15%;"> 
                                    <label for="email_address">Select Department</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input list="browsers" name="dept" placeholder="Select Mentor..." class="btn1" required="required">
                                            <datalist id="browsers">
                                            <?php
                                                $sql = "select * from department";
                                                $result = mysqli_query($conn, $sql);
                                                while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                                                    // $_SESSION['admin_name']=$row['name'];  
                                                    $dept_name = $row['name'];      
                                            ?>
                                                <option><?php echo $dept_name; ?></option>
                                            <?php 
                                                }
                                            ?>
                                            </datalist>
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                                <div class="row">
                                    <div class="col-xs-5"></div>
                                    <button type="submit" name="add" class="btn btn-primary waves-effect">ADD</button>
                                </div>
                            </form>
                            <form action="#" method="POST" enctype="multipart/form-data">
                                <br><br>
                                <label style="padding-left: 45%;">OR</label><br><br>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="col-md-4">
                                        <label for="email_address">Select Department</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input list="browsers1" name="dept1" placeholder="Select Mentor..." class="btn1" required="required">
                                                <datalist id="browsers1">
                                                <?php
                                                    $sql = "select * from department";
                                                    $result = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                                                        // $_SESSION['admin_name']=$row['name'];  
                                                        $dept_name = $row['name'];
                                                ?>
                                                    <option><?php echo $dept_name; ?>    
                                                     </option>           
                                                <?php 
                                                    }
                                                ?>
                                                </datalist>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6" style="padding-left: 15%; padding-top: 5%;"> 
                                        <input type="file" class="btn" name="file" accept=".csv" / required="required"><br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-5"></div>
                                    <button type="submit" name="add1" class="btn btn-primary waves-effect">ADD</button>
                                </div>
                            </form>
                            <?php
                                if(isset($_POST['add'])){
                                    $name = $_POST['name'];
                                    $email = $_POST['email'];
                                    $pswd  = "changeme";
                                    $cabin = $_POST['cabin'];
                                    $max = $_POST['max']; 

                                    $dept_name = $_POST['dept'];
                                    $sqli = "select * from department where name='$dept_name'";
                                    $result = mysqli_query($conn, $sqli);
                                    if (mysqli_num_rows($result) > 0) 
                                    {
                                        $row = mysqli_fetch_assoc($result);
                                        $dept_id = $row['id'];
                                    } 
                                    
                                    $query = "SELECT * from mentor where email='$email'";
                                    $r = mysqli_query($conn,$query);
                                    if(mysqli_num_rows($r)>0)
                                    {
                                        echo "<script>alert('Check Your Data !!! There is Some Already Exists Data !')</script>";
                                        echo "<script>window.location='AddMentor.php'</script>";
                                    }
                                    else
                                    {
                                        $sql = "INSERT INTO mentor (name,email,password,cabin,dept_id,maxallocated) VALUES ('$name','$email','$pswd','$cabin','$dept_id','$max')";

                                        if (mysqli_query($conn, $sql)) {
                                           echo "<script>alert('Mentor Details Added !')</script>";
                                           echo "<script>window.location='AddMentor.php'</script>";
                                        }
                                        else{
                                            echo "<script>alert('Error Occured Please Check Records !')</script>";
                                            echo "<script>window.location='AddMentor.php'</script>";
                                        }
                                    }
                                   
                                }
                                elseif (isset($_POST['add1'])) 
                                {
                                    $result1 = 0;
                                    $pswd  = "changeme";
                                    $dept_name = $_POST['dept1'];
                                    $sqli = "select * from department where name='$dept_name'";
                                    $result = mysqli_query($conn, $sqli);
                                    if (mysqli_num_rows($result) > 0) 
                                    {
                                        $row = mysqli_fetch_assoc($result);
                                        $dept_id = $row['id'];
                                    } 
                                
                                    $filename = $_FILES['file']['tmp_name'];
                                    if ($_FILES['file']['size'] > 0) 
                                    {
                                        $file = fopen($filename, 'r');

                                        while (($data = fgetcsv($file,10000,',')) !== FALSE) 
                                        {   
                                            $email1 = $data[1];
                                            $sql1 = "SELECT * from mentor where email='$email1'";
                                            $result1 = mysqli_query($conn, $sql1);
                                        }
                                        if (mysqli_num_rows($result1)>0) 
                                        {
                                            echo "<script>alert('Check Your CSV File There is Some Already Exists Data !')</script>";
                                            echo "<script>window.location='AddMentor.php'</script>";
                                        }
                                        else
                                        {
                                            $file = fopen($filename, 'r');
                                            $result2 = 0;
                                            while (($data = fgetcsv($file,10000,',')) !== FALSE) 
                                            {
                                                $em = $data[0];
                                                $ro = $data[1];
                                                if($em != '' AND $ro != '')
                                                {
                                                    $sql = "INSERT INTO mentor (name,email,password,cabin,dept_id,maxallocated) VALUES ('$data[0]','$data[1]','$pswd','$data[2]','$dept_id','$data[3]')";
                                                    $result2 = mysqli_query($conn, $sql);
                                                }
                                            }
                                            if ($result2) 
                                            {
                                               echo "<script>alert('Mentor Details Added !')</script>";
                                               echo "<script>window.location='AddMentor.php'</script>";
                                            }
                                            else
                                            {
                                                echo "<script>alert('Error Occured Please Check Records in CSV File.\n It Contain 4 values : Name, Email, Cabin_No & Maximum Student Allocation !')</script>";
                                                echo "<script>window.location='AddMentor.php'</script>";
                                            }
                                        }
                                        fclose($file);
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
        include 'Footer.php';
    ?>
</body>
</html>