 <div class="wrapper" id="wrapper">
        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Web Modules</h4>
                        
                    </div>
                </div>
            </div>
        </div><br><br><br><br>
        <form action="<?php echo base_url(); ?>web_modules/update_module" method='POST'>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="">
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                            <div class="row">
                                                <?php foreach($result as $row): ?>
                                                <div class="col-sm-12">
                                                    <label for="business-name" class=" col-form-label">Module Name</label>
                                                    <input class="form-control" type="text" placeholder="Module Name"  id="business-name" name='module_name' required='' value="<?php echo $row->module_name ?>">

                                                    <input  type="hidden" name='id' value="<?php echo $row->id; ?>">

                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="form-group col-md-2 col-sm-12">
                                            <div class="row">
                                                
                                                <div class="col-sm-12">
                                                    <label for="username" class=" col-form-label">Controller Name</label>
                                                    <input class="form-control" type="text" placeholder="Controller Name" id="username" required='' name='controller_name' value="<?php echo $row->controller_name; ?>">
                                                </div>
                                            </div>
                                        </div> -->
                                       
                                        <div class="form-group col-md-2 col-sm-12">
                                            <div class="row">
                                               
                                                <div class="col-sm-12">
                                                     <label for="gender" class="col-form-label">Method Name</label>
                                                    <input class="form-control" type="text" placeholder="Method Name" required='' name='method_name' value="<?php echo $row->method_name; ?>">
                                                </div>
                                            </div>
                                               
                                        </div>
                                         <div class="form-group col-md-2 col-sm-12">
                                            <div class="row">
                                               
                                                <div class="col-sm-12">
                                                     <label for="gender" class="col-form-label">Status</label>
                                                    <select class="selectpicker form-control" id="select-type" data-container="body" data-live-search="false" title="Select Type" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false" name="status" required=''>
                                                    <option disabled>Select Status</option>
                                                    <option value="active" <?php if($row->status=='active'){ echo "selected"; } ?>>Active</option>
                                                    <option value="in-active" <?php if($row->status=='in-active'){ echo "selected"; } ?>>In-active</option>
                                                </select>
                                                </div>
                                            </div>
                                               
                                        </div>
                                        <div class="form-group col-md-1 col-sm-12">
                                            <div class="row">
                                               
                                                <div class="col-sm-12">
                                                    <input style="margin-top:30px ;" type="submit" class="btn btn-lg btn-primary waves-effect waves-light" value="Update">
                                                </div>
                                            </div>
                                               
                                        </div>
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            
        
    </form>
  </div>