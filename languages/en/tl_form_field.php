<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * TYPOlight Open Source CMS
 * Copyright (C) 2005-2010 Leo Feyer
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 */


/**
 * Form fields
 */
$GLOBALS['TL_LANG']['FFL']['multifileupload']    = array('File-Upload with DropZone', '');
$GLOBALS['TL_LANG']['tl_form_field']['maxuploadsize'] = array('file size','Please enter the maximally allowed filesize in MB. "0" means, that the filesize is not limited.');
$GLOBALS['TL_LANG']['tl_form_field']['maxuploadcount'] = array('file count','Please enter the maximally allowed count of files. "0" means, that the amount is not limited.');
$GLOBALS['TL_LANG']['tl_form_field']['multiuploadfolder'] = array('location','Please enter the location where files shall be saved.');
$GLOBALS['TL_LANG']['tl_form_field']['sendcase'] = array('file forewarding','Please enter if the uploaded files shall be forwareded as attachement or as links.');
$GLOBALS['TL_LANG']['tl_form_field']['attach'] = array('attach files','');
$GLOBALS['TL_LANG']['tl_form_field']['link'] = array('link files','');


/**
 * Frontend
 */
$GLOBALS['TL_LANG']['multifileupload']['dictDefaultMessage'] = "Drop files here to upload.";
$GLOBALS['TL_LANG']['multifileupload']['dictFallbackMessage'] = "Your browser does not support drag'n'drop file uploads.";
$GLOBALS['TL_LANG']['multifileupload']['dictFallbackText'] = "Please use the fallback form below to upload your files like in the olden days.";
$GLOBALS['TL_LANG']['multifileupload']['dictFileTooBig'] = "File is too big ({[{filesize}]}MiB).  Max filesize: {[{maxFilesize}]}MiB.";
$GLOBALS['TL_LANG']['multifileupload']['dictResponseError'] = "Server responded with {[{statusCode}]} code.";
$GLOBALS['TL_LANG']['multifileupload']['dictInvalidFileType'] = "You can't upload files of this type.";
$GLOBALS['TL_LANG']['multifileupload']['dictCancelUpload'] = "Cancel upload";
$GLOBALS['TL_LANG']['multifileupload']['dictCancelUploadConfirmation'] = "Are you sure you want to cancel this upload?";
$GLOBALS['TL_LANG']['multifileupload']['dictRemoveFile'] = "Remove file";
$GLOBALS['TL_LANG']['multifileupload']['dictRemoveFileConfirmation'] = "";
$GLOBALS['TL_LANG']['multifileupload']['dictMaxFilesExceeded'] = "You can not upload any more files.";




