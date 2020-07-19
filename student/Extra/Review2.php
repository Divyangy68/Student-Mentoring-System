<?php
    //include 'loginCheck.php';
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
<!-- Advanced Form Example With Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Review - II                           
                            </h2>                          
                       </div>
                        <div class="body">
                        	<form action="includes/review2submit.php" method="POST">
                            <h2 class="card-inside-title">Type of difficulty Faced</h2><br>	
                            <div class="demo-checkbox">
                            	<div class="row clearfix">
                            		<div class="col-md-3">
                            			<b>1 .</b>&nbsp;<input type="checkbox" id="basic_checkbox_1" name="a" value="yes"/>
                                		<label for="basic_checkbox_1">Poor Performance in Exams</label>
                            		</div>
                            		<div class="col-md-3">
                            			<b>2 .</b>&nbsp;<input type="checkbox" id="basic_checkbox_2" name="b" value="yes"/>
                                		<label for="basic_checkbox_2">Attendance Related</label>
                            		</div> 
                            		<div class="col-md-3">
                            			<b>3 .</b>&nbsp;<input type="checkbox" id="basic_checkbox_3" name="c" value="yes"/>
                                		<label for="basic_checkbox_3">Course Registration</label>
                            		</div>
                            		<div class="col-md-3">
                            			<b>4 .</b>&nbsp;<input type="checkbox" id="basic_checkbox_4" name="d" value="yes"/>
                                		<label for="basic_checkbox_4">Subject Difficulties</label>
                            		</div>
                            	</div>  
                            	<div class="row clearfix">
                            		<div class="col-md-3">
                            			<b>5 .</b>&nbsp;<input type="checkbox" id="basic_checkbox_8" name="e" value="yes"/>
                                		<label for="basic_checkbox_8">Exam UFM</label>
                            		</div>
                            		<div class="col-md-3">
                            			<input type="checkbox" id="basic_checkbox_6" name="f" value="yes"/>
                                		<label for="basic_checkbox_6"><b>6 .</b> Communication (Language) Problem</label>
                            		</div> 
                            		<div class="col-md-3">
                            			<b>7 .</b>&nbsp;<input type="checkbox" id="basic_checkbox_7" name="g" value="yes"/>
                                		<label for="basic_checkbox_7">Misbehavior</label>
                            		</div>                            
                            	</div>                  
                            	<div class="row clearfix">                            		
                            		<div class="col-lg-12">
	                                	<div class="form-group form-float">
	                                        <div class="form-line">
	                                            <input type="text" name="personal" pattern="[A-Za-z]+" class="form-control" required>
	                                            <label class="form-label">8 . Personal ( Stress / Depression / Health / Financial / Friendship / Peer Pressure / Competition / Social – emotional, Home Sickness, etc.)</label>
	                                        </div>
	                                    </div>
                                	</div>                            		
                            	</div>         
                            	<div class="row clearfix">            
	                            	<div class="col-lg-6">
	                                	<div class="form-group form-float">
	                                        <div class="form-line">
	                                            <input type="text" name="study" pattern="[A-Za-z]+" class="form-control" required>
	                                            <label class="form-label">9 . Study ( Assignments / Tutorial / Lab / Special Assignment )</label> 
	                                        </div>
	                                    </div>
                                	</div>                            		
                            		<div class="col-lg-6">
	                                	<div class="form-group form-float">
	                                        <div class="form-line">
	                                            <input type="text" name="career" pattern="[A-Za-z]+" class="form-control" required>
	                                            <label class="form-label">10 . Career Choice / Placement / Competitive Exams</label>
	                                        </div>
	                                    </div>
                            		</div> 
	                            </div>
	                            <div class="row clearfix">
                                	<div class="col-md-12">
	                                    <div class="form-group form-float">
	                                        <div class="form-line">
	                                            <textarea name="other" cols="30" rows="3" class="form-control no-resize" required></textarea>
	                                            <label class="form-label">11 . Any Other</label>
	                                        </div>
	                                    </div>
	                                </div>
                                </div>
                                <div class="row clearfix">
                                	<div class="col-md-3">
                                		<button type="reset" name="reset" class="btn btn-primary waves-effect">Reset</button>
                                	</div>
                                	<div class="col-md-3"></div>
                                	<div class="col-md-3"></div>                            
                                	<div class="col-md-3" style="padding-left: 15%">                                                                   
                           				<button type="submit" name="submit2" class="btn btn-primary waves-effect">Submit</button>
                               		</div>
                               	</div>                                                             
                            </div>
                        </form>
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