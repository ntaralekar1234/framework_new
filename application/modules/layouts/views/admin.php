<!DOCTYPE html>
<html>

<head>
    <title>
        <?php echo $layout_title; ?>
    </title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">


    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon/favicon.ico" />
    <?php echo $this->layouts->print_css(); ?>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <style type="text/css">
    .form-error {
        border-color: red;
    }

    .required-field {
        color: red;
    }
    </style>
</head>


<body class="app">
    <input type="hidden" id="base_url" value="<?php echo base_url();?>">
    <div id="spinner"></div>
    <div id="app">
        <div class="main-wrapper">
            <nav class="navbar navbar-expand-lg main-navbar">
                <a class="header-brand" href="<?php echo base_url('dashboard') ?>">
                    <img src="<?php echo base_url() ?>assets/images/logo.png" class="header-brand-img"
                        alt="bluenxt logo">
                </a>
                <form class="form-inline mr-auto">
                    <!-- <ul class="navbar-nav mr-3">
						<li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="ion ion-navicon-round"></i></a></li>
					</ul>
					<div class="search-element">
						<div class="form-group overflow-hidden">
							<select class="form-control select2 w-200" >
								<option selected="selected">Survey</option>
								<option>Poll</option>

							</select>
						</div>
					</div> -->
                    <div class="">
                        <ul class="navbar-nav mr-3">
                            <a href="" data-toggle="modal" data-target="#all-survey-modal">
                                <li class="ion-grid" data-toggle="tooltip" title=""
                                    data-original-title="Access All Your Surveys here.."></li>
                            </a>
                            <button class="navbar-toggler main-nav-toggler" type="button" data-toggle="collapse"
                                data-target="#main-nav" aria-controls="main-nav" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <?php if(isset($form_name)) {?>
                            <span class="currnt-survey-title">
                                <span class="currnt-survey-status bg-success"></span>
                                <?php echo $form_name; ?>
                            </span>
                            <?php } ?>


                            <div class="collapse navbar-collapse main-nav" id="main-nav">
                                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="#" data-toggle="modal" data-target="#newSurveyBank">Create Form</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Subscription</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url('users'); ?>">Users</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Master
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="<?php echo base_url('roles'); ?>">Role</a>
                                            <a class="dropdown-item" href="<?php echo base_url('web_module'); ?>">Module</a>
                                            <a class="dropdown-item" href="<?php echo base_url('permissions'); ?>">Permissions</a>
                                            <a class="dropdown-item" href="<?php echo base_url('category'); ?>">Category</a>
                                            <a class="dropdown-item" href="<?php echo base_url('sub-category'); ?>">Subcategory</a>
                                            <a class="dropdown-item" href="<?php echo base_url('inner-category'); ?>">Innercategory</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </ul>
                    </div>

                </form>

                <ul class="navbar-nav navbar-right">


                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                            class="nav-link  nav-link-lg beep"><i class="ion-ios-bell-outline"></i></a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right">
                            <div class="dropdown-header">Notifications
                                <div class="float-right">
                                    <a href="#">View All</a>
                                </div>
                            </div>
                            <div class="dropdown-list-content">
                                <a href="#" class="dropdown-item">
                                    <i class="fa fa-users text-primary"></i>
                                    <div class="dropdown-item-desc">
                                        <b>So many Users Visit your template</b>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <i class="fa fa-exclamation-triangle text-danger"></i>
                                    <div class="dropdown-item-desc">
                                        <b>Error message occurred....</b>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <i class="fa fa-users text-warning"></i>
                                    <div class="dropdown-item-desc">
                                        <b> Adding new people</b>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <i class="fa fa-shopping-cart text-success"></i>
                                    <div class="dropdown-item-desc">
                                        <b>Your items Arrived</b>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <i class="fa fa-comment text-primary"></i>
                                    <div class="dropdown-item-desc">
                                        <b>New Message received</b>
                                        <div class="float-right"><span
                                                class="badge badge-pill badge-danger badge-sm">67</span>
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <i class="fa fa-users text-primary"></i>
                                    <div class="dropdown-item-desc">
                                        <b>So many Users Visit your template</b>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown dropdown-list-toggle">
                        <a href="#" class="nav-link nav-link-lg full-screen-link">
                            <i class="ion-arrow-expand" id="fullscreen-button"></i>
                        </a>
                    </li>
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg">
                            <img src="<?php echo $admin_profile_path; ?>" alt="profile-user"
                                class="rounded-circle w-32">
                            <div class="d-sm-none d-lg-inline-block"><?php echo $this->session->userdata('un');?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="<?php echo base_url('user_profile'); ?>" class="dropdown-item has-icon">
                                <i class="ion ion-android-person"></i> Profile
                            </a>
                            <a href="<?php echo base_url('user_profile'); ?>" class="dropdown-item has-icon">
                                <i class="ion ion-gear-a"></i> Settings
                            </a>
                            <a href="<?php echo base_url('logout');?>" class="dropdown-item has-icon">
                                <i class="ion-ios-redo"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="app-content">
                <div class="app-content-inner">

                    <?php
						echo $layout_content;
					?>

                </div>
            </div>
            <?php if($active == 'dashboard') {?>
            <!-- Create New Survey Modal -->
            <div id="newSurveyBank" class="modal fade">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content ">
                        <div class="modal-header pd-x-20">
                            <h6 class="modal-title">Create New Form</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="create_new_form">
                            <div class="modal-body pd-20">
                                <div class="form-group">
                                    <label for="">Form Name </label>
                                    <input type="text" class="form-control" id="form_name"
                                        placeholder="Enter Form Name">
                                </div>
                                <div class="subdivbox">
                                    <div class="">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group ">
                                                    <label>Select Category</label>
                                                    <select class="selectpicker" data-live-search="true" title="Select Category">
                                                        <option>Alabama</option>
                                                        <option>Alaska</option>
                                                        <option>California</option>
                                                        <option>Delaware</option>
                                                        <option>Tennessee</option>
                                                        <option>Texas</option>
                                                        <option>Washington</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group ">
                                                    <label>Select Sub Category</label>
                                                    <select class="selectpicker" data-live-search="true" title="Select Sub category">

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group ">
                                                    <label>Select Inner Category</label>
                                                    <select class="selectpicker" data-live-search="true" title="Select Inner Category">

                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                </div>
                            </div><!-- modal-body -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-cont" id="create-form">Create</button>
                                <button type="button" class="btn btn-close" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div><!-- modal-dialog -->
            </div><!-- modal -->
            <?php } ?>
            <footer class="main-footer">
                <div class="text-center">
                    Copyright &copy;bluenxt Survey 2019. Design By <a href="https://webetron.com/" target="_blank">
                        Webetron
                        Technology</a>
                </div>
            </footer>
        </div>
    </div>








    <?php echo $this->layouts->print_js(); ?>
    <?php echo $this->layouts->print_custom_js(); ?>



    <!-- Bootstrap Select -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

    <!-- Datatables -->
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('.table').DataTable();
    });
    </script>

    <script type="text/javascript">
    $('.my-select').selectpicker();
    </script>

    <script type="text/javascript">
    $(document).ready(function() {
        $("#cs-loader").delay(800).fadeOut(300);
        $(window).on('resize', function() {
            var win = $(this);
            if (win.width() < 1500) {
                $('body').addClass('m-aside-left--minimize');
                $('body').addClass('m-brand--minimize');
                $('.m--visible-desktop-inline-block').addClass('m-brand__toggler--active');
            } else {
                $('body').removeClass('m-aside-left--minimize');
                $('body').removeClass('m-brand--minimize');
                $('.m--visible-desktop-inline-block').removeClass('m-brand__toggler--active');
            }
        });

        var highestBox = 0;
        $('a.ResBtnq').each(function() {
            if ($(this).height() > highestBox) {
                highestBox = $(this).height();
            }
        });
        $('a.ResBtnq').height(highestBox);


    });
    </script>
    <script>
    $('.collapse').collapse({
        toggle: false
    });

    function myfunction2() {
        $('#mycard-collapse.collapse').collapse('hide');
    }
    </script>

    <script>
    function myFunction() {
        var x = document.getElementById("myColor").value;
        document.getElementById("color-code").innerHTML = x;
    }
    </script>

    <script type="text/javascript">
    var allRadios = document.getElementsByName('publish-survey-radio');
    var booRadio;
    var x = 0;
    for (x = 0; x < allRadios.length; x++) {
        allRadios[x].onclick = function() {
            if (booRadio == this) {
                this.checked = false;
                booRadio = null;
            } else {
                booRadio = this;
            }
        };
    }
    </script>

</body>

</html>