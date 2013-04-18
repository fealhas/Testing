<?php
/*
 *@author vadja
 */
class GetPicAction extends StdAction
{

     public function getFileType($fileName) {
        $ext = substr(strrchr($fileName, '.'), 1);
        $fileType = null;
        switch ($ext) {
            // images
        case 'bmp':
        case 'jpg':
        case 'jpeg':
        case 'gif':
        case 'png':
        case 'tif':
        case 'tiff':
        case 'tga':
        case 'psd':
        case 'ai':
        case 'xbm':
        case 'pxm':
            $fileType = 'image';
            break;
            //audio
        case 'mp3':
        case 'mid':
        case 'ogg':
        case 'oga':
        case 'm4a':
        case 'wav':
        case 'wma':
            $fileType = 'audio';
            break;
            // video
        case 'avi':
        case 'dv':
        case 'mp4':
        case 'mpeg':
        case 'mpg':
        case 'mov':
        case 'wm':
        case 'flv':
        case 'mkv':
        case 'webm':
        case 'ogv':
        case 'ogm':
            $fileType = 'video';
            break;
        default:
            $fileType = 'other';
        }
        return $fileType;
    }

    public function run()
    {
        
        if ((($rec_id = Yii::app()->request->getParam('id'))!==null)&&
            (($cat_id = Yii::app()->request->getParam('cat_id'))!==null)&&
            (($moduleName = Yii::app()->request->getParam('moduleName'))!==null)) {
            $path = "files/".hexdec(dechex(crc32($moduleName)))."/".hexdec(dechex(crc32($cat_id."_".$rec_id)))."/";
            $arr_glob=glob($path."*.*");
            if (sizeof($arr_glob)>0){
                $mime = (mime_content_type($arr_glob[0]));
                $fileType = substr($mime, 0, strpos ($mime, "/"));
                $src = null;
		// косяк с mp3
		$ext = substr(strrchr($arr_glob[0], '.'), 1);
        	if ($ext == 'mp3') $fileType='audio';

                switch ($fileType) {
                    case 'image':
                    $src = $arr_glob[0];
                    break;
                    case 'audio':
                    $src = "img/audio.png";
                    break;
                    case 'video':
                    $src = "img/video.png";
                    break;
                    default:
                    $src = "img/other_file.png";
                }
            } else {
                $src = "img/empty.jpg";
            } 
	    $imageSize = getimagesize($src);
	    $w = $imageSize[0];
	    $h = $imageSize[1];	
            echo json_encode(array('w'=>$w, 'h'=> $h, 'path' => $src, 'isEmpty'=>(sizeof($arr_glob)>0)?false:true));
            }

    }
}
?>
