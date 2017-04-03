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
 * Class formUploadStore
 *
*/
class formUploadStore extends \System
{
	public function myStoreFormData($arrSet, $objForm)
	{
		$this->import('Database');
		$formId = $objForm->id;

		substr($GLOBALS['TL_CONFIG']['websitePath'],0,1) == '/' ? $killPath = $_SERVER['HTTP_HOST'].$GLOBALS['TL_CONFIG']['websitePath'] : $killPath = $_SERVER['HTTP_HOST'].'/'.$GLOBALS['TL_CONFIG']['websitePath'];

		$myElemData = $this->Database->prepare("SELECT name, dbstorecut FROM tl_form_field WHERE pid = ".$formId." AND type='multifileupload'")->execute();
		while($myElemData->next())
		{
			if($_SERVER['formFileToDb'][$myElemData->name] != '')
			{
				// files exists
				$filesArr = explode("\n",$_SERVER['formFileToDb'][$myElemData->name]);
				if($myElemData->dbstorecut == 1)
				{
					// cut filepath
					for($loop = 0; $loop < count($filesArr); $loop++)
					{
						$filesArr[$loop] = str_replace(array('http://'.$killPath,'https://'.$killPath),'',$filesArr[$loop]);
					}
				}
				$newFilesArr = array();
				for($loop = 0; $loop < count($filesArr); $loop++)
				{
					if($filesArr[$loop] != '') $newFilesArr[] = $filesArr[$loop];
				}
				$arrSet[$myElemData->name] = serialize($newFilesArr);
			}
		}
	    return $arrSet;
	}
}
