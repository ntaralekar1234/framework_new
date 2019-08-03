<div class="card">
    <div class="card-header">
        <h4>User Details</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div
                class="col-xl-4 col-lg-4 col-md-4 offset-xl-0 offset-lg-0 offset-md-0 col-sm-6 offset-sm-3 user-profile-pic-border">
                <div class="user-profile-pic">
                    <form id="upload_form" enctype="multipart/form-data" action="javascript:void(0);">
                        <input type="hidden" name="id"
                            value="<?php echo $this->uricryption->encode($user_details['id']); ?>">
                        <input type="hidden" name="img"
                            value="<?php echo $this->uricryption->encode($user_details['profile']); ?>">
                        <img src="<?php echo $admin_profile_path; ?>">
                        <div class="col-12 m-t-10">
                            <a class="change-pp-span btn btn-sm btn-secondary" href="javascript:void(0);">Change Profile
                                Pic.</a>
                        </div>

                        <div class="form-group row" id="change-pp-sec" style="display: none;">
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-btn btn-block">
                                            <span class="btn btn-default rounded-0 btn-block m-0 btn-file">
                                                Browse...<input type="file" class="imgInp" id="imgInp" name="profile">
                                            </span>
                                        </span>
                                        <input type="text" placeholder="file name..." id="uploaded-file-name"
                                            class="form-control rounded-0" readonly>
                                        <button id="clear-upload" class="btn btn-secondary rounded-0 m-0"
                                            data-toggle="tooltip" title="" data-original-title="Reset Selection"><i
                                                class="fa fa-times"></i></button>
                                        <button type="submit" name="" class="btn btn-success m-0 rounded-0"
                                            data-toggle="tooltip" title="" data-original-title="Upload Image"
                                            id="upload_profile">
                                            <i class="fa fa-upload"></i>
                                        </button>
                                    </div>
                                    <img id='img-upload' />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="m-20">
                    <form id="password_form" enctype="multipart/form-data" action="javascript:void(0);">
                        <h4 class="custom-section-heading">Change Password</h4>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group row">
                                    <label class="col-xl-4 col-form-label" for="old_password">Old Password <span class="required-field">*</span></label>
                                    <div class="col-xl-8">
                                        <input type="hidden" name="uid" id="uid" value="<?php echo $this->uricryption->encode($user_details['id']); ?>">
										<input type="hidden" name="email" id="email" value="<?php echo $this->uricryption->encode($user_details['email']); ?>">
                                        <input type="hidden" name="name" id="name" value="<?php echo $this->uricryption->encode($user_details['name']); ?>">

                                        <input type="password" class="form-control m-input" onchange="verify_old_password()" name="old_password" id="old_password" placeholder="Old Password" autocomplete="new-password">
										<span id="old_password_err" style="color: red; display: none;">Password Does Not Match. please, try again.</span>
										<span id="old_password_success" style="color: green; display: none;">Password Match Successfully.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group row">
                                    <label class="col-xl-4 col-form-label" for="new_password">New Password <span class="required-field">*</span></label>
                                    <div class="col-xl-8">

                                        <input type="password" class="form-control m-input" name="new_password" id="new_password" placeholder="New Password" autocomplete="new-password">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group row">
                                    <label class="col-xl-4 col-form-label" for="confirm_password">Confirm Password <span class="required-field">*</span></label>
                                    <div class="col-xl-8">
                                        <input type="password" class="form-control m-input" name="confirm_password" id="confirm_password" placeholder="Confirm Password" autocomplete="new-password">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 m-t-10">
                                <input type="submit" class="btn btn-success" value="Change" id="change_password">
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
                <div class="details-item-wrapper">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="details-item-title">Name:</div>
                            <div class="details-item-details"><?php echo $user_details['name']; ?> </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="details-item-title">Contact Details:</div>
                            <div class="details-item-details"><?php echo $user_details['contact']; ?></div>
                        </div>
                    </div>
                </div>
                <div class="details-item-wrapper">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="details-item-title">Email Id:</div>
                            <div class="details-item-details"><a
                                    href="mailto:<?php echo $user_details['email']; ?>"><?php echo $user_details['email']; ?></a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="details-item-title">Role:</div>
                            <div class="details-item-details highlight"><?php echo $user_details['role_name']; ?></div>
                        </div>
                    </div>
                </div>
                <div class="details-item-wrapper">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="details-item-title">Country:</div>
                            <div class="details-item-details"><?php echo $user_details['country_name']; ?> </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="details-item-title">State:</div>
                            <div class="details-item-details"><?php echo $user_details['state_name']; ?></div>
                        </div>
                    </div>
                </div>
                <div class="details-item-wrapper">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="details-item-title">City:</div>
                            <div class="details-item-details"><?php echo $user_details['city_name']; ?></div>
                        </div>
                        <div class="col-lg-6">
                            <div class="details-item-title">Status:</div>
                            <div class="details-item-details"><span
                                    class="badge badge-success m-b-5"><?php echo $user_details['status']; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>