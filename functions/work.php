<?php 

require_once("interact.php");

$action = $_POST['action'];

if($action == "institutions")
{
	$ret = getInstitutions();

	echo json_encode($ret);
}

if($action == "institution")
{
	$id = $_POST['id'];
	$ret = getInstitution($id);

	echo json_encode($ret);
}

if($action == "busaries")
{
	$ret = getBusaries();

	echo json_encode($ret);
}

if($action == "busary")
{
	$id = $_POST['id'];
	$ret = getBusary($id);

	echo json_encode($ret);
}

?>