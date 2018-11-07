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
        $today = date("Y-m-d");

        ?>
        <?php
        
            $filename = $_FILES['image']['name'];
            if(!empty($filename)) {
            	$image = time().$filename;
            	move_uploaded_file($_FILES['image']['tmp_name'],"../adminupload/".$image); 
        	}

            $time = strtotime($_POST['eventDate']);
            if ($time) {
                $new_date = date('Y-m-d', $time);
            } else { ?>
                <script type="text/javascript">
                    alert('Invalid date selected, Please try Again');
              		window.location="<?php echo URL; ?>news_events.php";
    		 	</script>
            <?php }

        	if($shortDescription !='' && $description!= ''){
        	    $today = date("Y-m-d");

                $title = str_replace("'", "\'", $title);
                $title = str_replace('"', "\"", $title);

                $shortDescription = str_replace("'", "\'", $shortDescription);
                $shortDescription = str_replace('"', "\"", $shortDescription);

                $description = str_replace("'", "\'", $description);
                $description = str_replace('"', "\"", $description);

                $sth = $db->query("INSERT INTO `news` (`title`, `short_description`, `image`, `description`, `date`) 
                                            VALUES ('$title', '$shortDescription', '$image' , '$description', '$new_date')");
    	       
    	       $insid = $db->lastInsertId();
    	    
    	       
    	       if($sth == true)  { ?> 
    	    		<script type="text/javascript">
              			alert('News and Event details successfully added');
              			window.location="<?php echo URL; ?>news_events.php";
            		</script>
    	    <?php } else { ?>
    	    		<script type="text/javascript">
      					alert('News and Event are not added, Please try Again');
              			window.location="<?php echo URL; ?>news_events.php";
    		 		</script>
    	    <?php } ?>
    	    
    <?php } else { ?> 
             <script type="text/javascript">
      			alert('Please enter short description and description !');
      			window.location="<?php echo URL; ?>news_events.php";
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
		
          <div><h1>Enter New and Events</h1></div>
			
		<div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li class="active"><a href="news_events.php">New & Events </a></li>
            </ul>
          </div>
          
        </div>

	  <?php if(isset($action) && $action=='add') { ?>
	  		<a href="<?php echo URL; ?>news_events.php" class="btn btn-info">Back</a>
			<div class="row">
				<div class="col-md-6">
					<div class="card">
						<h3 class="card-title">Add News & Events Details</h3>

						<div class="card-body">
							<form role="form" method="post"
								action="<?php echo $_SERVER['PHP_SELF']; ?>"
								enctype="multipart/form-data" onsubmit="return validate();">
								
								<div class="form-group">
                                    <label class="control-label">Ttile of the News and Events:</label>
                                    <input type="text" name="title" placeholder="Enter Tile of the News and Events" id="title" class="form-control" required>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label">Short Decription To display on Home page:</label>
                                    <input type="text" name="shortDescription" placeholder="Enter Short Decription to display on home page's news section" id="shortDescription" class="form-control" required>
                                </div>
                                
                                <div class="form-group" class="control-label">
                                    <label for="message">Note</label>
                                    <textarea cols="30" rows="8" class="form-control" id="description" name="description"
                                              placeholder="Enter Decription for News & Events"></textarea>
                                </div>
    
                                <div class="form-group">
                                    <label for="photo" class="control-label">Upload A Photo</label>
                                    <input type="file" class="form-control" id="photo" accept=".jpg, .jpeg" name="image">
                                </div>

                                <div class="form-group">
                                    <label for="eventDate" class="control-label">Event Date</label>
                                    <input type="date" class="form-control" id="eventDate" name="eventDate" value="<?php echo date('Y-m-d'); ?>" >
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
	       $sth = $db->query ('SELECT * FROM `news` WHERE `guid`="'.$q.'"');
	       $row = $sth->fetch();
	  ?>
	   		
				  
		  <div class="col-md-12">
		  <a href="<?php echo URL; ?>news_events.php" class="btn btn-info">Back</a>
            <div class="card">
              <h3 class="card-title"><?php echo $row[title]; ?></h3>
              <div class="card-body">
                <form method="post" action="<?php echo $_SEVER['PHP_SELF'];?>" enctype="multipart/form-data">
                  
				  
				  <div class="form-group">
                    <label class="control-label">Short description</label>
                    <input readonly class="form-control" value=" <?php echo $row[short_description];?> ">
                  </div>
                 
                
                  <div class="form-group">
                    <label for="description" class="control-label">Description</label>
                    <textarea readonly cols="30" rows="8" class="form-control" name="description" id="description"><?php echo $row[description];?></textarea>
                  </div>
                  
                  
                  <div class="form-group">
                    <label class="control-label">Photo</label></br>
                    <img src="../adminupload/<?php echo $row[image];?>" style="width:150px;height:150px">
                  </div>

                  <div class="form-group">
                        <label for="eventDate" class="control-label">Event Date</label>
                        <input readonly type="date" class="form-control" id="eventDate" name="eventDate" value="<?php echo $row[image]; ?>" >
                  </div>
                  
				  <div class="clearfix"></div>
	   	  		     
                </form>
              </div>
            </div>
          </div>
		  <?php } 
		else if(isset($_POST) && $_POST['submit']=='Edit')
		  {
		      $aid= $_POST['aid'];
		      $filename = stripslashes($_FILES['image']['name']);

              $title = str_replace("'", "\'", $title);
              $title = str_replace('"', "\"", $title);

              $shortDescription = str_replace("'", "\'", $shortDescription);
              $shortDescription = str_replace('"', "\"", $shortDescription);

              $description = str_replace("'", "\'", $description);
              $description = str_replace('"', "\"", $description);

              $time = strtotime($_POST['eventDate']);
              if ($time) {
                  $new_date = date('Y-m-d', $time);
              } else { ?>
                  <script type="text/javascript">
                      alert('Invalid date selected, Please try Again');
                      window.location="<?php echo URL; ?>news_events.php";
                  </script>
              <?php }

              if(!empty($filename)) {
		          $filepath ="../adminupload/".$imagefile;
		          if(file_exists($filepath)) {
		              unlink($filepath);
		          }
		          $image = time()."_".$filename;
		          move_uploaded_file($_FILES['image']['tmp_name'],"../adminupload/".$image);

		          $today = date("Y-m-d");
		          
		          $sth = $db->query("UPDATE `news` SET `title`='$title' , `date`='$new_date', `short_description`='$shortDescription' , `description`='$description' , `image`='$image'  WHERE `guid`='$qid'");
		          
		          if($sth == true) { ?>
        			<script type="text/javascript">
        				alert('Data Successfully Updated');
        				window.location="<?php echo URL; ?>news_events.php";
        			</script>
            	  <?php } else { ?>
            			<script type="text/javascript">
            				alert('Please try Again');
            				window.location="<?php echo URL; ?>news_events.php";
            			</script>
            	  <?php } 
		          
		      } else {
		          
		          $today = date("Y-m-d");
		          
		          $sth = $db->query("UPDATE `news` SET `title`='$title' , `date`='$new_date', `short_description`='$shortDescription' , `description`='$description'  WHERE `guid`='$qid'");
		          
		          if($sth == true) { ?>
        			<script type="text/javascript">
        				alert('Data Successfully Updated');
        				window.location="<?php echo URL; ?>news_events.php";
        			</script>
            	  <?php } else { ?>
            			<script type="text/javascript">
            				alert('Please try Again');
            				window.location="<?php echo URL; ?>news_events.php";
            			</script>
            	  <?php } 
    		          
    		      }
        	
		} else if(isset($action) && $action=='edit') {
		    $sth = $db->query ('SELECT * FROM `news` WHERE `guid`="'.$guid.'"');
		      $row = $sth->fetch();
		      ?>
    		    <a href="<?php echo URL; ?>news_events.php?id=<?php echo $guid; ?>" class="btn btn-info">Back</a>
                <div class="row">
        		<div class="col-md-6">
                    <div class="card">
                      <h3 class="card-title">Edit News & Events</h3>
                      <div class="card-body">
        			  <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
        			  
        			  	 <div class="form-group">
                            <label class="control-label">Title</label>
                            <input class="form-control" name="title" value=" <?php echo $row[title];?> ">
                          </div>
                          
 						 <div class="form-group">
                            <label class="control-label">Short description</label>
                            <input class="form-control" name="shortDescription" value=" <?php echo $row[short_description];?> ">
                          </div>
                         
                        
                          <div class="form-group">
                            <label for="message" class="control-label">Description</label>
                            <textarea cols="30" rows="8" class="form-control" name="description" id="description" ><?php echo $row[description];?></textarea>
                          </div>

        			  	  <div class="form-group">
                            <label for="photo" class="control-label">Upload a new Photo</label>
                            <input type="file" class="form-control" id="photo" accept=".jpg, .jpeg" name="image">
                          </div>

                          <div class="form-group">
                              <label for="eventDate" class="control-label">Event Date</label>
                              <input type="date" class="form-control" id="eventDate" name="eventDate" value="<?php echo $row[date]; ?>"  >
                          </div>

                          <div class="form-group">
                            <label class="control-label">Previous Photo</label></br>
                            <img src="../adminupload/<?php echo $row[image];?>" style="width:150px;height:150px">
                          </div>
        				  
        				  <div class="clearfix"></div>
        				  
        	   	  		  
        				  <div class="card-footer">
        				    <input type="hidden" name="qid" value="<?php echo $guid; ?>">
                            <input type="hidden" name="aid" value="<?php echo $guid; ?>">
                            <input type="hidden" name="imagefile" value="<?php echo $row[image]; ?>">
                        <button type="submit" name="submit" value="Edit" class="btn btn-primary icon-btn"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
                      </div>
        			  </form>
                      </div>
                    </div>
                  </div>
        		  </div>
		  <?php }
      
      else if($action == 'deleteData') {
	       $q = $_GET['guid'];
	       $vth = $db->query ("DELETE FROM `news` WHERE `guid`='".$q."'" );
	       header('location:'.URL.'news_events.php'); 
	  
	  } else { ?>
	  
	  	 <?php if(!isset($action) || isset($action) && $action != 'add') { ?>
	  	 	  	 	
          <div class="col-md-12">
		  <div>
			 <a href="news_events.php?action=add&id=<?php echo $_GET[id];?>"
				class="btn btn-success"><i class="fa fa-lg fa-plus"></i>Add New</a>
		  </div>
					
		  <?php
            $sth = $db->query ("SELECT * FROM `news` ORDER BY `guid` DESC");
			$count = $sth->rowCount(); ?>
            <div class="card">
              <div class="card-body">
                <table id="sampleTable" class="table table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>S No.</th>
                      <th>Title</th>
                      <th>Short description</th>
                      <th>Description</th>
                      <th>Event Date</th>
                      <th>Photo</th>
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
                      <td><?php echo $row[title];?> </td>
                      <td><?php echo $row[short_description]; ?></td>
                      <td><?php echo $row[description]; ?></td>
                      <td><?php echo $row[date]; ?></td>
                      
                      <th><img src="../adminupload/<?php echo $row[image];?>" style="width:150px;height:150px"></th>
                      
					  <td class="center"><div class="btn btn-xs btn-group-xs"><a href="news_events.php?action=viewDetails&guid=<?php echo $row[guid]; ?>"  class="btn btn-warning"><i class="fa fa-eye icon-only"></i></a>  </div></td>
					  
					  <td class="center"><div class="btn btn-xs btn-group-xs"><a href="<?php echo URL; ?>news_events.php?action=edit&guid=<?php echo $row[guid]; ?>" class="btn btn-primary icon-btn">Edit </a> <a href="<?php echo URL; ?>news_events.php?action=deleteData&guid=<?php echo $row[0]; ?>" class="btn btn-danger" onClick="return delete1();"><i class="fa fa-trash icon-only"></i></a> </div></td>
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