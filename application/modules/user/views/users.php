<div class="card">
    <div class="card-header">
        <h4>User List</h4>
    </div>
    <div class="card-body p-10">
        <div class="col-12 text-right"><a href="<?php echo base_url('create_user'); ?>" class="btn btn-info">Add User</a>
        </div>
        <div class="table-responsive">
		<div class="kt-portlet__body">
									<!--begin: Datatable -->
									<table class="table table-striped- table-bordered table-hover table-checkable"
										id="kt_table_1">
										<thead>
											<tr>
													<th class="ckb-hidden"></th>
													<th>Profile</th>
						                            <th>Country</th>
						                            <th>Name</th>
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
									<!--end: Datatable -->
								</div>
        </div>
    </div>
</div>