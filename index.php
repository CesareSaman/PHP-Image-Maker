<?php 
function imgmaker($width=1224,$height=816){
    $image = imagecreatetruecolor($width,$height);
	$bgColor = imagecolorallocate($image, 100, 135, 120);
	imagefill($image,0,0,$bgColor);
	imagealphablending($image,true);
	imagesavealpha($image,true);
	$srcImage = imagecreatefromjpeg('vespa.jpg');	
	imagesavealpha($srcImage,true);
	imagecopy($image, $srcImage, 100,100, 0, 0,1024,616);
	imagedestroy($srcImage);
	header('Pragma: public');
	header('Cache-Control: max-age=86400');
	header('Expires: '. gmdate('D, d M Y H:i:s \G\M\T', time() + 86400));			
	header("Content-type: image/png");
	imagejpeg($image);
	imagedestroy($image);	
	die;
}
imgmaker();