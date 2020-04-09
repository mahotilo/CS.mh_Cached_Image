<?php 

defined('is_running') or die('Not an entry point...');

$editor_lang = self::$i18n['editor']['lang'];

$editor = array(
  'custom_scripts'  => false,
  'custom_css'      => false,
  'controls'        => array(
  
  
 
    // value 'URL' --start
    'URL' => array(
      'label' => '<i class="fa fa-file-image-o"></i> '.$editor_lang['URL'],
      'control_type' => 'text',
      'attributes' => array(
      ),
      'on' => array(
      ),
    ),
    // value 'URL' --end


    // value 'expiration' --start
    'expiration' => array(
      'label' => '<i class="fa fa-clock-o"></i> '.$editor_lang['Cache_expiration'],
      'control_type' => 'number',
      'attributes' => array(
			'step' => 'any',
      ),
      'on' => array(
		'input' => 'function(){
			if ( !$.isNumeric($(this).val()) || $(this).val() < 0 ) {
				$(this).val(0);
			};
		}',
      ),
    ),
    // value 'expiration' --end


    'alt' => array(
      'label' => '<i class="fa fa-html5"></i> '.$editor_lang['alt'],
      'control_type' => 'text',
      'attributes' => array(
      ),
      'on' => array(
      ),
    ),
    // value 'alt' --end


    // value 'width' --start
    'width' => array(
      'label' => '<i class="fa fa-css3"></i> '.$editor_lang['width'],
      'control_type' => 'text',
      'attributes' => array(
      ),
      'on' => array(
      ),
    ),
    // value 'width' --end


    // value 'height' --start
    'height' => array(
      'label' => '<i class="fa fa-css3"></i> '.$editor_lang['height'],
      'control_type' => 'text',
      'attributes' => array(),
      'on' => array(),
    ), 
    // value 'height' --end


    // value 'max-width' --start
    'max-width' => array(
      'label' => '<i class="fa fa-css3"></i> '.$editor_lang['max-width'],
      'control_type' => 'text',
      'attributes' => array(
      ),
      'on' => array(
      ),
    ),
    // value 'max-width' --end


    // value 'max-height' --start
    'max-height' => array(
      'label' => '<i class="fa fa-css3"></i> '.$editor_lang['max-height'],
      'control_type' => 'text',
      'attributes' => array(),
      'on' => array(),
    ), 
    // value 'max-height' --end

  ),
);
