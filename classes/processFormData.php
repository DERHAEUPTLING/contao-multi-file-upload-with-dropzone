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
class processFormData extends \System
{
	public function generateLinks(&$arrSubmitted, &$arrLabels, $data)
	{
		$this->import('Database');
		$files = $this->Input->get('attachfiles');
		if($files == "") $files = $this->Input->post('attachfiles');
		// get JSON-data
		$retValue = '';
		if($files != "")
		{
			foreach($files AS $file)
			{
				$tmp = split('"elemID"',$file);
				$file = '{"elemID"'.$tmp[1];
				if($obj = json_decode($file))
				{
					$myElem = $obj->elemID;


					$objDatabase = \Database::getInstance();
					$myElemData = $objDatabase->prepare("SELECT * FROM tl_form_field WHERE id = ".$myElem)->execute();
					$doLink = false;
					if(!$myElemData->next())
					{
						if($myElemData->sendcase == 'link') $doLink = true;	// pruefen, ob Dateien als Link hinterlegt werden sollen
					}
					if($doLink)
					{
						$addToFile = $obj->addToFile;
						// get uploadFolder
						$myElemData = $this->Database->prepare("SELECT * FROM tl_form_field WHERE id = ".$myElem)->execute();
						$uploadFolder = '';
						if($myElemData->next())
						{
							if($myElemData->storeFileSimple) $tmpFolder = $myElemData->uploadFolder;
							$objUploadFolder = \FilesModel::findByUuid($tmpFolder);
							$uploadFolder = $objUploadFolder->path;
						}
						$uploaded = $obj->files; // Array
						foreach($uploaded as $curFile)
						{
							if (file_exists(TL_ROOT . '/' . $uploadFolder.'/'.$addToFile . '/' . $curFile))
							{
								if(!$retValue == '') $retValue .= "<br>";
								$retValue .= '/' . $uploadFolder.'/'.$addToFile . '/' . $curFile;
							}
						}
						$arrSubmittedArray[$myElemData->name] = $retValue;
					} else
					{
						unset($arrSubmittedArray[$myElemData->name]);
						unset($arrLabelsArray[$myElemData->name]);
					}
				}
			}
		}
	}
}
