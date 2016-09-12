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
class fileMoveAndAppend extends \System
{
	public function moveAppend(&$arrSubmittedArray, $arrLabelsArray, $objForm, $arrFields = array())
	{
	file_put_contents ('uploadlog.txt','Die Funktion wurde aufgerufen');
		$this->import('Database');
		$_POST[myid] = '';
		$_GET[myid] = '';
		$files = $this->Input->get('attachfiles');
		if($files == "") $files = $this->Input->post('attachfiles');
		// get JSON-data

		if($files != "")
		{
			foreach($files AS $file)
			{
				$tmp = split('"elemID"',$file);
				$file = '{"elemID"'.$tmp[1];

//file_put_contents('check.txt',$file."\n", FILE_APPEND );

				if($obj = json_decode($file))
				{
					$myElem = $obj->elemID;
					$addToFile = $obj->addToFile;
					// get uploadFolder
					$myElemData = $this->Database->prepare("SELECT * FROM tl_form_field WHERE id = ".$myElem)->execute();
					$uploadFolder = '';
					if($myElemData->next())
					{
						$tmpFolder = $myElemData->multiuploadFolder;
						$objUploadFolder = \FilesModel::findByUuid($tmpFolder);
						$uploadFolder = $objUploadFolder->path;
					}
					$uploaded = $obj->files; // Array
					foreach($uploaded as $curFile)
					{
					 	if(file_exists ( TL_ROOT . '/' . $uploadFolder .'/tmp/'.$addToFile.'/' . $curFile ))
					 	{

					// move files
							if(!file_exists(TL_ROOT . '/' . $uploadFolder.'/'.$addToFile) && $myElemData->storecase != 'file')
							{
								new \Folder($uploadFolder.'/'.$addToFile);
								\Dbafs::addResource($uploadFolder.'/'.$addToFile);
							}
					// use ID as folder or file prename
							if($myElemData->storecase == 'file')
							{
								$storeFolderPreFile = $addToFile.'_';
							} else
							{
								$storeFolderPreFile = $addToFile.'/';
							}

							if (copy(TL_ROOT . '/' . $uploadFolder .'/tmp/'.$addToFile.'/' . $curFile, TL_ROOT . '/' . $uploadFolder.'/'.$storeFolderPreFile . $curFile))
							{
								\Dbafs::addResource(TL_ROOT . '/' . $uploadFolder.'/'.$storeFolderPreFile . $curFile);
								@unlink(TL_ROOT . '/' . $uploadFolder .'/tmp/'.$addToFile.'/' . $curFile);

								if(in_array($myElemData->sendcase,array('attach','all')))
								{
								// Dateien der Mail anhaengen
									$_SESSION['FILES'][$curFile] = array
									(
										'name'     => $curFile,
										'type'     => 'file',
										'tmp_name' =>  TL_ROOT . '/' . $uploadFolder.'/'.$storeFolderPreFile . $curFile,
										'uploaded' => false
									);
								}
								if(in_array($myElemData->sendcase,array('link','all')))
								{
								// Dateien per Link einbinden
									if (file_exists(TL_ROOT . '/' . $uploadFolder.'/'.$storeFolderPreFile . $curFile))
									{
										$subfolder = str_replace(array('/','\\'),'',$GLOBALS['TL_CONFIG']['websitePath']);
										if( $subfolder != '') $subfolder.= '/';
										$arrSubmittedArray[$myElemData->name] .= "\nhttp://" . $_SERVER['SERVER_NAME'] . '/' . $subfolder . $uploadFolder.'/'.$storeFolderPreFile . $curFile;
									}
								}
								if($myElemData->sendcase == 'attach')
								{
								// Datei-Verlinkung loeschen
									unset($arrSubmittedArray[$myElemData->name]);
									unset($arrLabelsArray[$myElemData->name]);
								}
							}
						}
					}
				}
			}
			//\Dbafs::syncFiles();
		}
	}
}


