<?php
include_once "../includes/connection.php";
$id 		= 	$_REQUEST['id'];
$title		=	$_REQUEST['title'];

if($title=='')
{
	$row		=	$F($Q("SELECT * FROM `property_document` WHERE `id` = '$id'"));
	$gets 		=   $img_path.'/'.$rows_pic['id'].".".$rows_pic['ext'];
	if(file_exists($gets))
	{
		$file		=	$row['id'].".".$row['ext'];
	}
	else
	{
		$file		=	$row['id']."_xs.".$row['ext'];
	}
}
else
{
	$row		=	$F($Q("SELECT * FROM `property_document` WHERE `document_type`='$title' && `id` = '$id'"));
	$file		=	$row['id'].".".$row['ext'];
}

header("Content-Description: File Transfer");
header("Content-Type: application/force-download");
header("Content-Disposition: attachment; filename=".basename($file));
@readfile($file);
?>