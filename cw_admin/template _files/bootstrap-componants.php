<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>Vali Admin</title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
    -->
  </head>
  <body class="sidebar-mini fixed">
    <div class="wrapper">
      <!-- Navbar-->
      <header class="main-header hidden-print"><a href="index.php" class="logo">Vali</a>
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button--><a href="#" data-toggle="offcanvas" class="sidebar-toggle"></a>
          <!-- Navbar Right Menu-->
          <div class="navbar-custom-menu">
            <ul class="top-nav">
              <!--Notification Menu-->
              <li class="dropdown notification-menu"><a href="#" data-toggle="dropdown" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-bell-o fa-lg"></i></a>
                <ul class="dropdown-menu">
                  <li class="not-head">You have 4 new notifications.</li>
                  <li><a href="javascript:;" class="media"><span class="media-left media-icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                      <div class="media-body"><span class="block">Lisa sent you a mail</span><span class="text-muted block">2min ago</span></div></a></li>
                  <li><a href="javascript:;" class="media"><span class="media-left media-icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                      <div class="media-body"><span class="block">Server Not Working</span><span class="text-muted block">2min ago</span></div></a></li>
                  <li><a href="javascript:;" class="media"><span class="media-left media-icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                      <div class="media-body"><span class="block">Transaction xyz complete</span><span class="text-muted block">2min ago</span></div></a></li>
                  <li class="not-footer"><a href="#">See all notifications.</a></li>
                </ul>
              </li>
              <!-- User Menu-->
              <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-user fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu">
                  <li><a href="page-user.php"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
                  <li><a href="page-user.php"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                  <li><a href="page-login.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Side-Nav-->
      <aside class="main-sidebar hidden-print">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image" class="img-circle"></div>
            <div class="pull-left info">
              <p>John Doe</p>
              <p class="designation">Frontend Developer</p>
            </div>
          </div>
          <!-- Sidebar Menu-->
          <ul class="sidebar-menu">
            <li class="active"><a href="index.php"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
            <li class="treeview"><a href="#"><i class="fa fa-laptop"></i><span>UI Elements</span><i class="fa fa-angle-right"></i></a>
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
            </li>
          </ul>
        </section>
      </aside>
      <div class="content-wrapper">
        <div class="page-title">
          <div class="div">
            <h1><i class="fa fa-laptop"></i> Bootstrap Elements</h1>
            <p>Bootstrap Componants</p>
          </div>
          <div class="div">
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">Bootstrap Elements</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <!--
              Buttons
              ==================================================
              -->
              <div class="bs-element-section">
                <div class="page-header">
                  <div class="row">
                    <div class="col-lg-12">
                      <h1 id="buttons">Buttons</h1>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-7">
                    <p class="bs-component"><a href="#" class="btn btn-default">Default</a>&nbsp;<a href="#" class="btn btn-primary">Primary</a>&nbsp;<a href="#" class="btn btn-success">Success</a>&nbsp;<a href="#" class="btn btn-info">Info</a>&nbsp;<a href="#" class="btn btn-warning">Warning</a>&nbsp;<a href="#" class="btn btn-danger">Danger</a></p>
                    <p class="bs-component"><a href="#" class="btn btn-default disabled">Default</a>&nbsp;<a href="#" class="btn btn-primary disabled">Primary</a>&nbsp;<a href="#" class="btn btn-success disabled">Success</a>&nbsp;<a href="#" class="btn btn-info disabled">Info</a>&nbsp;<a href="#" class="btn btn-warning disabled">Warning</a>&nbsp;<a href="#" class="btn btn-danger disabled">Danger</a></p>
                    <div style="margin-bottom: 15px;">
                      <div style="margin: 0;" class="btn-toolbar bs-component">
                        <div class="btn-group"><a href="#" data-toggle="dropdown" class="btn btn-default dropdown-toggle">Default <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                          </ul>
                        </div>
                        <div class="btn-group"><a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Primary <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                          </ul>
                        </div>
                        <div class="btn-group"><a href="#" data-toggle="dropdown" class="btn btn-success dropdown-toggle">Success <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                          </ul>
                        </div>
                        <div class="btn-group"><a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Warning <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                          </ul>
                        </div>
                        <div class="btn-group"><a href="#" data-toggle="dropdown" class="btn btn-danger dropdown-toggle">Danger <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <p class="bs-component"><a href="#" class="btn btn-primary btn-lg">Large button</a>&nbsp;<a href="#" class="btn btn-primary">Default button</a>&nbsp;<a href="#" class="btn btn-primary btn-sm">Small button</a>&nbsp;<a href="#" class="btn btn-primary btn-xs">Mini button</a>&nbsp;</p>
                  </div>
                  <div class="col-lg-5">
                    <p class="bs-component"><a href="#" class="btn btn-default btn-lg btn-block">Block level button</a></p>
                    <div style="margin-bottom: 15px;" class="bs-component">
                      <div class="btn-group btn-group-justified"><a href="#" class="btn btn-default">Left</a><a href="#" class="btn btn-default">Middle</a><a href="#" class="btn btn-default">Right</a></div>
                    </div>
                    <div style="margin-bottom: 15px;" class="bs-component">
                      <div class="btn-toolbar">
                        <div class="btn-group"><a href="#" class="btn btn-default">1</a><a href="#" class="btn btn-default">2</a><a href="#" class="btn btn-default">3</a><a href="#" class="btn btn-default">4</a></div>
                        <div class="btn-group"><a href="#" class="btn btn-default">5</a>
                          <div class="btn-group"><a href="#" data-toggle="dropdown" class="btn btn-default dropdown-toggle">Dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                              <li><a href="#">Dropdown link</a></li>
                              <li><a href="#">Dropdown link</a></li>
                              <li><a href="#">Dropdown link</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="bs-component">
                      <div class="btn-group-vertical"><a href="#" class="btn btn-default">Button</a><a href="#" class="btn btn-default">Button</a><a href="#" class="btn btn-default">Button</a><a href="#" class="btn btn-default">Button</a></div>
                    </div>
                  </div>
                </div>
              </div>
              <!--
              Typography
              ==================================================
              -->
              <div class="bs-element-section">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="page-header">
                      <h1 id="typography">Typography</h1>
                    </div>
                  </div>
                </div>
                <!-- Headings-->
                <div class="row">
                  <div class="col-lg-4">
                    <div class="bs-component">
                      <h1>Heading 1</h1>
                      <h2>Heading 2</h2>
                      <h3>Heading 3</h3>
                      <h4>Heading 4</h4>
                      <h5>Heading 5</h5>
                      <h6>Heading 6</h6>
                      <p class="lead">Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="bs-component">
                      <h2>Example body text</h2>
                      <p>Nullam quis risus eget <a href="#">urna mollis ornare</a> vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula.</p>
                      <p><small>This line of text is meant to be treated as fine print.</small></p>
                      <p>The following snippet of text is <strong>rendered as bold text</strong>.</p>
                      <p>The following snippet of text is <em>rendered as italicized text</em>.</p>
                      <p>An abbreviation of the word attribute is <abbr title="attribute">attr</abbr>.</p>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="bs-component">
                      <h2>Emphasis classes</h2>
                      <p class="text-muted">Fusce dapibus, tellus ac cursus commodo, tortor mauris nibh.</p>
                      <p class="text-primary">Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                      <p class="text-warning">Etiam porta sem malesuada magna mollis euismod.</p>
                      <p class="text-danger">Donec ullamcorper nulla non metus auctor fringilla.</p>
                      <p class="text-success">Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>
                      <p class="text-info">Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
                    </div>
                  </div>
                </div>
                <!-- Blockquotes-->
                <div class="row">
                  <div class="col-lg-12">
                    <h2 id="type-blockquotes">Blockquotes</h2>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="bs-component">
                      <blockquote>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p><small>Someone famous in 
                          <cite title="Source Title">Source Title</cite></small>
                      </blockquote>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="bs-component">
                      <blockquote class="blockquote-reverse">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p><small>Someone famous in 
                          <cite title="Source Title">Source Title</cite></small>
                      </blockquote>
                    </div>
                  </div>
                </div>
              </div>
              <!--
              Navs
              ==================================================
              -->
              <div class="bs-element-section">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="page-header">
                      <h1 id="navs">Navs</h1>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4">
                    <h2 id="nav-tabs">Tabs</h2>
                    <div class="bs-component">
                      <ul class="nav nav-tabs">
                        <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
                        <li><a href="#profile" data-toggle="tab">Profile</a></li>
                        <li class="disabled"><a>Disabled</a></li>
                        <li class="dropdown"><a data-toggle="dropdown" href="#" class="dropdown-toggle">Dropdown <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="#dropdown1" data-toggle="tab">Action</a></li>
                            <li class="divider"></li>
                            <li><a href="#dropdown2" data-toggle="tab">Another action</a></li>
                          </ul>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div id="home" class="tab-pane fade active in">
                          <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
                        </div>
                        <div id="profile" class="tab-pane fade">
                          <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit.</p>
                        </div>
                        <div id="dropdown1" class="tab-pane fade">
                          <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork.</p>
                        </div>
                        <div id="dropdown2" class="tab-pane fade">
                          <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <h2 id="nav-pills">Pills</h2>
                    <div class="bs-component">
                      <ul class="nav nav-pills">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#">Profile</a></li>
                        <li class="disabled"><a href="#">Disabled</a></li>
                        <li class="dropdown"><a data-toggle="dropdown" href="#" class="dropdown-toggle">Dropdown <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                          </ul>
                        </li>
                      </ul>
                    </div><br>
                    <div class="bs-component">
                      <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#">Profile</a></li>
                        <li class="disabled"><a href="#">Disabled</a></li>
                        <li class="dropdown"><a data-toggle="dropdown" href="#" class="dropdown-toggle">Dropdown <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                          </ul>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <h2 id="nav-breadcrumbs">Breadcrumbs</h2>
                    <div class="bs-component">
                      <ul class="breadcrumb">
                        <li class="active">Home</li>
                      </ul>
                      <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">Library</li>
                      </ul>
                      <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Library</a></li>
                        <li class="active">Data</li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4">
                    <h2 id="pagination">Pagination</h2>
                    <div class="bs-component">
                      <ul class="pagination">
                        <li class="disabled"><a href="#">«</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">»</a></li>
                      </ul>
                      <ul class="pagination pagination-lg">
                        <li class="disabled"><a href="#">«</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">»</a></li>
                      </ul>
                      <ul class="pagination pagination-sm">
                        <li class="disabled"><a href="#">«</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">»</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <h2 id="pager">Pager</h2>
                    <div class="bs-component">
                      <ul class="pager">
                        <li><a href="#">Previous</a></li>
                        <li><a href="#">Next</a></li>
                      </ul>
                      <ul class="pager">
                        <li class="previous disabled"><a href="#">← Older</a></li>
                        <li class="next"><a href="#">Newer →</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-lg-4"></div>
                </div>
              </div>
              <!--
              Indicators
              ==================================================
              -->
              <div class="bs-element-section">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="page-header">
                      <h1 id="indicators">Indicators</h1>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <h2>Alerts</h2>
                    <div class="bs-component">
                      <div class="alert alert-dismissible alert-warning">
                        <button type="button" data-dismiss="alert" class="close">×</button>
                        <h4>Warning!</h4>
                        <p>Best check yo self, you're not looking too good. Nulla vitae elit libero, a pharetra augue. Praesent commodo cursus magna, <a href="#" class="alert-link">vel scelerisque nisl consectetur et</a>.</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="bs-component">
                      <div class="alert alert-dismissible alert-danger">
                        <button type="button" data-dismiss="alert" class="close">×</button><strong>Oh snap!</strong><a href="#" class="alert-link">Change a few things up</a> and try submitting again.
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="bs-component">
                      <div class="alert alert-dismissible alert-success">
                        <button type="button" data-dismiss="alert" class="close">×</button><strong>Well done!</strong> You successfully read <a href="#" class="alert-link">this important alert message</a>.
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="bs-component">
                      <div class="alert alert-dismissible alert-info">
                        <button type="button" data-dismiss="alert" class="close">×</button><strong>Heads up!</strong> This <a href="#" class="alert-link">alert needs your attention</a>, but it's not super important.
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4">
                    <h2>Labels</h2>
                    <div style="margin-bottom: 40px;" class="bs-component"><span class="label label-default">Default</span><span class="label label-primary">Primary</span><span class="label label-success">Success</span><span class="label label-warning">Warning</span><span class="label label-danger">Danger</span><span class="label label-info">Info</span></div>
                  </div>
                  <div class="col-lg-4">
                    <h2>Badges</h2>
                    <div class="bs-component">
                      <ul class="nav nav-pills">
                        <li class="active"><a href="#">Home <span class="badge">42</span></a></li>
                        <li><a href="#">Profile <span class="badge"></span></a></li>
                        <li><a href="#">Messages <span class="badge">3</span></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <!--
              Progress bars
              ==================================================
              -->
              <div class="bs-element-section">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="page-header">
                      <h1 id="progress-bars">Progress bars</h1>
                    </div>
                    <h3 id="progress-basic">Basic</h3>
                    <div class="bs-component">
                      <div class="progress">
                        <div style="width: 60%;" class="progress-bar"></div>
                      </div>
                    </div>
                    <h3 id="progress-alternatives">Contextual alternatives</h3>
                    <div class="bs-component">
                      <div class="progress">
                        <div style="width: 20%" class="progress-bar progress-bar-info"></div>
                      </div>
                      <div class="progress">
                        <div style="width: 40%" class="progress-bar progress-bar-success"></div>
                      </div>
                      <div class="progress">
                        <div style="width: 60%" class="progress-bar progress-bar-warning"></div>
                      </div>
                      <div class="progress">
                        <div style="width: 80%" class="progress-bar progress-bar-danger"></div>
                      </div>
                    </div>
                    <h3 id="progress-striped">Striped</h3>
                    <div class="bs-component">
                      <div class="progress progress-striped">
                        <div style="width: 20%" class="progress-bar progress-bar-info"></div>
                      </div>
                      <div class="progress progress-striped">
                        <div style="width: 40%" class="progress-bar progress-bar-success"></div>
                      </div>
                      <div class="progress progress-striped">
                        <div style="width: 60%" class="progress-bar progress-bar-warning"></div>
                      </div>
                      <div class="progress progress-striped">
                        <div style="width: 80%" class="progress-bar progress-bar-danger"></div>
                      </div>
                    </div>
                    <h3 id="progress-animated">Animated</h3>
                    <div class="bs-component">
                      <div class="progress progress-striped active">
                        <div style="width: 45%" class="progress-bar"></div>
                      </div>
                    </div>
                    <h3 id="progress-stacked">Stacked</h3>
                    <div class="bs-component">
                      <div class="progress">
                        <div style="width: 35%" class="progress-bar progress-bar-success"></div>
                        <div style="width: 20%" class="progress-bar progress-bar-warning"></div>
                        <div style="width: 10%" class="progress-bar progress-bar-danger"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--
              Containers
              ==================================================
              -->
              <div class="bs-element-section">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="page-header">
                      <h1 id="containers">Containers</h1>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <h2>List groups</h2>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="bs-component">
                      <ul class="list-group">
                        <li class="list-group-item"><span class="badge">14</span>                  Cras justo odio</li>
                        <li class="list-group-item"><span class="badge">2</span>                  Dapibus ac facilisis in</li>
                        <li class="list-group-item"><span class="badge">1</span>                  Morbi leo risus</li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="bs-component">
                      <div class="list-group"><a href="#" class="list-group-item active">Cras justo odio</a><a href="#" class="list-group-item">Dapibus ac facilisis in</a><a href="#" class="list-group-item">Morbi leo risus</a></div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="bs-component">
                      <div class="list-group"><a href="#" class="list-group-item">
                          <h4 class="list-group-item-heading">List group item heading</h4>
                          <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p></a><a href="#" class="list-group-item">
                          <h4 class="list-group-item-heading">List group item heading</h4>
                          <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p></a></div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <h2>Panels</h2>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="bs-component">
                      <div class="panel panel-default">
                        <div class="panel-body">Basic panel</div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading">Panel heading</div>
                        <div class="panel-body">Panel content</div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-body">Panel content</div>
                        <div class="panel-footer">Panel footer</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="bs-component">
                      <div class="panel panel-primary">
                        <div class="panel-heading">
                          <h3 class="panel-title">Panel primary</h3>
                        </div>
                        <div class="panel-body">Panel content</div>
                      </div>
                      <div class="panel panel-success">
                        <div class="panel-heading">
                          <h3 class="panel-title">Panel success</h3>
                        </div>
                        <div class="panel-body">Panel content</div>
                      </div>
                      <div class="panel panel-warning">
                        <div class="panel-heading">
                          <h3 class="panel-title">Panel warning</h3>
                        </div>
                        <div class="panel-body">Panel content</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="bs-component">
                      <div class="panel panel-danger">
                        <div class="panel-heading">
                          <h3 class="panel-title">Panel danger</h3>
                        </div>
                        <div class="panel-body">Panel content</div>
                      </div>
                      <div class="panel panel-info">
                        <div class="panel-heading">
                          <h3 class="panel-title">Panel info</h3>
                        </div>
                        <div class="panel-body">Panel content</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Javascripts-->
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/essential-plugins.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/pace.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>