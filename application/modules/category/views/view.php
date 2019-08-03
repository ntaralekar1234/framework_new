<div class="card">
    <div class="card-header">
        <h4>Category List <span class="text-right ml-auto float-right"><a href="javascript:void(0);" class="btn btn-info" id="new_category">Add
        Category</a></span></h4>
        <div id="add-new-category" style="display:none">
            <form class="form-horizontal" id="add_category_form" action="javascript:void(0);">
                <div class="row">
                    <div class="col-lg-4 col-md-4"></div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group row">
                            <label class="col-xl-4 col-form-label">Add New Category <span class="required-field">*</span></label>
                            <div class="col-xl-8">
                                <input type="text" class="form-control" placeholder="Category Title" name="category" id="category_title">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4">
                        <input type="submit" class="btn btn-success" value="ADD">
                    </div>
                </div>

            </form>
        </div>
    </div>
    <div class="card-body p-10">

        <div class="table-responsive">
            <div class="kt-portlet__body">
                <!--begin: Datatable -->
                <table class="all-survey-table table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Category Title</th>
                            <th>Status</th>
                            <th>Added by</th>
                            <th>Added On</th>
                            <th style="width:200px; text-align:center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sr = 1;foreach ($categories as $category) {?>
                        <tr>
                            <td><?php echo $sr++ ;?></td>
                            <td><?php echo $category['category_name'] ;?></td>
                            <td>
                                <?php if($category['status'] == 'active') {?>
                                <span
                                    class="badge badge-success m-b-5"><?php echo $category['status'] ;?></span>
                                <?php }else{?>
                                <span
                                    class="badge badge-danger m-b-5"><?php echo $category['status'] ;?></span>
                                <?php } ?>
                            </td>
                            <td><?php echo $category['admin_name'] ;?></td>
                            <td><?php echo date('Y-m-d',strtotime($category['created_on'])) ;?></td>
                            <td style="width:200px; text-align:center"><a href="javascript:void(0)" class="btn m-btn  m-btn--icon m-btn--icon-only  m-btn--pill <?php echo ($category['status']=='active' ? ' bg-success disabled' :'') ?> change_status" title="Active" data-status="<?php echo $this->uricryption->encode('active'); ?>" data-id="<?php echo $this->uricryption->encode($category['id_category']); ?>"><i class="fa fa-check"></i></a> <a href="javascript:void(0)" class="btn m-btn  m-btn--icon m-btn--icon-only m-btn--pill <?php echo ($category['status']=='inactive' ? ' bg-info  disabled' :'') ?> change_status" title="Inactive" data-status="<?php echo $this->uricryption->encode('inactive') ?>" data-id="<?php echo $this->uricryption->encode($category['id_category']);?>"><i class="fa fa-ban"></i></a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <!--end: Datatable -->
            </div>
        </div>
    </div>
</div>