	<div class="m-grid__item m-grid__item--fluid m-wrapper">

		<!-- BEGIN: Subheader -->
		<div class="m-subheader ">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="m-subheader__title m-subheader__title--separator">User Profile</h3>
					<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
	                    <li class="m-nav__item m-nav__item--home">
	                        <a href="<?php echo base_url('dashboard');?>" class="m-nav__link m-nav__link--icon">
	                            Dashboard
	                        </a>
	                    </li>
	                    <li class="m-nav__separator">/</li>
	                    <li class="m-nav__item">
	                        <span class="m-nav__link">
	                            <span class="text-dark">User Profile</span>
	                        </span>
	                    </li>
	                </ul>							
				</div>
			</div>
		</div>

		
		<!-- END: Subheader -->		        
		<div class="m-content">
			<div class="m-portlet m-portlet--bordered  m-portlet--rounded p-20">
				<div class="edit-product-form p-20">	
					<div class="user-profile-top">
						<div class="row">

							<div class="col-sm-12"><figure class="profile-pic-wrapper">
								<img alt="img" src="<?php echo $admin_profile_path; ?>" class="img-responsive img-thumbnail">
								
								<a href="javascript:void(0)" id="show-profile-pic-upload">Change Profile Pic.</a>

							<div class="profile-role-status">
								<span> <?php echo $user_details['role_name']; ?> <span class="m-badge m-badge--success m-badge--wide float-right"><?php echo $user_details['status']; ?></span></span>
							</div>

							</figure>
							<div class="row" id="change_profile_pic" style="display: none;">
							<div class="col-12">
									<form id="upload_form" enctype="multipart/form-data" action="javascript:void(0);">

										<input type="hidden" name="id" value="<?php echo $this->uricryption->encode($user_details['id']); ?>">
										<input type="hidden" name="img" value="<?php echo $this->uricryption->encode($user_details['profile']); ?>">
										<div class="row">
											<div class="form-group m-form__group col-12">
												<div class="input-group">
													<div class="custom-file">
														<input type="file" class="custom-file-input" name="profile" id="profile" aria-describedby="inputGroupFileAddon01">
														<label class="custom-file-label" for="upload_file">Choose file</label>
													</div>
												</div>
											</div>
											<div class="text-right col-12">
												<input type="submit" class="btn btn-sm btn-success" value="Submit" id="upload_profile">
											</div>
										</div>
									</form>
								</div>
								</div>
							</div>

						</div>

						<div class="edit-user-profile-form">
						
							<div class="row">
								<div class="col-6 border-right">
									<form id="profile_form" enctype="multipart/form-data" action="javascript:void(0);">
										<h4 class="custom-section-heading">Basic Details</h4>
										<div class="form-group m-form__group">
											<div class="row">
												<div class="col-sm-4">					
													<label class="col-form-label" for="name">Name</label>
												</div>
												<div class="col-sm-8">
													<input type="hidden" name="user_id" value="<?php echo $this->uricryption->encode($user_details['id']); ?>">
													<input type="text" class="form-control m-input" name="name" id="name" value="<?php echo $user_details['name']; ?>">
												</div>
											</div>
										</div>
										<div class="form-group m-form__group">
											<div class="row">
												<div class="col-sm-4">					
													<label class="col-form-label" for="user_contact">Contact</label>
												</div>
												<div class="col-sm-8">
													<input type="text" class="form-control m-input" name="contact" id="contact" value="<?php echo $user_details['contact']; ?>" disabled>
												</div>
											</div>
										</div>
										<div class="form-group m-form__group">
											<div class="row">
												<div class="col-sm-4">					
													<label class="col-form-label" for="user_email">Email</label>
												</div>
												<div class="col-sm-8">
													<input type="text" class="form-control m-input" name="email" id="email" value="<?php echo $user_details['email']; ?>" disabled>
												</div>
											</div>
										</div>
										
										<div class="form-group m-form__group">
											<div class="row">
											<div class="col-12 text-right">
												<input type="submit" class="btn btn-success btn-sm" value="Update" id="update_profile">
											</div>
											</div>
										</div>
									</form>

								</div>
								
								
								<div class="col-6">
									<form id="password_form" enctype="multipart/form-data" action="javascript:void(0);">
										<h4 class="custom-section-heading">Change Password</h4>
										<div class="form-group m-form__group">
											<div class="row">
												<div class="col-sm-4">					
													<label class="col-form-label" for="old_password">Old Password</label>
												</div>
												<div class="col-sm-8">
													<input type="hidden" name="uid" id="uid" value="<?php echo $this->uricryption->encode($user_details['id']); ?>">
													<input type="hidden" name="email" id="email" value="<?php echo $this->uricryption->encode($user_details['email']); ?>">
													<input type="hidden" name="name" id="name" value="<?php echo $this->uricryption->encode($user_details['name']); ?>">

													<input type="password" class="form-control m-input" onchange="verify_old_password()" name="old_password" id="old_password" placeholder="Old Password">
													<span id="old_password_err" style="color: red; display: none;">Password Does Not Match. please, try again.</span>
													<span id="old_password_success" style="color: green; display: none;">Password Match Successfully.</span>
												</div>
											</div>
										</div>
										<div class="form-group m-form__group">
											<div class="row">
												<div class="col-sm-4">					
													<label class="col-form-label" for="new_password">New Password</label>
												</div>
												<div class="col-sm-8">
													<input type="password" class="form-control m-input" name="new_password" id="new_password" placeholder="New Password">
												</div>
											</div>
										</div>
										<div class="form-group m-form__group">
											<div class="row">
												<div class="col-sm-4">					
													<label class="col-form-label" for="confirm_password">Confirm Password</label>
												</div>
												<div class="col-sm-8">
													<input type="password" class="form-control m-input" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
												</div>
											</div>
										</div>

										<div class="form-group m-form__group">
											<div class="row">
											<div class="col-12 text-right">
												<input type="submit" class="btn btn-success btn-sm" value="Change" id="change_password">
											</div>
											</div>
										</div>
									</form>
								</div>

							</div>
						
						</div>
					</div>
				</div>	
			</div>
		</div>
	</div>

