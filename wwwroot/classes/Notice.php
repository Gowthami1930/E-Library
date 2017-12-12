<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 9/29/2015
 * Time: 10:46 AM
 */

class Notice {
    public $message; //notice message var
    public $type; //notice type var

    //function to display notice
    public function Paint()
    {
        if(!isset($this->type)) return;
        //html that displays notice and assigns it to $txt
        $txt = '<div class="alert alert-'. $this->type .'" role="alert">'. $this->message .'</div>';
        return $txt;
    }
}