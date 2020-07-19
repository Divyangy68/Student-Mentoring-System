<?php
    include '../includes/connection.php';
    $id = $_GET['id'];
    if(isset($id)){
        //echo $id."<br>";
        $sql = "SELECT * FROM mentor WHERE id='$id'";
        //echo $sql;
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)>0) {
            $row1 = mysqli_fetch_assoc($result);
        }
        else{
            echo "<script>alert('No Records Found !')</script>";
            echo "<script>window.location='ListMentors.php'</script>";
        }
    }
    $_SESSION['mentorid'] = $id;
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
                            <form action="#" method="POST">
                                        <label for="email_address">Email Address</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2}\.[a-z]{2}$"  class="form-control" value="<?php echo $row1['email'];?>" placeholder="Enter faculty email address" required="required">
                                            </div>
                                        </div>
                                        <label for="name">Name</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="name" pattern="[A-Za-z]+" class="form-control" value="<?php echo $row1['name'];?>" placeholder="Enter faculty name" required="required">
                                            </div>
                                        </div>
                                        <!--<label for="password">Password</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" id="password" class="form-control" value="<?php //echo md5('changeme');?>" placeholder="Enter your password" readonly>
                                            </div>
                                        </div>!-->
                                        <label for="cabin">Cabin</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="cabin" pattern="[A-Za-z]{1}[0-9]{3}" class="form-control" value="<?php echo $row1['cabin'];?>" placeholder="Enter faculty name" required="required">
                                            </div>
                                        </div>
                                        <label for="cabin">Maximum Allocated</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="maxallocated" pattern="[0-9]{2}" class="form-control" value="<?php echo $row1['maxallocated'];?>" placeholder="Enter Maximum Allocation Value" required="required">
                                            </div>
                                        </div>
                                        <label for="cabin">Total Allocation</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="totalallocation" readonly="readonly" pattern="[0-9]{2}" class="form-control" value="<?php echo $row1['totalallocated'];?>" required="required">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-xs-5"></div>
                                            <button type="submit" name="add" class="btn btn-primary waves-effect">UPDATE</button>
                                        </div>
                            </form>
                            <?php
                                if(isset($_POST['add']))
                                {
                                    $name = $_POST['name'];
                                    $email  = $_POST['email'];
                                    $cabin = $_POST['cabin'];
                                    $maxallocated = $_POST['maxallocated'];
                                    
                                    $sql = "UPDATE mentor SET name='$name', email='$email', cabin='$cabin', maxallocated='$maxallocated' WHERE id='$id'";

                                    if (mysqli_query($conn, $sql)) {
                                       echo "<script>alert('Mentor Details Updated !')</script>";
                                       echo "<script>window.location='ListMentor.php'</script>";
                                    }
                                    else{
                                        echo "<script>alert('Error Occured Please Check Records !')</script>";
                                        $_SESSION['mentorid'] = $mentorid;
                                        echo "<script>window.location:'editMentor.php?id='.$mentorid</script>";
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