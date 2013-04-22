<div id="side_accordion" class="accordion" style="padding-top:30px;">
	<div class="accordion-group">
		<div class="accordion-heading">
		<a href="#collapseOne" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
		<i class="icon-home"></i> Dashboard
		</a>
		</div>
		<div class="accordion-body collapse <?php if($page == "dashboard" || $page == "add_announcement"){ ?>in<?php } ?>" id="collapseOne">
			<div class="accordion-inner">
			<ul class="nav nav-list">
			<li <?php if($page == "dashboard"){ ?>class="active" <?php }?>><a href="<?php echo site_url('dashboard/index'); ?>">Announcement</a></li>
			<?php if(($this->session->userdata('role_id')==ADMIN) || ($this->session->userdata('role_id')==SUPERIOR))	{ ?>
			<li <?php if($page == "add_announcement"){ ?>class="active" <?php }?>><a href="<?php echo site_url('dashboard/add_announcement'); ?>">Add Announcement</a></li>
			<?php } ?>
			</ul>
			</div>
		</div>
	</div>
	<div class="accordion-group">
		<div class="accordion-heading">
		<a href="#collapseTwo" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
		<i class="icon-calendar"></i> Leave
		</a>
		</div>
		<div class="accordion-body collapse <?php if($page == "apply_leave_list" || $page == "apply_leave" || $page == "add_news" || $page == "leave_type_list" || $page == "add_leave_type" || $page == "who_on_leave" || $page == "pending_leave"){ ?>in<?php } ?>" id="collapseTwo">
			<div class="accordion-inner">
			<ul class="nav nav-list">
			<li class="nav-header">Leave List</li>
			<?php if(($this->session->userdata('role_id')!=ADMIN))	{ ?>
			<li <?php if($page == "apply_leave_list"){ ?>class="active" <?php } ?>><a href="<?php echo site_url('leave/apply_leave_list'); ?>">Apply Leave List</a></li>
			<?php } ?>
			<!--<li <?php //if($page == "add_news"){ ?>class="active" <?php //} ?>><a href="<?php //echo site_url('home/add_news'); ?>">Leave History</a></li>-->
			<li <?php if($page == "who_on_leave"){ ?>class="active" <?php } ?>><a href="<?php echo site_url('leave/who_on_leave'); ?>">Whos On Leave</a></li>
			<li <?php if($page == "pending_leave"){ ?>class="active" <?php } ?>><a href="<?php echo site_url('leave/pending_leave'); ?>">Pending Leave</a></li>
			<?php if(($this->session->userdata('role_id')==ADMIN) )	{ ?>
			<li class="divider"></li>
			<li class="nav-header">Leave Type</li>
			<li <?php if($page == "leave_type_list"){ ?>class="active" <?php } ?>><a href="<?php echo site_url('leave/leave_type_list'); ?>">Leave Type</a></li>
			<li <?php if($page == "add_leave_type"){ ?>class="active" <?php } ?>><a href="<?php echo site_url('leave/add_leave_type'); ?>">Add Leave Type</a></li>
			<?php } ?>
			</ul>
			</div>
		</div>
	</div>
	<?php if(($this->session->userdata('role_id')==ADMIN) || ($this->session->userdata('role_id')==SUPERIOR))	{ ?>
	<div class="accordion-group">
		<div class="accordion-heading">
		<a href="#collapseThree" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
		<i class="icon-file"></i> Report
		</a>
		</div>
		<div class="accordion-body collapse <?php if($page == "staff_leave_report" || $page == "staff_leave_detail" || $page == "admin_history_report"){ ?>in<?php } ?>" id="collapseThree">
			<div class="accordion-inner">
			<ul class="nav nav-list">
			<!--<li <?php// if($page == "staff_leave_report"){ ?>class="active" <?php //}?>><a href="<?php //echo site_url('report/staff_leave_report'); ?>">Staff Leave Balance</a></li>-->
			<li <?php if($page == "staff_leave_detail"){ ?>class="active" <?php }?>><a href="<?php echo site_url('report/staff_leave_detail'); ?>">Staff Leave Detail</a></li>
			<li <?php if($page == "admin_history_report"){ ?>class="active" <?php }?>><a href="<?php echo site_url('report/admin_history_report'); ?>">Admin History Report</a></li>
			</ul>
			</div>
		</div>
	</div>
	<?php } ?>
	<?php if(($this->session->userdata('role_id')==ADMIN)){ ?>
	<div class="accordion-group">
		<div class="accordion-heading">
		<a href="#collapseFour" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
		<i class="icon-user"></i> User
		</a>
		</div>
		<div class="accordion-body collapse <?php if($page == "user_list" || $page == "add_user" || $page == "user_leave_setting" || $page == "user_department_list" || $page == "add_user_department" || $page == "user_position_list" || $page == "add_user_position"){ ?>in<?php } ?>"" id="collapseFour">
			<div class="accordion-inner">
			<ul class="nav nav-list">
			<li class="nav-header">Staff Configuration</li>
			<li <?php if($page == "user_list"){ ?>class="active" <?php }?>><a href="<?php echo site_url('user/index'); ?>">Staff List</a></li>
			<li <?php if($page == "add_user"){ ?>class="active" <?php }?>><a href="<?php echo site_url('user/add_user'); ?>">Add Staff</a></li>
			<li class="divider"></li>
			<li class="nav-header">Staff Department</li>
			<li <?php if($page == "user_department_list"){ ?>class="active" <?php }?>><a href="<?php echo site_url('user/user_department_list'); ?>">User Department List</a></li>
			<li <?php if($page == "add_user_department"){ ?>class="active" <?php }?>><a href="<?php echo site_url('user/add_user_department'); ?>">Add User Department</a></li>
			<li class="divider"></li>
			<li class="nav-header">Staff Position</li>
			<li <?php if($page == "user_position_list"){ ?>class="active" <?php }?>><a href="<?php echo site_url('user/user_position_list'); ?>">User Position List</a></li>
			<li <?php if($page == "add_user_position"){ ?>class="active" <?php }?>><a href="<?php echo site_url('user/add_user_position'); ?>">Add User Position</a></li>	<li class="divider"></li>
			<li class="nav-header">Staff Leave Setting</li>
			<li <?php if($page == "user_leave_setting"){ ?>class="active" <?php }?>><a href="<?php echo site_url('user/user_leave_setting'); ?>">Staff Leave Setting</a></li>
			</ul>
			</div>
		</div>
	</div>
		<div class="accordion-group">
		<div class="accordion-heading">
		<a href="#collapseFive" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
		<i class="icon-cog"></i> Configuration
		</a>
		</div>
		<div class="accordion-body collapse <?php if($page == "holiday_list" || $page == "add_holiday"){ ?>in<?php } ?>" id="collapseFive">
			<div class="accordion-inner">
			<ul class="nav nav-list">
			<li class="nav-header">Holiday</li>
			<li <?php if($page == "holiday_list"){ ?>class="active" <?php } ?>><a href="<?php echo site_url('holiday/holiday_list'); ?>"> Holiday List</a></li>
			<li <?php if($page == "add_holiday"){ ?>class="active" <?php } ?>><a href="<?php echo site_url('holiday/add_holiday'); ?>">Add Holiday</a></li>
			</ul>
			</div>
		</div>
	</div>
	<?php } ?>
	<div class="push"></div>
	<?php if(($this->session->userdata('role_id')!=ADMIN)){ ?>
		<div class="sidebar_info">
			<ul class="unstyled">
				<li>
					<!-- From my controller -->
					<span class="act act-warning"><?php echo $the_leave_data['leave_data_records']->annual_leave_balance; ?></span>
					<strong>Annual Leave</strong>
				</li>
				<li>
					<!-- From my controller -->
					<span class="act act-success"><?php echo $the_leave_data['leave_data_records']->sick_leave_balance; ?></span>
					<strong>Sick Leave</strong>
				</li>
				<!--<li>
					<span class="act act-danger">85</span>
					<strong>New registrations</strong>
				</li>-->
			</ul>
		</div>
	<?php } ?>	
</div>