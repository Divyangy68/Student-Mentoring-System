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

        $email=$_SESSION['mentor_email'];
        $sql1 = "SELECT * FROM mentor where email='$email'";
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
							<!-- profile -->
							<br><br>
							<form action="" method="POST" enctype="multipart/form-data">
						     <div class="container">
								<div class="row">
									<div>&nbsp;&nbsp;&nbsp;&nbsp;
									<label class=newbtn>					
									    <img id="blah" class="img-circle" src="data:image/jpeg;base64,<?php echo base64_encode($row['image']);?>"/>				  
									    <input id="pic" class='pis' name="image" onchange="readURL(this);" type="file" accept=".png, .jpg, .jpeg" >
									</label><br>
									<lable>&nbsp;&nbsp;&nbsp;&nbsp;Click On Photo To<br>Change The Profile Picture<br><small>*</small> &nbsp;Max Size : 100Kb</lable>
									<!-- <button class="btn btn-primary waves-effect" type="submit">Upload</button> -->
									</div>										
								</div>
							</div> 
							<!-- end profile -->                                    
                        </div>
                       <div class="col-sm-7">
                        <div class="body">
                            
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="name" pattern="[a-zA-Z]+" value="<?php echo $_SESSION['mentor_name'];?>" required="required" aria-required="true"/>
                                        <label class="form-label">Name</label>
                                    </div>
                                </div>                      
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="email" value="<?php echo $_SESSION['mentor_email'];?>" readonly required="required" aria-required="true">
                                        <label class="form-label">Email</label>
                                    </div>
                                </div>  
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" pattern="[a-zA-Z]{1}[0-9]{3}" name="block" value="<?php echo $_SESSION['mentor_cabin'];?>" required="required" aria-required="true">
                                        <label class="form-label">Cabin</label>
                                    </div>
                                </div>                                                                   
                                <button class="btn btn-primary waves-effect" type="submit" name="update" value="Edit">Update</button>
                            </form>  
                            <?php
                                if(isset($_POST['update'])){
                                    $name = $_POST['name'];
                                    $email  = $_POST['email'];
                                    $cabin = $_POST['block'];
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
                                            $sql = "UPDATE mentor SET image='$picture', name='$name',email='$email',cabin='$cabin' WHERE email='$email'";
                                            if (mysqli_query($conn, $sql)) 
                                            {
                                                $_SESSION['mentor_name'] = $name;
                                                $_SESSION['mentor_email'] = $email;
                                                $_SESSION['mentor_cabin'] = $cabin;
                                               echo "<script>window.location='Profile.php'</script>";
                                            }
                                        }
                                        else
                                        {
                                            $sql = "UPDATE mentor SET name='$name',email='$email',cabin='$cabin' WHERE email='$email'";
                                            if (mysqli_query($conn, $sql)) 
                                            {
                                                $_SESSION['mentor_name'] = $name;
                                                $_SESSION['mentor_email'] = $email;
                                                $_SESSION['mentor_cabin'] = $cabin;
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