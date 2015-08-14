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
		$this->addToFile = '';
		$this->import('Database');
		$postVal = $this->Input->post('myid');
		$getVal = $this->Input->get('myid');
		if($postVal[$this->strId] != "") $this->addToFile = $postVal[$this->strId];
		if($getVal[$this->strId] != "") $this->addToFile = $getVal[$this->strId];
		if($this->addToFile == '') $this->addToFile = $this->Database->prepare("INSERT INTO tl_multiuploadfilecounter SET title = 'do'")->execute()->insertId;
		return $this->addToFile;
	}
}
