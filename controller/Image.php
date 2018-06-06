<?php 

// @author Caique M. Oliveira
// @data 05/06/2018
// @description Image class
class Image
{

    // Attributes
    public $rawImage;
    public $extension;
    public $name;
    public $encryptName;
    public $fullName;
    public $uploadPath;
    public $endPath;

    // Constructor default
    function __construct($fileObj, $uploadPath)
    {
        $this->rawImage = $fileObj;
        $this->fullName = $fileObj['name'];
        $this->name = substr($this->fullName, 0, strpos($this->fullName, '.'));
        $this->extension = substr($this->fullName, strpos($this->fullName, '.'));
        $this->uploadPath = $uploadPath; 
        $this->encryptName = md5($this->name).$this->extension;
        $this->endPath = $this->uploadPath.$this->encryptName;
    }

    /**
    * Encrypt the image's name
    * @param $imageObj Image object
    * @return Image's name on hash format with image's extension 
    */
    // function encryptName($imageObj)
    // {

    //     return $this->encryptName;   
    // }

    /**
    * Move uploaded file to server
    * @param $imageObj Image object
    * @return true File moved with success
    * @return false Fail in to attempt move the file
    */
    function upload($imageObj)
    {
        return move_uploaded_file($imageObj->rawImage['tmp_name'], $imageObj->endPath);
    }

}


?>