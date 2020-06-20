<?php 
/*
=====================================================
Mahotilo

Get Google-Reviews with PHP cURL & without API Key
=====================================================
*/


defined('is_running') or die('Not an entry point...');

$section = array();
$section['values'] = array_merge(array(
  'URL'					=> '',
  'expiration'			=> '12',
  'id'					=> '',
  'alt'					=> '',
  'width'				=> '',
  'height'				=> '',
  'max-width'			=> '',
  'max-height'			=> '',
), $sectionCurrentValues );


$section['attributes'] = array(
  'class' => '',
);


/*----------------------------------*/
global $addonPathData,$addonRelativeData,$dataDir;
if ( isset($GettingSection) ) { 

	$Img_URL = $section['values']['URL'];

	if ($Img_URL == '') {
		$CacheRelativeFileName = '/include/imgs/default_image.jpg';
	} else {	
		$CacheFile = 'gdi_'.dechex(crc32($Img_URL)).'.dat';
		$CacheRelativePath = '/data/_uploaded/image/'.$type;
		$CachePath = $dataDir.$CacheRelativePath;
		$CacheRelativeFileName = $CacheRelativePath.'/'.$CacheFile;
		$CacheFileName = $CachePath.'/'.$CacheFile;

		$fmt = file_exists($CacheFileName) ? filemtime($CacheFileName) : 0;
		$delta = abs( $_SERVER['REQUEST_TIME'] - $fmt );

		if ( \gp\tool::LoggedIn() || $delta >= $section['values']['expiration']*3600 ) { //lifetime in hours
			$ch = curl_init($Img_URL);
			curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla / 5.0 (Windows; U; Windows NT 5.1; en - US; rv:1.8.1.6) Gecko / 20070725 Firefox / 2.0.0.6");
			curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_TIMEOUT, 20);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$raw = curl_exec($ch);
			curl_close($ch);
			
			if (!file_exists($CachePath) && !is_dir($CachePath)) {
				mkdir($CachePath);
			}
			if( file_exists($CacheFileName) ){
				unlink($CacheFileName);
			}
			$fp = fopen($CacheFileName,'x');
			fwrite($fp, $raw);
			fclose($fp);
		}
	};
	
	$width = $section['values']['width'] != '' ? 'width:'.$section['values']['width'].';' : '';
	$height = $section['values']['height'] != '' ? 'height:'.$section['values']['height'].';' : '';
	$maxwidth = $section['values']['max-width'] != '' ? 'max-width:'.$section['values']['max-width'].';' : '';
	$maxheight = $section['values']['max-height'] != '' ? 'max-height:'.$section['values']['max-height'].';' : '';
	
	$section['content']  = '
	<img 
		src="'.$CacheRelativeFileName.'" 
		style="'.$width.$height.$maxwidth.$maxheight.'" 
		id="{{id}}"
		name="{{id}}"
		alt="{{alt}}"
	>';
}


/*********************************************************************************/
$section['gp_label'] = 'mh Cached Image';
$section['gp_color'] = '#1EA076';

$section['always_process_values'] = true;

$components = '';

$css_files = array( 'style.css');
$js_files = array();

// $style = 'body { background:red!important; }';
// $javascript = 'var hello_world = "Hello World!";';
// $jQueryCode = '$(".hello").on("click", function(){ alert("Click: " + hello_world); });';
