<?php
    include '../includes/connection.php';

    $id = $_GET['id'];
    if(isset($id)){
        $sql = "SELECT * FROM profile WHERE email='$id'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)>0) {
            $row1 = mysqli_fetch_assoc($result);
        }
        else{
            echo "<script>alert('No Records Found !');</script>";
            echo "<script>window.location='ListStudent.php'</script>";
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<style>
	    .btn1 {
	        display: inline-block;
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
<section class="content">
	<div class="container-fluid">
<!-- Advanced Form Example With Validation -->
            <div class="row clearfix" style="padding-top: 3%;">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Profile Information</h2>   
                        </div><br>
                        <div class="body">                                                   
                            <fieldset>                               
                            	<div class="row clearfix">
                            		<div class="col-md-3">
                            			<img id="blah" style="padding-left: 20%;" height="90px" width="200px" class="img-square"  src="data:image/jpeg;base64,<?php echo base64_encode($row['image']);?>"/>
                            		</div>
                            		<div class="col-md-3">
                                		<div class="form-group form-float">
	                                        <div class="form-line">
	                                            <p><?php echo $row1['fname'];?></p>
	                                        </div>
	                                         <div class="help-info">First Name *</div>
	                                    </div>
                            		</div>
                                	<div class="col-lg-3">
	                                    <div class="form-group form-float">
	                                        <div class="form-line">
	                                            <p><?php echo $row1['mname'];?></p>
	                                        </div>
	                                        <div class="help-info">Middle Name *</div>
	                                    </div>
                                	</div>
                                	<div class="col-lg-3">
	                                	<div class="form-group form-float">
	                                        <div class="form-line">
	                                            <p><?php echo $row1['lname'];?></p>
	                                        </div>
	                                        <div class="help-info">Last Name *</div>
	                                    </div>
                            		</div>                             		                               		
                             	</div><br>	
                             	<div class="row clearfix">
	                                <div class="col-md-3">
	                                	<div class="form-group form-float">
	                                        <div class="form-line">
	                                            <p><?php echo $row1['gender'];?></p>
	                                        </div>
	                                        <div class="help-info">Gender *</div>
	                                    </div>
	                                </div>
	                                <div class="col-md-3">
	                                	<div class="form-group form-float">
	                                        <div class="form-line">
	                                            <p><?php echo $row1['bdate'];?></p>
	                                        </div>
	                                        <div class="help-info">Birth Date *</div>
	                                    </div>
	                                </div>
	                                <div class="col-md-3">
	                                	<div class="form-group form-float">
	                                        <div class="form-line">
	                                            <p><?php echo $row1['rollno'];?></p>
	                                        </div>
	                                        <div class="help-info">Roll No *</div>
	                                    </div>
	                                </div>                     
		                            <div class="col-md-3">
	                                	<div class="form-group form-float">
	                                        <div class="form-line">
	                                            <p><?php echo $row1['course'];?></p>
	                                        </div>
	                                        <div class="help-info">Current Course of study *</div>
	                                    </div>
		                            </div>
	                        	</div>
	                        	<div class="row clearfix">
	                        		<div class="col-md-4">
	                               		<div class="form-group form-float">
	                                        <div class="form-line">
	                                            <p><?php echo $row1['email'];?></p>
	                                        </div>
	                                        <div class="help-info">Email *</div>
	                                    </div>
                                	</div>
                                	<div class="col-md-4">
                                		<div class="form-group form-float">
	                                        <div class="form-line">
	                                            <p><?php echo $row1['number'];?></p>
	                                        </div>
	                                        <div class="help-info">Student Mobile info *</div>
	                                    </div>
                                	</div>
                                	<div class="col-md-4">
                                		<div class="form-group form-float">
	                                        <div class="form-line">
	                                            <p><?php echo $row1['parentnumber'];?></p>
	                                        </div>
	                                        <div class="help-info">Parents / Gaurdians Mobile No *</div>
	                                    </div>	                                	
                                	</div>
                                </div>
                                <div class="row clearfix">
                                	<div class="col-md-12">	                             
	                                	<div class="form-group form-float">
	                                        <div class="form-line">
	                                            <p><?php echo $row1['address'];?></p>
	                                        </div>
	                                        <div class="help-info">Address *</div>
                                    	</div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                	<div class="col-md-4">
                                    	<div class="form-group form-float">
	                                        <div class="form-line">
	                                            <p><?php echo $row1['language'];?></p>
	                                        </div>
	                                        <div class="help-info">Student's First Language *</div>
	                                    </div>
		                        	</div>
		                        	<div class="col-md-4">
                                    	<div class="form-group form-float">
	                                        <div class="form-line">
	                                            <p><?php echo $row1['mediumInstruction'];?></p>
	                                        </div>
	                                        <div class="help-info">Medium of instruction till 10+2 *</div>
	                                    </div>			                          
		                        	</div>
		                        	<div class="col-md-4">
		                        		<div class="form-group form-float">
	                                        <div class="form-line">
	                                            <p><?php echo $row1['school'];?></p>
	                                        </div>
	                                        <div class="help-info">Last School / College Attended *</div>
	                                    </div>	                                  
		                        	</div>
                                </div><br>
                                <div class="row clearfix">
                                	<div class="col-md-3">
                                		<div class="form-group form-float">
	                                        <div class="form-line">
	                                            <p><?php echo $row1['tenper'];?></p>
	                                        </div>
	                                        <div class="help-info">10th Percentage(%) *</div>
	                                    </div>                                    		
                                	</div>
                                	<div class="col-md-3">
                                		<div class="form-group form-float">
	                                        <div class="form-line">
	                                            <p><?php echo $row1['12per'];?></p>
	                                        </div>
	                                        <div class="help-info">12th Percentage(%) *</div>
	                                    </div>
                                	</div>
                                	<div class="col-md-3">
                                		<div class="form-group form-float">
	                                        <div class="form-line">
	                                            <p><?php echo $row1['diploma'];?></p>
	                                        </div>
	                                        <div class="help-info">Diploma CGPA *</div>
	                                    </div>
                                	</div>
                                	<div class="col-md-3">
                                		<div class="form-group form-float">
	                                        <div class="form-line">
	                                            <p><?php echo $row1['jee'];?></p>
	                                        </div>
	                                        <div class="help-info">JEE Rank *</div>
	                                    </div>
                                	</div>
                                </div><br>                            
                                <div class="row clearfix">
                                	<div class="col-md-6">
		                        		<div class="form-group form-float">
	                                        <div class="form-line">
	                                            <p><?php echo $row1['hobbies'];?></p>
	                                        </div>
	                                        <div class="help-info">Hobbies / Interest *</div>
	                                    </div>
		                        	</div>
		                        	<div class="col-md-6">
		                        		<div class="form-group form-float">
	                                        <div class="form-line">
	                                            <p><?php echo $row1['award'];?></p>
	                                        </div>
	                                        <div class="help-info">Award / Acheivements *</div>
	                                    </div>
		                        	</div>			                       
                                </div>                                                  
                            </fieldset>

                            <h3>Result Details</h3>
                            <fieldset>
                            	<b>Semester Wise SPI</b><br><br><br>	
                            	<div class="row clearfix">
                            		<div class="col-md-3">
	                                    <div class="form-group form-float">
	                                        <div class="form-line">
	                                            <p><?php echo $row1['sem1'];?></p>
	                                        </div>
	                                        <div class="help-info">Semester - 1 *</div>
	                                    </div>
                                	</div>
                                	<div class="col-md-3">
	                                    <div class="form-group form-float">
	                                        <div class="form-line">
	                                            <p><?php echo $row1['sem2'];?></p>
	                                        </div>
	                                        <div class="help-info">Semester - 2 *</div>
	                                    </div>
                                	</div>
                            		<div class="col-md-3">
	                                    <div class="form-group form-float">
	                                        <div class="form-line">
	                                            <p><?php echo $row1['sem3'];?></p>
	                                        </div>
	                                        <div class="help-info">Semester - 3 *</div>
	                                    </div>
                                	</div>
                                	<div class="col-md-3">
	                                    <div class="form-group form-float">
	                                        <div class="form-line">
	                                            <p><?php echo $row1['sem4'];?></p>
	                                        </div>
	                                        <div class="help-info">Semester - 4 *</div>
	                                    </div>
	                                </div>
	                                <div class="col-md-3">
	                                    <div class="form-group form-float">
	                                        <div class="form-group form-float">
		                                        <div class="form-line">
		                                            <p><?php echo $row1['sem5'];?></p>
		                                        </div>
		                                        <div class="help-info">Semester - 5 *</div>
	                                    	</div>
	                                    </div>
	                                </div>
	                                <div class="col-md-3">
	                                    <div class="form-group form-float">
	                                        <div class="form-line">
	                                            <p><?php echo $row1['sem6'];?></p>
	                                        </div>
	                                        <div class="help-info">Semester - 6 *</div>
	                                    </div>
	                                </div>
	                                <div class="col-md-3">
	                                    <div class="form-group form-float">
	                                        <div class="form-line">
	                                            <p><?php echo $row1['sem7'];?></p>
	                                        </div>
	                                        <div class="help-info">Semester - 7 *</div>
	                                    </div>
	                                </div>
	                                <div class="col-md-3">
	                                    <div class="form-group form-float">
	                                        <div class="form-line">
	                                            <p><?php echo $row1['sem8'];?></p>
	                                        </div>
	                                        <div class="help-info">Semester - 8 *</div>
	                                    </div>
	                                </div>
                                </div>                                
                                <b>Semester wise Failure / NT in no. of Courses</b><br><br>
                            	<div class="row clearfix">
                            		<div class="col-md-3">
	                                    <div class="form-group form-float">
	                                        <div class="form-line">
	                                            <p><?php echo $row1['ktsem1'];?></p>
	                                        </div>
	                                        <div class="help-info">Semester - 1 *</div>
	                                    </div>
                                	</div>
                                	<div class="col-md-3">
	                                    <div class="form-group form-float">
	                                        <div class="form-line">
	                                            <p><?php echo $row1['ktsem2'];?></p>
	                                        </div>
	                                        <div class="help-info">Semester - 2 *</div>
	                                    </div>
                                	</div>
                            		<div class="col-md-3">
	                                    <div class="form-group form-float">
	                                        <div class="form-line">
	                                            <p><?php echo $row1['ktsem3'];?></p>
	                                        </div>
	                                        <div class="help-info">Semester - 3 *</div>
	                                    </div>
                                	</div>
                                	<div class="col-md-3">
	                                    <div class="form-group form-float">
	                                        <div class="form-line">
	                                            <p><?php echo $row1['ktsem4'];?></p>
	                                        </div>
	                                        <div class="help-info">Semester - 4 *</div>
	                                    </div>
	                                </div>
	                                <div class="col-md-3">
	                                    <div class="form-group form-float">
	                                        <div class="form-group form-float">
		                                        <div class="form-line">
		                                            <p><?php echo $row1['ktsem5'];?></p>
		                                        </div>
		                                        <div class="help-info">Semester - 5 *</div>
	                                    	</div>
	                                    </div>
	                                </div>
	                                <div class="col-md-3">
	                                    <div class="form-group form-float">
	                                        <div class="form-line">
	                                            <p><?php echo $row1['ktsem6'];?></p>
	                                        </div>
	                                        <div class="help-info">Semester - 6 *</div>
	                                    </div>
	                                </div>
	                                <div class="col-md-3">
	                                    <div class="form-group form-float">
	                                        <div class="form-line">
	                                            <p><?php echo $row1['ktsem7'];?></p>
	                                        </div>
	                                        <div class="help-info">Semester - 7 *</div>
	                                    </div>
	                                </div>
	                                <div class="col-md-3">
	                                    <div class="form-group form-float">
	                                        <div class="form-line">
	                                            <p><?php echo $row1['ktsem8'];?></p>
	                                        </div>
	                                        <div class="help-info">Semester - 8 *</div>
	                                    </div>
	                                </div>
                                </div>
                            </fieldset> 
                        </div>
                        <a href="ListStudent.php" style="padding-left: 45%;"><button type="button" class="btn btn-primary btn-lg waves-effect">Back</button></a><br><br>
                    </div>
                </div>
            </div>
            <!-- #END# Advanced Form Example With Validation -->
        </div>
    </section>
    <?php
    	include 'Footer.php';
    ?>
</body>
</html>