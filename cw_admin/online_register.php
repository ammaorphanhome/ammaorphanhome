<?php ob_start(); error_reporting(0);
require "lib/path.php";
require "lib/config.php";
require "lib/title.php";
require "lib/secure.php";
extract($_POST);
extract($_GET);
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
		
          <div><h1>Registered Details</h1></div>
			
		<div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li class="active"><a href="online_register.php">Register Form</a></li>
            </ul>
          </div>
          
        </div>
		
	  <?php  if(isset($action) && $action=='viewDetails') { 
	   $q = $_GET['guid'];
	   $sth = $db->query ('SELECT * FROM `online_register` WHERE `guid`="'.$q.'"');
	   $row = $sth->fetch();
	   ?>
	   
		  <div class="col-md-12">
		  <a href="<?php echo URL; ?>online_register.php" class="btn btn-info">Back</a>
            <div class="card">
              <h3 class="card-title"><?php echo $row[stdname]; ?> Register Details</h3>
              <div class="card-body">
                <form method="post" action="<?php echo $_SEVER['PHP_SELF'];?>" enctype="multipart/form-data">
                  
				  <div class="form-group col-md-6">
                    <label class="control-label">Student Name</label>
                    <input readonly class="form-control" value="<?php echo $row[stdname];?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label class="control-label">Present Address</label>
                    <textarea readonly class="form-control"><?php echo $row[stdpresent];?></textarea>
                  </div>
				  <div class="clearfix"></div>
				  
                 <div class="form-group col-md-6">
                    <label class="control-label">Telephone Number</label>
                    <input readonly class="form-control" value="<?php echo $row[stdphone];?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label class="control-label">Mobile Number</label>
                    <input readonly class="form-control" value="<?php echo $row[stdmobile];?>">
                  </div>
				  <div class="clearfix"></div>
				  
				  <div class="form-group col-md-6">
                    <label class="control-label">Permanent Address</label>
                    <textarea readonly class="form-control"><?php echo $row[stdpermanent];?></textarea>
                  </div>
                  <div class="form-group col-md-6">
                    <label class="control-label">Date Of Birth</label>
                    <input readonly class="form-control" value="<?php echo $row[stddob];?>">
                  </div>
				  <div class="clearfix"></div>
				  
                 <div class="form-group col-md-6">
                    <label class="control-label">Place Of Birth</label>
                    <input readonly class="form-control" value="<?php echo $row[stdbirth];?>">
                  </div>
                  <div class="form-group col-md-6">
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
                  </div>
                  
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
	  $vth = $db->query ("DELETE FROM `online_register` WHERE `guid`='".$q."'" );
	  header('location:'.URL.'online_register.php'); 
	  } else { ?>
          <div class="col-md-12">
		  <div><!--a href="online_register.php?action=add" class="btn btn-success"><i class="fa fa-lg fa-plus"></i>Add New</a--><!-- <a href="online_register.php?action=edit" class="btn btn-info btn-flat"><i class="fa fa-lg fa-edit"></i></a><a href="#" class="btn btn-warning btn-flat"><i class="fa fa-lg fa-trash"></i></a>--></div>
		  <?php
            $sth = $db->query ("SELECT * FROM `online_register` ORDER BY `guid` DESC");
			$count = $sth->rowCount(); ?>
            <div class="card">
              <div class="card-body">
                <table id="sampleTable" class="table table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>S No.</th>
                      <th>Name</th>
                      <th>Mobile Number</th>
                      <th>Place Of Birth</th>
                      <th>Citizenship</th>
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
                      <td><?php echo $row[stdname]; ?></td>
                      <td><?php echo $row[stdmobile]; ?></td>
                      <td><?php echo $row[stdbirth]; ?></td>
                      <td><?php echo $row[stdcitizenship]; ?></td>
                      
					  <td class="center"><div class="btn btn-xs btn-group-xs"><a href="online_register.php?action=viewDetails&guid=<?php echo $row[0]; ?>"  class="btn btn-warning"><i class="fa fa-eye icon-only"></i></a>  </div></td>
					  
					  <td class="center"><div class="btn btn-xs btn-group-xs"><a href="<?php echo URL; ?>online_register.php?action=deleteData&guid=<?php echo $row[0]; ?>" class="btn btn-danger" onClick="return delete1();"><i class="fa fa-trash icon-only"></i></a> </div></td>
                    </tr>
	  <?php $m++; } } ?>
                  </tbody>
                </table>
				
              </div>
            </div>
			
          </div>
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