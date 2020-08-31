<?php
function uploadImage(){
	$imagename= $_FILES['image']['name'];
	$imagetmp = $_FILES['image']['tmp_name'];
	
	$allowed = array('jpeg','png','jpg');

	$ext = pathinfo($imagename,PATHINFO_EXTENSION);

	if(in_array($ext,$allowed)){
		move_uploaded_file($imagetmp, "images/".$imagename);
	}else{
		echo"only png,jpg and jpeg image format are allowed";
	}
	return $imagename;
}

function createSlug($string){
	$slug = preg_replace('/[^A-Za-z0-9]+/','-',$string);
	return $slug;
	
}

?>