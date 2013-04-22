<ul class="breadcrumb">
  <li>
    <a href="<?php echo site_url('dashboard/index'); ?>"><i class="icon-home icon-white"></i></a> <span class="divider">|</span>
  </li>
  <li class="active">
    <a href="#"  style="color:white;">Announcement</a>
  </li>
</ul>
<div class="row-fluid">
	<div class="span12">
			<h3 class="heading">Announcement</h3>
			<?php
				$num = 0; if(isset($data_records)) :foreach($data_records as $row): $num++;
			?>
				<p><h5><?php echo $row->notification_title; ?></h5></p>
				<p><?php echo $row->notification_description; ?></p>
				<p><?php echo $row->date_created; ?></p>
				<?php if(($this->session->userdata('role_id')!=STAFF)){ ?>
				<a href="<?php echo site_url('dashboard/edit_announcement/'.$row->notification_id); ?>" title="Edit"><i class="icon-edit"></i></a>
                <a href="#" class="delete_notification" data-id="<?php echo $row->notification_id; ?>"  title="Delete"><i class="icon-trash"></i></a>
				<?php } ?>
				<hr>
			<?php endforeach; ?>
			<?php else : ?>
				<p>No Result Found.</p>
			<?php endif; ?>
      </div>
	<?php //echo $this->pagination->create_links(); ?>
 </div>
 	<?php	//echo CI_VERSION; ?>