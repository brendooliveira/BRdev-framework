<?php

namespace App\Support;

use Aws\S3\S3Client;

class S3upload
{
    private $s3;

    public function __construct()
    {
        $this->s3 = new S3Client([
			'region'  => env("CONF_AWS_REGION"),
			'version' => 'latest',
			'credentials' => [
				'key'    => env("CONF_AWS_KEY"),
				'secret' => env("CONF_AWS_SECRET"),
			]
		]);		

    }


    public function image(array $file, string $ext = ".png")
    {
        if(!$this->validateImage($file)){
            return false;
        }

	    $temp_file_location = $file['tmp_name']; 
        $folder = "images/".date('Y')."/".date('m')."/".str_slug(env("CONF_SITE_NAME"))."S3-".uniqid()."$ext";

        $this->s3->putObject([
			'Bucket' => env("CONF_AWS_BUCKET"),
			'Key'    =>  $folder,
			'SourceFile' => $temp_file_location			
		]);

        return $folder;
    } 


    public function file(array $file, string $ext = ".zip")
    {
        $temp_file_location = $file['tmp_name']; 
        $folder = "images/".date('Y')."/".date('m')."/".uniqid()."$ext";

        $this->s3->putObject([
			'Bucket' => env("CONF_AWS_BUCKET"),
			'Key'    =>  $folder,
			'SourceFile' => $temp_file_location			
		]);

        return $folder;
    } 

    public function delete(string $file): bool
    {
        $delete =  $this->s3->deleteObject(array(
            'Bucket' => env("CONF_AWS_BUCKET"),
            'Key'    => $file
        ));
        if($delete){
            return true;
        }

        return false;
    }

    public function validateImage(array $file): bool
    {
        if ($file['type'] == "image/jpeg") {
            return true;
        }

        if ($file['type'] == "image/jpg") {
            return true;
        }

        if ($file['type'] == "image/webp") {
            return true;
        }

        if ($file['type'] == "image/png") {
            return true;
        }

        if ($file['type'] == "image/gif") {
            return true;
        }
        
        return false;
    }


}   