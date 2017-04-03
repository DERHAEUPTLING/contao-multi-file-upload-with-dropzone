# Contao multi file upload with DropZone
Contao formular content element "File-Upload with DropZone" based on <a href="http://www.dropzonejs.com/" target="_blank">Dropzonejs</a>

![Alt text](../screenshots/screenshot.jpg?raw=true)

Upload one or multiple files with visual feedback within you regular Contao forms.
Configure allowed file size, count und type.
Send uploaded files or links to it by mail.


## features
* size, count and type of files are configurable
* files are saved in a selectable subfolder of /files/
* temporary files are saved in a tmp folder and will be:
 *  deleted after 3h when form got not submitted
 *  or moved to the files save location when the form is submitted successfully 
* uploaded files can be send, linked or sand & linked by email
* paths of uploaded images can be saved to database (from the from settings)
* multi language support
* filenames get sanitized automatically to prevent conflicts on server / on sending email

## dependencies
jQuery
