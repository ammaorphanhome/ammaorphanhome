<?php ob_start(); error_reporting(0);
require "lib/path.php";
require "lib/config.php";
require "lib/title.php";
require "lib/secure.php";
extract($_POST);
extract($_GET);

if(isset($_POST) && $_POST['submit']=='ADD') {
  	
	//$filename = $_FILES['image']['name'];
	//if(!empty($filename)) {
	//$image = time().$filename;
	//move_uploaded_file($_FILES['image']['tmp_name'],"../adminupload/".$image); 
	
	//}
	
	for($i=0;$i<sizeof($_POST['name']);$i++){
	
		$an = str_replace("'","^^", $_POST['name'][$i]);
		$ans = str_replace('"',"~~", $an);
		//echo "INSERT INTO `video`(`name`,`date`,`description`,`image`) VALUES ('$name','$designation','$ans','$image')";exit;
		//echo "INSERT INTO `tutorial`(`guid`,`id`,`name`,`sbttl`,`wbf`,) VALUES ('','$id','$name','$designation','$ans')";exit;
		//echo "INSERT INTO `tutorial`(`id`,`name`) VALUES ('$id','".$_POST[name][$i]."')";exit;
		
		 $sth = $db->query("INSERT INTO `requirements`(`id`,`name`) VALUES ('$id','".$ans."')");
	}
	if($sth == true)  { ?>
  	        <script type="text/javascript">
  			alert('Data Successfully Inserted');
  			window.location="requirements.php?id=<?php echo $id; ?>";
  			</script>
  	
    <?php } else { ?>
  	        <script type="text/javascript">
  			alert('Please try Again');
  			window.location="requirements.php?id=<?php echo $id; ?>";
  			</script>
  <?php 
  } }
  
  if(isset($_POST) && $_POST['submit']=='EDIT')
  {
  	
	//$filename = $_FILES['image']['name'];
   // if(!empty($filename)) 
	//{
			//$image = time().$filename;
            //$filepath = "../adminupload/".$image;
            //unlink($filepath);
			//move_uploaded_file($_FILES['image']['tmp_name'],"../adminupload/".$image);
             //echo "UPDATE `sub_cat` SET `image`= '$image' WHERE `guid`='$qid'";exit;			
	        //$a1 = $db->query("UPDATE `requirements` SET `image`= '$image' WHERE `guid`='$qid'");
	// }
	
	
	
	
	
	if($name!='')
	{
		$an = str_replace("'","^^", $name);
		$ans = str_replace('"',"~~", $an);
		//echo $refid;exit;
		//echo "UPDATE `requirements` SET `description`= '$ans' WHERE `guid`='$guid'";exit;
		//echo "UPDATE `requirements` SET `name`= '$name',`sbttl`= '$designation',`wbf`= '$ans' WHERE `guid`='$qid'";exit;
	$sth = $db->query("UPDATE `requirements` SET `name`= '$ans' WHERE `guid`='$qid'");
	}
	
	if($sth == true) { ?>
  	          <script type="text/javascript">
  			  alert('Data Successfully Updated');
  			  window.location="requirements.php?id=<?php echo $refid;?>";
  			</script>
			
  	<?php } else { ?>
  	        <script type="text/javascript">
  			alert('Please try Again');
  			window.location="requirements.php?id=<?php echo $refid;?>";
  			</script>
  	<?php } }
	
   if(isset($_POST) && $_POST['action']=='delete') {
  	
	//print_r($_POST); exit;
  	$d = $_POST['guid'];
  	$sth = $db->query("DELETE FROM `requirements` WHERE `guid`='".$d."'");
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
	
	<script>
	var inptval=0;
	
function Append_txt() {
	
event.preventDefault();
    // Create text with jQuery
	//console.log("called");
   $(".topics").append('<label>Topic Name</label><input type="text" name="name[]" placeholder="Enter Topic Here" id="name" class="form-control" required="">');
	
}
</script>
	
	
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
            <h1>requirements</h1>
			</div>
			<div>
            <ul class="breadcrumb">
               <li><a href="home.php"><i class="fa fa-home fa-lg"></i></a></li>
              
              <li class="active"><a href="#requirements.php">requirements</a></li>
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
		<a href="<?php echo URL; ?>requirements.php?id=<?php echo $_GET[id]; ?>" class="btn btn-info">Back</a>
        <div class="row">
		
		<div class="col-md-6">
            <div class="card">
              <h3 class="card-title">Add New  What Will I Learn?</h3>
              <div class="card-body">
                <form method="post" action="<?php echo $_SEVER['PHP_SELF'];?>" enctype="multipart/form-data" onsubmit="return validate();">
                  
				  <div class="form-group topics">
                    <label class="control-label">Topic</label>
                    <input type="text" name="name[]" placeholder="Enter Topic Here" id="name" class="form-control" required>
					</br>
					
                  </div>
				  <a href="#" onClick="Append_txt();" class="btn btn-info">ADD</a>
				  <!--div class="form-group">
                    <label class="control-label">Sub Title</label>
                    <input type="text" name="designation" placeholder="Enter Sub Title" id="designation" class="form-control">
                   <input type="hidden" name="id" value="<?php echo $_GET[id];?>" >
                  </div>
                 
                  <div class="form-group">
                    <label class="control-label">WBF</label>
                    <textarea type="text" name="description" placeholder="Enter WBF " class="form-control" ></textarea>
                  </div-->
				   
				  
                  <!--div class="form-group">
                    <label class="control-label">Image</label>
                    <input type="file" name="image" class="form-control" accept=".jpg, .jpeg" required="">
                  </div-->
				  
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
	   $sth = $db->query ('SELECT * FROM `requirements` WHERE `guid`="'.$id.'"');
	   $row = $sth->fetch();
	   ?>
	   
		  <div class="col-md-6">
		  <a href="<?php echo URL; ?>requirements.php?id=<?php echo $_GET[refid]; ?>" class="btn btn-info">Back</a>
            <div class="card">
              <h3 class="card-title">Edit requirements</h3>
              <div class="card-body">
                <form method="post" action="<?php echo $_SEVER['PHP_SELF'];?>" enctype="multipart/form-data">
                 
				 <div class="form-group">
                    <label class="control-label">Topic</label>
                    <input type="text" name="name" class="form-control" id="name" value="<?php echo $row[name];?>" >
                  </div>
				  
				  <!--div class="form-group">
                    <label class="control-label">Sub Title</label>
                    <input type="text" name="designation" id="designation" class="form-control" value="<?php echo $row[sbttl];?>">
                  </div>
				  
				  <div class="form-group">
                    <label class="control-label">WBF</label>
                    <textarea rows="4" name="description" class="form-control"> <?php echo $row[wbf];?></textarea>
                  </div>
				  
				   <!--div class="form-group">
                    <label class="control-label">WBF</label>
                    <input type="text" name="designation" id="designation" class="form-control" value="<?php echo $row[wbf];?>">
                  </div-->
                  
                  
                  <!--div class="form-group">
                    <label class="control-label">Image</label>
                    <input type="file" name="image" class="form-control" accept=".jpg, .jpeg"><br>
				    <img src="../adminupload/<?php echo $row['image']; ?>" height="100" width="100"/>
                  </div-->
                  
				  <div class="card-footer">
				  <input type="hidden" name="qid" value="<?php echo $id; ?>">
				  <input type="hidden" name="id" value="<?php echo $_GET[refid]; ?>">
                <button type="submit" name="submit" value="EDIT" class="btn btn-primary icon-btn"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>&nbsp;&nbsp;&nbsp;<button type="reset" href="#" class="btn btn-warning"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</button>
              </div>
                </form>
              </div>
            </div>
          </div>
		  <?php } 
	  else if($action == 'deleteData') {
		  
		  
		  
		  {
	  $q = $_GET['guid'];
	  $id = $_GET['id'];
	  $vth = $db->query ("DELETE FROM `requirements` WHERE `guid`='".$q."'" );
	  
	  if($vth==true)
	  {?>
	  <script type="text/javascript">
			alert('Data Successfully Deleted');
			window.location="<?php echo URL; ?>requirements.php?id=<?php echo $id; ?>";
			</script>
	  <?php  } else { ?>
	<script type="text/javascript">
			alert('Please try Again');
			window.location="<?php echo URL; ?>requirements.php?id=<?php echo $id; ?>";
			</script>
	  <?php } }
		  
		  
		  
		  
		  
	 // $q = $_GET['guid'];
	 // $vth = $db->query ("DELETE FROM `requirements` WHERE `guid`='".$q."'" );
	 // header('location:'.URL.'requirements.php'); 
	  
	  
	  } else { ?>
          <div class="col-md-12">
		  <div><a href="tutorial.php?id=<?php echo $_GET[id];?>" class="btn btn-success"><i class="fa fa-lg fa-plus"></i>Add Title Content</a> 
		  <a href="learn.php?id=<?php echo $_GET[id];?>" class="btn btn-success"><i class="fa fa-lg fa-plus"></i>Add What Will I Learn?</a>
		  
		  <a href="curriculum.php?id=<?php echo $_GET[id];?>" class="btn btn-success"><i class="fa fa-lg fa-plus"></i>Add Curriculum For This Course</a>
		  <a href="requirements.php?id=<?php echo $_GET[id];?>" class="btn btn-default"><!--i class="fa fa-lg fa-plus"></i--> Requirements</a>
		 
		  <a href="includes.php?id=<?php echo $_GET[id];?>" class="btn btn-success"><i class="fa fa-lg fa-plus"></i>Add Includes</a>
		  <!--a href="requirements.php?action=add" class="btn btn-success"><i class="fa fa-lg fa-plus"></i>Add New</a><!--a href="requirements.php?action=edit" class="btn btn-info btn-flat"><i class="fa fa-lg fa-edit"></i></a><a href="#" class="btn btn-warning btn-flat"><i class="fa fa-lg fa-trash"></i></a-->
		  </br>
		  </br>
		  </div>
		  
		  
		  
		  <?php
            $sth = $db->query ("SELECT * FROM `requirements` WHERE id='$id'");
			$count = $sth->rowCount(); ?>
            <div class="card">
              <div class="card-body">
                <table id="sampleTable" class="table table-hover table-bordered">
                  <thead>
				  <tr><a href="requirements.php?action=add&id=<?php echo $_GET[id];?>" class="btn btn-success"> <i class="fa fa-lg fa-plus"></i> Add Requirements</a> </br></br> </tr>
                    <tr>
                      <th>S No.</th>
					  <!--th>Image</th-->
                      <th>Topics</th>
                      <!--th> Sub Title</th>
                      <th>WBF</th>
                      
                      <!--th>Add Data Here</th>
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
					  <!--td><img src="../adminupload/<?php echo $row[image]; ?>" height="100" width="100" alt="" /></td-->
					  <td><?php echo $row[name]; ?></td>
					  <!--td><?php echo $row[sbttl]; ?></td>
                      <td><?php echo $row[wbf]; ?></td>
                      
					  <!--td> 
					  
					   <!--div><a href="album.php?id=<?php echo $row[0]; //$_GET[refid];?>" class="btn btn-success"><i class="fa fa-lg fa-plus"></i>Add Data</a-->
					   
					  
					  <!--div class="btn btn-xs btn-group-xs">
					  <a href="album.php?refid=<?php echo $row[0]; ?>"  class="btn btn-inverse"><i class="fa fa-plus-square icon-only"></i></a> 
					  
					  <a href="<?php echo URL; ?>requirements.php?action=deleteData&guid=<?php echo $row[0]; ?>" class="btn btn-danger" onClick="return delete1();"><i class="fa fa-trash icon-only"></i></a> 
					  </div-->
					  </td>
                      
                      <!--td><img src="adminupload/<?php echo $row[5]; ?>" height="100" width="100" alt="" /></td-->
					  <td class="center"><div class="btn btn-xs btn-group-xs"><a href="requirements.php?action=edit&id=<?php echo $row[0]; ?>&refid=<?php echo $row[1]; ?>"  class="btn btn-inverse"><i class="fa fa-edit icon-only"></i></a> 
					  
					 <a href="<?php echo URL; ?>requirements.php?action=deleteData&guid=<?php echo $row[0]; ?>&id=<?php echo $row[1]; ?>" class="btn btn-danger" onClick="return delete1();">Delete </a> </div></td>
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