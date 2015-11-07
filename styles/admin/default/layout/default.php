<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title><?= config('title') ?></title>

        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Arimo:400,700,400italic">
        <link rel="stylesheet" href="<?= STYLE_CSS ?>/fonts/linecons/css/linecons.css">
        <link rel="stylesheet" href="<?= STYLE_CSS ?>/fonts/fontawesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?= STYLE_CSS ?>/bootstrap.css">
        <link rel="stylesheet" href="<?= STYLE_CSS ?>/xenon-core.css">
        <link rel="stylesheet" href="<?= STYLE_CSS ?>/xenon-forms.css">
        <link rel="stylesheet" href="<?= STYLE_CSS ?>/xenon-components.css">
        <link rel="stylesheet" href="<?= STYLE_CSS ?>/xenon-skins.css">
        <link rel="stylesheet" href="<?= STYLE_CSS ?>/custom.css">
        <link rel="stylesheet" href="<?= STYLE_CSS ?>/select2/select2.css">
        <link rel="stylesheet" href="<?= STYLE_CSS ?>/select2/select2-bootstrap.css">
        <link rel="stylesheet" href="<?= STYLE_CSS ?>/newstyle.css">


        <script src="<?= STYLE_JS ?>/jquery-1.11.1.min.js"></script>
        <script src="<?= STYLE_JS ?>/select2/select2.min.js"></script>
        <script src="<?= STYLE_JS ?>/datepicker/bootstrap-datepicker.js"></script>
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            span.input-required {
                color: rgba(233,108,119,1);
                font-weight: bold;
                font-size: 16px;
                display: inline-block;
            }
            .form-group h3 {
                font-size: 13px;
                font-weight: bold;
            }
            .user-permission{
                font-size: 12px;
            }
        </style>

    </head>
    <body class="page-body">

        <div class="settings-pane">

            <a href="#" data-toggle="settings-pane" data-animate="true">
                &times;
            </a>

            <div class="settings-pane-inner">

                <div class="row">

                    <div class="col-md-4">

                        <div class="user-info">

                            <div class="user-image">
                                <a href="extra-profile.html">
                                    <img src="<?= STYLE_IMAGES ?>/user-2.png" class="img-responsive img-circle" />
                                    <!--<img src="<?= session(' base_url()/cdn/ $item->image') ?>" class="img-responsive img-circle" />-->
                                    <!--<img src="<?= base_url() ?>/cdn/<?php echo $item->image ?>">-->
                                </a>
                            </div>

                            <div class="user-details">

                                <h3>
                                    <a href="#"><?= session('username') ?></a>

                                    <!-- Available statuses: is-online, is-idle, is-busy and is-offline -->
                                    <span class="user-status is-online"></span>
                                </h3>

                                <p class="user-title">Administrator</p>

                                <div class="user-links">
                                    <a href="<?= site_url('admin/users/manage/' . session('user_id')) ?>" class="btn btn-primary">Edit Profile</a>
                                    <a href="<?= site_url('admin/logout') ?>" class="btn btn-success">Logout</a>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <nav class="navbar horizontal-menu navbar-fixed-top navbar-minimal"><!-- set fixed position by adding class "navbar-fixed-top" -->

            <div class="navbar-inner">

                <!-- Navbar Brand -->
                <div class="navbar-brand">
                    <a href="dashboard-1.html" class="logo">
                        <img src="assets/images/logo-white-bg@2x.png" width="80" alt="" class="hidden-xs" />
                        <img src="assets/images/logo@2x.png" width="80" alt="" class="visible-xs" />
                    </a>
                    <a href="#" data-toggle="settings-pane" data-animate="true">
                        <i class="linecons-cog"></i>
                    </a>
                </div>

                <!-- Mobile Toggles Links -->
                <div class="nav navbar-mobile">

                    <!-- This will toggle the mobile menu and will be visible only on mobile devices -->
                    <div class="mobile-menu-toggle">
                        <!-- This will open the popup with user profile settings, you can use for any purpose, just be creative -->
                        <a href="#" data-toggle="settings-pane" data-animate="true">
                            <i class="linecons-cog"></i>
                        </a>

                        <a href="#" data-toggle="user-info-menu-horizontal">
                            <i class="fa-bell-o"></i>
                            <span class="badge badge-success">7</span>
                        </a>

                        <!-- data-toggle="mobile-menu-horizontal" will show horizontal menu links only -->
                        <!-- data-toggle="mobile-menu" will show sidebar menu links only -->
                        <!-- data-toggle="mobile-menu-both" will show sidebar and horizontal menu links -->
                        <a href="#" data-toggle="mobile-menu-horizontal">
                            <i class="fa-bars"></i>
                        </a>
                    </div>

                </div>

                <div class="navbar-mobile-clear"></div>



                <!-- main menu -->

                <ul class="navbar-nav">
                    <li>
                        <a href="dashboard-1.html">
                            <i class="linecons-cog"></i>
                            <span class="title">Dashboard</span>
                        </a>
                        <ul>
                            <li>
                                <a href="dashboard-1.html">
                                    <span class="title">Dashboard 1</span>
                                </a>
                            </li>
                            <li>
                                <a href="dashboard-2.html">
                                    <span class="title">Dashboard 2</span>
                                </a>
                            </li>
                            <li>
                                <a href="dashboard-3.html">
                                    <span class="title">Dashboard 3</span>
                                </a>
                            </li>
                            <li>
                                <a href="dashboard-4.html">
                                    <span class="title">Dashboard 4</span>
                                </a>
                            </li>
                            <li>
                                <a href="skin-generator.html">
                                    <span class="title">Skin Generator</span>
                                </a>
                            </li>
                            <li>
                                <a href="update-highlights.html">
                                    <span class="title">Update Highlights</span>
                                    <span class="label label-pink pull-right hidden-collapsed">v1.3</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="opened active">
                        <a href="layout-variants.html">
                            <i class="linecons-desktop"></i>
                            <span class="title">Layouts</span>
                        </a>
                        <ul>
                            <li>
                                <a href="layout-variants.html">
                                    <span class="title">Layout Variants &amp; API</span>
                                </a>
                            </li>
                            <li>
                                <a href="layout-collapsed-sidebar.html">
                                    <span class="title">Collapsed Sidebar</span>
                                </a>
                            </li>
                            <li>
                                <a href="layout-static-sidebar.html">
                                    <span class="title">Static Sidebar</span>
                                </a>
                            </li>
                            <li>
                                <a href="layout-horizontal-menu.html">
                                    <span class="title">Horizontal Menu</span>
                                </a>
                            </li>
                            <li>
                                <a href="layout-horizontal-plus-sidebar.html">
                                    <span class="title">Horizontal &amp; Sidebar Menu</span>
                                </a>
                            </li>
                            <li>
                                <a href="layout-horizontal-menu-click-to-open-subs.html">
                                    <span class="title">Horizontal Open On Click</span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="layout-horizontal-menu-min.html">
                                    <span class="title">Horizontal Menu Minimal</span>
                                </a>
                            </li>
                            <li>
                                <a href="layout-right-sidebar.html">
                                    <span class="title">Right Sidebar</span>
                                </a>
                            </li>
                            <li>
                                <a href="layout-chat-open.html">
                                    <span class="title">Chat Open</span>
                                </a>
                            </li>
                            <li>
                                <a href="layout-horizontal-sidebar-menu-collapsed-right.html">
                                    <span class="title">Both Menus &amp; Collapsed</span>
                                </a>
                            </li>
                            <li>
                                <a href="layout-boxed.html">
                                    <span class="title">Boxed Layout</span>
                                </a>
                            </li>
                            <li>
                                <a href="layout-boxed-horizontal-menu.html">
                                    <span class="title">Boxed &amp; Horizontal Menu</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="ui-panels.html">
                            <i class="linecons-note"></i>
                            <span class="title">UI Elements</span>
                        </a>
                        <ul>
                            <li>
                                <a href="ui-panels.html">
                                    <span class="title">Panels</span>
                                </a>
                            </li>
                            <li>
                                <a href="ui-buttons.html">
                                    <span class="title">Buttons</span>
                                </a>
                            </li>
                            <li>
                                <a href="ui-tabs-accordions.html">
                                    <span class="title">Tabs &amp; Accordions</span>
                                </a>
                            </li>
                            <li>
                                <a href="ui-modals.html">
                                    <span class="title">Modals</span>
                                </a>
                            </li>
                            <li>
                                <a href="ui-breadcrumbs.html">
                                    <span class="title">Breadcrumbs</span>
                                </a>
                            </li>
                            <li>
                                <a href="ui-blockquotes.html">
                                    <span class="title">Blockquotes</span>
                                </a>
                            </li>
                            <li>
                                <a href="ui-progressbars.html">
                                    <span class="title">Progress Bars</span>
                                </a>
                            </li>
                            <li>
                                <a href="ui-navbars.html">
                                    <span class="title">Navbars</span>
                                </a>
                            </li>
                            <li>
                                <a href="ui-alerts.html">
                                    <span class="title">Alerts</span>
                                </a>
                            </li>
                            <li>
                                <a href="ui-pagination.html">
                                    <span class="title">Pagination</span>
                                </a>
                            </li>
                            <li>
                                <a href="ui-typography.html">
                                    <span class="title">Typography</span>
                                </a>
                            </li>
                            <li>
                                <a href="ui-other-elements.html">
                                    <span class="title">Other Elements</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="forms-native.html">
                            <i class="linecons-params"></i>
                            <span class="title">Forms</span>
                        </a>
                        <ul>
                            <li>
                                <a href="forms-native.html">
                                    <span class="title">Native Elements</span>
                                </a>
                            </li>
                            <li>
                                <a href="forms-advanced.html">
                                    <span class="title">Advanced Plugins</span>
                                </a>
                            </li>
                            <li>
                                <a href="forms-wizard.html">
                                    <span class="title">Form Wizard</span>
                                </a>
                            </li>
                            <li>
                                <a href="forms-validation.html">
                                    <span class="title">Form Validation</span>
                                </a>
                            </li>
                            <li>
                                <a href="forms-input-masks.html">
                                    <span class="title">Input Masks</span>
                                </a>
                            </li>
                            <li>
                                <a href="forms-file-upload.html">
                                    <span class="title">File Upload</span>
                                </a>
                            </li>
                            <li>
                                <a href="forms-editors.html">
                                    <span class="title">Editors</span>
                                </a>
                            </li>
                            <li>
                                <a href="forms-sliders.html">
                                    <span class="title">Sliders</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="">
                            <i class="linecons-diamond"></i>
                            <span class="title">Other</span>
                        </a>
                        <ul>
                            <li>
                                <a href="ui-widgets.html">
                                    <i class="linecons-star"></i>
                                    <span class="title">Widgets</span>
                                </a>
                            </li>
                            <li>
                                <a href="mailbox-main.html">
                                    <i class="linecons-mail"></i>
                                    <span class="title">Mailbox</span>
                                    <span class="label label-success pull-right">5</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="mailbox-main.html">
                                            <span class="title">Inbox</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="mailbox-compose.html">
                                            <span class="title">Compose Message</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="mailbox-message.html">
                                            <span class="title">View Message</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="tables-basic.html">
                                    <i class="linecons-database"></i>
                                    <span class="title">Tables</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="tables-basic.html">
                                            <span class="title">Basic Tables</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="tables-responsive.html">
                                            <span class="title">Responsive Table</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="tables-datatables.html">
                                            <span class="title">Data Tables</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="extra-gallery.html">
                                    <i class="linecons-beaker"></i>
                                    <span class="title">Extra</span>
                                    <span class="label label-purple pull-right hidden-collapsed">New Items</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="extra-icons-fontawesome.html">
                                            <span class="title">Icons</span>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="extra-icons-fontawesome.html">
                                                    <span class="title">Font Awesome</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="extra-icons-linecons.html">
                                                    <span class="title">Linecons</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="extra-icons-elusive.html">
                                                    <span class="title">Elusive</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="extra-icons-meteocons.html">
                                                    <span class="title">Meteocons</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="extra-maps-google.html">
                                            <span class="title">Maps</span>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="extra-maps-google.html">
                                                    <span class="title">Google Maps</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="extra-maps-advanced.html">
                                                    <span class="title">Advanced Map</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="extra-maps-vector.html">
                                                    <span class="title">Vector Map</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="extra-members-list.html">
                                            <span class="title">Members</span>
                                            <span class="label label-warning pull-right">New</span>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="extra-members-list.html">
                                                    <span class="title">Members List</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="extra-members-add.html">
                                                    <span class="title">Add Member</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="extra-gallery.html">
                                            <span class="title">Gallery</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="extra-calendar.html">
                                            <span class="title">Calendar</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="extra-profile.html">
                                            <span class="title">Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="extra-login.html">
                                            <span class="title">Login</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="extra-lockscreen.html">
                                            <span class="title">Lockscreen</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="extra-login-light.html">
                                            <span class="title">Login Light</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="extra-timeline.html">
                                            <span class="title">Timeline</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="extra-timeline-center.html">
                                            <span class="title">Timeline Centerd</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="extra-notes.html">
                                            <span class="title">Notes</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="extra-image-crop.html">
                                            <span class="title">Image Crop</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="extra-portlets.html">
                                            <span class="title">Portlets</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="blank-sidebar.html">
                                            <span class="title">Blank Page</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="extra-search.html">
                                            <span class="title">Search</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="extra-invoice.html">
                                            <span class="title">Invoice</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="extra-not-found.html">
                                            <span class="title">404 Page</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="extra-tocify.html">
                                            <span class="title">Tocify</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="extra-loader.html">
                                            <span class="title">Loading Progress</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="extra-page-loading-ol.html">
                                            <span class="title">Page Loading Overlay</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="extra-notifications.html">
                                            <span class="title">Notifications</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="extra-nestable-lists.html">
                                            <span class="title">Nestable Lists</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="extra-scrollable.html">
                                            <span class="title">Scrollable</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="charts-main.html">
                                    <i class="linecons-globe"></i>
                                    <span class="title">Charts</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="charts-main.html">
                                            <span class="title">Chart Variants</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="charts-range.html">
                                            <span class="title">Range Selector</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="charts-sparklines.html">
                                            <span class="title">Sparklines</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="charts-map.html">
                                            <span class="title">Map Charts</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="charts-gauges.html">
                                            <span class="title">Circular Gauges</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="charts-bar-gauges.html">
                                            <span class="title">Bar Gauges</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="linecons-cloud"></i>
                                    <span class="title">Menu Levels</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="entypo-flow-line"></i>
                                            <span class="title">Menu Level 1.1</span>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <i class="entypo-flow-parallel"></i>
                                                    <span class="title">Menu Level 2.1</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="entypo-flow-parallel"></i>
                                                    <span class="title">Menu Level 2.2</span>
                                                </a>
                                                <ul>
                                                    <li>
                                                        <a href="#">
                                                            <i class="entypo-flow-cascade"></i>
                                                            <span class="title">Menu Level 3.1</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="entypo-flow-cascade"></i>
                                                            <span class="title">Menu Level 3.2</span>
                                                        </a>
                                                        <ul>
                                                            <li>
                                                                <a href="#">
                                                                    <i class="entypo-flow-branch"></i>
                                                                    <span class="title">Menu Level 4.1</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="entypo-flow-parallel"></i>
                                                    <span class="title">Menu Level 2.3</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="entypo-flow-line"></i>
                                            <span class="title">Menu Level 1.2</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="entypo-flow-line"></i>
                                            <span class="title">Menu Level 1.3</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>


                <!-- notifications and other links -->
                <ul class="nav nav-userinfo navbar-right">

                    <li class="search-form"><!-- You can add "always-visible" to show make the search input visible -->

                        <form method="get" action="extra-search.html">
                            <input type="text" name="s" class="form-control search-field" placeholder="Type to search..." />

                            <button type="submit" class="btn btn-link">
                                <i class="linecons-search"></i>
                            </button>
                        </form>

                    </li>


                    <li class="dropdown user-profile">
                        <a href="#" data-toggle="dropdown">
                            <img src="<?= STYLE_IMAGES ?>/user-1.png" alt="user-image" class="img-circle img-inline userpic-32" width="28" />
                            <span>
                                Arlind Nushi
                                <i class="fa-angle-down"></i>
                            </span>
                        </a>

                        <ul class="dropdown-menu user-profile-menu list-unstyled">
                            <li>
                                <a href="#edit-profile">
                                    <i class="fa-edit"></i>
                                    New Post
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <i class="fa-wrench"></i>
                                    Settings
                                </a>
                            </li>
                            <li>
                                <a href="#profile">
                                    <i class="fa-user"></i>
                                    Profile
                                </a>
                            </li>
                            <li>
                                <a href="#help">
                                    <i class="fa-info"></i>
                                    Help
                                </a>
                            </li>
                            <li class="last">
                                <a href="extra-lockscreen.html">
                                    <i class="fa-lock"></i>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>

            </div>

        </nav>

        <div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

            <div class="main-content">

                {layout}


                <script>
                    jQuery(document).ready(function ($)
                    {
                        $('a[href="#layout-variants"]').on('click', function (ev)
                        {
                            ev.preventDefault();

                            var win = {top: $(window).scrollTop(), toTop: $("#layout-variants").offset().top - 15};

                            TweenLite.to(win, .3, {top: win.toTop, roundProps: ["top"], ease: Sine.easeInOut, onUpdate: function ()
                                {
                                    $(window).scrollTop(win.top);
                                }
                            });
                        });
                    });
                </script>

                <footer class="main-footer sticky footer-type-1">

                    <div class="footer-inner">

                        <!-- Add your copyright text here -->
                        <div class="footer-text">
                            &copy; 2014 
                            <strong>Xenon</strong> 
                            theme by <a href="http://laborator.co" target="_blank">Laborator</a> - <a href="http://themeforest.net/item/xenon-bootstrap-admin-theme/9059661?ref=Laborator" target="_blank">Purchase for only <strong>23$</strong></a>
                        </div>


                        <!-- Go to Top Link, just add rel="go-top" to any link to add this functionality -->
                        <div class="go-up">

                            <a href="#" rel="go-top">
                                <i class="fa-angle-up"></i>
                            </a>

                        </div>

                    </div>

                </footer>
            </div>

        </div>





        <!-- Bottom Scripts -->
        <script src="<?= STYLE_JS ?>/bootstrap.min.js"></script>
        <script src="<?= STYLE_JS ?>/TweenMax.min.js"></script>
        <script src="<?= STYLE_JS ?>/resizeable.js"></script>
        <script src="<?= STYLE_JS ?>/joinable.js"></script>
        <script src="<?= STYLE_JS ?>/xenon-api.js"></script>
        <script src="<?= STYLE_JS ?>/xenon-toggles.js"></script>


        <!-- JavaScripts initializations and stuff -->
        <script src="<?= STYLE_JS ?>/xenon-custom.js"></script>
        <link rel="stylesheet" href="<?= STYLE_JS ?>/select2/select2.css">
        <link rel="stylesheet" href="<?= STYLE_JS ?>/select2/select2-bootstrap.css">
        <link rel="stylesheet" href="<?= STYLE_JS ?>/multiselect/css/multi-select.css">
        <script src="<?= STYLE_JS ?>/select2/select2.min.js"></script>
        <script src="<?= STYLE_JS ?>/jquery.multi-select.js"></script>
<!--        <script type = "text/javascript" >
                    jQuery(document).ready(function ($)
                    {
                        $(".s2example-1").select2({
                            placeholder: 'Select your country...',
                            allowClear: true
                        }).on('select2-open', function ()
                        {
                            // Adding Custom Scrollbar
                            $(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
                        });

                    });


        </script>-->
    </body>
</html>