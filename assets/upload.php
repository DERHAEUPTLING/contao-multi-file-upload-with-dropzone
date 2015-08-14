<?php
/**
 * Initialize the system
 */

$addToFile = htmlspecialchars($_POST['addtofile']);
$elemID = htmlspecialchars($_POST['elemid']);
$files = $_FILES;
unset($_POST);
unset($_FILES);
if (!defined('TL_MODE'))
{
    define('TL_MODE', 'FE');

    require( dirname(__FILE__).'/../../../initialize.php');
}

if($addToFile == '') $addToFile = \Input::get('addtofile');
if($elemID == '') $elemID = \Input::get('elemid');

$objDatabase = \Database::getInstance();
$myElemData = $objDatabase->prepare("SELECT * FROM tl_form_field WHERE id = ".$elemID)->execute();

if(!$myElemData->next())
{
	echo json_encode(array('status' => 'error','value'=>'db'));
	die();
} else
{

	$ds          = DIRECTORY_SEPARATOR;  //1
	$basepath = str_replace(array('system/modules/multifileupload/assets/upload.php','system\modules\multifileupload\assets\upload.php'),'',__FILE__);
	$storeFolderAbs = $basepath.\FilesModel::findByUuid($myElemData->multiuploadFolder)->path;   //2

	$storeFolder = \FilesModel::findByUuid($myElemData->multiuploadFolder)->path;


		$targetPath =  $storeFolder . '/tmp';
		$targetPathAbs =  $storeFolderAbs . '/tmp';

		if(!file_exists($targetPathAbs))
		{
			new \Folder($targetPath);
			\Dbafs::addResource($targetPath);
		}

		$targetPath .=  '/' . $addToFile ;  //4
		$targetPathAbs .=  '/' . $addToFile ;  //4

		if(!file_exists($targetPathAbs))
		{
			new \Folder($targetPath);
			\Dbafs::addResource($targetPath);
		}

	if($_GET['del'] != '')
	{
		@unlink( $targetPathAbs . '/' . $_GET['del']);
		file_exists(!$targetPathAbs. '/' . $_GET['del']) == true ? $retVal = json_encode(array('status' => 'ok')) : $retVal = json_encode(array('status' => 'error','value'=>'fileexists'));	// die Datei ist nicht vorhanden
		die();
	}

	if (!empty($files)) {
		$path_parts = pathinfo($files['file']['name']);
		if(!in_array(strtolower($path_parts['extension']),split(',',strtolower($myElemData->extensions)))) {
			echo json_encode(array('status' => 'error','value'=>'extension'));	// Falsche Dateierweiterung
			die();
		}
		if(($files['file']['size'] > ($myElemData->maxuploadsize * 1024 * 1024)) && $myElemData->maxuploadsize > 0) {
			echo json_encode(array('status' => 'error','value'=>'size'));	// Datei zu gross
			die();
		}

	    $tempFile = $files['file']['tmp_name'];      //3
	    $targetPathAbs =  $targetPathAbs. '/'. $files['file']['name'];  //5
	    $tmp = move_uploaded_file($tempFile,$targetPathAbs); //6
		\Dbafs::addResource($targetPath. '/'. $files['file']['name']);
		file_exists($targetPathAbs) == true ? $retVal = json_encode(array('status' => 'ok')) : $retVal = json_encode(array('status' => 'error','value'=>'nofile'));	// die Datei ist nicht vorhanden
	} else {
	    $result  = array();
	    $files = @scandir($targetPathAbs);                 //1
	    if ( false!==$files ) {
	        foreach ( $files as $file ) {
	            if ( '.'!=$file && '..'!=$file && '.DS_Store'!=$file) {       //2
	                $obj['name'] = $file;
	                $obj['size'] = filesize($targetPathAbs.'/'.$file);
	                $obj['path'] = $targetPath;
	                $result[] = $obj;
	            }
	        }
	    }
	    header('Content-type: text/json');              //3
	    header('Content-type: application/json');
	    echo json_encode($result);
	}
}














