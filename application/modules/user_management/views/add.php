<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title m-subheader__title--separator">Add User</h3>
				<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
					<li class="m-nav__item m-nav__item--home">
						<a href="<?php echo base_url('dashboard');?>" class="m-nav__link m-nav__link--icon">
							Dashboard
						</a>
					</li>
					<li class="m-nav__separator">/</li>
					<li class="m-nav__item">
						<a href="<?php echo base_url('user_management');?>" class="m-nav__link">
							All Users
						</a>
					</li>
					<li class="m-nav__separator">/</li>
					<li class="m-nav__item">
						<span class="m-nav__link">
							<span class="text-dark">Add User</span>
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
				<form id="user_form" action="javascript:void(0);" enctype="multipart/form-data">
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group m-form__group">
								<div class="row">
									<div class="col-sm-4">					
										<label class="col-form-label" for="user_name">Name *</label>
									</div>
									<div class="col-sm-8">
										<input type="text" class="form-control m-input" id="name" placeholder="User Name" name="name">
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group m-form__group">
								<div class="row">
									<div class="col-sm-4">					
										<label class="col-form-label" for="contact_number">Contact *</label>
									</div>
									<div class="col-sm-8">
										<input type="text" maxlength="10" onchange="verify_mobile()" class="form-control m-input" id="contact" placeholder="Contact Number" name="contact">
										<span id="mobile_exist_err" style="color: red; display: none;">Mobile Number is Already Registered With Us</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group m-form__group">
								<div class="row">
									<div class="col-sm-4">					
										<label class="col-form-label" for="contact_email">Email (username) *</label>
									</div>
									<div class="col-sm-8">
										<input type="email" onchange="verify_email()" class="form-control m-input" id="email" placeholder="Enter email as username" name="email">
										<span id="email_exist_err" style="color: red; display: none;">Email ID is Already Registered With Us</span>
									</div>
								</div>
							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group m-form__group">
								<div class="row">
									<div class="col-sm-4">					
										<label class="col-form-label" for="contact_email">Employee ID (unique)</label>
									</div>
									<div class="col-sm-8">
										<input type="text" onchange="verify_employee_id()" class="form-control m-input" id="employee_id" placeholder="Enter unique Employee ID" name="employee_id">
										<span id="employee_id_exist_err" style="color: red; display: none;">Employee ID is Already Exist.</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group m-form__group">
								<div class="row">
									<div class="col-sm-4">					
										<label class="col-form-label" for="country_select">Department</label>
									</div>
									<div class="col-sm-8">
										<select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" id="select_department" name="department_id">
											<option value="" selected disabled>Select Department</option>
											<?php 
											foreach ($departments as $key => $value) {
											?>
											<option value="<?php echo $value['id']; ?>"><?php echo $value['department_name']; ?></option>
											<?php
											}
											?>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group m-form__group">
								<div class="row">
									<div class="col-sm-4">					
										<label class="col-form-label" for="country_select">Reported Manager</label>
									</div>
									<div class="col-sm-8">
										<select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" id="select_manager" name="reported_manager_id">
											<option value="" selected disabled>Select Reported Manager</option>
											<?php 
											foreach ($users as $key => $value) {
											?>
											<option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
											<?php
											}
											?>
										</select>
									</div>
								</div>
							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group m-form__group">
								<div class="row">
									<div class="col-sm-4">					
										<label class="col-form-label" for="country_select">Country *</label>
									</div>
									<div class="col-sm-8">
										<select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" id="select_country" name="country_id">
											<option value="" selected disabled>Select Country</option>
											<?php 
											foreach ($countries as $key => $value) {
											?>
											<option value="<?php echo $value['country_id']; ?>"><?php echo $value['country_name']; ?></option>
											<?php
											}
											?>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group m-form__group">
								<div class="row">
									<div class="col-sm-4">					
										<label class="col-form-label" for="state_select">State *</label>
									</div>
									<div class="col-sm-8" id="state_div">
										<select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" name="state_id" id="select_state">
											<option value="" selected disabled>Select State</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group m-form__group">
								<div class="row">
									<div class="col-sm-4">					
										<label class="col-form-label" for="city_select">City *</label>
									</div>
									<div class="col-sm-8" id="city_div">
										<select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" id="select_city" name="city_id">
											<option value="" disabled="" selected="">Select City</option>
										</select>
									</div>
								</div>
							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group m-form__group">
								<div class="row">
									<div class="col-sm-4">					
										<label class="col-form-label" for="role_select">Role *</label>
									</div>
									<div class="col-sm-8">
										<select class="form-control m-bootstrap-select m_selectpicker" data-live-search="false" id="select_role" name="role_id">
											<option value="" disabled="" selected="">Select Role</option>
											<?php foreach ($roles as $key => $value) {?>
												<option value="<?php echo $value['id_role']; ?>"><?php echo $value['role_name']; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group m-form__group">
								<div class="row">
									<div class="col-sm-4">					
										<label class="col-form-label" for="user_password">Password *</label>
									</div>
									<div class="col-sm-8">
										<input type="password" class="form-control m-input" id="password" placeholder="Enter Password" name="password">
									</div>
								</div>
							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group m-form__group">
								<div class="row">
									<div class="col-sm-4">					
										<label class="col-form-label" for="status_select">Status *</label>
									</div>
									<div class="col-sm-8">
										<select class="form-control m-bootstrap-select m_selectpicker" data-live-search="false" id="select_status" name="status">
											<option value="" selected disabled>Select Status</option>
											<option value="active">Active</option>
											<option value="inactive">Inactive</option>
										</select>
									</div>
								</div>
							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group m-form__group">
								<div class="row">
									<div class="col-sm-4">					
										<label class="col-form-label" for="user-profile-pic">Profile Pic</label>
									</div>
									<div class="col-sm-12">
										<div class="input-group">
											<div class="custom-file">
												<input type="file" class="custom-file-input" id="profile" aria-describedby="inputGroupFileAddon01" name="profile">
												<label class="custom-file-label" for="upload_file">Choose file</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-sm-12 text-right mt-20">
							<input type="submit" value="Submit" id="add_user" class="btn btn-sm btn-success">
						</div>

					</div>
				</form>
			</div>	
		</div>
	</div>
</div>