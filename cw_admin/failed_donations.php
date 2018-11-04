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
		
          <div><h1>Website Failed Payment Details</h1></div>
			
		<div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li class="active"><a href="failed_donations.php">Failed Payment Details </a></li>
            </ul>
          </div>
          
        </div>
		
	  <?php  if(isset($action) && $action=='viewDetails') { 
	   $q = $_GET['guid'];
	   $sth = $db->query ('SELECT * FROM `orders` WHERE `guid`="'.$q.'"');
	   $row = $sth->fetch();
	   ?>
	   
		  <div class="col-md-12">
		  <a href="<?php echo URL; ?>failed_donations.php" class="btn btn-info">Back</a>
            <div class="card">
              <h3 class="card-title"><?php echo $row[stdname]; ?> Failed/Unuccessful Donation Details</h3>
              <div class="card-body">
                <form method="post" action="<?php echo $_SEVER['PHP_SELF'];?>" enctype="multipart/form-data">
                  
				  <div class="form-group">
                    <label class="control-label">Donar Name</label>
                    <input readonly class="form-control" value=" <?php echo $row[name];?> ">
                  </div>
                 
                 <div class="form-group">
                    <label class="control-label">Email</label>
                    <input readonly class="form-control" value="<?php echo $row[email];?>">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Phone</label>
                    <input readonly class="form-control" value="<?php echo $row[mobile];?>">
                  </div>
				 
				  
				   <div class="form-group">
                    <label class="control-label">Donation Amount</label>
                    <input readonly class="form-control" value="<?php echo $row[price];?>">
                  </div>
				  
				  <div class="form-group">
                    <label class="control-label">Do you wish see your donation in donations page?</label>
                    <textarea readonly class="form-control"><?php echo $row[location];?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="message" class="control-label">Donar Notes</label>
                    <textarea readonly cols="30" rows="8" class="form-control" name="note" id="note" ></textarea>
                  </div>
                  
                  <div class="form-grou">
                    <label class="control-label">Photo</label></br>
                    <img src="../adminupload/<?php echo $row[image];?>" style="width:150px;height:150px">
                  </div>

				  <div class="clearfix"></div>
				  <script>
	   				document.getElementById("note").value = '<?php echo $row[note]; ?>';
	   	  		  </script>
                </form>
              </div>
            </div>
          </div>
		  <?php } 
	  else if($action == 'deleteData') {
	  $q = $_GET['guid'];
	  $vth = $db->query ("DELETE FROM `orders` WHERE `guid`='".$q."'" );
	  header('location:'.URL.'failed_donations.php'); 
	  } else { ?>
          <div class="col-md-12">
		  <div><!--a href="failed_donations.php?action=add" class="btn btn-success"><i class="fa fa-lg fa-plus"></i>Add New</a--><!-- <a href="failed_donations.php?action=edit" class="btn btn-info btn-flat"><i class="fa fa-lg fa-edit"></i></a><a href="#" class="btn btn-warning btn-flat"><i class="fa fa-lg fa-trash"></i></a>--></div>
		  <?php
            $sth = $db->query ("SELECT * FROM `orders` where `address` != 'Manual' and payment_status != 'Credit' ORDER BY `guid` DESC");
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
                      <th>Donated On</th>
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
                      <td><?php echo $row[date]; ?></td>
                      <td><?php echo $row[note]; ?></td>
                      <?php
                        if (!empty($row[image])) { ?>
                            <td class="col-md-1">
                                <div class="probootstrap-animate fadeInUp probootstrap-animated">
                                    <a href="../adminupload/<?php echo $row[image];?>" class="image-popup">
                                        <img src="../adminupload/<?php echo $row[image];?>"
                                             alt="image" class="img-responsive">
                                    </a>
                                </div>
                            </td>
                        <?php } else { ?>
                            <td></td>
                        <?php } ?>

                        <td class="center"><div class="btn btn-xs btn-group-xs"><a href="failed_donations.php?action=viewDetails&guid=<?php echo $row[0]; ?>"  class="btn btn-warning"><i class="fa fa-eye icon-only"></i></a>  </div></td>
    				  <td class="center"><div class="btn btn-xs btn-group-xs"><a href="<?php echo URL; ?>failed_donations.php?action=deleteData&guid=<?php echo $row[0]; ?>" class="btn btn-danger" onClick="return delete1();"><i class="fa fa-trash icon-only"></i></a> </div></td>
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