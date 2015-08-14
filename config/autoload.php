<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'thomkit',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'thomkit\multifileupload\processFormData'   => 'system/modules/multifileupload/classes/processFormData.php',
	'thomkit\multifileupload\fileMoveAndAppend' => 'system/modules/multifileupload/classes/fileMoveAndAppend.php',

	// Elements
	'thomkit\multifileupload\DropUpload'        => 'system/modules/multifileupload/elements/DropUpload.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'form_multifileupload' => 'system/modules/multifileupload/templates',
));
