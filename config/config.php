<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @package   multiFileUploadWithDropZone
 * @author    Martin Schwenzer & Frank Thonak
 * @license   GNU
 * @copyright Martin Schwenzer (www.derhaeuptling.com) & Frank Thonak (www.thomkit.de)
 */

/**
 * Form fields
 */
$GLOBALS['TL_FFL']['multifileupload'] = 'multifileupload\\DropUpload';


$GLOBALS['TL_HOOKS']['prepareFormData'][] = array('thomkit\multifileupload\fileMoveAndAppend', 'moveAppend');