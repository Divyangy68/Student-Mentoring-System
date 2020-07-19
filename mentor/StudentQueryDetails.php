<?php
    include '../includes/connection.php';
?>
<!DOCTYPE html>
<html>
<body>
<?php
	include 'Header.php';
	include 'Menu.php';
?>
<section class="content" style="padding-top: 2%; padding-left: 20%;">
	<div class="container-fluid">
<!-- Advanced Form Example With Validation -->
                <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-7 col-sm-12 col-md-8 col-lg-9">
                    <div class="card">
                        <div class="header">
                            <h2><center>Student Query Details</center></h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th><center>Roll No</center></th>
                                            <th><center>Email_Id</center></th>  
                                            <th><center>Action</center></th>                                  
                                            <!-- <th style="text-align: right;">Send Response</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $id = $_SESSION['mentor_id'];
                                            $sql = "SELECT * FROM student where mentor_id='$id'";
                                            $result = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($result) > 0) {
                                                // output data of each row
                                                while($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <tr>                                            
                                            <td><center><?php echo $row['rollno'];?></center></td>                  
                                            <td><center><?php echo $row['email'];?></center></td>                                                                                   
                                            <td><center><a href="StudentQueryDetails1.php?emailid=<?php echo $row['email'];?>"><button type="button" class="btn btn-primary btn-lg m-l-15 waves-effect">Click For Details</button></a></center></td>
                                        </tr>
                                        <?php
                                                }
                                            } 
                                            else
                                            {
                                        ?>
                                        <tr>
                                            <td></td>
                                            <td><center>No Records Found</center></td>
                                            <td></td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
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