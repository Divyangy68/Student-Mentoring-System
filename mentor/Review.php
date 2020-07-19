<?php
    include '../includes/connection.php';
    $id = $_GET['emailid'];
    
    if(isset($id))
    {
        $sql = "SELECT * FROM review WHERE email='$id'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)>0) 
        {
            $row1 = mysqli_fetch_assoc($result);
        }
        else
        {
            echo "<script>alert('No Records Found !');</script>";
            echo "<script>window.location='MentorReview.php'</script>";
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
<section class="content">
	<div class="container-fluid">
<!-- Advanced Form Example With Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Review - I                              
                            </h2>                          
                       </div>
                        <div class="body">
                            <h2 class="card-inside-title">Type of difficulty Faced By Student</h2><br>	
                            <div class="demo-checkbox">
                            	<div class="row clearfix">
                            		<div class="col-md-3">
                            			<b>1 .</b>&nbsp;
                                        <?php
                                            $check = $row1['poorperf'];
                                            $_SESSION['reviewid'] = $row1['id'];
                                            $_SESSION['emailid'] = $id;
                                            if($check == 'yes')
                                            {
                                        ?>
                                            <input type="checkbox" id="basic_checkbox_1" checked />
                                        <?php 
                                            }
                                            else
                                            {
                                        ?>
                                            <input type="checkbox" id="basic_checkbox_1" readonly="readonly" />
                                        <?php
                                            }
                                        ?>
                                		<label for="basic_checkbox_1">Poor Performance in Exams</label>
                            		</div>
                            		<div class="col-md-3">
                            			<b>2 .</b>&nbsp;
                                        <?php
                                            $check = $row1['attendance'];
                                            if($check == 'yes')
                                            {
                                        ?>
                                            <input type="checkbox" id="basic_checkbox_1" checked />
                                        <?php 
                                            }
                                            else
                                            {
                                        ?>
                                            <input type="checkbox" id="basic_checkbox_1" readonly="readonly" />
                                        <?php
                                            }
                                        ?>
                                		<label for="basic_checkbox_2">Attendance Related</label>
                            		</div> 
                            		<div class="col-md-3">
                            			<b>3 .</b>&nbsp;
                                        <?php
                                            $check = $row1['course'];
                                            if($check == 'yes')
                                            {
                                        ?>
                                            <input type="checkbox" id="basic_checkbox_1" checked />
                                        <?php 
                                            }
                                            else
                                            {
                                        ?>
                                            <input type="checkbox" id="basic_checkbox_1" readonly="readonly" />
                                        <?php
                                            }
                                        ?>
                                		<label for="basic_checkbox_3">Course Registration</label>
                            		</div>
                            		<div class="col-md-3">
                            			<b>4 .</b>&nbsp;
                                        <?php
                                            $check = $row1['subject'];
                                            if($check == 'yes')
                                            {
                                        ?>
                                            <input type="checkbox" id="basic_checkbox_1" checked />
                                        <?php 
                                            }
                                            else
                                            {
                                        ?>
                                            <input type="checkbox" id="basic_checkbox_1" readonly="readonly" />
                                        <?php
                                            }
                                        ?>
                                		<label for="basic_checkbox_4">Subject Difficulties</label>
                            		</div>
                            	</div>  
                            	<div class="row clearfix">
                            		<div class="col-md-4">
                            			<b>5 .</b>&nbsp;
                                        <?php
                                            $check = $row1['ufm'];
                                            if($check == 'yes')
                                            {
                                        ?>
                                            <input type="checkbox" id="basic_checkbox_1" checked />
                                        <?php 
                                            }
                                            else
                                            {
                                        ?>
                                            <input type="checkbox" id="basic_checkbox_1" readonly="readonly" />
                                        <?php
                                            }
                                        ?>
                                		<label for="basic_checkbox_8">Exam UFM</label>
                            		</div>
                            		<div class="col-md-4">
                            			<b>6 .</b>&nbsp;
                                        <?php
                                            $check = $row1['language'];
                                            if($check == 'yes')
                                            {
                                        ?>
                                            <input type="checkbox" id="basic_checkbox_1" checked />
                                        <?php 
                                            }
                                            else
                                            {
                                        ?>
                                            <input type="checkbox" id="basic_checkbox_1" readonly="readonly" />
                                        <?php
                                            }
                                        ?>
                                		<label for="basic_checkbox_6">Communication (Language) Problem</label>
                            		</div> 
                            		<div class="col-md-4">
                            			<b>7 .</b>&nbsp;
                                        <?php
                                            $check = $row1['misbehaviour'];
                                            if($check == 'yes')
                                            {
                                        ?>
                                            <input type="checkbox" id="basic_checkbox_1" checked />
                                        <?php 
                                            }
                                            else
                                            {
                                        ?>
                                            <input type="checkbox" id="basic_checkbox_1" readonly="readonly" />
                                        <?php
                                            }
                                        ?>
                                        <input type="checkbox" id="basic_checkbox_7" checked />
                                		<label for="basic_checkbox_7">Misbehavior</label>
                            		</div>                            
                            	</div><br>            
                            	<div class="row clearfix">                            		
                            		<div class="col-lg-12">
	                                	<div class="form-group form-float">
	                                        <div class="form-line">
	                                            <p><?php echo $row1['personal'];?></p>
	                                        </div>
                                            <div class="help-info">8 . Personal ( Stress / Depression / Health / Financial / Friendship / Peer Pressure / Competition / Social – emotional, Home Sickness, etc.)</div>
	                                    </div>
                                	</div>                            		
                            	</div><br>         
                            	<div class="row clearfix">            
	                            	<div class="col-lg-6">
	                                	<div class="form-group form-float">
	                                        <div class="form-line">
	                                            <p><?php echo $row1['study'];?></p>
	                                        </div>
                                            <div class="help-info">9 . Study ( Assignments / Tutorial / Lab / Special Assignment )</div>
	                                    </div>
                                	</div>                            		
                            		<div class="col-lg-6">
	                                	<div class="form-group form-float">
	                                        <div class="form-line">
                                                <p><?php echo $row1['career'];?></p>	                              
	                                        </div>
                                            <div class="help-info">10 . Career Choice / Placement / Competitive Exams</div>
	                                    </div>
                            		</div> 
	                            </div><br>
	                            <div class="row clearfix">
                                	<div class="col-md-12">
	                                    <div class="form-group form-float">
	                                        <div class="form-line">
	                                            <p><?php echo $row1['other'];?></p>
	                                        </div>
                                            <div class="help-info">11 . Any Others</div>
	                                    </div>
	                                </div>
                                </div>                                                                                         
                            </div>
                        </div>

                        <div class="body">
                            <form method="POST">
                            <h2 class="card-inside-title">Mentor's Remarks on Students Difficulty</h2><br><br> 
                            <div class="demo-checkbox">
                                <div class="row clearfix">
                                    <div class="col-lg-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <p><?php echo $_SESSION['mentor_name'];?></p>
                                            </div>
                                            <div class="help-info">1 . Name of Mentor</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <p>
                                                <?php 
                                                    date_default_timezone_set("Asia/Kolkata");
                                                    echo date("d - m - Y");?>
                                                </p>
                                            </div>
                                            <div class="help-info">2 . Date Of Mentoring</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <p><?php echo $row1['id'];?></p>
                                            </div>
                                            <div class="help-info">3 . Mentoring / Meeting Number</div>
                                        </div>
                                    </div>
                                </div>                                               
                                <div class="row clearfix">                                  
                                    <div class="col-lg-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">                                 
                                                <input type="select" list="browser1" name="category" class="btn1 form-control" required>
                                                <datalist id="browser1">
                                                    <option>Slow Learner</option>
                                                    <option>Fast Learner</option>                     
                                                    <option>Weak</option>                                       
                                                </datalist>
                                                <label class="form-label">4 . Academic Category of a Student</label>
                                            </div>
                                        </div>                                        
                                    </div> 
                                    <div class="col-lg-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">                                 
                                                <input type="select" list="browser2" name="problem" class="btn1 form-control" required>
                                                <datalist id="browser2">
                                                    <option>Attendance record</option>
                                                    <option>Appearance</option>                     
                                                    <option>Attitude</option>                                                    
                                                </datalist>
                                                <label class="form-label">5 . General Findings</label>
                                            </div>
                                        </div>                                        
                                    </div>                                 
                                </div>                         
                                <div class="row clearfix">            
                                    <div class="col-lg-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <textarea cols="30" rows="3" class="form-control no-resize" name="problemdesc" required></textarea>
                                                <label class="form-label">6 . According to you, what is the exact problem of a student? (Describe the findings here)</label> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6" style="padding-top: 38px;">
                                        <div class="form-group form-float">
                                            <div class="form-line">                                 
                                                <input type="select" list="browser3" name="problemcat" class="btn1 form-control" required>
                                                <datalist id="browser3">
                                                    <option>Psychological</option>
                                                    <option>Academic</option>                     
                                                    <option>Career Choice</option>
                                                    <option>Any Other</option>
                                                </datalist>
                                                <label class="form-label">7 . Problem Category</label>
                                            </div>
                                        </div>                                        
                                    </div>                                                
                                </div>
                                <div class="row clearfix">      
                                <div class="col-lg-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <textarea name="sugg" cols="30" rows="3" class="form-control no-resize" required></textarea>
                                                <label class="form-label">8 . Suggestions to the Student</label>
                                            </div>
                                        </div>
                                    </div>                            
                                    
                                    <div class="col-md-6" style="padding-top: 38px;">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required="" type="text" class="form-control" name="date" placeholder="9 . Date of Next Meeting" onfocus="(this.type='date')"/>
                                            </div>
                                            <div class="help-info">9 . Date of Next Meeting</div>
                                        </div>
                                    </div>                                 
                                </div><br>                       
                                <div class="row clearfix">
                                    <div class="col-md-3">
                                        <button type="reset" name="reset" class="btn btn-primary waves-effect">Reset</button>
                                    </div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-3"></div>                            
                                    <div class="col-md-3" style="padding-left: 15%">                                                                   
                                        <button type="submit" name="submit" class="btn btn-primary waves-effect">Submit</button>
                                    </div>
                                </div>                                                             
                            </div>
                        </form>
                        <?php 
                            if(isset($_POST['submit']))
                            {
                                $category = $_POST['category'];
                                $problem = $_POST['problem'];
                                $problemdesc = $_POST['problemdesc'];
                                $problemcat = $_POST['problemcat'];
                                $sugg = $_POST['sugg'];
                                $date = $_POST['date'];
                                $mentor_name = $_SESSION['mentor_name'];
                                $reviewid = $row1['id'];

                                $sql = "INSERT INTO mentorreview (mentorname,email,category,problem,problemdesc,problemcat,sugg,reviewdate,reviewid) VALUES ('$mentor_name','$id','$category','$problem','$problemdesc','$problemcat','$sugg','$date','$reviewid')";
                                $result = mysqli_query($conn, $sql);
                                if($result)
                                {
                                    $sql1 = "UPDATE student SET mentorreview='1' WHERE email='$id'";
                                    if(mysqli_query($conn, $sql1))
                                    {
                                        echo "<script>alert('Review Submitted !');</script>";
                                        echo "<script>window.location='MentorReview.php'</script>";
                                    }                
                                }
                            }
                        ?>
                        </div>
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