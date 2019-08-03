<div class="card">
    <div class="card-header">
        <h4>Manage Permissions </h4>
    </div>
    <div class="card-body">
      <div>
        <form class="form-horizontal" id="role_form" method="POST" action="<?php echo base_url('permissions'); ?>">
            <div class="row">
                <div class="col-lg-4 col-md-4 offset-md-4">
                    <div class="form-group row">
                        <label class="col-xl-4 col-form-label">Select Role <span
                                class="required-field">*</span></label>
                        <div class="col-xl-8">
                            <select class="selectpicker" title="Select Role" data-live-search="true" name="role"
                                id="role">
                                <?php foreach($roles as $role) {?>
                                <option value="<?php echo $role['id_role'] ?>"
                                    <?php echo( $role['id_role'] == $selected_role ? 'selected' : '');?>>
                                    <?php echo $role['role_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </form>
      </div>
      <div class="row">
        <div class="col-12">
          <h4 class="custom-section-heading">Module & Permissions</h4>
          <div class="permissions-checkbox-list">
          </div>

        </div>
      </div>
    </div>
</div>