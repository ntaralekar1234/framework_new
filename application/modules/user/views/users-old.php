
<div class="m-grid__item m-grid__item--fluid m-wrapper">

	<!-- BEGIN: Subheader -->
  	<div class="m-subheader ">
	    <div class="d-flex align-items-center">
	      	<div class="mr-auto">
		        <h3 class="m-subheader__title m-subheader__title--separator">Manage Users</h3>
		        <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
		            <li class="m-nav__item m-nav__item--home">
		                <a href="<?php echo base_url('dashboard');?>" class="m-nav__link m-nav__link--icon">
		                    Dashboard
		                </a>
		            </li>
		            <li class="m-nav__separator">/</li>
		            <li class="m-nav__item">
		                <span class="m-nav__link">
		                    <span class="text-dark">Users</span>
		                </span>
		            </li>
		        </ul>     
	      	</div>
	      	<div class="table-top-btn-wrapper">
                <a href="javascript:void(0)" id="add_user" class="btn btn-info">
                  <span>
                    <span>Add User</span>
                  </span>
                </a>
               
            </div>
	    </div>
  	</div>
	
	<!-- END: Subheader -->		        
	<div class="m-content" id="add_user_div" style="display: none;">
		<div class="m-portlet m-portlet--bordered  m-portlet--rounded p-20">
			<div class="row">
				<div class="col-12"> 
					<div class="m-portlet__body">
						<div class="form-warpper" >
                           <form action="javascript:void(0)" class="form-horizontal" id="user_form" enctype="multipart/form-data">
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group m-form__group">
										<div class="row">
											<div class="col-sm-4">					
												<label class="col-form-label" for="country_select">Country <span class="required-field">*</span></label>
											</div>
											<div class="col-sm-8">
												<select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" id="country_select" name='country' title="Select Country">
												<?php foreach($countries as $row)
                                                    {
                                                        ?>
                                                        <option value="<?php echo $row->country_id;?>"><?php echo $row->country_name;?></option>
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
												<label class="col-form-label" for="role">Role <span class="required-field">*</span></label>
											</div>
											<div class="col-sm-8">
												<select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" id="role" name='role' title="Select Role">
												<?php foreach($roles as $row)
                                                    {
                                                        ?>
                                                        <option value="<?php echo $row->id_role;?>"><?php echo $row->role_name;?></option>
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
							 					<label class="col-form-label" for="user_name">Name <span class="required-field">*</span></label>
											</div>
											<div class="col-sm-8"><input type="text" class="form-control m-input" id="name" name="name" placeholder="Enter User Name">
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group m-form__group">
										<div class="row">
											<div class="col-sm-4">					
												<label class="col-form-label" for="contact">Contact <span class="required-field">*</span></label>
											</div>
											<div class="col-sm-8"><input type="number" class="form-control m-input" id="contact" name="contact" placeholder="Enter Contact Number">
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group m-form__group">
										<div class="row">
											<div class="col-sm-4">					
							 					<label class="col-form-label" for="email">Email <span class="required-field">*</span></label>
											</div>
											<div class="col-sm-8"><input type="text" class="form-control m-input" id="email" name="email" placeholder="Enter Email ID">
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group m-form__group">
										<div class="row">
											<div class="col-sm-4">					
												<label class="col-form-label" for="brand_image">Profile Photo <span class="required-field">*</span></label>
											</div>
											<div class="col-sm-8"><input type="file" accept=".jpg,.png,.jpeg" class="custom-file-input" name="image"  id="image" aria-describedby="inputGroupFileAddon01">
												<label class="custom-file-label upload-file-label" for="upload_file">Choose Profile Photo</label>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group m-form__group">
										<div class="row">
											<div class="col-sm-4">					
												<label class="col-form-label" for="user_password">Password <span class="required-field">*</span></label>
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
												<label class="col-form-label" for="c_password">Confirm Password <span class="required-field">*</span></label>
											</div>
											<div class="col-sm-8">
												<input type="password" class="form-control m-input" id="c_password" placeholder="Enter Confirm Password" name="c_password">
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group m-form__group">
										<div class="row">
											<div class="col-sm-4">					
												<label class="col-form-label" for="status">Status <span class="required-field">*</span></label>
											</div>
											<div class="col-sm-8">
												<select class="form-control m-bootstrap-select m_selectpicker" name='status'  id="status">
													<option value="active">Active</option>
													<option value="inactive">In-active</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-12 text-right">
									<input type="submit" value="Submit" class="btn btn-success" id='add'>
								</div>
							</div>
                           </form>
						</div>

					</div>
				</div>
			</div>
		</div>	
	</div>
	<div class="m-content">
			<div class="m-portlet m-portlet--bordered  m-portlet--rounded p-20">
				<div class="row">
					<div class="col-12">
						<div class="m-portlet__body">
							<div class="pending-approved-table" id="id-pending-approved-table">
								<div class=" m-portlet--mobile" id="id-aproved-table">
									<div class="table-responsive">
										<table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
											 <thead>
						                        <tr>
						                            <th class="ckb-hidden"></th>
						                            <th>Country</th>
						                            <th>Name</th>
													<th>Profile</th>
						                            <th>Contact</th>
						                            <th>Email</th>
						                            <th>Role</th>
						                            <th>Last Login</th>
													<th>Status</th>
													<th>Added By</th>
						                            <th>Actions</th>
						                        </tr>
						                    </thead>
										</table>
									</div>

								</div>	
							</div>	
						</div>
					</div>
				</div>
			</div>	
		</div>
</div>