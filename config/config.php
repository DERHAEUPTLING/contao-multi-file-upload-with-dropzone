<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @package   multiFileUploadWithDropZone
 * @author    Martin Schwenzer & Frank Thonak
 * @license   GNU
 * @copyright Martin Schwenzer (derhaeuptling.com) & Frank Thonak (www.thomkit.de)
 */

/**
 * Form fields
 */

array_insert($GLOBALS['TL_FFL'], array_search('upload', array_keys($GLOBALS['TL_FFL'])) + 1, array('multifileupload' => 'multifileupload\\DropUpload'));

$GLOBALS['TL_HOOKS']['prepareFormData'][] = array('thomkit\multifileupload\fileMoveAndAppend', 'moveAppend');