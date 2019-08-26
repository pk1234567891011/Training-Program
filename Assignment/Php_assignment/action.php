<?php
include_once 'dbConfig.php';
if(isset($_POST['bulk_delete_submit']))
{
	if(!empty($_POST['checked_id']))
	{
		$idStr=implode(',',$_POST["checked_id"]);//join array
		$delete=$db->query("DELETE FROM categories WHERE ID IN ($idStr)");
		session_start();
		if($delete)
		{
			$_SESSION['multi_delete']="";
		}
		else
		{
			$_SESSION['multi_delete_error']="";
		}
	}
	else
	{
		$statusMsg="Select atleast  1 record to delete";
	}
}
?>
