<?php
namespace App\Helpers;

use OE\Object;
use Phalcon\DI;
class App extends Object {

	public static function import(array $classes) {
		$loader = new \Phalcon\Loader();
		$loader->registerClasses($classes)->register();
	}

	public static function getDatepickerFormat() {
		return 'yy-mm-dd';
// 		return self::getLanguage() == 'ja' ? 'yy-mm-dd' : 'dd-mm-yy';
	}

	public static function getDateFormatPhp() {
		return 'yy-mm-dd';
// 		return self::getLanguage() == 'ja' ? 'yy-mm-dd' : 'dd-mm-yy';
	}

	public static function getLanguage() {
		return DI::getDefault()->get('session')->get('language');
	}

	public static function resize_image($max_width,$max_height, $src){
		$des = self::createThumb($max_width,$max_height, $src);
		if(file_exists($des)){
			return $des;
		}
		$src = str_replace('/uploads/','uploads/',$src);
		$src = '../public/'.$src;
		if(!file_exists($src) || !exif_imagetype($src)){
			$src = '../public/uploads/images/2016/03/noimage.jpg';
		}
		$img_src = getimagesize($src);
		$width = $src_w = $img_src[0];
		$height = $src_h = $img_src[1];
		$type = $img_src['mime'];

		$new_width = "";
		$new_height = "";

		$with_scale = $width/$max_width;
		$height_scale = $height/$max_height;

		if($with_scale > $height_scale){
			$new_width = $max_width;
			$new_height = ($max_width/$width) * $height;

		}else{
			$new_height = $max_height;
			$new_width = ($max_height/$height) * $width;

		}

		$x_mid  = $new_width / 2;
		$y_mid  = $new_height / 2;
		$newImage = imagecreatetruecolor($new_width,$new_height);
		if($type == 'image/gif')
			$source = imagecreatefromgif($src);
		if($type == 'image/jpg' || $type == 'image/jpeg')
			$source = imagecreatefromjpeg($src);
		if($type == 'image/png')
			$source = imagecreatefrompng($src);
		imagecopyresampled($newImage,$source,0,0,0,0,$new_width,$new_height,$width,$height);


		$final = imagecreatetruecolor($max_width, $max_height);
		imagecopyresampled($final, $newImage, 0, 0, ($x_mid - ($max_width / 2) - 1), ($y_mid - ($max_height / 2)), $max_width, $max_height, $max_width, $max_height);
		$bg_color = imagecolorallocate ($final, 255, 255, 255);
		imagefill($final, 0, 0, $bg_color);
		if($max_width > $new_width)
		{
			$w_fill = (($max_width - $new_width) / 2);
			$w_fill_2 = ($w_fill + $new_width);
			//$h_fill = (($max_height == $new_height?$max_height*2:$max_height - $new_height) / 2);
			//$h_fill_2 = $max_height == $new_height?0:($h_fill + $new_height);
			imageFilledRectangle($final, $w_fill_2, 0, $max_width, $max_height, $bg_color);
		}

		if($type == 'image/jpg' || $type == 'image/jpeg')
			imagejpeg($final, $des, 100);
		if($type == 'image/gif')
			imagegif($final, $des, 100);
		if($type == 'image/png')
			imagepng($final, $des, 9);
		imagedestroy($final);
		chmod($des, 0777);
		return $des;
	}

	public static function createThumb($max_width,$max_height, $src)
	{
		try {
			set_time_limit(0);
			$arr = explode('uploads/images/', $src);
			$des = 'uploads/images/thumbs/';
			if (!@is_dir($des)){
				if( ! @mkdir($des, 0777, true)){
					@chmod($des, 0777);
				}
			}
			$des = $des.$max_width;
			if (!@is_dir($des)){
				if( ! @mkdir($des, 0777, true)){
					@chmod($des, 0777);
				}
			}
			$des = $des.'/'.$max_height;
			if (!@is_dir($des)){
				if( ! @mkdir($des, 0777, true)){
					@chmod($des, 0777);
				}
			}
			$levelArr = explode('/',$arr[1]);
			$n = count($levelArr) - 1;
			for($i = 0; $i < $n; ++$i){
				$des = $des.'/'.$levelArr[$i];
				if (!@is_dir($des)){
					if( ! @mkdir($des, 0777, true)){
						@chmod($des, 0777);
					}
				}
			}
			$des = $des.'/'.$levelArr[$n];
			return $des;
		}catch(\Exception $e)
		{
			return null;
		}
	}

}