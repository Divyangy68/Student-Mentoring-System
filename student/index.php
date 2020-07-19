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
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2><center>DASHBOARD</center></h2>
            </div><br>
                <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Appointment Status</h2>
                        </div>
                        <div class="body">
                            <form method="POST" action="AskQuery.php">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>Email</th>
                                            <th>Subject</th>
                                            <th>Mentor Response</th>
                                            <th>Status</th>
                                            <!-- <th style="text-align: right;">Send Response</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $email = $_SESSION['student_email'];
                                            $sql = "SELECT * FROM query WHERE status='1' And email='$email'";
                                            $result = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($result) > 0) {
                                                // output data of each row
                                                while($row = mysqli_fetch_assoc($result)) 
                                                {
                                                    $_SESSION['qid'] = $row['id'];
                                                    $_SESSION['sub'] = $row['subject'];
                                        ?>
                                        <tr>
                                            <td><?php echo $row['email'];?></td>
                                            <td><?php echo $row['subject'];?></td>
                                            <td><?php echo $row['mentormsg'];?></td>
                                            <td><span class="label bg-green">Complete</span></td>
                                            <td><center><button type="submit" name="query_submit" class="btn btn-primary btn-lg m-l-15 waves-effect">Send Response</button></center></td>
                                        </tr>
                                        <?php
                                                }
                                            } 
                                            else
                                            {
                                        ?>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><center>No Records Found</center></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                        </div>
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