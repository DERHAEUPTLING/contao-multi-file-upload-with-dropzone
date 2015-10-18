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
 * Backend Form fields
 */
$GLOBALS['TL_LANG']['FFL']['multifileupload']    = array('Datei-Upload DropZone', '');
$GLOBALS['TL_LANG']['tl_form_field']['maxuploadsize'] = array('Upload-Gr&ouml;&szlig;e','Bitte geben Sie hier die maximal erlaubte Gr&ouml;&szlig;e in MB der Dateien an. "0" bedeutet, dass die Gr&ouml;&szlig;e nicht begrenz ist.');
$GLOBALS['TL_LANG']['tl_form_field']['maxuploadcount'] = array('Upload-Anzahl','Bitte geben Sie hier die maximal erlaubte Anzahl der Dateien an. "0" bedeutet, dass die Anzahl nicht begrenzt ist.');
$GLOBALS['TL_LANG']['tl_form_field']['multiuploadFolder'] = array('Speicherort','Bitte geben Sie hier an, wo die Dateien abgelegt werden sollen.');
$GLOBALS['TL_LANG']['tl_form_field']['sendcase'] = array('Dateiversand','Bitte geben Sie hier an, ob die Dateien als Anhang versandt oder als Link verchickt werden sollen.');
$GLOBALS['TL_LANG']['tl_form_field']['attach'] = array('Dateien anh&auml;ngen','');
$GLOBALS['TL_LANG']['tl_form_field']['link'] = array('Dateien verlinken','');
$GLOBALS['TL_LANG']['tl_form_field']['all'] = array('Dateien anh&auml;ngen und verlinken','');
$GLOBALS['TL_LANG']['tl_form_field']['storecase'] = array('Speicheroptionen','Damit es zu keinen Konflikten kommt, wird für jeden Seitenbesucher eine neue ID erzeugt. <br><br>Diese ID wird verwendet um die hochgeldenen Bilder zu unterscheiden und Duplikate zu vermeiden. <br><br>Dateien werden nach erfolgrichem Formularversand entweder in den neuen Unterordner "ID" kopiert, oder direkt in das ausgewählte Verzeichnis mit neuem Dateinamen "ID_Dateiname".');
$GLOBALS['TL_LANG']['tl_form_field']['folder'] = array('Im Unterordner ID speichern','');
$GLOBALS['TL_LANG']['tl_form_field']['file'] = array('ID dem Dateinamen voranstellen und ohne Unterordner speichern.','');


/**
 * Frontend
 */
$GLOBALS['TL_LANG']['multifileupload']['dictDefaultMessage'] = "Dateien hier ablegen oder klicken.";
$GLOBALS['TL_LANG']['multifileupload']['dictFallbackMessage'] = "Ihr Browser unterstützt kein Upload per Drag'n'drop.";
$GLOBALS['TL_LANG']['multifileupload']['dictFallbackText'] = "Bitte benutzten Sie das Fallback Formular um Ihre Dateien wie in den guten alten Tagen hochzuladen.";
$GLOBALS['TL_LANG']['multifileupload']['dictFileTooBig'] = "Die Datei ist zu groß ({[{filesize}]}MiB).  Max Dateigröße: {[{maxFilesize}]}MiB.";
$GLOBALS['TL_LANG']['multifileupload']['dictResponseError'] = "Server antwortet mit dem StausCode: {[{statusCode}]} .";
$GLOBALS['TL_LANG']['multifileupload']['dictInvalidFileType'] = "Sie können Dateien dieses Dateityps nicht hochladen.";
$GLOBALS['TL_LANG']['multifileupload']['dictCancelUpload'] = "Upload abbrechen";
$GLOBALS['TL_LANG']['multifileupload']['dictCancelUploadConfirmation'] = "Sind Sie sicher, dass sie diesen Upload abbrechen wollen?";
$GLOBALS['TL_LANG']['multifileupload']['dictRemoveFile'] = "Datei löschen";
$GLOBALS['TL_LANG']['multifileupload']['dictRemoveFileConfirmation'] = "";
$GLOBALS['TL_LANG']['multifileupload']['dictMaxFilesExceeded'] = "Die maximale Anzahl hochladbarer Dateien ist erreicht.";
$GLOBALS['TL_LANG']['multifileupload']['dictDuplicate'] = "Eine Datei mit diesem Namen ist bereits vorhanden.";
$GLOBALS['TL_LANG']['multifileupload']['dictMandatoryText'] = "Bitte laden sie eine Datei hoch!";