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
										<?php if($this->session->flashdata('login_failure')) {?>
											<div class="m-alert m-alert--outline alert alert-danger alert-dismissible fade show" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												</button>
												<?php echo $this->session->flashdata('login_failure'); ?>
											</div>
										<?php } ?>
                                        <div class="wrapper shadow-none wrapper2">
											<input type="hidden" id="base_url" value="<?php echo base_url();?>">
                                            <form class="card-body" tabindex="500" id="reset_password_form" action="javascript:void(0);" autocomplete="off" enctype="multipart/form-data">
												<input type="hidden" name="id" value="<?php echo $this->uricryption->encode($response['user_id']);?>">
												<h3>Reset Your Password Here</h3>
                                                <div class="mail">
                                                    <input type="password" placeholder="Enter New Password" name="n_password" id="n_password" autocomplete="off">
													<label for="login-username">New Password</label>
													<span class="f-email-error" id="n-password-error"></span>
                                                </div>
                                                <div class="passwd">
                                                    <input type="password" placeholder="Enter Confirm Password" name="c_password" id="c_password" autocomplete="off">
													<label for="login-password">Confirm Password</label>
													<span class="f-email-error" id="c-password-error"></span>
                                                </div>
                                                <div class="submit">
                                                    <button class="btn btn-primary btn-blue btn-block" type="submit" id="reset-submit">Change Password</button>
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