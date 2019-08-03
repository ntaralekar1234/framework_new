<div class="m-grid__item m-grid__item--fluid m-wrapper">

	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title m-subheader__title--separator">Manage All Users</h3>
				<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                    <li class="m-nav__item m-nav__item--home">
                        <a href="<?php echo base_url('dashboard');?>" class="m-nav__link m-nav__link--icon">
                            Dashboard
                        </a>
                    </li>
                    <li class="m-nav__separator">/</li>
                    <li class="m-nav__item">
                        <span class="m-nav__link">
                            <span class="text-dark">All Users</span>
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
						<div class="pending-approved-table" id="id-pending-approved-table">

							<div class="m-portlet--mobile" id="id-aproved-table">
								<!--begin: Datatable -->

								<div class="col-12 text-left add-paln">
									<a href="<?php echo base_url('newuser');?>" class="btn btn-primary"><i class="flaticon-plus"></i> Add User</a> 
								</div>

								<div class="table-responsive">
									<table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
										<thead>
											<tr>
												<th class="ckb-hidden"></th>
												<th>Profile</th>
												<th>Employee ID</th>
												<th>Name</th>
												<th>Contact</th>
												<th>Email</th>
												<th>Department</th>
												<th>City</th>
												<th>Role</th>
												<th>Status</th>
												<th>Actions</th>
											</tr>
										</thead>
									</table>
								</div>
							</div>	
						</div>	
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>