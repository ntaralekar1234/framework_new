<div class="m-grid__item m-grid__item--fluid m-wrapper">

    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">Manage Modules</h3>
                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                    <li class="m-nav__item m-nav__item--home">
                        <a href="<?php echo base_url('dashboard');?>" class="m-nav__link m-nav__link--icon">
                            Dashboard
                        </a>
                    </li>
                    <li class="m-nav__separator">/</li>
                    <li class="m-nav__item">
                        <span class="m-nav__link">
                            <span class="text-dark">Modules</span>
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
                <div class="col-sm-12">
                    <form action="module_add" method="post">
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-2 col-md-2 col-sm-12">Add New Module</label>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <input class="form-control m-input m-login__form-input--last <?php echo(form_error('module') ? 'form-error' : '');?>" type="text" placeholder="Module Title" name="module">
                            </div>
                             <div class="col-lg-4 col-md-4 col-sm-12">
                                <select class="form-control m_selectpicker" data-live-search="true" name="status">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                    
                                </select>
                            </div>
                            <div class="m-login__form-action col-lg-2 col-md-2 col-sm-12">
                                <button class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air" type="submit">ADD</button>
                            </div>
                        </div>
                        
                        
                    </form>
                </div>
            </div>
        </div>
        <div class="m-portlet m-portlet--bordered  m-portlet--rounded p-20">
            <div class="row">
                <div class="col-12">
                    <h4 class="custom-section-heading">Module List</h4>
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                        <thead>
                            <tr>
                                <th>Sr.No.</th>
                                <th>Module Title</th>
                                <th>Status</th>
                                <!-- <th>Actions</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php $sr = 1;foreach ($modules as $module) {
                             ?>
                            <tr>
                                <td><?php echo $sr++ ;?></td>
                                <td><?php echo $module['tab_name'] ;?></td>
                                <td>
                                    <?php if($module['status'] == 'active') {?>
                                      <span class="m-badge  m-badge--success m-badge--wide"><?php echo $module['status'] ;?></span>  
                                    <?php }else{?>
                                        <span class="m-badge  m-badge--danger m-badge--wide"><?php echo $module['status'] ;?></span>
                                    <?php } ?>    
                                </td>
                                <!-- <td nowrap><a href="#"><i class="la la-trash" onclick="delete_module('<?php echo base_url('moduleremove/'.$this->uricryption->encode($module['id_tab']))?>');"></i></a></td> -->
                            </tr>
                        <?php } ?>    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>            
    </div>
</div>
 <script type="text/javascript">
            function delete_module(url){
            swal({
                title: "Are You Sure!",
                text: "You clicked the block product button!",
                icon: "success",
                confirmButtonText: "<span><a href='"+url+"'><i class='la la-ban'></i><span>Yes</span></a></span>",
                confirmButtonClass: "btn btn-danger m-btn m-btn--pill m-btn--air m-btn--icon",
                showCancelButton: !0,
                cancelButtonText: "<span><i class='la la-thumbs-down'></i><span>No, thanks</span></span>",
                cancelButtonClass: "btn btn-secondary m-btn m-btn--pill m-btn--icon"
            })
        };
</script>        
