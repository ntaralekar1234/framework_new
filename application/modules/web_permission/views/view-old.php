<div class="m-grid__item m-grid__item--fluid m-wrapper">

  <!-- BEGIN: Subheader -->
  <div class="m-subheader ">
    <div class="d-flex align-items-center">
      <div class="mr-auto">
          <h3 class="m-subheader__title m-subheader__title--separator">Manage Permissions</h3>
          <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
              <li class="m-nav__item m-nav__item--home">
                  <a href="<?php echo base_url('dashboard');?>" class="m-nav__link m-nav__link--icon">
                      Dashboard
                  </a>
              </li>
              <li class="m-nav__separator">/</li>
              <li class="m-nav__item">
                  <span class="m-nav__link">
                      <span class="text-dark">Permissions</span>
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
        <div class="col-sm-6 offset-sm-3">
          <form id="role_form" method="POST" action="<?php echo base_url('permissions'); ?>">
            <div class="form-group m-form__group row">
              <label class="col-form-label col-lg-3 col-sm-12">Select Role</label>
              <div class="col-lg-7 col-md-9 col-sm-12">
                <select class="form-control  m_selectpicker" title="Select Role" data-live-search="true" name="role" id="role">
                  <?php foreach($roles as $role) {?>
                  <option value="<?php echo $role['id_role'] ?>" <?php echo( $role['id_role'] == $selected_role ? 'selected' : '');?>><?php echo $role['role_name'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="m-portlet m-portlet--bordered  m-portlet--rounded p-20">
      <div class="row">
        <div class="col-12">
          <h4 class="custom-section-heading">Module wise Permissions</h4>
          <div class="permissions-checkbox-list">
          </div>
          
        </div>
      </div>
    </div>

  </div>
</div>