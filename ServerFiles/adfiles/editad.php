<?php
    require("../../Config/connect_db.php");
	require("../../Functions/phpfunctions.php");

	// if connect to the database, $connect is a variable in connect_db.php file
	if($connect) {
		$data = json_decode(file_get_contents("php://input"));
		$ad_id = $data->ad_id;
		$adsTitle = $data->adsTitle;
		$adsContent = $data->adsContent;

		// store to the database
		$result = $db->prepare("UPDATE advertisement SET title = '$ads_title', content = '$adsContent' WHERE ad_id = '$ad_id'");
		// $result->bind_param("ssi", $ad_id); // don't need this

		if($result->execute()) {
			$return = ["status" => '1'];
			echo json_encode($return);
		} else {
			$return = ["status" => '0'];
			echo json_encode($return);
		}

		
	} else {
		echo json_encode(["status" => '0']);
	}

?>