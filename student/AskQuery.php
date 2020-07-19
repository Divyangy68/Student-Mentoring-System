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
	<section class="content" style="padding-top: 7%;">
        <div class="container-fluid">
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Send Query</h2>
                        </div>
                        <div class="body">
                            <form  method="POST" action="./includes/askQuerydata.php">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="subject" required>
                                        <label class="form-label">Subject</label>
                                    </div>
                                </div>                             
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea name="message" cols="30" rows="5" class="form-control no-resize" required></textarea>
                                        <label class="form-label">Message</label>
                                    </div>
                                </div>    
                                <div style="padding-left: 90%;">
                                <button class="btn btn-primary waves-effect" type="submit" name="query_submit">SUBMIT</button>
                            </div>
                            </form>
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