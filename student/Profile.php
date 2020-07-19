<?php
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
                        $('#blah')
                            .attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
    </script>       
    <style>
    #pic{
         display: none;
           }
           
     .newbtn{
             cursor: pointer;
          }
          #blah{
      max-width:100px;
      height:100px;
      margin-top:20px;
    }
    </style>
</head>
<body class="theme-red">
    <?php 
        include 'Header.php';
        include 'Menu.php';

        $email=$_SESSION['student_email'];
        $sql1 = "SELECT * FROM profile where email='$email'";
        $result1 = mysqli_query($conn,$sql1);
        if($result1)
        {
          $row = mysqli_fetch_assoc($result1);
        }
        else
        {
            echo "<script>alert('No Records Found !');</script>";
            echo "<script>window.loaction='index.php'</script>";
        }
    ?>
    <!--profile code-->
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>EDIT - PROFILE</h2>            
            </div>   
            <div class="card">
              <div class="body">    
              <div class="header">
                  <h2>PROFILE INFORMATION</h2>                                       
              </div>                         
                <div class="row clearfix">					               
                	<div class="col-sm-1"></div>
                		<div class="col-sm-2">
							<! -- profile -->
							<br><br>
							<form action="#" method="POST" enctype="multipart/form-data">
						     <div class="container">
    								  <div class="row">
    									<div style="padding-left: 30%;">&nbsp;&nbsp;&nbsp;&nbsp;
    									<label class=newbtn>					
    									    <img id="blah" class="img-circle" src="data:image/jpeg;base64,<?php echo base64_encode($row['image']);?>"/>				  
    									    <input id="pic" class='pis' name="image" onchange="readURL(this);" type="file" accept=".png, .jpg, .jpeg" >
    									</label><br>
    									<lable>&nbsp;&nbsp;&nbsp;&nbsp;Click on Photo to<br>Change The Profile Picture<br><small>*</small> &nbsp;Max Size : 100Kb</lable>
    									<!-- <button class="btn btn-primary waves-effect" type="submit">Upload</button> -->
    									</div>									
    								</div>
    							</div> 
							<!-- end profile -->                                    
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="body">
                      <h3>Profile Information</h3><br>
                              <fieldset>                               
                                  <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="fname" value="<?php echo $row['fname'];?>" readonly pattern="[A-Za-z]+" class="form-control" required>
                                                <label class="form-label">First Name *</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="mname" value="<?php echo $row['mname'];?>" readonly pattern="[A-Za-z]+" class="form-control" required>
                                                <label class="form-label">Middle Name *</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                      <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="lname" value="<?php echo $row['lname'];?>" readonly pattern="[A-Za-z]+" class="form-control" required>
                                                <label class="form-label">Last Name *</label>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="row clearfix">
                                    <div class="col-md-3">
                                      <div class="form-group form-float">
                                            <div class="form-line">                                 
                                          <input type="text" name="gender"  value="<?php echo $row['gender'];?>" readonly class="form-control" required>
                                          <label class="form-label">Gender *</label>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-md-3">
                                      <div class="form-group form-float">
                                            <div class="form-line">
                                                <input required="" name="bdate"  value="<?php echo $row['bdate'];?>" readonly type="text" class="form-control"/>
                                                <label class="form-label">Birth Date *</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                      <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="rollno" value="<?php echo $row['rollno'];?>" readonly pattern="[0-9]{2}[A-Za-z]{3}[0-9]{3}" class="form-control" required>
                                                <label class="form-label">Roll No *</label>
                                            </div>
                                        </div>
                                    </div>                     
                                  <div class="col-md-3">
                                      <div class="form-group form-float">
                                            <div class="form-line">                                 
                                          <input type="text" name="currentstudy" value="<?php echo $row['course'];?>" readonly class="btn1 form-control" required>
                                          <label class="form-label">Current Course of Study *</label>
                                        </div>
                                    </div>
                                  </div>
                              </div>
                              <div class="row clearfix">
                                <div class="col-md-3">
                                      <div class="form-group form-float">
                                            <div class="form-line">                                 
                                                <input type="text" name="currentsem" value="<?php echo $row['currentsem'];?>" readonly class="form-control" required>
                                                <label class="form-label">Current Semester *</label>
                                            </div>
                                    </div>
                                    </div>
                                <div class="col-md-3">
                                      <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="email" name="email" value="<?php echo $row['email'];?>" readonly pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{3}$" class="form-control" required>
                                                <label class="form-label">Email *</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                      <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="mobileno" value="<?php echo $row['number'];?>" pattern="[0-9]{10}" maxlength="10" minlength="10" class="form-control" required>
                                                <label class="form-label">Student Mobile No *</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                      <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" pattern="[0-9]{10}" maxlength="10" minlength="10" name="parentmobileno" value="<?php echo $row['parentnumber'];?>" class="form-control" required>
                                                <label class="form-label">Parents / Guardians Mobile No *</label>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="row clearfix">
                                    <div class="col-md-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <textarea name="address" cols="30" rows="3" class="form-control no-resize" required><?php echo $row['address'];?></textarea>
                                                <label class="form-label">Address *</label>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                    <div class="row clearfix">
                                      <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">                                 
                                            <input type="text" readonly name="language" value="<?php echo $row['language'];?>" class="btn1 form-control" required>
                                            <label class="form-label">Student's First language *</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">                                 
                                            <input type="text" readonly name="medium" value="<?php echo $row['mediumInstruction'];?>" class="btn1 form-control" required>
                                            <label class="form-label">Medium of instruction till 10+2 *</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="school" value="<?php echo $row['school'];?>" readonly pattern="[A-Za-z]+" class="form-control" required>
                                                <label class="form-label">Last School / College Attended *</label>
                                            </div>
                                        </div>
                                </div>
                                    </div>
                                    <div class="row clearfix">
                                      <div class="col-md-3">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" readonly pattern="\b(?<!\.)(?!0+(?:\.0+)?%)(?:\d|[1-9]\d|100)(?:(?<!100)\.\d+)?" name="tenmarks" value="<?php echo $row['tenper'];?>" class="form-control" required>
                                                <label class="form-label">10th Percentage(%) *</label>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="col-md-3">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" readonly pattern="\b(?<!\.)(?!0+(?:\.0+)?%)(?:\d|[1-9]\d|100)(?:(?<!100)\.\d+)?" name="twelvemarks" value="<?php echo $row['12per'];?>" class="form-control">
                                                <label class="form-label">12th Percentage (%)</label>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="col-md-3">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" readonly pattern="\b(?<!\.)(?!0+(?:\.0+)?%)(?:\d|[1-9]\d|100)(?:(?<!100)\.\d+)?" name="diplomamarks" value="<?php echo $row['diploma'];?>" class="form-control">
                                                <label class="form-label">Diploma CGPA</label>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="col-md-3">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" pattern="[0-9]{3}" readonly name="jee" value="<?php echo $row['jee'];?>" class="form-control">
                                                <label class="form-label">JEE Rank</label>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row clearfix">
                                      <div class="col-md-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="hobbies" value="<?php echo $row['hobbies'];?>" readonly class="form-control">
                                                <label class="form-label">Hobbies / Interest</label>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="award" value="<?php echo $row['award'];?>" readonly class="form-control">
                                                <label class="form-label">Award / Achievements</label>
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
                                                <input type="text" pattern="\b(?<!\.)(?!0+(?:\.0+)?%)(?:\d|[1-9]\d|100)(?:(?<!100)\.\d+)?" class="form-control" name="sem1" value="<?php echo $row['sem1'];?>">
                                                <label class="form-label">Semester - 1</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" pattern="\b(?<!\.)(?!0+(?:\.0+)?%)(?:\d|[1-9]\d|100)(?:(?<!100)\.\d+)?" class="form-control" name="sem2" value="<?php echo $row['sem2'];?>">
                                                <label class="form-label">Semester - 2</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" pattern="\b(?<!\.)(?!0+(?:\.0+)?%)(?:\d|[1-9]\d|100)(?:(?<!100)\.\d+)?" class="form-control" name="sem3" value="<?php echo $row['sem3'];?>">
                                                <label class="form-label">Semester - 3</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" pattern="\b(?<!\.)(?!0+(?:\.0+)?%)(?:\d|[1-9]\d|100)(?:(?<!100)\.\d+)?" class="form-control" name="sem4" value="<?php echo $row['sem4'];?>">
                                                <label class="form-label">Semester - 4</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" pattern="\b(?<!\.)(?!0+(?:\.0+)?%)(?:\d|[1-9]\d|100)(?:(?<!100)\.\d+)?" class="form-control" name="sem5" value="<?php echo $row['sem5'];?>">
                                                <label class="form-label">Semester - 5</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" pattern="\b(?<!\.)(?!0+(?:\.0+)?%)(?:\d|[1-9]\d|100)(?:(?<!100)\.\d+)?" class="form-control" name="sem6" value="<?php echo $row['sem6'];?>">
                                                <label class="form-label">Semester - 6</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" pattern="\b(?<!\.)(?!0+(?:\.0+)?%)(?:\d|[1-9]\d|100)(?:(?<!100)\.\d+)?" class="form-control" name="sem7" value="<?php echo $row['sem7'];?>">
                                                <label class="form-label">Semester - 7</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" pattern="\b(?<!\.)(?!0+(?:\.0+)?%)(?:\d|[1-9]\d|100)(?:(?<!100)\.\d+)?" class="form-control" name="sem8" value="<?php echo $row['sem8'];?>">
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
                                                <input type="text" class="form-control" pattern="[0-9]{1}" name="fsem1" value="<?php echo $row['ktsem1'];?>">
                                                <label class="form-label">Semester - 1</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" pattern="[0-9]{1}" class="form-control" name="fsem2" value="<?php echo $row['ktsem2'];?>">
                                                <label class="form-label">Semester - 2</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" pattern="[0-9]{1}" class="form-control" name="fsem3" value="<?php echo $row['ktsem3'];?>">
                                                <label class="form-label">Semester - 3</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" pattern="[0-9]{1}" class="form-control" name="fsem4" value="<?php echo $row['ktsem4'];?>">
                                                <label class="form-label">Semester - 4</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" pattern="[0-9]{1}" class="form-control" name="fsem5" value="<?php echo $row['ktsem5'];?>">
                                                <label class="form-label">Semester - 5</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" pattern="[0-9]{1}" class="form-control" name="fsem6" value="<?php echo $row['ktsem6'];?>">
                                                <label class="form-label">Semester - 6</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" pattern="[0-9]{1}" class="form-control" name="fsem7" value="<?php echo $row['ktsem7'];?>">
                                                <label class="form-label">Semester - 7</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" pattern="[0-9]{1}" class="form-control" name="fsem8" value="<?php echo $row['ktsem8'];?>">
                                                <label class="form-label">Semester - 8</label>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </fieldset>
                                <div class="col-md-4"></div>
                                <div class="col-md-4"></div>   
                                <div class="col-md-4" style="padding-left: 20%;">                               
                                  <button class="btn btn-primary waves-effect" type="submit" name="update" value="Edit">Update</button>
                                </div>
                            </form>  
                              <?php
                                if(isset($_POST['update']))
                                {
                                    $mobileno=$_POST['mobileno'];
                                    $parentmobileno=$_POST['parentmobileno'];
                                    $address=$_POST['address'];
                                    $sem1=$_POST['sem1'];
                                    $sem2=$_POST['sem2'];
                                    $sem3=$_POST['sem3'];
                                    $sem4=$_POST['sem4'];
                                    $sem5=$_POST['sem5'];
                                    $sem6=$_POST['sem6'];
                                    $sem7=$_POST['sem7'];
                                    $sem8=$_POST['sem8'];
                                    $fsem1=$_POST['fsem1'];
                                    $fsem2=$_POST['fsem2'];
                                    $fsem3=$_POST['fsem3'];
                                    $fsem4=$_POST['fsem4'];
                                    $fsem5=$_POST['fsem5'];
                                    $fsem6=$_POST['fsem6'];
                                    $fsem7=$_POST['fsem7'];
                                    $fsem8=$_POST['fsem8'];
                                    $picture=addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                    $filesize = $_FILES['image']['size']; 
                                    if($filesize > 102400)
                                    {
                                      echo "<script>alert('Image size is too large!!! Please upload 100Kb size of Image ')</script>";
                                      echo "<script>window.location='Profile.php'</script>";
                                    }
                                    else
                                    {
                                      if($picture != NULL)
                                      {
                                        $sql = "UPDATE profile SET number='$mobileno', parentnumber='$parentmobileno', address='$address', image='$picture', sem1='$sem1', sem2='$sem2', sem3='$sem3', sem4='$sem4', sem5='$sem5', sem6='$sem6', sem7='$sem7', sem8='$sem8', ktsem1='$fsem1', ktsem2='$fsem2', ktsem3='$fsem3', ktsem4='$fsem4', ktsem5='$fsem5', ktsem6='$fsem6', ktsem7='$fsem7', ktsem8='$fsem8' WHERE email='$email'";
                                        if (mysqli_query($conn, $sql)) 
                                        {
                                           echo "<script>window.location='Profile.php'</script>";
                                        }
                                      }
                                      else
                                      {
                                        $sql = "UPDATE profile SET number='$mobileno', parentnumber='$parentmobileno', address='$address', sem1='$sem1', sem2='$sem2', sem3='$sem3', sem4='$sem4', sem5='$sem5', sem6='$sem6', sem7='$sem7', sem8='$sem8', ktsem1='$fsem1', ktsem2='$fsem2', ktsem3='$fsem3', ktsem4='$fsem4', ktsem5='$fsem5', ktsem6='$fsem6', ktsem7='$fsem7', ktsem8='$fsem8' WHERE email='$email'";
                                        if (mysqli_query($conn, $sql)) 
                                        {
                                           echo "<script>window.location='Profile.php'</script>";
                                        }
                                        else
                                        {
                                    ?>
                                        <script>alert('<?php echo mysqli_error($conn);?>');</script>
                                    <?php
                                        }
                                      }
                                    }
                                  }
                              ?>                          
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