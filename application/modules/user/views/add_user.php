<div class="card">
    <div class="card-header">
        <h4>Add User</h4>
    </div>
    <div class="card-body">
        <form action="javascript:void(0)" class="form-horizontal" id="user_form" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="form-group row">
                        <label class="col-xl-3 col-form-label" for="name">Name <span class="required-field">*</span></label>
                        <div class="col-xl-9">
                            <input type="text" class="form-control m-input" id="name" name="name" placeholder="Enter User Name">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="form-group row">
                        <label class="col-xl-3 col-form-label" for="contact">Contact <span class="required-field">*</span></label>
                        <div class="col-xl-9">
                            <input type="text" maxlength="10" onchange="verify_mobile()" class="form-control m-input" id="contact" placeholder="Contact Number" name="contact">
                            <span id="mobile_exist_err" style="color: red; display: none;">Mobile Number is Already Registered With Us</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="form-group row">
                        <label class="col-xl-3 col-form-label" for="email">Email <span class="required-field">*</span></label>
                        <div class="col-xl-9">
                            <input type="email" onchange="verify_email()" class="form-control m-input" id="email" placeholder="Enter email" name="email">
                            <span id="email_exist_err" style="color: red; display: none;">Email ID is Already Registered With Us</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="form-group row">
                        <label class="col-xl-3 col-form-label" for="select_country">Country <span class="required-field">*</span></label>
                        <div class="col-xl-9">
                            <select class="selectpicker" data-live-search="true" title="Select Country" id="select_country" name="country_id">
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
                <div class="col-lg-4 col-md-6">
                    <div class="form-group row">
                        <label class="col-xl-3 col-form-label" for="select_state">State <span class="required-field">*</span></label>
                        <div class="col-xl-9" id="state_div">
                            <select class="selectpicker" data-live-search="true" name="state_id" id="select_state">
								<option value="" selected disabled>Select State</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="form-group row">
                        <label class="col-xl-3 col-form-label" for="select_city">City <span class="required-field">*</span></label>
                        <div class="col-xl-9" id="city_div">
                            <select class="selectpicker" data-live-search="true" id="select_city" name="city_id">
								<option value="" disabled="" selected="">Select City</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="form-group row">
                        <label class="col-xl-3 col-form-label" for="select_role">Role <span class="required-field">*</span></label>
                        <div class="col-xl-9">
                            <select class="selectpicker" data-live-search="false" id="select_role" name="role_id">
                                <option value="" disabled="" selected="">Select Role</option>
                                <?php foreach ($roles as $key => $value) {?>
                                    <option value="<?php echo $value['id_role']; ?>"><?php echo $value['role_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="form-group row">
                        <label class="col-xl-3 col-form-label" for="password">Password <span class="required-field">*</span></label>
                        <div class="col-xl-9">
                            <input type="password" class="form-control m-input" id="password" placeholder="Enter Password" name="password" autocomplete="new-password">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
					<div class="form-group row">
						<label class="col-xl-3 col-form-label" for="select_status">Status <span class="required-field">*</span></label>
                        <div class="col-xl-9">
                            <select class="selectpicker" data-live-search="false" id="select_status" name="status">
                                <option value="" selected disabled>Select Status</option>
								<option value="active">Active</option>
								<option value="inactive">Inactive</option>
                            </select>
                        </div>
					</div>
				</div>

                <div class="col-lg-12">
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label" for="profile">Profile Pic</label>
                        <div class="col-xl-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <span class="btn btn-default rounded-0 m-0 btn-file">
                                            Browse… <input type="file" class="imgInp" id="profile" aria-describedby="inputGroupFileAddon01" name="image">
                                        </span>
                                    </span>
                                    <input type="text" id="uploaded-file-name" class="form-control rounded-0" readonly>
                                    <button id="clear-upload" class="btn btn-secondary rounded-0">Reset file</button>
                                </div>
                                <img id='img-upload' />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 text-right">
                    <input type="submit" class="btn btn-success" value="Submit" id="add_user">
                </div>
            </div>

        </form>
    </div>
</div>