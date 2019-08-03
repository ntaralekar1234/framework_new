<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title m-subheader__title--separator">Edit User</h3>
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
							<span class="text-dark">Edit User</span>
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

						<input type="hidden" id="user_id" name="user_id" value="<?php echo $this->uricryption->encode($user_details['id']); ?>">

						<div class="col-sm-4">
							<div class="form-group m-form__group">
								<div class="row">
									<div class="col-sm-4">					
										<label class="col-form-label" for="user_name">Name *</label>
									</div>
									<div class="col-sm-8">
										<input type="text" class="form-control m-input" id="name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $user_details['name'] ); ?>" name="name">
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
										<input type="text" class="form-control m-input" id="contact" value="<?php echo ($this->input->post('contact') ? $this->input->post('contact') : $user_details['contact'] ); ?>" name="contact">
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
										<input type="email" class="form-control m-input" id="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $user_details['email'] ); ?>" name="email">
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
										<input type="text" onchange="verify_employee_id()" class="form-control m-input" id="employee_id" placeholder="Enter unique Employee ID" name="employee_id" value="<?php echo ($this->input->post('employee_id') ? $this->input->post('employee_id') : $user_details['employee_id'] ); ?>">
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
											<option value="" <?php echo ($user_details['department_id'] == ''  ? 'selected' : ''); ?> disabled>Select Department</option>
											<?php 
											foreach ($departments as $key => $value) {
											?>
											<option value="<?php echo $value['id']; ?>" <?php echo ($user_details['department_id'] == $value['id']  ? 'selected' : ''); ?> ><?php echo $value['department_name']; ?></option>
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
											<option value="" <?php echo ($user_details['reported_manager_id'] == ''  ? 'selected' : ''); ?> disabled>Select Reported Manager</option>
											<?php 
											foreach ($users as $key => $value) {
											?>
											<option value="<?php echo $value['id']; ?>" <?php echo ($user_details['reported_manager_id'] == $value['id']  ? 'selected' : ''); ?> ><?php echo $value['name']; ?></option>
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
											<option value="" <?php echo ($user_details['country_id'] == ''  ? 'selected' : ''); ?> disabled>Select Country</option>
											<?php 
											foreach ($countries as $key => $value) {
											?>
											<option value="<?php echo $value['country_id']; ?>" <?php echo ($user_details['country_id'] == $value['country_id']  ? 'selected' : ''); ?> ><?php echo $value['country_name']; ?></option>
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
											<option value="" <?php echo ($user_details['state_id'] == ''  ? 'selected' : ''); ?> disabled>Select State</option>
											<?php 
											foreach ($states as $key => $val) {
											?>
											<option value="<?php echo $val['state_id']; ?>" <?php echo ($user_details['state_id'] == $val['state_id']  ? 'selected' : ''); ?> ><?php echo $val['state_name']; ?></option>
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
										<label class="col-form-label" for="city_select">City *</label>
									</div>
									<div class="col-sm-8" id="city_div">
										<select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" id="select_city" name="city_id">
											<option value="" <?php echo ($user_details['city_id'] == ''  ? 'selected' : ''); ?> disabled>Select City</option>
											<?php 
											foreach ($cities as $key => $val) {
											?>
											<option value="<?php echo $val['city_id']; ?>" <?php echo ($user_details['city_id'] == $val['city_id']  ? 'selected' : ''); ?> ><?php echo $val['city_name']; ?></option>
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
									<label class="col-form-label" for="role_select">Role *</label>
								</div>
								<div class="col-sm-8">
									<select class="form-control m-bootstrap-select m_selectpicker" data-live-search="false" id="select_role" name="role_id">
										<?php foreach ($roles as $key => $value) {?>
											<option value="<?php echo $value['id_role']; ?>" <?php echo ($this->input->post('role')== $value['id_role'] ? 'selected' : ($user_details['role_id'] == $value['id_role'] ? 'selected'  :'')); ?>><?php echo $value['role_name']; ?></option>
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
									<label class="col-form-label" for="status_select">Status *</label>
								</div>
								<div class="col-sm-8">
									<select class="form-control m-bootstrap-select m_selectpicker" data-live-search="false" id="select_status" name="status">
										<option value="active" <?php echo ($this->input->post('status') == 'active' ? 'selected' : ($user_details['status'] == 'active' ? 'selected'  :'')); ?>>Active</option>
										<option value="inactive"<?php echo ($this->input->post('status') == 'inactive' ? 'selected' : ($user_details['status'] == 'inactive' ? 'selected'  :'')); ?>>Inactive</option>
									</select>
								</div>
							</div>
						</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 ">
							<div class="form-group m-form__group">
							<div class="row">
								<div class="col-sm-4">					
									<label class="col-form-label" for="user-profile-pic">Profile Pic</label>
								</div>
								<?php if($user_details['profile'] != null) {?>
								<div class="user_profile_images">
									<div class="col-12">
										<div class="participants-logo"><img src="<?php echo $this->config->item('admin_users_image_path').'/'.$user_details['profile']; ?>" class="img-responsive"><!-- <span class="img-delete-btn"><i class="la la-close"></i></span> --></div>
									</div>
								</div>
								<?php }?>
									
								<div class="col-sm-8">
									<div class="input-group">
										<div class="custom-file">
											<input type="hidden" name="profile_img" value="<?php echo $this->uricryption->encode($user_details['profile']); ?>">
											<input type="file" class="custom-file-input" id="profile" aria-describedby="inputGroupFileAddon01" name="profile">
											<label class="custom-file-label" for="upload_file">Choose file</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						</div>

						<div class="col-sm-12 text-right mt-20">
							<input type="submit" value="Update" id="update_user" class="btn btn-sm btn-success">
						</div>

					</div>
				</form>
			</div>	
		</div>
	</div>
</div>