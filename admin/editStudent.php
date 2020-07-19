<?php
    include '../includes/connection.php';
    $id = $_GET['id'];
    if(isset($id)){
        //echo $id."<br>";
        $sql = "SELECT * FROM student WHERE id='$id'";
        //echo $sql;
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)>0) {
            $row1 = mysqli_fetch_assoc($result);
        }
        else{
            echo "<script>alert('No Records Found !');</script>";
            echo "<script>window.loaction='ListStudent.php';</script>";
        }
    }
?>
<!DOCTYPE html>
<html>
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
                                Update Mentor Information
                            </h2>
                        </div>
                        <div class="body">
                            <form method="POST">
                                
                                        <label for="email_address">Email Address</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="email_address" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2}\.[a-z]{2}$" class="form-control" value="<?php echo $row1['email'];?>" placeholder="Enter faculty email address" required="required">
                                            </div>
                                        </div>
                                        <label for="name">Rollno</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="name"  name="rollno" pattern="[0-9]{2}[A-Za-z]{3}[0-9]{3}" class="form-control" value="<?php echo $row1['rollno'];?>" placeholder="Enter faculty name" required="required">
                                            </div>
                                        </div>
                                        <!--<label for="password">Password</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" id="password" class="form-control" value="<?php //echo md5('changeme');?>" placeholder="Enter your password" readonly>
                                            </div>
                                        </div>!-->
                                        <label for="cabin">Mentor_id</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="cabin"  name="mentor_id" readonly="readonly" class="form-control" value="<?php echo $row1['mentor_id'];?>" placeholder="Enter faculty name" required>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <button type="submit" name="add" class="btn btn-primary waves-effect">UPDATE</button>
                                            </div>
                                            <div class="col-md-6"></div>
                                            <div class="col-md-2">
                                                <button type="submit" name="back" class="btn btn-primary waves-effect">BACK</button>
                                            </div>
                                        </div>
                            </form>
                            <?php
                                if(isset($_POST['add'])){
                                    $rollno = $_POST['rollno'];
                                    $email  = $_POST['email'];
                                    // $pswd  = "changeme";
                                    $mentor_id = $_POST['mentor_id'];
                                    $sql = "UPDATE student SET rollno='$rollno',email='$email',mentor_id='$mentor_id' WHERE id=$id";
                                    if (mysqli_query($conn, $sql)) {
                                       echo "<script>alert('Student Details Updated !')</script>";   
                                       echo "<script>window.location='ListStudent.php'</script>";            
                                    }
                                    else{
                                        echo "<script>alert('Error Occured Please Check Records !')</script>";
                                        echo "<script>window.location='ListStudent.php?id=$mentor_id'</script>";
                                    }
                                }
                                elseif (isset($_POST['back'])) {
                                    echo "<script>window.location='ListStudent.php'</script>";
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