<?php
/**
 * Created by PhpStorm.
 * User: thamhut
 * Date: 3/28/2016
 * Time: 9:50 PM
 */

namespace App\Modules\Backend\Controllers;


class UploadController extends BaseController
{
    public function indexAction(){
        $this->uploadFile($this->request->getUploadedFiles());
    }

    public function checkFormatFile($file)
    {
        $err = array();
        $allowedTypes = array('image/gif', 'image/jpg', 'image/png','image/bmp', 'image/jpeg');
        $format = $file->getRealType();
        $err[2] = explode('/', $format);
        $err[2] = isset($err[2][1])?$err[2][1]:'';
        if(!in_array($format, $allowedTypes))
        {
            $err[1]['format'] = 'err';
        }
        if($file->getSize() > 1000000)
        {
            $err[1]['size'] = 'err';
        }
        return $err;
    }

    public function uploadFile($files)
    {
        $url = new \Phalcon\Mvc\Url();
        $url->setBaseUri('/');
        $upload = array();
        $y = date('Y');
        $m = date('m');
        $des = 'uploads/images/'.$y;
        if (!@is_dir($des)){
            if( ! @mkdir($des, 0777, true)){
                @chmod($des, 0777);
            }
        }
        $des = 'uploads/images/'.$y.'/'.$m;
        if (!@is_dir($des)){
            if( ! @mkdir($des, 0777, true)){
                @chmod($des, 0777);
            }
        }
        foreach ($files as $file){
            $upload['err'] = $err = $this->checkFormatFile($file);
            if(!isset($err[1]))
            {
                $name = md5($file->getName().time()).'.'.$err[2];
                $file->moveTo($des.'/'.$name);
                $upload['des'][] =  $url->get().$des.'/'.$name;
            }
        }
        echo json_encode($upload);
    }

    /**
     * Save files to server
     * @param $url
     * @return Files|\CURLFile|null
     */
    public function uploadImage($url)
    {
        try {
            set_time_limit(0);
            $y = date('Y');
            $m = date('m');
            $des = 'uploads/images/'.$y;
            if (!@is_dir($des)){
                if( ! @mkdir($des, 0777, true)){
                    @chmod($des, 0777);
                }
            }
            $des = 'uploads/images/'.$y.'/'.$m;
            if (!@is_dir($des)){
                if( ! @mkdir($des, 0777, true)){
                    @chmod($des, 0777);
                }
            }
            $info = pathinfo($url);

            $des = $des . '/' . md5($url) . $info['basename'];
            $this->downloadFile($url, $des);
            return $des;
        }catch(\Exception $e)
        {
            return null;
        }
    }

    /**
     * @param $file_url
     * @param $save_to
     */
    public function downloadFile($file_url, $save_to)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch,CURLOPT_URL,$file_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $file_content = curl_exec($ch);
        curl_close($ch);
        $downloaded_file = fopen($save_to, 'w');
        fwrite($downloaded_file, $file_content);
        fclose($downloaded_file);
        /*$cmd = 'wget "'.$file_url.'" -O '.$save_to;
        @exec($cmd);*/
    }
}