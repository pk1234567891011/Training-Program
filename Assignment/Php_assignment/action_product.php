<?php
include_once 'dbConfig.php';
if(isset($_POST['bulk_delete_submit']))
{
	if(!empty($_POST['checked_id']))
	{
		$idStr=implode(',',$_POST["checked_id"]);
		$delete=$db->query("DELETE FROM products WHERE PID IN ($idStr)");
		if($delete)
		{
			$statusMsg="";
		}
		else
		{
			$statusMsg="Some problem occured, please try again";
		}
	}
	else
	{
		$statusMsg="Select atleast  1 record to delete";
	}
}
?>
