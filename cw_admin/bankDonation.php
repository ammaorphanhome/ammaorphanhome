<?php ob_start(); error_reporting(0);
require "lib/path.php";
require "lib/config.php";
require "lib/title.php";
require "lib/secure.php";
extract($_POST);
extract($_GET);
?>

<?php
    if(isset($_POST) && $_POST['submit']=='ADD') {
        ?>
        
        		<script type="text/javascript">
              			
				</script>
        <?php
        
            $filename = $_FILES['image']['name'];
            if(!empty($filename)) {
            	$image = time().$filename;
            	move_uploaded_file($_FILES['image']['tmp_name'],"../adminupload/".$image); 
        	}
    	
    	   if($name !='' && $amount!= ''){
    	       // $sth = $db->query("INSERT INTO `orders`(`name`, `email`, `price`, `image`, `note`, `mobile`, `location`,  `payment_status`) VALUES ('$name','$email','$amount','$image','$msg','$mobile', '$wishToSee',  'Credit')");
    	       $sth = $db->query("INSERT INTO `orders`(`name`,`email`,`price`,`image`,`note`,`mobile`, `location`, `payment_status`) VALUES ('$name','$email','$amount','$image','$msg','$mobile','No', 'Credit')");
    	       
    	       $insid = $db->lastInsertId();
    	    
    	       
    	       if($sth == true)  { ?> 
    	    		<script type="text/javascript">
              			alert('Payment details successfully added');
              			window.location="<?php echo URL; ?>bankDonation.php";
            		</script>
    	    <?php } else { ?>
    	    		<script type="text/javascript">
      					alert('Payment details are not added, Please try Again');
              			window.location="<?php echo URL; ?>bankDonation.php";
    		 		</script>
    	    <?php } ?>
    	    
    <?php } else { ?> 
             <script type="text/javascript">
      			alert('Please try Again');
      			window.location="<?php echo URL; ?>bankDonation.php";
    		 </script>
    <?php }
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title><?php echo TITLE; ?></title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
    -->
  </head>
  <body class="sidebar-mini fixed">
    <div class="wrapper">
      <!-- Navbar-->
      <?php include "top_nav.php";?>
      <!-- Side-Nav-->
       <?php include "side_nav.php";?>
      <div class="content-wrapper">
        <div class="page-title">
		
          <div><h1>Payment Details</h1></div>
			
		<div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li class="active"><a href="ysa.php">Payment Details </a></li>
            </ul>
          </div>
          
        </div>

	  <?php if(isset($action) && $action=='add') { ?>
	  		<a href="<?php echo URL; ?>bankDonation.php" class="btn btn-info">Back</a>
			<div class="row">
				<div class="col-md-6">
					<div class="card">
						<h3 class="card-title">Add 'Manual/Bank Payment' - Donar Details</h3>

						<div class="card-body">
							<form role="form" method="post"
								action="<?php echo $_SERVER['PHP_SELF']; ?>"
								enctype="multipart/form-data" onsubmit="return validate();">
								
								<div class="form-group">
                                    <label class="control-label">Donar Name:</label>
                                    <input type="text" name="name" placeholder="Enter Name" id="name" class="form-control" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="email" class="control-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="eg. donar_email@gmail.com">
                                </div>
                                
                                
                                <div class="form-group">
                                    <label for="mobile" class="control-label">Phone</label>
                                    <input type="text" class="form-control" maxlength="10" pattern="^\d{10}$" id="mobile"
                                           name="mobile" placeholder="eg. 9999999999">
                                </div>
    
                                <div class="form-group">
                                    <label for="amount" class="control-label">Amount</label>
                                    <input type="number" class="form-control" id="amount" name="amount" placeholder="Rs-1000.00" required>
                                </div>
    
                                <div class="form-group">
                                    <label for="photo" class="control-label">Upload Donar Photo</label>
                                    <input type="file" class="form-control" id="photo" accept=".jpg, .jpeg" name="image">
                                </div>
                                                        
    
                                <div class="form-group">
                                    <label for="wishToSee" class="control-label">Do you wish see your donation in donations page?</label> <br/>
                                    <input type="radio" name="wishToSee" value="Yes" checked>Yes
                                    <input type="radio" name="wishToSee" value="No">No
                                </div>
    
                                <div class="form-group" class="control-label">
                                    <label for="message">Note</label>
                                    <textarea cols="30" rows="5" class="form-control" id="message" name="msg"
                                              placeholder="eg. This donation is for the children who needs food."></textarea>
                                </div>
                                
								<div class="card-footer">
									<button type="submit" name="submit" value="ADD"
										class="btn btn-primary icon-btn">
										<i class="fa fa-fw fa-lg fa-check-circle"></i>Submit
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		  
       <?php } ?>
        
        
	  <?php  if(isset($action) && $action=='viewDetails') { 
	       $q = $_GET['guid'];
	       $sth = $db->query ('SELECT * FROM `orders` WHERE `guid`="'.$q.'"');
	       $row = $sth->fetch();
	  ?>
	   
		  <div class="col-md-12">
		  <a href="<?php echo URL; ?>ysa.php" class="btn btn-info">Back</a>
            <div class="card">
              <h3 class="card-title"><?php echo $row[stdname]; ?> Young Scientist Award Details</h3>
              <div class="card-body">
                <form method="post" action="<?php echo $_SEVER['PHP_SELF'];?>" enctype="multipart/form-data">
                  
				  
				  
				  
				  <div class="form-group col-md-6">
                    <label class="control-label">Is the nominee the main contributor to the paper?</label>
                    <input readonly class="form-control" value=" <?php echo $row[1];?> ">
                  </div>
                 
				
				  
                 <div class="form-group col-md-6">
                    <label class="control-label">Title of The Paper</label>
                    <input readonly class="form-control" value="<?php echo $row[2];?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label class="control-label">Ref# of the Paper</label>
                    <input readonly class="form-control" value="<?php echo $row[3];?>">
                  </div>
				 
				  
				   <div class="form-group col-md-6">
                    <label class="control-label">Title of The Nominee</label>
                    <input readonly class="form-control" value="<?php echo $row[4];?>">
                  </div>
				  
				  
				  
				  <div class="form-group col-md-6">
                    <label class="control-label">Full Name of The Nominee</label>
                    <textarea readonly class="form-control"><?php echo $row[5];?></textarea>
                  </div>
                 
				
				  
				  
				  <div class="form-group col-md-6">
                    <label class="control-label">Organization of the Nominee</label>
                    <textarea readonly class="form-control"><?php echo $row[6];?></textarea>
                  </div>
				  
				  
				    <div class="form-group col-md-6">
                    <label class="control-label">Country of the Nominee</label>
                    <textarea readonly class="form-control"><?php echo $row[7];?></textarea>
                  </div>
				    <div class="form-group col-md-6">
                    <label class="control-label">Email of the Nominee</label>
                    <textarea readonly class="form-control"><?php echo $row[8];?></textarea>
                  </div>
				  
				    <div class="form-group col-md-6">
                    <label class="control-label">Age of the Nominee</label>
                    <textarea readonly class="form-control"><?php echo $row[9];?></textarea>
                  </div>
				  
				    <div class="form-group col-md-6">
                    <label class="control-label">Is the nominee a Ph.D. student? </label>
                    <textarea readonly class="form-control"><?php echo $row[10];?></textarea>
                  </div>  
				  <div class="form-group col-md-6">
                    <label class="control-label">Name of PhD supervisor of the nominee</label>
                    <textarea readonly class="form-control"><?php echo $row[11];?></textarea>
                  </div>
				  
				  <div class="form-group col-md-6">
                    <label class="control-label">Organization of the supervisor of the nominee</label>
                    <textarea readonly class="form-control"><?php echo $row[12];?></textarea>
                  </div>
                
				  
				  
                  <!--div class="form-group col-md-6">
                    <label class="control-label">Citizenship </label>
                    <input readonly class="form-control" value="<?php echo $row[stdcitizenship];?>">
                  </div>
				  <div class="clearfix"></div>
                  
				  <div class="form-group col-md-6">
                    <label class="control-label">Student Passport Number</label>
                    <input readonly class="form-control" value="<?php echo $row[stdpassport];?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label class="control-label">Parent / Guardian Name </label>
                    <input readonly class="form-control" value="<?php echo $row[stdparent];?>">
                  </div>
				  <div class="clearfix"></div>
				  
				  <div class="form-group col-md-6">
                    <label class="control-label">Parent / Guardian Address </label>
                    <textarea readonly class="form-control"><?php echo $row[stdparentaddress];?></textarea>
                  </div>
                  <div class="form-group col-md-6">
                    <label class="control-label">Parent / Guardian Occupation</label>
                    <input readonly class="form-control" value="<?php echo $row[stdparentoccupation];?>">
                  </div>
				  <div class="clearfix"></div>
				  
				  <div class="form-group col-md-6">
                    <label class="control-label">Parent / Guardian Tel No / Mobile No</label>
                    <input readonly class="form-control" value="<?php echo $row[stdparentmobile];?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label class="control-label">Educational Qualification </label>
                    <input readonly class="form-control" value="<?php echo $row[stdeducation];?>">
                  </div>
				  <div class="clearfix"></div>
				  
				  <div class="form-group col-md-6">
                    <label class="control-label">Name of School / College / University Last Attended </label>
                    <input readonly class="form-control" value="<?php echo $row[school_college_university];?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label class="control-label">Diploma / Degree / Certificate Obtained </label>
                    <input readonly class="form-control" value="<?php echo $row[stdcertificate];?>">
                  </div>
				  <div class="clearfix"></div>
				  
				  <div class="form-group col-md-6">
                    <label class="control-label">Year Of Completion</label>
                    <input readonly class="form-control" value="<?php echo $row[stdyear];?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label class="control-label">Course for Study Applied For </label>
                    <input readonly class="form-control" value="<?php echo $row[stdcourse];?>">
                  </div>
				  <div class="clearfix"></div>
				  
				  <div class="form-group col-md-6">
                    <label class="control-label">Medium</label>
                    <input readonly class="form-control" value="<?php echo $row[stdmedium];?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label class="control-label">University Applied </label>
                    <input readonly class="form-control" value="<?php echo $row[stduniversity_applied];?>">
                  </div>
				  <div class="clearfix"></div>
				  
				  <div class="form-group col-md-6">
                    <label class="control-label">Mother Tongue</label>
                    <input readonly class="form-control" value="<?php echo $row[stdmtongue];?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label class="control-label">Language Used in your Secondary Education </label>
                    <input readonly class="form-control" value="<?php echo $row[stdlangsec];?>">
                  </div>
				  <div class="clearfix"></div>
				  
				  <div class="form-group col-md-6">
                    <label class="control-label">Language Used in your Higher Secondary Education</label>
                    <input readonly class="form-control" value="<?php echo $row[stdlanghigher];?>">
                  </div-->
                  
				  <div class="clearfix"></div>
				  
			<!--div class="card-footer">
				  <input type="hidden" name="qid" value="<?php echo $q; ?>">
                <button type="submit" name="submit" value="EDIT" class="btn btn-primary icon-btn"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>&nbsp;&nbsp;&nbsp;<button type="reset" href="#" class="btn btn-warning"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</button>
              </div-->
                </form>
              </div>
            </div>
          </div>
		  <?php } 
	  else if($action == 'deleteData') {
	       $q = $_GET['guid'];
	       $vth = $db->query ("DELETE FROM `orders` WHERE `guid`='".$q."'" );
	       header('location:'.URL.'ysa.php'); 
	  
	  } else { ?>
	  
	  	 <?php if(!isset($action) || isset($action) && $action != 'add') { ?>
	  	 	  	 	
          <div class="col-md-12">
		  <div><!--a href="ysa.php?action=add" class="btn btn-success"><i class="fa fa-lg fa-plus"></i>Add New</a--><!-- <a href="ysa.php?action=edit" class="btn btn-info btn-flat"><i class="fa fa-lg fa-edit"></i></a><a href="#" class="btn btn-warning btn-flat"><i class="fa fa-lg fa-trash"></i></a>--></div>
		  
		  <div>
			 <a href="bankDonation.php?action=add&id=<?php echo $_GET[id];?>"
				class="btn btn-success"><i class="fa fa-lg fa-plus"></i>Add New</a>
		  </div>
					
		  <?php
            $sth = $db->query ("SELECT * FROM `orders` where  `address` = 'Manual' ORDER BY `guid` DESC");
			$count = $sth->rowCount(); ?>
            <div class="card">
              <div class="card-body">
                <table id="sampleTable" class="table table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>S No.</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Note</th>
                      <th>Donar Photo</th>
                      <th>View Details</th>
					  <th>Delete</th>
                    </tr>
                  </thead>
				  
                  <tbody>
				  <?php 
					    if($count > 0) { 
						$m = 1;
						 while($row = $sth->fetch()) {
                        ?>
                    <tr>
                      <td><?php echo $m; ?></td>
                      <td><?php echo $row[name];?> </td>
                      <td><?php echo $row[email]; ?></td>
                      <td><?php echo $row[mobile]; ?></td>
                      <td><?php echo $row[note]; ?></td>
                      
                      <th><img src="../adminupload/<?php echo $row[image];?>" style="width:150px;height:150px"></th>
                      
					  <td class="center"><div class="btn btn-xs btn-group-xs"><a href="ysa.php?action=viewDetails&guid=<?php echo $row[0]; ?>"  class="btn btn-warning"><i class="fa fa-eye icon-only"></i></a>  </div></td>
					  
					  <td class="center"><div class="btn btn-xs btn-group-xs"><a href="<?php echo URL; ?>ysa.php?action=deleteData&guid=<?php echo $row[0]; ?>" class="btn btn-danger" onClick="return delete1();"><i class="fa fa-trash icon-only"></i></a> </div></td>
                    </tr>
	  				<?php $m++; } } ?>
                  </tbody>
                </table>
				
              </div>
            </div>
			
          </div>
          <?php } ?>
        <?php } ?>
        </div>
      </div>
    </div>
	<?php include "footer.php";?>
    <!-- Javascripts-->
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/essential-plugins.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/pace.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
	<script>
	function delete1()
	{
		if(window.confirm("Cofirm to delete"))
		{
			return true;
		}else
			return false;
	}
	</script>
  </body>
</html>