<?php

$GLOBALS['TL_DCA']['tl_form_field']['palettes']['multifileupload'] = '{type_legend},type,name,label;{fconfig_legend},maxuploadsize,maxuploadcount,extensions,multiuploadFolder,sendcase;';

$GLOBALS['TL_DCA']['tl_form_field']['fields']['maxuploadsize'] = array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['maxuploadsize'],
					'exclude'                 => true,
					'inputType'               => 'text',
					'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
					'sql'                     => "int(10) unsigned NOT NULL default '0'"
		);

$GLOBALS['TL_DCA']['tl_form_field']['fields']['maxuploadcount'] = array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['maxuploadcount'],
					'exclude'                 => true,
					'inputType'               => 'text',
					'eval'                    => array('rgxp'=>'natural', 'tl_class'=>'w50'),
					'sql'                     => "int(10) unsigned NOT NULL default '0'"
		);

$GLOBALS['TL_DCA']['tl_form_field']['fields']['sendcase'] = array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['sendcase'],
					'default'                 => 'attach',
					'exclude'                 => true,
					'inputType'               => 'radio',
					'options'                 => array('attach', 'link'),
					'eval'                    => array('mandatory'=>true),
					'reference'               => &$GLOBALS['TL_LANG']['tl_form_field'],
					'sql'                     => "varchar(32) NOT NULL default ''"
				);


$GLOBALS['TL_DCA']['tl_form_field']['fields']['multiuploadFolder'] = array
				(
					'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['multiuploadFolder'],
					'exclude'                 => true,
					'inputType'               => 'fileTree',
					'eval'                    => array('mandatory'=>true,'fieldType'=>'radio', 'tl_class'=>'clr'),
					'sql'                     => "binary(16) NULL"
				);
?>