<div class="wrapper" id="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Edit Role</h4>
                        <div class="state-information">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo site_url('roles');?>">User Roles</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit User</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            </div>
   
    <div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="edit-user-form edit-form-sec">
            <form action="<?php echo site_url('roleedit/'.$this->uricryption->encode($role['id'])) ?>" method="post">
                <div class="row">
                   
                    <div class="form-group col-md-4 col-sm-12">
                        <div class="row">
                            <label for="example-text-input" class="col-sm-4 col-form-label">Role Title</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="text" id="example-text-input" name="role_title" placeholder="Enter Role Title" value="<?php echo $role['name'];?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <div class="row">
                            <label class="col-sm-4 col-form-label">Status</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="status">
                                    <option value="active" <?php echo ($role['status'] == 'active') ? 'selected' : '';?>>Active</option>
                                    <option value="inactive" <?php echo ($role['status'] == 'inactive') ? 'selected' : '';?>>In active</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 form-group text-center">
                        <input type="submit" class="btn btn-lg btn-primary waves-effect waves-light" value="Submit">
                    </div>
                </div>
                </form> 
            </div>    
        </div>
    </div>
</div><!-- end container-fluid -->

</div> <!-- Wrapper end -->

            
