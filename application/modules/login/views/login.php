<body class="vh-100">
    <div class="login-outer">
        <div class="login-inner">
            <div id="app">
                <section class="section">
                    <div class="container">
                        <div class="row">
                            <div class="single-page single-pageimage construction-bg cover-image "
                                data-image-src="<?php echo base_url() ?>assets/img/login/img14.jpg">
                                <div class="row">
                                    <div class="col-lg-6">

                                        <div class="wrapper shadow-none wrapper2">
											<input type="hidden" id="base_url" value="<?php echo base_url();?>">
                                            <form id="login" class="card-body" tabindex="500" action="<?php echo base_url('login') ;?>" method="post">
                                                <h3>Login</h3>
                                                <div class="mail">
                                                    <input type="email" id="login-username" name="username" autocomplete="off" value="<?php echo(get_cookie('username') ? get_cookie('username') : '');?>">
                                                    <label for="login-username">Mail</label>
                                                </div>
                                                <div class="passwd">
                                                    <input type="password" id="login-password" name="password" value="<?php echo(get_cookie('password') ? get_cookie('password') : '');?>">
                                                    <label for="login-password">Password</label>
                                                </div>
                                                <div class="submit">
                                                    <button class="btn btn-primary btn-blue btn-block" type="submit">Login</button>
                                                </div>
                                                <p class="mb-2"><a href="javascript:void(0);" id="forget_password_link">Forgot Password</a></p>

                                                <?php if($this->session->flashdata('login_failure')) {?>
                                                    <div class="m-alert m-alert--outline alert alert-danger alert-dismissible fade show" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        </button>
                                                        <?php echo $this->session->flashdata('login_failure'); ?>
                                                    </div>
                                                <?php } ?>
											</form>
											<form id="forgot" class="card-body" tabindex="500" action="javascript:void(0);" enctype="multipart/form-data" method="post">
												<h4>Forgot Your Password?</h4>
												<div class="mail">
													<input type="email" placeholder="Enter Your Registered Email ID" name="f_email" id="f_email" autocomplete="off">
													<label>Mail</label>
													<span class="f-email-error"></span>
												</div>
												<div class="submit">
													<button type="submit" id="forgot-submit"  class="btn btn-blue btn-primary btn-block">Forgot Password</button>
												</div>
												<div class="text-center text-dark mt-3 mb-0">
													Forget it, <a href="javascript:void(0);" id="forget_password_cancel">send me back</a> to the sign in.
												</div>
											</form>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="log-wrapper text-center">
                                            <img class="mb-2 mt-4 mt-lg-0 login-logo" alt="logo"
                                                src="<?php echo base_url() ?>assets/images/logo.png">
                                            <p>There are many variations of passages of Lorem Ipsum available, but the
                                                majority have suffered alteration in some form, by injected humour, or
                                                randomised words which don't look even slightly believable. If you are
                                                going to use a passage of Lorem Ipsum, you need to be sure</p>
                                            <a class="btn btn-blue btn-primary mt-3" href="#">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>