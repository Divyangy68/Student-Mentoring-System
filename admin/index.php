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
            </div>
                <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Appointment Status</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Student Email Id</th>
                                            <th>Subject</th>
                                            <th>Mentor_Id</th>
                                            <th>Query</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql = "SELECT * FROM query";
                                            $result = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($result) > 0) {
                                                // output data of each row
                                                while($row = mysqli_fetch_assoc($result)) 
                                                {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['id'];?></td>
                                            <td><?php echo $row['email'];?></td>
                                            <td><?php echo $row['subject'];?></td>
                                            <td><?php echo $row['mentor_id'];?></td>
                                            <td><?php echo $row['message'];?></td>
                                            <?php
                                                $check = $row['status'];
                                                if($check == 1)
                                                {
                                            ?>
                                            <td><span class="label bg-green">Complete</span></td>
                                            <?php
                                                }
                                                else
                                                {
                                            ?>
                                            <td><span class="label bg-red">Pending</span></td>
                                            <?php
                                                }
                                            ?>
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