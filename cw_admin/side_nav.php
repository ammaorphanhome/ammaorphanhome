<?php
require("lib/config.php");
$arr =  basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
$add = substr($arr,0,-4);
echo "adddd===>".$add;
?>
<aside class="main-sidebar hidden-print">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image"><img src="images/images.jpg" alt="User Image" class="img-circle"></div>
            <div class="pull-left info">
              <p style="margin-top: 11px;
    /* margin-bottom: 5px; */
    
    font-size: 14px;"><?php if($_SESSION['loginRole']=='superadmin') { echo TITLE; } else { echo $_SESSION['loginRole'];  }?> </p>
              
            </div>
          </div>
          <script> 
			alert("action ==> " <?php echo $add; ?>);
          </script>
          <!-- Sidebar Menu-->
          <ul class="sidebar-menu">
            <li class="<?php if($add==='home'){ echo "active"; }?>"><a href="home.php"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
			
			<li class="<?php if($add==='past_conferences'){ echo "active"; }?>"><a href="past_conferences.php"><i class="fa fa-calendar"></i><span>Album</span></a></li>
			
			<!--li class="<?php if($add==='events'){ echo "active"; }?>"><a href="album.php"><i class="fa fa-image"></i><span>Gallery</span></a></li-->
			
			<!--li class="<?php if($add==='Video'){ echo "active"; }?>"><a href="chapters.php"><i class="fa fa-film"></i><span>Videos</span></a></li-->
			
			<li class="<?php if($add==='events'){ echo "active"; }?>"><a href="events.php"><i class="fa fa-photo"></i><span>Videos</span></a></li>
			
			<li class="<?php if($add==='news_events'){ echo "active"; }?>"><a href="news_events.php"><i class="fa fa-file"></i><span>News & Events</span></a></li>
			
			<li class="<?php if($add==='manual_donation'){ echo "active"; }?>"><a href="manual_donation.php"><i class="fa fa-money"></i><span>Manual Donations</span></a></li>
			
			<li class="<?php if($add==='ysa'){ echo "active"; }?>"><a href="ysa.php"><i class="fa fa-check"></i><span>Successful Site Donations</span></a></li>
			
			<li class="<?php if($add==='failed_donations'){ echo "active"; }?>"><a href="failed_donations.php"><i class="fa fa-times"></i><span>Failed Site Donations</span></a></li>
			
		
			
			<!--li class="treeview"><a href="video.php"><i class="fa fa-laptop"></i><span>Tutorial content</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="bootstrap-componants.php"><i class="fa fa-circle-o"></i>Title Content</a></li>
                <li><a href="ui-font-awesome.php"><i class="fa fa-circle-o"></i>What Will I Learn? </a></li>
                <li><a href="ui-cards.php"><i class="fa fa-circle-o"></i> Curriculum For This Course</a></li>
                <li><a href="widgets.php"><i class="fa fa-circle-o"></i> Requirements</a></li>
                <li><a href="widgets.php"><i class="fa fa-circle-o"></i>Includes</a></li>
              </ul>
            </li-->
			
			<!--li class="<?php if($add==='online_register'){ echo "active"; }?>"><a href="online_register.php"><i class="fa fa-users"></i><span>Online Registration</span></a></li-->
			
			<!--li class="<?php if($add==='News'){ echo "active"; }?>"><a href="news.php"><i class="fa fa-file"></i><span>News and Events</span></a></li>
			
			
			<li class="<?php if($add==='Testimonials'){ echo "active"; }?>"><a href="testimonials.php"><i class="fa fa-microphone"></i><span>Testimonials</span></a></li>
			
			<!--li class="<?php if($add==='spea'){ echo "active"; }?>"><a href="spea.php"><i class="fa fa-microphone"></i><span>Speaker Opportunity</span></a></li>
			
			
			<!--li class="<?php if($add==='latest_news'){ echo "active"; }?>"><a href="latest_news.php"><i class="fa fa-comments-o"></i><span>Speaker Opportunity</span></a></li>
            <!--<li class="treeview"><a href="#"><i class="fa fa-laptop"></i><span>UI Elements</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="bootstrap-componants.php"><i class="fa fa-circle-o"></i> Bootstrap Elements</a></li>
                <li><a href="ui-font-awesome.php"><i class="fa fa-circle-o"></i> Font Icons</a></li>
                <li><a href="ui-cards.php"><i class="fa fa-circle-o"></i> Cards</a></li>
                <li><a href="widgets.php"><i class="fa fa-circle-o"></i> Widgets</a></li>
              </ul>
            </li>
            <li><a href="charts.php"><i class="fa fa-pie-chart"></i><span>Charts</span></a></li>
            <li class="treeview"><a href="#"><i class="fa fa-edit"></i><span>Forms</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="form-componants.php"><i class="fa fa-circle-o"></i> Form Componants</a></li>
                <li><a href="form-custom.php"><i class="fa fa-circle-o"></i> Custom Componants</a></li>
                <li><a href="form-samples.php"><i class="fa fa-circle-o"></i> Form Samples</a></li>
                <li><a href="form-notifications.php"><i class="fa fa-circle-o"></i> Form Notifications</a></li>
              </ul>
            </li>
            <li class="treeview"><a href="#"><i class="fa fa-th-list"></i><span>Tables</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="table-basic.php"><i class="fa fa-circle-o"></i> Basic Tables</a></li>
                <li><a href="table-data-table.php"><i class="fa fa-circle-o"></i> Data Tables</a></li>
              </ul>
            </li>
            <li class="treeview"><a href="#"><i class="fa fa-file-text"></i><span>Pages</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="blank-page.php"><i class="fa fa-circle-o"></i> Blank Page</a></li>
                <li><a href="page-login.php"><i class="fa fa-circle-o"></i> Login Page</a></li>
                <li><a href="page-user.php"><i class="fa fa-circle-o"></i> User Page</a></li>
                <li><a href="page-lockscreen.php"><i class="fa fa-circle-o"></i> Lockscreen Page</a></li>
                <li><a href="page-error.php"><i class="fa fa-circle-o"></i> Error Page</a></li>
                <li><a href="page-invoice.php"><i class="fa fa-circle-o"></i> Invoice Page</a></li>
                <li><a href="page-calendar.php"><i class="fa fa-circle-o"></i> Calendar Page</a></li>
                <li><a href="page-mailbox.php"><i class="fa fa-circle-o"></i> Mailbox</a></li>
              </ul>
            </li>
            <li class="treeview"><a href="#"><i class="fa fa-share"></i><span>MultiLavel Menu</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="blank-page.php"><i class="fa fa-circle-o"></i> Level One</a></li>
                <li class="treeview"><a href="#"><i class="fa fa-circle-o"></i><span> Level One</span><i class="fa fa-angle-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="blank-page.php"><i class="fa fa-circle-o"></i> Level Two</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i><span> Level Two</span></a></li>
                  </ul>
                </li>
              </ul>
            </li>-->
          </ul>
        </section>
      </aside>