<?php

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
 */

namespace thomkit\multifileupload;

/**
 * Class DropUpload
 *
*/
class DropUpload extends \Widget
{
	protected $strTemplate = 'form_multifileupload';

	public function generate()
	{
		global $objPage;

		$checkError = false;
		$this->addToFile = '';
		$this->import('Database');
		$postVal = $this->Input->post('myid');
		$getVal = $this->Input->get('myid');
		if($postVal[$this->strId] != "") $this->addToFile = $postVal[$this->strId];
		if($getVal[$this->strId] != "") $this->addToFile = $getVal[$this->strId];
		if($this->addToFile != '' && $this->mandatory) $checkError = true;
		if($this->addToFile == '') $this->addToFile = $this->Database->prepare("INSERT INTO tl_multiuploadfilecounter SET title = 'do'")->execute()->insertId;

		$this->error = '';
		if($checkError)
		{
			$this->error = ' error ';
			$fileData = $this->Input->get('attachfiles');
			if($this->Input->post('attachfiles') != '') $fileData = $this->Input->post('attachfiles');
			foreach($fileData as $files)
			{
				$obj = json_decode($files);
				if(count($obj->files) > 0 && $obj->elemID == $this->strId) $this->error = '';
			}
		}

		$this->loadLanguageFile('tl_form_field');

		$this->dictDefaultMessage = $GLOBALS['TL_LANG']['multifileupload']['dictDefaultMessage'];
		$this->dictFallbackMessage = $GLOBALS['TL_LANG']['multifileupload']['dictFallbackMessage'];
		$this->dictFallbackText = $GLOBALS['TL_LANG']['multifileupload']['dictFallbackText'];
		$this->dictFileTooBig = $GLOBALS['TL_LANG']['multifileupload']['dictFileTooBig'];
		$this->dictResponseError = $GLOBALS['TL_LANG']['multifileupload']['dictResponseError'];
		$this->dictInvalidFileType = $GLOBALS['TL_LANG']['multifileupload']['dictInvalidFileType'];
		$this->dictCancelUpload = $GLOBALS['TL_LANG']['multifileupload']['dictCancelUpload'];
		$this->dictCancelUploadConfirmation = $GLOBALS['TL_LANG']['multifileupload']['dictCancelUploadConfirmation'];
		$this->dictRemoveFile = $GLOBALS['TL_LANG']['multifileupload']['dictRemoveFile'];
		$this->dictRemoveFileConfirmation = $GLOBALS['TL_LANG']['multifileupload']['dictRemoveFileConfirmation'];
		$this->dictMaxFilesExceeded = $GLOBALS['TL_LANG']['multifileupload']['dictMaxFilesExceeded'];


		return $this->addToFile;
	}


}
