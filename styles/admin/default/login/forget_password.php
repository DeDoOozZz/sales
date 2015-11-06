<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title><?= config('title') ?> - Login</title>

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Arimo:400,700,400italic">
    <link rel="stylesheet" href="<?= STYLE_CSS ?>/fonts/linecons/css/linecons.css">
    <link rel="stylesheet" href="<?= STYLE_CSS ?>/fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= STYLE_CSS ?>/bootstrap.css">
    <link rel="stylesheet" href="<?= STYLE_CSS ?>/xenon-core.css">
    <link rel="stylesheet" href="<?= STYLE_CSS ?>/xenon-forms.css">
    <link rel="stylesheet" href="<?= STYLE_CSS ?>/xenon-components.css">
    <link rel="stylesheet" href="<?= STYLE_CSS ?>/xenon-skins.css">
    <link rel="stylesheet" href="<?= STYLE_CSS ?>/custom.css">

    <script src="<?= STYLE_JS ?>/jquery-1.11.1.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body class="page-body login-page">


<div class="login-container">

    <div class="row">

        <div class="col-sm-6">

            <script type="text/javascript">
                jQuery(document).ready(function ($)
                {
                    // Reveal Login form
                    setTimeout(function () {
                        $(".fade-in-effect").addClass('in');
                    }, 1);


                    // Validation and Ajax action
//                            $("form#login").validate({
//                                rules: {
//                                    username: {
//                                        required: true
//                                    },
//                                    passwd: {
//                                        required: true
//                                    }
//                                },
//                                messages: {
//                                    username: {
//                                        required: 'Please enter your username.'
//                                    },
//                                    passwd: {
//                                        required: 'Please enter your password.'
//                                    }
//                                },
//                                // Form Processing via AJAX
//                                submitHandler: function (form)
//                                {
//                                    show_loading_bar(70); // Fill progress bar to 70% (just a given value)
//
//                                    var opts = {
//                                        "closeButton": true,
//                                        "debug": false,
//                                        "positionClass": "toast-top-full-width",
//                                        "onclick": null,
//                                        "showDuration": "300",
//                                        "hideDuration": "1000",
//                                        "timeOut": "5000",
//                                        "extendedTimeOut": "1000",
//                                        "showEasing": "swing",
//                                        "hideEasing": "linear",
//                                        "showMethod": "fadeIn",
//                                        "hideMethod": "fadeOut"
//                                    };
//
//                                    $.ajax({
//                                        url: "data/login-check.php",
//                                        method: 'POST',
//                                        dataType: 'json',
//                                        data: {
//                                            do_login: true,
//                                            username: $(form).find('#username').val(),
//                                            passwd: $(form).find('#passwd').val(),
//                                        },
//                                        success: function (resp)
//                                        {
//                                            show_loading_bar({
//                                                delay: .5,
//                                                pct: 100,
//                                                finish: function () {
//
//                                                    // Redirect after successful login page (when progress bar reaches 100%)
//                                                    if (resp.accessGranted)
//                                                    {
//                                                        window.location.href = 'dashboard-1.html';
//                                                    }
//                                                    else
//                                                    {
//                                                        toastr.error("You have entered wrong password, please try again. User and password is <strong>demo/demo</strong> :)", "Invalid Login!", opts);
//                                                        $(form).find('#passwd').select();
//                                                    }
//                                                }
//                                            });
//
//                                        }
//                                    });
//
//                                }
//                            });

                    // Set Form focus
                    $("form#login .form-group:has(.form-control):first .form-control").focus();
                });
            </script>

            <!-- Errors container -->
            <div class="errors-container">


            </div>
            <!-- Add class "fade-in-effect" for login form effect -->
            <? if (validation_errors()): ?>
                <div class="alert alert-danger"><?= validation_errors() ?></div>
            <? endif ?>

            <?= form_open(false, 'class="login-form fade-in-effect"') ?>
            <div class="login-header">
                <a href="dashboard-1.html" class="logo">
                    <img src="<?= STYLE_IMAGES ?>/logo.png" alt="" width="80" />
                    <span>log in</span>
                </a>

                <p>Forgot your password!</p>
            </div>


            <div class="form-group">
                <label class="control-label"><?= lang('users_email') ?></label>
                <input type="email" name="email" value="<?= set_value('email') ?>" class="form-control input-dark" autocomplete="off" >
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-dark  btn-block text-left" value="<?= lang('users_login') ?>">
                    <i class="fa-lock"></i>
                    Reset Password
                </button>
            </div>

            <?= form_close() ?>

        </div>

    </div>

</div>



<!-- Bottom Scripts -->
<script src="<?= STYLE_JS ?>/bootstrap.min.js"></script>
<script src="<?= STYLE_JS ?>/TweenMax.min.js"></script>
<script src="<?= STYLE_JS ?>/resizeable.js"></script>
<script src="<?= STYLE_JS ?>/joinable.js"></script>
<script src="<?= STYLE_JS ?>/xenon-api.js"></script>
<script src="<?= STYLE_JS ?>/xenon-toggles.js"></script>
<script src="<?= STYLE_JS ?>/jquery-validate/jquery.validate.min.js"></script>
<script src="<?= STYLE_JS ?>/toastr/toastr.min.js"></script>


<!-- JavaScripts initializations and stuff -->
<script src="<?= STYLE_JS ?>/xenon-custom.js"></script>

</body>
</html>