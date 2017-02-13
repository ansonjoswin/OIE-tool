<?php

// A list of permitted file extensions
$allowed = array('png', 'jpg', 'gif','zip','txt','csv');

if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

	if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"wrong file"}';
		exit;
	}

	$upload_dir = '../storage/app/uploads/';

	if (!file_exists($upload_dir)) {
    	mkdir($upload_dir, 0777, true);
	}

	if(move_uploaded_file($_FILES['upl']['tmp_name'], $upload_dir.$_FILES['upl']['name'])){
		echo '{"status":"success"}';
		exit;
	}
}

echo '{"status":"error"}';
exit;