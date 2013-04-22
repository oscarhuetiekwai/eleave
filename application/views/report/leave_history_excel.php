<?php

$time = date('YmdHis');
$filename = 'Leave_History_' .$time. '.xls';

header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment;filename=".$filename);
header("Content-Transfer-Encoding: binary ");

?>
<html>
<head>
<style type="text/css">
body
{
font-family:verdana;
margin-left:50px;
}
table
{
width:700px;
border-collapse:collapse;
}
table,th, td
{
border: 1px solid #DDDDDD;
}
th
{
background-color:#E3E4FA;
}
td
{
text-align:center;
padding:5px;
}
</style>
</head>
<body>

	 		<h2>Leave History Report</h2>

				<table class="table table-bordered table-striped table_vam table-hover" >
                    <thead>
                        <tr>
							<th>No</th>
							<th>Staff Name</th>
							<th>Leave Reason</th>
							<th>Leave Status</th>
							<th>Leave Rejected Reason</th>
							<th>Leave Type</th>
							<th>Date Apply</th>
							<th>Superior</th>
						</tr>
                    </thead>
                    <tbody>
	                    <?php
						    $num = 0; if(isset($data_records)) :foreach($data_records as $row): $num++;
						?>
						<tr>
							<td><?php echo $num; ?></td>
							<td><?php echo $row->username; ?></td>
							<td><?php echo $row->reason; ?></td>
							<td><?php if($row->leave_status == "a"){?>Approved<?php }else if($row->leave_status == "w"){ ?>Withdraw<?php }else if($row->leave_status == "c"){?>Cancelled<?php }else if($row->leave_status == "r"){?>Rejected<?php } ?></td>
							<td><?php echo $row->reject_reason; ?></td>
							<td><?php echo $row->leave_type; ?></td>
							<td><?php echo $row->date_apply; ?></td>
							<?php
							foreach($data_get_approval_id as $row2){
								if($row2->staff_id == $row->approval_id){
								$username =  $row2->username;
								}
							}
							?>
							<td><?php echo $username;	?></td>
                        </tr>
                        <?php endforeach; ?>
						<?php else : ?>
						  <tr><td colspan="7">No Result Found.</td></tr>
						<?php endif; ?>
                    </tbody>
            	</table>


            </body>
</html>

