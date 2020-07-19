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
            <!-- <div class="block-header">
                <h2>
                    JQUERY DATATABLES
                    <small>Taken from <a href="https://datatables.net/" target="_blank">datatables.net</a></small>
                </h2>
            </div> -->
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Mentor Data
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Mentor Name</th>
                                            <th>Email ID</th>
                                            <th>Cabin No</th>   
                                            <th><center>Max Allocation / Total Allocated</center></th>           
                                         	<th>Edit</th>
                                            <th>Remove</th>
                                        </tr>
                                    </thead>                                 
                                    <tbody>
                                        <?php
                                            $sql = "SELECT * FROM mentor";
                                            $result = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($result) > 0) {
                                                // output data of each row
                                                while($row = mysqli_fetch_assoc($result)) {
                                            ?> 
                                            <tr>
                                                <td><?php echo $row['name'];?></td>
                                                <td><?php echo $row['email'];?></td>
                                                <td><?php echo $row['cabin'];?></td>
                                                <td><center><?php echo $row['maxallocated'];?> / <?php echo $row['totalallocated'];?></center></td>
                                                <td><a href="editMentor.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure to update ?')"><center><i class="material-icons">create</i></center></a></td>
                                                <td><a href="deleteMentor.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure to delete record ?')"><center><i class="material-icons">delete</i></center></a></td>
                                            </tr>
                                            <?php
                                                }
                                            
                                            } 
                                        ?>                         
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>
    <?php
        include 'Footer.php';
    ?>
</body>
</html>