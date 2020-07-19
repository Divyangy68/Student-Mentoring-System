<?php
    include '../includes/connection.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <section class="content" style="padding-left: 15%; padding-top: 10%;">
        <div class="container-fluid">
            <div class="block-header">
                <h2></h2>
            </div>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                    <div class="card">
                        <div class="header">
                            <h2 style="color: #30d44e;">
                                Add Student Information
                            </h2>
                        </div>
                        <div class="body">
                            <form action="#" method="POST" enctype="multipart/form-data">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="col-md-4">
                                        <label for="email_address">Mentors List...</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input list="browsers" name="mentor" placeholder="Select Mentor..." class="btn1" id="mentork" autocomplete="off" required="required">
                                                <datalist id="browsers" >
                                                <?php
                                                    $sql = "select * from mentor";
                                                    $result = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) 
                                                    {
                                                        $mentor_name = $row['name'];
                                                        $mentor_id = $row['id']; 
                                                        $totalallocation = $row['totalallocated']; 
                                                        $maxallocation = $row['maxallocated'];

                                                        if($totalallocation!=$maxallocation)
                                                        { 
                                                           echo '<option>'.$mentor_name.'</option>'; 
                                                        }  
                                                    } 
                                                ?>
                                                </datalist>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6" style="padding-left: 15%; padding-top: 5%;">       
                                        <input type="file" class="btn" name="file" accept=".csv" required="required">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-5"></div>
                                    <button type="submit" name="add" class="btn btn-primary waves-effect">ADD</button>
                                </div>
                            </form>
                            <?php
                                $maxallocation = 0;
                                $totalallocation = 0;
                                if(isset($_POST['add']))
                                {
                                    $mentor_id = 0;
                                    $pswd  = "changeme";
                                    $mentor_name = $_POST['mentor'];
                                    $sqli = "select * from mentor where name='$mentor_name'";
                                    $result = mysqli_query($conn, $sqli);

                                    if (mysqli_num_rows($result) > 0) 
                                    {
                                        $row = mysqli_fetch_assoc($result);
                                        $mentor_id = $row['id'];
                                        $totalallocation = $row['totalallocated'];
                                        $maxallocation = $row['maxallocated'];
                                    } 
                                
                                    $filename = $_FILES['file']['tmp_name'];
                                
                                    if ($_FILES['file']['size'] > 0) 
                                    {
                                        $file = fopen($filename, 'r');
                                        $tmp = 0;

                                        while (!feof($file)) 
                                        {
                                            $content = fgets($file);
                                            if($content)
                                            {
                                                $tmp++;
                                            }
                                        }
                                        fclose($file);

                                        $x = $maxallocation - $totalallocation;

                                        if($totalallocation!=$maxallocation && $tmp<=$x)
                                        {   
                                        	$re = 0;
                                        	$file1 = fopen($filename, 'r');
                                        	while (($data = fgetcsv($file1,10000,',')) !== FALSE) 
                                            {
                                            	$roll = $data[0];
                                            	$email1 = $data[1];
                                                $sql2 = "SELECT * from student where email='$email1' AND rollno='$roll'";
                                                $result2 = mysqli_query($conn, $sql2);
                                                if (mysqli_num_rows($result2) > 0) 
                                            	{
                                            		$re++;
                                            	}	
                                            }
                                            if ($re > 0) 
                                            {
                                                echo "<script>alert('Check Your CSV File There is Some Already Exists Data !')</script>";
                                                echo "<script>window.location='AddStudent.php'</script>";
                                            }
                                            else
                                            {
                                            	$file1 = fopen($filename, 'r');
                                            	$result3 = 0;
                                            	while (($data = fgetcsv($file1,10000,',')) !== FALSE) 
	                                            {
	                                            	$em = $data[1];
	                                            	$ro = $data[0];
	                                            	if($em != '' AND $ro != '')
	                                            	{
		                                            	$totalallocation = $totalallocation + 1;
		                                                $sql = "INSERT INTO student (rollno,email,mentor_id,password,registerdate) VALUES ('$data[0]','$data[1]','$mentor_id','$pswd',CURRENT_TIMESTAMP())";
		                                                $result3 = mysqli_query($conn, $sql);
		                                            }
	                                            }
	                                            if ($result3) 
	                                            {
	                                                $sql1 = "UPDATE mentor SET totalallocated='$totalallocation' WHERE id='$mentor_id'";           
	                                                $result1 = mysqli_query($conn,$sql1);
	                                                if($result1)
	                                                {
	                                                    echo "<script>alert('Student Details Added !')</script>";
	                                                    echo "<script>window.location='AddStudent.php'</script>";
	                                                }
	                                                else
	                                                {
	                                                    echo "<script>alert('Student Details Not Added !')</script>";
	                                                    echo "<script>window.location='AddStudent.php'</script>";
	                                                }
	                                            }
                                            }
                                            fclose($file1);
                                        }
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
<!-- </html> -->