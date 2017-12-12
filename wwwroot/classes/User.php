<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 9/29/2015
 * Time: 10:36 AM
 */

class User {
    public $id;
    public $email;
    public $firstname;
    public $lastname;
    public $pwd;
    public $pwd2;

    public $added_at;
    public $updated_at;
    public $id_name;
    public $id_number;
    public $id_issuer;
    public $role;
    public $statusflag;
    public $image;
    public $uploaded_image;

    public function __construct()
    {
        $this->email = '';
        $this->firstname = '';
        $this->lastname = '';
        $this->pwd = '';

        $this->pwd2 = '';
    }

    public function EncryptPassword()
    {
        $this->pwd = md5($this->email . 'xyxyx' . $this->pwd . 'hdx%$56762934ysdvids9d78y4932');
    }

    public function Set($row)
    {
        $this->id = $row["id"];
        $this->email = $row["email"];
        $this->firstname = $row["firstname"];
        $this->lastname = $row["lastname"];
        $this->added_at = $row["added_at"];
        $this->updated_at = $row["updated_at"];
        $this->id_name = $row["id_name"];
        $this->pwd = $row["pwd"];
        $this->id_number = $row["id_number"];
        $this->id_issuer = $row["id_issuer"];
        $this->role = $row["role"];
        $this->statusflag = $row["statusflag"];
        $this->image = $row["image"];
        if($this->image == "")
        {
            $this->image = PROFILE_PIC_DEFAULT;
        }
    }

    public function FullName()
    {
        return $this->firstname . ' ' . $this->lastname;
    }
}