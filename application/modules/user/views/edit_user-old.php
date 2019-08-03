<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<!-- BEGIN: Subheader -->
  	<div class="m-subheader ">
	    <div class="d-flex align-items-center">
	      	<div class="mr-auto">
		        <h3 class="m-subheader__title m-subheader__title--separator">Edit User Details</h3>
		        <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
		            <li class="m-nav__item m-nav__item--home">
		                <a href="<?php echo base_url('dashboard');?>" class="m-nav__link m-nav__link--icon">
		                    Dashboard
		                </a>
		            </li>
		            <li class="m-nav__separator">/</li>
		            <li class="m-nav__item">
		                <a href="<?php echo base_url('users');?>" class="m-nav__link m-nav__link--icon">
		                    Users
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

			<div class="row">
				<div class="col-12">
					<div class="m-portlet__body">
						<div class="form-warpper">
							
						<div class="row">

                          	<div class="col-sm-3 border-right">

								<figure class="banner-pic-wrapper">
									<img alt="img" src="<?php echo $this->config->item('admin_users_image_path').'/'.$details['profile']; ?>" class="img-responsive img-thumbnail">
									
									<div class="col-sm-12">
									<form id="upload_photo" enctype="multipart/form-data" action="javascript:void(0);">
									<input type="hidden" value="<?php echo $id;?>" name="id">
									<div class="form-group m-form__group">
										<div class="row">
											<div class="col-sm-12 p-0"><input type="file" accept=".jpg,.png,.jpeg" class="custom-file-input" name="image"  id="image" aria-describedby="inputGroupFileAddon01">
												<label class="custom-file-label upload-file-label" for="upload_file">Choose Profile Photo</label>
											</div>
										</div>
										<div class="text-center col-12 mtb-20">
											<input type="submit" class="btn btn-sm btn-success" value="Upload" id="upload">
										</div>
									</div>
									</form>
								</div>
								</figure>
								
							</div>

                          	<div class="col-md-9">
                          	<form id="user_form" action="javascript:void(0);" class="form-horizontal">
                          	<div class="row">
                          	<input type="hidden" value="<?php echo $id;?>" name="id">

                          		<div class="col-sm-6">
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
                                                        <option value="<?php echo $row->country_id;?>" <?php echo ($details['country_id'] == $row->country_id ? 'selected' : '');?>><?php echo $row->country_name;?></option>
                                                        <?php
                                                    }
                                                    ?>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
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
                                                        <option value="<?php echo $row->id_role;?>" <?php echo ($details['role_id'] == $row->id_role ? 'selected' : '');?> ><?php echo $row->role_name;?></option>
                                                        <?php
                                                    }
                                                    ?>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group m-form__group">
										<div class="row">
											<div class="col-sm-4">					
							 					<label class="col-form-label" for="user_name">Name <span class="required-field">*</span></label>
											</div>
											<div class="col-sm-8"><input type="text" class="form-control m-input" id="name" name="name" placeholder="Enter User Name" value="<?php echo $details['name'];?>">
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group m-form__group">
										<div class="row">
											<div class="col-sm-4">					
												<label class="col-form-label" for="contact">Contact <span class="required-field">*</span></label>
											</div>
											<div class="col-sm-8"><input type="number" class="form-control m-input" id="contact" name="contact" placeholder="Enter Contact Number" value="<?php echo $details['contact'];?>">
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group m-form__group">
										<div class="row">
											<div class="col-sm-4">					
							 					<label class="col-form-label" for="email">Email <span class="required-field">*</span></label>
											</div>
											<div class="col-sm-8"><input type="text" class="form-control m-input" id="email" name="email" placeholder="Enter Email ID" value="<?php echo $details['email'];?>">
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group m-form__group">
										<div class="row">
											<div class="col-sm-4">					
												<label class="col-form-label" for="category_select">Status <span class="required-field">*</span></label>
											</div>
											<div class="col-sm-8">
												<select class="form-control m-bootstrap-select m_selectpicker" name='status'  id="status">
													<option value="active" <?php echo ($details['status'] == 'active' ? 'selected' : '');?>>Active</option>
													<option value="inactive" <?php echo ($details['status'] == 'inactive' ? 'selected' : '');?>>Inactive</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-12 text-right">
									<input type="submit" value="Submit" id="edit" class="btn btn-success">
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
</div>
