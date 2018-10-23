<?php ob_start(); error_reporting(0);
require "lib/path.php";
require "lib/config.php";
require "lib/title.php";
require "lib/secure.php";
extract($_POST);
extract($_GET);

if(isset($_POST) && $_POST['submit']=='ADD') {
  	
	$filename = $_FILES['image']['name'];
	if(!empty($filename)) {
	$image = time().$filename;
	move_uploaded_file($_FILES['image']['tmp_name'],"../adminupload/".$image); 
	
	}
	
	 if($description!='')
	{
		$an = str_replace("'","^^", $description);
		$ans = str_replace('"',"~~", $an);
		//echo "INSERT INTO `video`(`name`,`date`,`description`,`image`) VALUES ('$name','$designation','$ans','$image')";exit;
		 $sth = $db->query("INSERT INTO `video`(`name`,`price`,`description`,`image`) VALUES ('$name','$designation','$ans','$image')");
	}
	if($sth == true)  { ?>
  	        <script type="text/javascript">
  			alert('Data Successfully Inserted');
  			window.location="video.php";
  			</script>
  	
    <?php } else { ?>
  	        <script type="text/javascript">
  			alert('Please try Again');
  			window.location="video.php";
  			</script>
  <?php 
  } }
  
  if(isset($_POST) && $_POST['submit']=='EDIT')
  {
  	
	$filename = $_FILES['image']['name'];
    if(!empty($filename)) 
	{
			$image = time().$filename;
            $filepath = "../adminupload/".$image;
            unlink($filepath);
			move_uploaded_file($_FILES['image']['tmp_name'],"../adminupload/".$image);
             //echo "UPDATE `sub_cat` SET `image`= '$image' WHERE `guid`='$qid'";exit;			
	        $a1 = $db->query("UPDATE `video` SET `image`= '$image' WHERE `guid`='$qid'");
	 }
	
	if($description!='')
	{
		$an = str_replace("'","^^", $description);
		$ans = str_replace('"',"~~", $an);
		//echo "UPDATE `video` SET `description`= '$ans' WHERE `guid`='$guid'";exit;
	$sth = $db->query("UPDATE `video` SET `name`= '$name',`designation`= '$designation',`description`= '$ans' WHERE `guid`='$qid'");
	}
	
	if($sth == true) { ?>
  	          <script type="text/javascript">
  			  alert('Data Successfully Updated');
  			  window.location="video.php";
  			</script>
			
  	<?php } else { ?>
  	        <script type="text/javascript">
  			alert('Please try Again');
  			window.location="video.php";
  			</script>
  	<?php } }
	
   if(isset($_POST) && $_POST['action']=='delete') {
  	
	//print_r($_POST); exit;
  	$d = $_POST['guid'];
  	$sth = $db->query("DELETE FROM `video` WHERE `guid`='".$d."'");
  	if($sth == true) 
  	{
  	 echo "1111";	 exit;
  	} 
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
          <div>
            <h1>Videos Tutorial</h1>
			</div>
			<div>
            <ul class="breadcrumb">
              <li><a href="home.php"><i class="fa fa-home fa-lg"></i></a></li>
              
              <li class="active"><a href="#video.php">Videos Tutorial</a></li>
            </ul>
          </div>
          
        </div>
		<?php 
  		extract($_GET);
  		if(isset($_GET['action'])) 
  		{
  		  $action=$_GET['action'];
  		}
  		//echo $url; exit;
  		?>
		<?php if(isset($action) && $action=='add') { ?>
		<a href="<?php echo URL; ?>video.php" class="btn btn-info">Back</a>
        <div class="row">
		
		<div class="col-md-6">
            <div class="card">
              <h3 class="card-title">Add New video Tutorial</h3>
              <div class="card-body">
                <form method="post" action="<?php echo $_SEVER['PHP_SELF'];?>" enctype="multipart/form-data" onsubmit="return validate();">
                  
				  <div class="form-group">
                    <label class="control-label">Title</label>
                    <input type="text" name="name" placeholder="Enter Name" id="name" class="form-control" required>
                  </div>
                 
                  <div class="form-group">
                    <label class="control-label">Description</label>
                    <textarea type="text" name="description" placeholder="Enter Description " class="form-control" ></textarea>
                  </div>
				   <div class="form-group">
                    <label class="control-label">Price</label>
                    <input type="text" name="designation" placeholder="Enter Price" id="designation" class="form-control">
                  </div>
				  
                  <div class="form-group">
                    <label class="control-label">Image</label>
                    <input type="file" name="image" class="form-control" accept=".jpg, .jpeg" required="">
                  </div>
				  
				  <div class="card-footer">
                <button type="submit" name="submit" value="ADD" class="btn btn-primary icon-btn"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>&nbsp;&nbsp;&nbsp;<button type="reset" href="#" class="btn btn-warning"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</button>
              </div>
                </form>
              </div>
            </div>
          </div>
		  <?php }
	  else if(isset($action) && $action=='edit') { 
	   $q = $_GET['guid'];
	   $sth = $db->query ('SELECT * FROM `video` WHERE `guid`="'.$q.'"');
	   $row = $sth->fetch();
	   ?>
	   
		  <div class="col-md-6">
		  <a href="<?php echo URL; ?>video.php" class="btn btn-info">Back</a>
            <div class="card">
              <h3 class="card-title">Edit video</h3>
              <div class="card-body">
                <form method="post" action="<?php echo $_SEVER['PHP_SELF'];?>" enctype="multipart/form-data">
                 
				 <div class="form-group">
                    <label class="control-label">Title</label>
                    <input type="text" name="name" class="form-control" id="name" value="<?php echo $row[name];?>" >
                  </div>
				  
				  <div class="form-group">
                    <label class="control-label">Description</label>
                    <textarea rows="4" name="description" class="form-control"> <?php echo $row[description];?></textarea>
                  </div>
				  
                  <div class="form-group">
                    <label class="control-label">Price</label>
                    <input type="text" name="designation" id="designation" class="form-control" value="<?php echo $row[price];?>">
                  </div>
                  
                  <div class="form-group">
                    <label class="control-label">Image</label>
                    <input type="file" name="image" class="form-control" accept=".jpg, .jpeg"><br>
				    <img src="../adminupload/<?php echo $row['image']; ?>" height="100" width="100"/>
                  </div>
                  
				  <div class="card-footer">
				  <input type="hidden" name="qid" value="<?php echo $q; ?>">
                <button type="submit" name="submit" value="EDIT" class="btn btn-primary icon-btn"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>&nbsp;&nbsp;&nbsp;<button type="reset" href="#" class="btn btn-warning"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</button>
              </div>
                </form>
              </div>
            </div>
          </div>
		  <?php } 
	  else if($action == 'deleteData') {
	  $q = $_GET['guid'];
	  $vth = $db->query ("DELETE FROM `video` WHERE `guid`='".$q."'" );
	  header('location:'.URL.'video.php'); 
	  } else { ?>
          <div class="col-md-12">
		  <div><a href="video.php?action=add" class="btn btn-success"><i class="fa fa-lg fa-plus"></i>Add New Videos Tutorial</a> <!--<a href="video.php?action=edit" class="btn btn-info btn-flat"><i class="fa fa-lg fa-edit"></i></a><a href="#" class="btn btn-warning btn-flat"><i class="fa fa-lg fa-trash"></i></a>--></div>
		  <?php
            $sth = $db->query ("SELECT * FROM `video` ORDER BY `guid` DESC");
			$count = $sth->rowCount(); ?>
            <div class="card">
              <div class="card-body">
                <table id="sampleTable" class="table table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>S No.</th>
					  <th>Image</th>
                      <th>Video Title</th>
                      <th>Video Price</th>
                      
                      <th>Add Data Here</th>
                      <!--th>Image</th-->
					  <th>Edit/Delete</th>
                    </tr>
                  </thead>
				  
                  <tbody>
				  <?php 
					   
					    if($count > 0) { 
						$m = 1;
						 while($row = $sth->fetch()) {
						 $an = str_replace("^^","'", $row['description']);
		                     $ans = str_replace('~~','"', $an);
                        ?>
                    <tr>
                      <td><?php echo $m; ?></td>
					  <td><img src="../adminupload/<?php echo $row[image]; ?>" height="100" width="100" alt="" /></td>
					  <td><?php echo $row[name]; ?></td>
                      <td><?php echo $row[price]; ?></td>
                      
					  <td> 
					  
					   <div><a href="tutorial.php?id=<?php echo $row[0]; //$_GET[refid];?>" class="btn btn-success"><i class="fa fa-lg fa-plus"></i>Add Data</a>
					  
					  <!--div class="btn btn-xs btn-group-xs">
					  <a href="album.php?refid=<?php echo $row[0]; ?>"  class="btn btn-inverse"><i class="fa fa-plus-square icon-only"></i></a> 
					  
					  <a href="<?php echo URL; ?>video.php?action=deleteData&guid=<?php echo $row[0]; ?>" class="btn btn-danger" onClick="return delete1();"><i class="fa fa-trash icon-only"></i></a> 
					  </div-->
					  </td>
                      
                      <!--td><img src="adminupload/<?php echo $row[5]; ?>" height="100" width="100" alt="" /></td-->
					  <td class="center"><div class="btn btn-xs btn-group-xs"><a href="video.php?action=edit&guid=<?php echo $row[0]; ?>"  class="btn btn-inverse"><i class="fa fa-edit icon-only"></i></a> <a href="<?php echo URL; ?>video.php?action=deleteData&guid=<?php echo $row[0]; ?>" class="btn btn-danger" onClick="return delete1();"><i class="fa fa-trash icon-only"></i></a> </div></td>
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
<script type="text/javascript" src="assets/nicEdit.js"></script>
<script type="text/javascript">
bkLib.onDomLoaded(function() {
new nicEditor({fullPanel : true}).panelInstance('des');
//new nicEditor({fullPanel : true}).panelInstance('management');
});
</script>
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