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

                    <!--                    <div class="col-md-8 link-blocks-env">
                    
                                            <div class="links-block left-sep">
                                                <h4>
                                                    <span>Notifications</span>
                                                </h4>
                    
                                                <ul class="list-unstyled">
                                                    <li>
                                                        <input type="checkbox" class="cbr cbr-primary" checked="checked" id="sp-chk1" />
                                                        <label for="sp-chk1">Messages</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="cbr cbr-primary" checked="checked" id="sp-chk2" />
                                                        <label for="sp-chk2">Events</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="cbr cbr-primary" checked="checked" id="sp-chk3" />
                                                        <label for="sp-chk3">Updates</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" class="cbr cbr-primary" checked="checked" id="sp-chk4" />
                                                        <label for="sp-chk4">Server Uptime</label>
                                                    </li>
                                                </ul>
                                            </div>
                    
                                            <div class="links-block left-sep">
                                                <h4>
                                                    <a href="#">
                                                        <span>Help Desk</span>
                                                    </a>
                                                </h4>
                    
                                                <ul class="list-unstyled">
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa-angle-right"></i>
                                                            Support Center
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa-angle-right"></i>
                                                            Submit a Ticket
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa-angle-right"></i>
                                                            Domains Protocol
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa-angle-right"></i>
                                                            Terms of Service
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                    
                                        </div>-->

                </div>

            </div>

        </div>

        <div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

            <!-- Add "fixed" class to make the sidebar fixed always to the browser viewport. -->
            <!-- Adding class "toggle-others" will keep only one menu item open at a time. -->
            <!-- Adding class "collapsed" collapse sidebar root elements and show only icons. -->
            <div class="sidebar-menu toggle-others fixed">

                <div class="sidebar-menu-inner">

                    <header class="logo-env">

                        <!-- logo -->
                        <div class="logo">
                            <a href="<?= site_url('admin/dashboard') ?>" class="logo-expanded">
                                <img src="<?= STYLE_IMAGES ?>/logo.png" width="80" alt="" />
                            </a>

                            <a href="<?= site_url('admin/dashboard') ?>" class="logo-collapsed">
                                <img src="<?= STYLE_IMAGES ?>/logo-collapsed@2x.png" width="40" alt="" />
                            </a>
                        </div>

                        <!-- This will toggle the mobile menu and will be visible only on mobile devices -->
                        <div class="mobile-menu-toggle visible-xs">
                            <a href="#" data-toggle="user-info-menu">
                                <i class="fa-bell-o"></i>
                                <span class="badge badge-success">7</span>
                            </a>

                            <a href="#" data-toggle="mobile-menu">
                                <i class="fa-bars"></i>
                            </a>
                        </div>

                        <!-- This will open the popup with user profile settings, you can use for any purpose, just be creative -->
                        <div class="settings-icon">
                            <a href="#" data-toggle="settings-pane" data-animate="true">
                                <i class="linecons-cog"></i>
                            </a>
                        </div>


                    </header>



                    <ul id="main-menu" class="main-menu">
                        <!-- add class "multiple-expanded" to allow multiple submenus to open -->
                        <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
                        <!--                        <li>
                                                    <a href="<?= site_url('admin/settings') ?>">
                                                        <i class="fa fa-cog"></i>
                                                        <span class="title">General Setting</span>
                                                    </a>
                                                </li>-->
<!--                        <li><a href="--><?//= site_url('admin/') ?><!--">-->
<!--                                <i class="fa fa-cogs"></i>-->
<!--                                <span class="title">Settings</span>-->
<!--                            </a>-->
<!--                        </li>-->
                        <li>
                            <a href="<?= site_url('admin/dashboard') ?>">
                                <i class="fa fa-newspaper-o"></i>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= site_url('admin/users') ?>">
                                <i class="fa-user"></i>
                                <span class="title">Users</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= site_url('admin/consultants') ?>">
                                <i class="fa fa-newspaper-o"></i>
                                <span class="title">Consultants</span>
                            </a>	
                        </li>
                        <li>
                            <a href="<?= site_url('admin/service_providers') ?>">
                                <i class="fa fa-tasks"></i>
                                <span class="title">Service Providers</span>
                            </a>	
                        </li>
                        <li>
                            <a href="<?= site_url('admin/certificates') ?>">
                                <i class="fa fa-picture-o"></i>
                                <span class="title">Certificates</span>
                            </a>	
                        </li>
                        <li>
                            <a href="<?= site_url('admin/options') ?>">
                                <i class="fa fa-check-square"></i>
                                <span class="title">Options</span>
                            </a>	
                        </li>
                        <li>
                            <a href="<?= site_url('admin/grades') ?>">
                                <i class="fa fa-graduation-cap"></i>
                                <span class="title">Grades</span>
                            </a>	
                        </li>
                        <li>
                            <a href="<?= site_url('admin/certificate_categories') ?>">
                                <i class="fa-sitemap"></i>
                                <span class="title">Categories</span>
                            </a>	
                        </li>
                        <li>
                            <a href="<?= site_url('admin/crops') ?>">
                                <i class="fa fa-bookmark"></i>
                                <span class="title">Crop</span>
                            </a>	
                        </li>
                        <li>
                            <a href="<?= site_url('admin/business_types') ?>">
                                <i class="fa fa-briefcase"></i>
                                <span class="title">Business Types</span>
                            </a>	
                        </li>
                        <li>
                            <a href="<?= site_url('admin/companies') ?>">
                                <i class="fa fa-building-o"></i>
                                <span class="title">Companies</span>
                            </a>	
                        </li>
                        <li>
                            <a href="<?= site_url('admin/status') ?>">
                                <i class="fa fa-pencil-square-o"></i>
                                <span class="title">Status</span>
                            </a>	
                        </li>
                        
                        <li>
                            <a href="<?= site_url('admin/files') ?>">
                                <i class="fa fa-file-text"></i>
                                <span class="title">Files</span>
                            </a>
                        </li>


                    </ul>

                </div>

            </div>

            <div class="main-content">

                {layout}



                <!-- Main Footer -->
                <!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
                <!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
                <!-- Or class "fixed" to  always fix the footer to the end of page -->
                <footer class="main-footer sticky footer-type-1">

                    <div class="footer-inner">

                        <!-- Add your copyright text here -->
                        <div class="footer-text">
                            &copy; <?= date('Y') ?>
                            <strong><?= config('title') ?></strong>.
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


            <div id="chat" class="fixed"><!-- start: Chat Section -->

                <div class="chat-inner">



                    <script type="text/javascript">
                        // Here is just a sample how to open chat conversation box
                        jQuery(document).ready(function ($)
                        {
                            var $chat_conversation = $(".chat-conversation");

                            $(".chat-group a").on('click', function (ev)
                            {
                                ev.preventDefault();

                                $chat_conversation.toggleClass('is-open');

                                $(".chat-conversation textarea").trigger('autosize.resize').focus();
                            });

                            $(".conversation-close").on('click', function (ev)
                            {
                                ev.preventDefault();
                                $chat_conversation.removeClass('is-open');
                            });
                        });
                    </script>


                    <div class="chat-group">
                        <strong>Favorites</strong>

                        <a href="#"><span class="user-status is-online"></span> <em>Catherine J. Watkins</em></a>
                        <a href="#"><span class="user-status is-online"></span> <em>Nicholas R. Walker</em></a>
                        <a href="#"><span class="user-status is-busy"></span> <em>Susan J. Best</em></a>
                        <a href="#"><span class="user-status is-idle"></span> <em>Fernando G. Olson</em></a>
                        <a href="#"><span class="user-status is-offline"></span> <em>Brandon S. Young</em></a>
                    </div>


                    <div class="chat-group">
                        <strong>Work</strong>

                        <a href="#"><span class="user-status is-busy"></span> <em>Rodrigo E. Lozano</em></a>
                        <a href="#"><span class="user-status is-offline"></span> <em>Robert J. Garcia</em></a>
                        <a href="#"><span class="user-status is-offline"></span> <em>Daniel A. Pena</em></a>
                    </div>


                    <div class="chat-group">
                        <strong>Other</strong>

                        <a href="#"><span class="user-status is-online"></span> <em>Dennis E. Johnson</em></a>
                        <a href="#"><span class="user-status is-online"></span> <em>Stuart A. Shire</em></a>
                        <a href="#"><span class="user-status is-online"></span> <em>Janet I. Matas</em></a>
                        <a href="#"><span class="user-status is-online"></span> <em>Mindy A. Smith</em></a>
                        <a href="#"><span class="user-status is-busy"></span> <em>Herman S. Foltz</em></a>
                        <a href="#"><span class="user-status is-busy"></span> <em>Gregory E. Robie</em></a>
                        <a href="#"><span class="user-status is-busy"></span> <em>Nellie T. Foreman</em></a>
                        <a href="#"><span class="user-status is-busy"></span> <em>William R. Miller</em></a>
                        <a href="#"><span class="user-status is-idle"></span> <em>Vivian J. Hall</em></a>
                        <a href="#"><span class="user-status is-offline"></span> <em>Melinda A. Anderson</em></a>
                        <a href="#"><span class="user-status is-offline"></span> <em>Gary M. Mooneyham</em></a>
                        <a href="#"><span class="user-status is-offline"></span> <em>Robert C. Medina</em></a>
                        <a href="#"><span class="user-status is-offline"></span> <em>Dylan C. Bernal</em></a>
                        <a href="#"><span class="user-status is-offline"></span> <em>Marc P. Sanborn</em></a>
                        <a href="#"><span class="user-status is-offline"></span> <em>Kenneth M. Rochester</em></a>
                        <a href="#"><span class="user-status is-offline"></span> <em>Rachael D. Carpenter</em></a>
                    </div>

                </div>

                <!-- conversation template -->
                <div class="chat-conversation">

                    <div class="conversation-header">
                        <a href="#" class="conversation-close">
                            &times;
                        </a>

                        <span class="user-status is-online"></span>
                        <span class="display-name">Arlind Nushi</span> 
                        <small>Online</small>
                    </div>

                    <ul class="conversation-body">	
                        <li>
                            <span class="user">Arlind Nushi</span>
                            <span class="time">09:00</span>
                            <p>Are you here?</p>
                        </li>
                        <li class="odd">
                            <span class="user">Brandon S. Young</span>
                            <span class="time">09:25</span>
                            <p>This message is pre-queued.</p>
                        </li>
                        <li>
                            <span class="user">Brandon S. Young</span>
                            <span class="time">09:26</span>
                            <p>Whohoo!</p>
                        </li>
                        <li class="odd">
                            <span class="user">Arlind Nushi</span>
                            <span class="time">09:27</span>
                            <p>Do you like it?</p>
                        </li>
                    </ul>

                    <div class="chat-textarea">
                        <textarea class="form-control autogrow" placeholder="Type your message"></textarea>
                    </div>

                </div>

                <!-- end: Chat Section -->
            </div>

        </div>

        <div class="footer-sticked-chat"><!-- Start: Footer Sticked Chat -->

            <script type="text/javascript">
                function toggleSampleChatWindow()
                {
                    var $chat_win = jQuery("#sample-chat-window");

                    $chat_win.toggleClass('open');

                    if ($chat_win.hasClass('open'))
                    {
                        var $messages = $chat_win.find('.ps-scrollbar');

                        if ($.isFunction($.fn.perfectScrollbar))
                        {
                            $messages.perfectScrollbar('destroy');

                            setTimeout(function () {
                                $messages.perfectScrollbar();
                                $chat_win.find('.form-control').focus();
                            }, 300);
                        }
                    }

                    jQuery("#sample-chat-window form").on('submit', function (ev)
                    {
                        ev.preventDefault();
                    });
                }

                jQuery(document).ready(function ($)
                {
                    $(".footer-sticked-chat .chat-user, .other-conversations-list a").on('click', function (ev)
                    {
                        ev.preventDefault();
                        toggleSampleChatWindow();
                    });

                    $(".mobile-chat-toggle").on('click', function (ev)
                    {
                        ev.preventDefault();

                        $(".footer-sticked-chat").toggleClass('mobile-is-visible');
                    });
                });
            </script>

            <a href="#" class="mobile-chat-toggle">
                <i class="linecons-comment"></i>
                <span class="num">6</span>
                <span class="badge badge-purple">4</span>
            </a>

            <!-- End: Footer Sticked Chat -->
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
        <script type = "text/javascript" >
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


        </script>
    </body>
</html>































