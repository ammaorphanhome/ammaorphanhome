<?php ob_start(); error_reporting(0);
require "lib/path.php";
require "lib/config.php";
require "lib/title.php";
require "lib/secure.php";
extract($_POST);
extract($_GET);
$aid = $_GET['album'];

if(isset($_POST) && $_POST['submit']=='ADD') {
	$aid= $_POST['aid']; 
	$tmparray=array();
	$namearray=array();
	foreach($_FILES['images1']['tmp_name'] as $tmpname) {
		$array1[]=$tmpname;
	}
	foreach($_FILES['images1']['name'] as $name){
		$array2[]=$name;
	}
	$combine_array=array_combine($array1,$array2);
	foreach($combine_array as $tmpname=>$name) {
		$filename=stripslashes($name);
		$image=time()."_".$filename; 
		move_uploaded_file($tmpname,"../adminupload/".$image);
		
		$sth = $db->query("INSERT INTO `album`(`guid`,`id`,`image`, `can_see`) VALUES ('','$id','$image', '$wishToSee')");
	}
	if(is_array($combine_array))
	{ ?>
	<script type="text/javascript">
			alert('Data Successfully Inserted');
			window.location="<?php echo URL; ?>album.php?id=<?php echo $id; ?>";
			</script>
	<?php }  else { ?>
	<script type="text/javascript">
			alert('Please try Again');
			window.location="<?php echo URL; ?>album.php?id=<?php echo $id; ?>";
			</script>
	<?php } 
}

if(isset($_POST) && $_POST['submit']=='Edit')
{
	echo $qid;
	$aid= $_POST['aid']; 
	$filename = stripslashes($_FILES['images1']['name']);
	if(!empty($filename)) {
		$filepath ="../adminupload/".$imagefile;
		if(file_exists($filepath)) {
			unlink($filepath);
		}
		$image = time()."_".$filename;
		$img_path="../adminupload/".$image;
		move_uploaded_file($_FILES['images1']['tmp_name'], $img_path);
		$ith = $db->query("UPDATE `album` SET `image`='$image', `can_see` = '$wishToSee'  WHERE `guid`='$qid'");

        if($ith == true) { ?>
            <script type="text/javascript">
                alert('Data Successfully Updated');
                window.location="<?php echo URL; ?>past_conferences.php";
            </script>
        <?php } else { ?>
            <script type="text/javascript">
                alert('Please try Again');
                window.location="<?php echo URL; ?>past_conferences.php";
            </script>
        <?php }
    }  else {
        $ith = $db->query("UPDATE `album` SET `can_see` = '$wishToSee'  WHERE `guid`='$qid'");

        if($ith == true) { ?>
            <script type="text/javascript">
                alert('Data Successfully Updated');
                window.location="<?php echo URL; ?>past_conferences.php";
            </script>
        <?php } else { ?>
            <script type="text/javascript">
                alert('Please try Again');
                window.location="<?php echo URL; ?>past_conferences.php";
            </script>
        <?php }
    }

}
if(isset($_POST) && $_POST['action']=='delete') {
	//print_r($_POST); exit;
	 $d = $_POST['guid'];
		    
			$sth = $db->query("DELETE FROM `album` WHERE `guid`='".$d."'");
			if($sth == true) {
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
	<link rel="stylesheet" href="css/lightbox.min.css">
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
            <h1>Gallery</h1>
			</div>
			<div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <!--li>Tables</li-->
              <li class="active"><a href="album.php">Gallery</a></li>
            </ul>
          </div>
          <!--div><a href="#" class="btn btn-primary btn-flat"><i class="fa fa-lg fa-plus"></i></a><a href="#" class="btn btn-info btn-flat"><i class="fa fa-lg fa-refresh"></i></a><a href="#" class="btn btn-warning btn-flat"><i class="fa fa-lg fa-trash"></i></a></div-->
        </div>
		<?php 
		
		if(isset($_GET['action'])) {
		$action=$_GET['action'];
		}
		//echo $url; exit;
		?>
		<?php if(isset($action) && $action=='add') { ?>
		
        <a href="<?php echo URL; ?>album.php?id=<?php echo $id; ?>" class="btn btn-info">Back</a>
        <div class="row">
		<div class="col-md-6">
            <div class="card">
              <h3 class="card-title">Add Properties</h3>
              <div class="card-body">
			  <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
			   <!--div class="form-group">
			        
                    <label class="control-label">Property Name</label>
                    <input type="text" name="name123"  class="form-control" required="">
					<input type="hidden" name="id" value="<?php echo $_GET[id];?>" >
				
					
                  </div-->
				  
				  <div class="form-group">
			        
                    <label class="control-label"> Image</label>
                    <input type="file" name="images1[]" multiple class="form-control" required="">
                    <input type="hidden" name="id" value="<?php echo $_GET[id];?>" >
					
					
                  </div>

                  <div class="form-group">
                      <label for="wishToSee">Would you like to see the photo(s) in Album of Website?</label> <br/>
                      <input type="radio" name="wishToSee" value="Yes" checked>Yes
                      <input type="radio" name="wishToSee" value="No">No
                  </div>

                  <!--div class="form-group">

                   <label class="control-label">Property Discription</label>

                   <textarea type="text" name="discription"  class="form-control" required=""></textarea>
                   <input type="hidden" name="id" value="<?php echo $_GET[id];?>" >


                 </div-->
				  
				  <div class="card-footer">
                <button type="submit" name="submit" value="ADD" class="btn btn-primary icon-btn"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
              </div>
			  </form>
              </div>
            </div>
          </div>
		  </div>
		  <?php } 
       else if(isset($action) && $action=='edit') { 
	   $sth = $db->query ('SELECT * FROM `album` WHERE `guid`="'.$q.'"');
	   $row = $sth->fetch();
           ?>
		    <a href="<?php echo URL; ?>album.php?id=<?php echo $aid; ?>" class="btn btn-info">Back</a>
        <div class="row">
		<div class="col-md-6">
            <div class="card">
              <h3 class="card-title">Edit Album</h3>
              <div class="card-body">
			  <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
			  
			  
			   <!--div class="form-group">

                    <label class="control-label">Property Name</label>
                    <input type="text" name="name" value="<?php echo $row['name'];?>" class="form-control" >
					<input type="hidden" name="id" value="<?php echo $_GET[id];?>" >


                  </div-->


			  
			  
			   <div class="form-group">
                    <label class="control-label"> Image</label>
                    <input type="file" name="images1" class="form-control" >
					<br>
			     	<img src="../adminupload/<?php echo $row['image']; ?>" height="150" width="150"/>
					<!--label>Upload<strong> MORE THAN ONE IMAGE</strong>&nbsp;&nbsp;At A Time</label-->
                  </div>


                  <div class="form-group">
                      <label for="wishToSee">Would you like to see the photo(s) in Album of Website?</label> <br/>
                      <input type="radio" name="wishToSee" id="IdYes" value="Yes">Yes
                      <input type="radio" name="wishToSee" id="IdNo" value="No">No
                  </div>

                  <?php if($row['can_see'] == 'Yes') { ?>
                      <script type="text/javascript">
                          document.getElementById("IdYes").checked = true;
                      </script>
                  <?php }  else { ?>
                      <script type="text/javascript">
                          document.getElementById("IdNo").checked = true;
                      </script>
                  <?php } ?>

                  <!--div class="form-group">

                    <label class="control-label">Property Discription</label>
                     <textarea type="text" name="discription"  class="form-control" required=""><?php echo $row['discription'];?></textarea>
                    <input type="hidden" name="id" value="<?php echo $_GET[id];?>" >


                  </div-->


				  <div class="card-footer">
				   <input type="hidden" name="qid" value="<?php echo $q; ?>">
                    <input type="hidden" name="aid" value="<?php echo $id; ?>">
                <input type="hidden" name="imagefile" value="<?php echo $row[2]; ?>">
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
	  $id = $_GET['id'];
	  $vth = $db->query ("DELETE FROM `album` WHERE `guid`='".$q."'" );
	  
	  if($vth==true)
	  {?>
	  <script type="text/javascript">
			alert('Data Successfully Deleted');
			window.location="<?php echo URL; ?>album.php?id=<?php echo $id; ?>";
			</script>
	  <?php  } else { ?>
	<script type="text/javascript">
			alert('Please try Again');
			window.location="<?php echo URL; ?>album.php?id=<?php echo $id; ?>";
			</script>
	  <?php } } else { ?>
		  <div class="row">
          <div class="col-md-12">
		  <div><a href="album.php?action=add&id=<?php echo $_GET[id];?>" class="btn btn-success"><i class="fa fa-lg fa-plus"></i>Add New</a>
		  
		  <!-- <a href="register.php?action=edit" class="btn btn-info btn-flat"><i class="fa fa-lg fa-edit"></i></a><a href="#" class="btn btn-warning btn-flat"><i class="fa fa-lg fa-trash"></i></a>--></div>
            <div class="card">
              <div class="card-body">
                <table  class="table table-hover table-bordered">
				<?php $m=1;
				
			 $sth = $db->query ("SELECT * FROM `album`  WHERE id='$id'");
			 $count = $sth->rowCount();
			 if($count==0){
			 ?>
			 <div class="row" style="text-align:center"><font color="#FF0000"><strong>No Records Available</strong></font></div>
			 <?php } else { ?>
                  <tr>
				  <?php $m=1;
				 while($row = $sth->fetch()) { ?>
                <td align="center">
				<!--h3 class="text-success"><?php echo $row['name'];?> </h3-->
               <a class="example-image-link" data-lightbox="example-set" href="../adminupload/<?php echo $row['image'];?>"> <div class="gallery_album_bg"><img src="../adminupload/<?php echo $row['image'];?>" style="width:150px; height:150px;"/>
				</div></a>
				</br>
				<span style="text-align:center"> <a href="<?php echo URL; ?>album.php?action=edit&q=<?php echo $row[0]; ?>&album=<?php echo $id; ?>" class="btn btn-primary icon-btn">Edit </a> <a href="<?php echo URL; ?>album.php?action=deleteData&guid=<?php echo $row[0]; ?>&id=<?php echo $row[1]; ?>" class="btn btn-danger" onClick="return delete1();">Delete </a></span>
                    </td>
				 <?php if($m%4==0) { ?> </tr><tr>	<?php   } $m++; ?>
			 <?php } } ?>
				</tr>
                </table>
              </div>
            </div>
			
          </div>
        </div>
		<?php } ?>
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
	<script src="js/lightbox-plus-jquery.min.js"></script>
	<script type="text/javascript">
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