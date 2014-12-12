<?php 

require_once("connect.php");
//user login function
function login($username,$password)
{
	global $db;

	$q = "SELECT * FROM learners WHERE email='$username' AND password='".md5($password)."'";
	$result = $db->query($q);

	if($result->num_rows == 1)
	{
		$row = $result->fetch_assoc();
		return $row['id'];
	}
	else
	{
		return "bad";
	}
	
}

//user register function
function register($fname,$lname,$location,$cnumber,$email,$province,$password,$address1,$address2,$suburb,$city,$postal,$type)
{
	global $db;

	$q = "INSERT INTO learners (`id`, `fname`,`lname`,`idNumber`,`location`,`interests`,`regDate`,`mobile`,`email`,`password`,`address1`,`address2`,`suburb`,`city`,`province`,`postal`,`type`) 
	VALUES (NULL, '$fname','$lname','','$location','','".date("d/m/Y",time())."','$cnumber','$email',".md5($password)."','$address1', '$address2','$suburb','$city','$postal','$type' )";
	$result = $db->query($q);

	if(!$result)
	{			
		if(strpos($db->error, "Duplicate"))
		{
			echo json_encode("Please check your contact number or email address, we already have it registered.");
		}
		die("Error: ".$db->error);			
	}
		
}

function getInstitutions()
{
	global $db;
	$institutions = array();
	//$institutions[''] = "";
	$q = "SELECT * FROM institutions";
	$result = $db->query($q);

	if(!$result){ die("Error: ".$db->error); }else {
		$i=0;
		while($row = $result->fetch_assoc())
		{
			$institutions[$i]['id'] = $row['iid'];
			$institutions[$i]['name'] = $row['iname'];
			$institutions[$i]['contact'] = $row['icontact'];

			$i++;
		}

		return $institutions;
	}
}

function getInstitution($id)
{
	global $db;
	$institution = array();
	$q = "SELECT * FROM institutions WHERE iid='$id'";
	$result = $db->query($q);

	if(!$result){ die("Error: ".$db->error); }
	else
	{ 
		$row = $result->fetch_assoc(); 
		$contact = json_decode($row['icontact']);
		foreach ($contact as $item) {
			# code...
			$institution[] = $item;
		}
		return $institution; 
	}

}

function getBusaries()
{
	global $db;
	$institutions = array();
	//$institutions[''] = "";
	$q = "SELECT * FROM bursaries";
	$result = $db->query($q);

	if(!$result){ die("Error: ".$db->error); }else {
		$i=0;
		while($row = $result->fetch_assoc())
		{
			$institutions[$i]['id'] = $row['bid'];
			$institutions[$i]['company'] = $row['company'];

			$qr = "SELECT * FROM fields WHERE fid='".$row['fid']."'";
			$rst = $db->query($qr);
			$rw = $rst->fetch_assoc();

			$institutions[$i]['field'] = $rw['field'];

			$i++;
		}

		return $institutions;
	}
}

function getBusary($id)
{
	global $db;
	$institution = array();
	$q = "SELECT * FROM bursaries WHERE bid='$id'";
	$result = $db->query($q);

	if(!$result){ die("Error: ".$db->error); }
	else
	{ 
		$row = $result->fetch_assoc(); 
		//$contact = json_decode($row['icontact']);
		//foreach ($contact as $item) {
			# code...
			$institution[] = $row;
		//}
		return $institution; 
	}

}

?>