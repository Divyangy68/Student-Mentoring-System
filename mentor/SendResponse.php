<?php
    include 'loginCheck.php';
    include '../includes/connection.php';

    $id = $_GET['id'];

    if(isset($id)){
        //echo $id."<br>";
        $sql = "SELECT * FROM query WHERE id='$id' AND status='0'";
        //echo $sql;
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)>0) {
            $row = mysqli_fetch_assoc($result);
        }
        else{
            echo "<script>alert('No Records Found !');</script>";
            echo "<script>window.location='StudentDetails.php'</script>";
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
	<section class="content" style="padding-top: 7%;">
        <div class="container-fluid">
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Send Response</h2>
                        </div>
                        <div class="body">
                            <form method="POST">
                            <div class="row clearfix">
	                            <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
	                                <div class="form-group form-float">
	                                    <div class="form-line">
	                                        <input type="email" class="form-control" readonly="readonly" value="<?php echo $row['email'];?>" name="email" required>
	                                        <label class="form-label">Email</label>
	                                    </div>
	                                </div>
	                            </div>
                                <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="<?php echo $row['subject'];?>" readonly="readonly" name="name" required>
                                            <label class="form-label">Subject</label>
                                        </div>
                                    </div>
                                </div>
	                        </div>                            
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea name="msg" cols="30" rows="5" class="form-control no-resize" required></textarea>
                                        <label class="form-label">Message</label>
                                    </div>
                                </div>    
                                <div style="padding-left: 90%;">
                                <button class="btn btn-primary waves-effect" type="submit" name="submit">SUBMIT</button>
                            </div>
                            </form>
                            <?php 
                            if(isset($_POST['submit']))
                            {
                                $id1 = $row['id'];
                                $email = $row['email'];
                                $msg = $_POST['msg'];
                                $sql1 = "UPDATE query SET status='1', mentormsg='$msg', responsedate=CURRENT_TIMESTAMP() WHERE id='$id1'";
                                $result1 = mysqli_query($conn, $sql1);
                                if($result1)
                                {
                                    echo "<script>alert('Response Submitted !');</script>";
                                    echo "<script>window.location='index.php'</script>";              
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Validation -->
        </div>
    </section>
	<?php
		include 'Footer.php';
	?>
</body>
</html>