<?php
    include 'loginCheck.php';
	include '../includes/connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<script>
     $('.newbtn').bind("click" , function () {
            $('#pic').click();
     });

      function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#')
                            .attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
    </script>
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
	$email = $_SESSION['student_email'];
	$sql = "SELECT * from student where email='$email'";
	$result = mysqli_query($conn,$sql);

	if(mysqli_num_rows($result)>0)
	{
		$r = mysqli_fetch_assoc($result);
	}
?>
<br>
<section>
	<div class="container-fluid">
<!-- Advanced Form Example With Validation -->
            <div class="row clearfix" style="padding-top: 4%;">
            	<form method="POST" action="includes/profileData.php">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><center>Registartion Form For Student</center></h2>   
                        </div>
                        <div class="body">
                                <h3>Profile Information</h3><br>
                                <fieldset>                               
                                	<div class="row clearfix">
                                		<div class="col-md-4">
                                    		<div class="form-group form-float">
		                                        <div class="form-line">
		                                            <input type="text" name="fname" pattern="[A-Za-z]+" placeholder="First Name *" class="form-control" required>
		                                        </div>
		                                    </div>
                                		</div>
	                                	<div class="col-lg-4">
		                                    <div class="form-group form-float">
		                                        <div class="form-line">
		                                            <input type="text" name="mname" pattern="[A-Za-z]+" placeholder="Middle Name *" class="form-control" required>
		                                            
		                                        </div>
		                                    </div>
	                                	</div>
	                                	<div class="col-lg-4">
		                                	<div class="form-group form-float">
		                                        <div class="form-line">
		                                            <input type="text" name="lname" pattern="[A-Za-z]+" placeholder="Last Name *" class="form-control" required>
		                                        </div>
		                                    </div>
                                		</div>
                                 	</div>
                                 	<div class="row clearfix">
		                                <div class="col-md-3">
		                                	<div class="form-group form-float">
		                                        <div class="form-line">                                 
					                                <input type="select" list="browser1" name="gender" placeholder="Gender *" class="btn1 form-control" required>
	                                                <datalist id="browser1">
	                                                    <option>Male</option>
	                                                    <option>Female</option>                     
	                                                </datalist>
				                                </div>
				                            </div>
		                                </div>
		                                <div class="col-md-3">
		                                	<div class="form-group form-float">
		                                        <div class="form-line">
		                                            <input type="text" name="bdate" required class="form-control" placeholder="Birth Date *" onfocus="(this.type='date')"/>
		                                        </div>
		                                        <div class="help-info">Birth Date *</div>
		                                    </div>
		                                </div>
		                                <div class="col-md-3">
		                                	<div class="form-group form-float">
		                                        <div class="form-line">
		                                            <input type="text" name="rollno" value="<?php echo $r['rollno'];?>" readonly="readonly" pattern="[0-9]{2}[A-Za-z]{3}[0-9]{3}" class="form-control" placeholder="Roll No *" required>
		                                        </div>
		                                    </div>
		                                </div>                     
			                            <div class="col-md-3">
		                                	<div class="form-group form-float">
		                                        <div class="form-line">                                 
					                                <input type="select" list="browser2" name="currentstudy" placeholder="Current Course of Study *" class="btn1 form-control" required>
	                                                <datalist id="browser2">
	                                                    <option>B.tech</option>
	                                                    <option>M.tech</option>                     
	                                                </datalist>
				                                </div>
				                            </div>
			                            </div>
		                        	</div>
		                        	<div class="row clearfix">
		                        		<div class="col-md-3">
		                                	<div class="form-group form-float">
		                                        <div class="form-line">                                 
					                                <input type="select" list="browser11" name="currentsem" placeholder="Semester *" class="btn1 form-control" required>
	                                                <datalist id="browser11">
	                                                    <option>1</option>
	                                                    <option>2</option>
	                                                    <option>3</option>
	                                                    <option>4</option>
	                                                    <option>5</option>
	                                                    <option>6</option>
	                                                    <option>7</option>
	                                                    <option>8</option>                     
	                                                </datalist>
				                                </div>
				                            </div>
		                                </div>
		                        		<div class="col-md-3">
		                               		<div class="form-group form-float">
		                                        <div class="form-line">
		                                            <input type="email" name="email" readonly="readonly" value="<?php echo $r['email'];?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{3}$" placeholder="Email *" class="form-control" required>
		                                        </div>
		                                    </div>
	                                	</div>
	                                	<div class="col-md-3">
	                                		<div class="form-group form-float">
		                                        <div class="form-line">
		                                            <input type="text" name="mobileno" pattern="[0-9]{10}" maxlength="10" minlength="10" class="form-control" placeholder="Student Mobile No *" required>
		                                        </div>
		                                    </div>
	                                	</div>
	                                	<div class="col-md-3">
	                                		<div class="form-group form-float">
		                                        <div class="form-line">
		                                            <input type="text" pattern="[0-9]{10}" maxlength="10" minlength="10" name="parentmobileno" class="form-control" placeholder="Parents / Guardians Mobile No *" required>
		                                        </div>
		                                    </div>
	                                	</div>
	                                </div>
	                                <div class="row clearfix">
	                                	<div class="col-md-12">
		                                    <div class="form-group form-float">
		                                        <div class="form-line">
		                                            <textarea name="address" cols="30" rows="3" class="form-control no-resize" placeholder="Address *" required></textarea>
		                                        </div>
		                                    </div>
		                                </div>
	                                </div>
                                    <div class="row clearfix">
                                    	<div class="col-md-6">
	                                    	<div class="form-group form-float">
		                                        <div class="form-line">                                 
					                                <input type="select" list="browser3" placeholder="Student's First language *" name="language" class="btn1 form-control" required>
	                                                <datalist id="browser3">
	                                                    <option>English</option>
	                                                    <option>Hindi</option> 
	                                                    <option>Gujarati</option>                    
	                                                </datalist>
				                                </div>
				                            </div>
			                        	</div>
			                        	<div class="col-md-6">
	                                    	<div class="form-group form-float">
		                                        <div class="form-line">                                 
					                                <input type="select" list="browser4" name="medium" placeholder="Medium of instruction till 10+2 *" class="btn1 form-control" required>
	                                                <datalist id="browser4">
	                                                    <option>English</option>
	                                                    <option>Hindi</option> 
	                                                    <option>Gujarati</option>                    
	                                                </datalist>
				                                </div>
				                            </div>
			                        	</div>
                                    </div>
                                    <div class="row clearfix">
                                    	<div class="col-md-3">
                                    		<div class="form-group form-float">
		                                        <div class="form-line">
		                                            <input type="text" placeholder="10th Percentage(%) *" pattern="\b(?<!\.)(?!0+(?:\.0+)?%)(?:\d|[1-9]\d|100)(?:(?<!100)\.\d+)?" name="tenmarks" class="form-control" required>
		                                        </div>
		                                    </div>
                                    	</div>
                                    	<div class="col-md-3">
                                    		<div class="form-group form-float">
		                                        <div class="form-line">
		                                            <input type="text" placeholder="12th Percentage (%)" pattern="\b(?<!\.)(?!0+(?:\.0+)?%)(?:\d|[1-9]\d|100)(?:(?<!100)\.\d+)?" name="twelvemarks" class="form-control">
		                                        </div>
		                                    </div>
                                    	</div>
                                    	<div class="col-md-3">
                                    		<div class="form-group form-float">
		                                        <div class="form-line">
		                                            <input type="text" placeholder="Diploma CGPA" pattern="\b(?<!\.)(?!0+(?:\.0+)?%)(?:\d|[1-9]\d|100)(?:(?<!100)\.\d+)?" name="diplomamarks" class="form-control">
		                                        </div>
		                                    </div>
                                    	</div>
                                    	<div class="col-md-3">
                                    		<div class="form-group form-float">
		                                        <div class="form-line">
		                                            <input type="text" pattern="[0-9]{3}" placeholder="JEE Rank" name="jee" class="form-control">
		                                        </div>
		                                    </div>
                                    	</div>
                                    </div>
                                    <div class="row clearfix">
                                    	<div class="col-md-6">
			                        		<div class="form-group form-float">
		                                        <div class="form-line">
		                                            <input type="text" name="hobbies" placeholder="Hobbies / Interest" class="form-control">
		                                        </div>
		                                    </div>
			                        	</div>
			                        	<div class="col-md-6">
			                        		<div class="form-group form-float">
		                                        <div class="form-line">
		                                            <input type="text" name="award" placeholder="Award / Achievements" class="form-control">
		                                        </div>
		                                    </div>
			                        	</div>			             
                                    </div>                                                  
                                </fieldset>

                                <h3>Result Details</h3>
                                <fieldset>
                                	<b>Semester Wise SPI</b><br><br>
                                	<div class="row clearfix">
                                		<div class="col-md-3">
		                                    <div class="form-group form-float">
		                                        <div class="form-line">
		                                            <input type="text" pattern="\b(?<!\.)(?!0+(?:\.0+)?%)(?:\d|[1-9]\d|100)(?:(?<!100)\.\d+)?" class="form-control" name="sem1">
		                                            <label class="form-label">Semester - 1</label>
		                                        </div>
		                                    </div>
	                                	</div>
	                                	<div class="col-md-3">
		                                    <div class="form-group form-float">
		                                        <div class="form-line">
		                                            <input type="text" pattern="\b(?<!\.)(?!0+(?:\.0+)?%)(?:\d|[1-9]\d|100)(?:(?<!100)\.\d+)?" class="form-control" name="sem2">
		                                            <label class="form-label">Semester - 2</label>
		                                        </div>
		                                    </div>
	                                	</div>
                                		<div class="col-md-3">
		                                    <div class="form-group form-float">
		                                        <div class="form-line">
		                                            <input type="text" pattern="\b(?<!\.)(?!0+(?:\.0+)?%)(?:\d|[1-9]\d|100)(?:(?<!100)\.\d+)?" class="form-control" name="sem3" >
		                                            <label class="form-label">Semester - 3</label>
		                                        </div>
		                                    </div>
	                                	</div>
	                                	<div class="col-md-3">
		                                    <div class="form-group form-float">
		                                        <div class="form-line">
		                                            <input type="text" pattern="\b(?<!\.)(?!0+(?:\.0+)?%)(?:\d|[1-9]\d|100)(?:(?<!100)\.\d+)?" class="form-control" name="sem4" >
		                                            <label class="form-label">Semester - 4</label>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="col-md-3">
		                                    <div class="form-group form-float">
		                                        <div class="form-line">
		                                            <input type="text" pattern="\b(?<!\.)(?!0+(?:\.0+)?%)(?:\d|[1-9]\d|100)(?:(?<!100)\.\d+)?" class="form-control" name="sem5" >
		                                            <label class="form-label">Semester - 5</label>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="col-md-3">
		                                    <div class="form-group form-float">
		                                        <div class="form-line">
		                                            <input type="text" pattern="\b(?<!\.)(?!0+(?:\.0+)?%)(?:\d|[1-9]\d|100)(?:(?<!100)\.\d+)?" class="form-control" name="sem6" >
		                                            <label class="form-label">Semester - 6</label>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="col-md-3">
		                                    <div class="form-group form-float">
		                                        <div class="form-line">
		                                            <input type="text" pattern="\b(?<!\.)(?!0+(?:\.0+)?%)(?:\d|[1-9]\d|100)(?:(?<!100)\.\d+)?" class="form-control" name="sem7" >
		                                            <label class="form-label">Semester - 7</label>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="col-md-3">
		                                    <div class="form-group form-float">
		                                        <div class="form-line">
		                                            <input type="text" pattern="\b(?<!\.)(?!0+(?:\.0+)?%)(?:\d|[1-9]\d|100)(?:(?<!100)\.\d+)?" class="form-control" name="sem8" >
		                                            <label class="form-label">Semester - 8</label>
		                                        </div>
		                                    </div>
		                                </div>
                                    </div>                                
                                    <b>Semester wise Failure / NT in no. of Courses</b><br><br>
                                	<div class="row clearfix">
                                		<div class="col-md-3">
		                                    <div class="form-group form-float">
		                                        <div class="form-line">
		                                            <input type="text" class="form-control" pattern="[0-9]{1}" name="fsem1" >
		                                            <label class="form-label">Semester - 1</label>
		                                        </div>
		                                    </div>
	                                	</div>
	                                	<div class="col-md-3">
		                                    <div class="form-group form-float">
		                                        <div class="form-line">
		                                            <input type="text" pattern="[0-9]{1}" class="form-control" name="fsem2" >
		                                            <label class="form-label">Semester - 2</label>
		                                        </div>
		                                    </div>
	                                	</div>
                                		<div class="col-md-3">
		                                    <div class="form-group form-float">
		                                        <div class="form-line">
		                                            <input type="text" pattern="[0-9]{1}" class="form-control" name="fsem3" >
		                                            <label class="form-label">Semester - 3</label>
		                                        </div>
		                                    </div>
	                                	</div>
	                                	<div class="col-md-3">
		                                    <div class="form-group form-float">
		                                        <div class="form-line">
		                                            <input type="text" pattern="[0-9]{1}" class="form-control" name="fsem4" >
		                                            <label class="form-label">Semester - 4</label>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="col-md-3">
		                                    <div class="form-group form-float">
		                                        <div class="form-line">
		                                            <input type="text" pattern="[0-9]{1}" class="form-control" name="fsem5" >
		                                            <label class="form-label">Semester - 5</label>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="col-md-3">
		                                    <div class="form-group form-float">
		                                        <div class="form-line">
		                                            <input type="text" pattern="[0-9]{1}" class="form-control" name="fsem6" >
		                                            <label class="form-label">Semester - 6</label>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="col-md-3">
		                                    <div class="form-group form-float">
		                                        <div class="form-line">
		                                            <input type="text" pattern="[0-9]{1}" class="form-control" name="fsem7" >
		                                            <label class="form-label">Semester - 7</label>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="col-md-3">
		                                    <div class="form-group form-float">
		                                        <div class="form-line">
		                                            <input type="text" pattern="[0-9]{1}" class="form-control" name="fsem8" >
		                                            <label class="form-label">Semester - 8</label>
		                                        </div>
		                                    </div>
		                                </div>
                                    </div>
                                </fieldset>
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
	                    </div>
	                </div>
	            </form>
	        </div>
	    </div>         
    </section>
    <?php
    	include 'Footer.php';
    ?>
</body>
</html>