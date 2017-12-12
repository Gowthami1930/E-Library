<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 9/29/2015
 * Time: 10:41 AM
 */

class Utility {
    //check if email is valid
    public function ValidateEmail($email)
    {
        return (filter_var($email, FILTER_VALIDATE_EMAIL));//predefined php function to validate email
    }

    //check if an uploaded file is the right size
    public function ValidateFileUploadSize($imageSize)
    {
        if ($imageSize <= MAX_IMAGE_SIZE) {
            return true;
        }
        return false;
    }

    //check if an uploaded file is the right extension
        public function ValidateFileUpload($ext)
        {
            if (strpos(ALLOWED_IMAGES,':'. $ext . ':') !== false) {
                return true;
            }
            return false;
        }

    //check if name is valid
    public function ValidateName($name)
    {
        if(strlen($name) <= 0) return false;

        if(strlen($name) > 50) return false;

        return true;
    }

    public function ValidatePasswords($pwd1, $pwd2)
    {
        if($pwd1 == '') return false;

        if($pwd1 != $pwd2) return false;

        return true;
    }

    public function ValidateTitle($title)
    {
        if(strlen($title) <= 0) return false;
        if(strlen($title) > 50) return false;
        return true;
    }
    public function ValidateISBN($isbn)
    {
        if(strlen($isbn) <= 0) return false;
        if(strlen($isbn) > 20) return false;
        return true;
    }

    /*public function ValidateImageUrl($image_url)
    {
        if(strlen($image_url) <= 0) return false;
        return true;
    }*/

    public function ValidateAuthor($author)
    {
        if(strlen($author) <= 0) return false;
        if(strlen($author) > 50) return false;
        return true;
    }

    public function ValidateCategory($category)
    {
        if(strlen($category) <= 0) return false;
        if(strlen($category) > 50) return false;
        return true;
    }

    public function ValidatePublisher($publisher)
    {
        if(strlen($publisher) <= 0) return false;
        if(strlen($publisher) > 50) return false;
        return true;
    }

    public function ValidateYear($publish_year)
    {
        if(strlen($publish_year) <= 0) return false;
        if(strlen($publish_year) > 10) return false;
        return true;
    }

    public function ValidateInfo($info)
    {
        if(strlen($info) <= 0) return false;
        return true;
    }


    public function DateDB()
    {

        return date("Y-m-d H:i:s");
    }



    public function DateString()
    {

        return date("YmdHis");
    }
}