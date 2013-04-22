<?php

$time = date('YmdHis');
$filename = 'Staff_Leave_Detail_' .$time. '.xls';

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

	 		<h2>Staff Leave Detail Report</h2>

				<table class="table table-bordered table-striped table_vam table-hover" >
                    <thead>
                        <tr>
							<th>No</th>
							<th>Staff Name</th>
							<th>Staff Role</th>
                        	<th>Staff Details</th>
							<th>Leave Detail</th>
							<th>Date Created</th>
						</tr>
                    </thead>
                    <tbody>
	                    <?php
						    $num = 0; if(isset($data_records)) :foreach($data_records as $row): $num++;
						?>
						<tr>
							<td><?php echo $num; ?></td>
							<td><?php echo $row->username; ?></td>
							<td><?php if($row->role_id == 3){ ?><span class="label label-info"><?php echo $row->role_position; ?></span><?php }else{ ?><span class="label label-warning"><?php echo $row->role_position; ?></span><?php } ?></td>
							
							<td>Email: <span class="label label-inverse"><?php echo $row->email_address; ?></span><br>Contact: <span class="label label-inverse"><?php echo $row->mobile_phone; ?></span><br>Department: <span class="label label-inverse"><?php echo $row->department_name; ?></span><br>Position: <span class="label label-inverse"><?php echo $row->position_name; ?></span></td>
							
							<td class="span4">Total Annual Leave: <span class="badge badge-important pull-right"><?php echo $row->annual_leave; ?></span><br>Total Sick Leave: <span class="badge badge-important pull-right"><?php echo $row->sick_leave; ?></span><br>Annual Leave Balance: <span class="badge badge-success pull-right"><?php echo $row->annual_leave_balance; ?></span><br>Sick Leave Balance: <span class="badge badge-success pull-right"><?php echo $row->sick_leave_balance; ?></span></td>
							<td><?php echo $row->date_created; ?></td>
                        </tr>
                        <?php endforeach; ?>
						<?php else : ?>
						  <tr><td colspan="12">No Result Found.</td></tr>
						<?php endif; ?>
                    </tbody>
            	</table>


            </body>
</html>

