<?php ob_start(); error_reporting(0);
require "lib/path.php";
require "lib/config.php";
require "lib/title.php";
require "lib/secure.php";
extract($_POST);
extract($_GET);
$aid = $_GET['chapters'];
$refid= $_GET['refid'];

if(isset($_POST) && $_POST['submit']=='ADD') {
  	

		
		
		 $sth = $db->query("INSERT INTO `chapters`(`guid`,`video`) VALUES ('','$name')");
	
	if($sth == true)  { ?>
  	        <script type="text/javascript">
  			alert('Data Successfully Inserted');
  			window.location="<?php echo URL; ?>chapters.php";
  			</script>
  	
    <?php } else { ?>
  	        <script type="text/javascript">
  			alert('Please try Again');
  			window.location="<?php echo URL; ?>chapters.php";
  			</script>
  <?php 
} }
  
  
  
if(isset($_POST) && $_POST['submit']=='Edit')
{
	
	$id=$_POST[id];
	$refid=$_POST[refid];
	
	
	
	if($name!='')
	{
		$an = str_replace("'","^^", $name);
		$ans = str_replace('"',"~~", $an);
		//echo "UPDATE `past_conferences` SET `description`= '$ans' WHERE `guid`='$guid'";exit;
	$sth = $db->query("UPDATE `chapters` SET `video`= '$name' WHERE `guid`='$qid'");
	}
	if($sth == true) { ?>
	<script type="text/javascript">
			alert('Data Successfully Updated');
			window.location="<?php echo URL; ?>chapters.php";
			</script>
	<?php } else { ?>
	<script type="text/javascript">
			alert('Please try Again');
			window.location="<?php echo URL; ?>chapters.php";
			</script>
	<?php } 
}
if(isset($_POST) && $_POST['action']=='delete') {
	//print_r($_POST); exit;
	 $d = $_POST['guid'];
		    
			$sth = $db->query("DELETE FROM `chapters` WHERE `guid`='".$d."'");
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
            <h1>Videos</h1>
			</div>
			<div>
            <ul class="breadcrumb">
              <li><a href="home.php"><i class="fa fa-home fa-lg"></i></a></li>
              <!--li>Tables</li-->
              <li class="active"><a href="#chapters.php">Videos</a></li>
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
		
        <a href="<?php echo URL; ?>chapters.php?id=<?php echo $_GET[id];?>" class="btn btn-info">Back</a>
        <div class="row">
		<div class="col-md-6">
            <div class="card">
              <h3 class="card-title">Add Videos</h3>
              <div class="card-body">
			  <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
			   <div class="form-group">
			        
                    <label class="control-label">Video</label>
					
					<input type="text" name="name" placeholder="Enter Video URL" class="form-control"  required="">
					
					 <!--label class="control-label">Video Duration Time</label>
					
					<input type="text" name="vtme" placeholder="Enter Video Duration Time" class="form-control"  required="">
					
					<label class="control-label">Video</label>
					
					<input type="file" name="image" class="form-control"  required=""-->
					
					 
					
					
                    <!--input type="file" name="images1[]"  class="form-control" required=""-->
					<input type="hidden" name="id" value="<?php echo $_GET[id];?>" >
					<input type="hidden" name="refid" value="<?php echo $refid;?>" >
					
					<!--label>Upload<strong> MORE THAN ONE IMAGE</strong>&nbsp;&nbsp;At A Time</label-->
                  </div>
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
	   $sth = $db->query ('SELECT * FROM `chapters` WHERE `guid`="'.$q.'"');
	   $row = $sth->fetch();
           ?>
		    <a href="<?php echo URL; ?>chapters.php?id=<?php echo $row[1]; ?>" class="btn btn-info">Back</a>
        <div class="row">
		<div class="col-md-6">
            <div class="card">
              <h3 class="card-title">Edit Videos</h3>
              <div class="card-body">
			  <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
			 
			  
			   <div class="form-group">
			   
			   <label class="control-label">Videos </label>
					
					<input type="text" name="name" value="<?php echo $row['3'];?>" placeholder="Enter URL " class="form-control"  required="">
					
					 </br>
					   
			   <iframe width="100%" height="250" src="<?php echo $row['video'];?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
				
					 
			   
                    <!--label class="control-label">Image</label>
                    <input type="file" name="images1" class="form-control" >
					<br>
			     	<img src="../adminupload/<?php echo $row['image']; ?>" height="150" width="150"/>
					<!--label>Upload<strong> MORE THAN ONE IMAGE</strong>&nbsp;&nbsp;At A Time</label-->
                  </div>
				  <div class="card-footer">
				   <input type="hidden" name="qid" value="<?php echo $q; ?>">
                    <input type="hidden" name="id" value="<?php echo $row[1]; ?>">
                <input type="hidden" name="refid" value="<?php echo $row[2]; ?>">
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
	  $vth = $db->query ("DELETE FROM `chapters` WHERE `guid`='".$q."'" );
	  
	  if($vth==true)
	  {?>
	  <script type="text/javascript">
			alert('Data Successfully Deleted');
			window.location="<?php echo URL; ?>chapters.php?id=<?php echo $id; ?>";
			</script>
	  <?php  } else { ?>
	<script type="text/javascript">
			alert('Please try Again');
			window.location="<?php echo URL; ?>chapters.php?id=<?php echo $id; ?>";
			</script>
	  <?php } } else { ?>
		  <div class="row">
		  
		  
		  
          <div class="col-md-12">
		  
		  <div><a href="chapters.php?action=add&id=<?php echo $_GET[id];?>&refid=<?php echo $refid;?>" class="btn btn-success"><i class="fa fa-lg fa-plus"></i>Add New</a>
		  
		  <!--a href="<?php echo URL; ?>curriculum.php?id=<?php echo $_GET[refid]; ?>" class="btn btn-info">Back</a-->
		  
		  <!-- <a href="register.php?action=edit" class="btn btn-info btn-flat"><i class="fa fa-lg fa-edit"></i></a><a href="#" class="btn btn-warning btn-flat"><i class="fa fa-lg fa-trash"></i></a>--></div>
            <div class="card">
              <div class="card-body">
                <table  class="table table-hover table-bordered">

				<?php $m=1;
				
			 $sth = $db->query ("SELECT * FROM `chapters`");
			 $count = $sth->rowCount();
			 if($count==0){
			 ?>
			 <div class="row" style="text-align:center"><font color="#FF0000"><strong>No Records Available</strong></font></div>
			 <?php } else { ?>
                  <tr>
				  <?php $m=1;
				 while($row = $sth->fetch()) { ?>
                <td align="center">
				
				
			   <div class="gallery_album_bg">
			   
			   
			   <iframe width="100%" height="315" src="<?php echo $row[video];?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
			   
           
			 
			   
			   
				</div>
				
				<!--/a-->
				<span style="text-align:center"><label style="float:left;"> <b> 
				
				</b> </label> <a href="<?php echo URL; ?>chapters.php?action=edit&q=<?php echo $row[0]; ?>&id=<?php echo $id; ?>" class="btn btn-primary icon-btn">Edit </a> <a href="<?php echo URL; ?>chapters.php?action=deleteData&guid=<?php echo $row[0]; ?>&id=<?php echo $row[1]; ?>" class="btn btn-danger" onClick="return delete1();">Delete </a></span>
                    </td>
				 <?php if($m%2==0) { ?> </tr><tr>	<?php   } $m++; ?>
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
	<script type="text/javascript">
$("body").on("change",".statusChange",function(){
    var guid = $(this).data('guid'); //alert(guid);
    var ld = ".update-st-"+guid;     //alert(ld);
  var value = $(this).val();  alert('Video is ' + value);
  $.ajax({
    type:"post",
    url:"statusupdate2.php",
    beforeSend: function(){
      $(ld).html('<div id="image" align="center"><img src="<?php URL;?>images/ajax-loader.gif" alt="" height="32" width="32"></div>');
    },          
    data:"guid="+guid+"&status="+value+"&Submit=updatestatus",
    success:function(data){
       //alert(data);
          location.reload();
        }
  });
});   
   </script>
	
	
  </body>
</html>