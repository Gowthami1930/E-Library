<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 9/29/2015
 * Time: 10:34 AM
 */

class UserController {
    /**
     * @param User $reg
     * @return Notice
     */
    public function Register(User $reg)
    {
        $ut = new Utility();
        $nt = new Notice();
        //verify the email is valid
        if(!$ut->ValidateEmail($reg->email))
        {
            $nt->type = "danger";
            $nt->message ="Invalid Email Address";
            return $nt;
        }

        //verify first name
        if(!$ut->ValidateName($reg->firstname))
        {
            $nt->type = "danger";
            $nt->message ="Invalid Firstname";
            return $nt;
        }

        //verify last name
        if(!$ut->ValidateName($reg->lastname))
        {
            $nt->type = "danger";
            $nt->message ="Invalid lastname";
            return $nt;
        }

        //check if passwords match
        if(!$ut->ValidatePasswords($reg->pwd,$reg->pwd2))
        {
            $nt->type = "danger";
            $nt->message ="Invalid passwords, or passwords do not match";
            return $nt;
        }

        $reg->role = 'user';
        $reg->statusflag = 1;
        $reg->id_issuer = '';
        $reg->id_number = '';
        $reg->id_name = '';
        $reg->EncryptPassword();

        //verify that this email is not existing already
        //create user
        $urp = new UserRepository();
        $id = $urp->CreateUser($reg);
        if($id <= 0)
        {
            $nt->type = "danger";
            $nt->message ="Email address is already in use";
            return $nt;
        }

        $reg->id = $id;
        //do a login
        $_SESSION["ROLE"] = $reg->role;
        $_SESSION["USER"] = $reg;//$reg->id...

        $nt->type = "success";
        $nt->message ="Welcome, " . $reg->FullName() ."! Your account has been created successfully";
        return $nt;

    }

    public function Login(User $login)
    {
        $nt = new Notice();
        $login->EncryptPassword();


        $urp = new UserRepository();
        $user = $urp->GetUserByEmail($login->email);
        if($user == null)
        {
            $nt->type = "danger";
            $nt->message ="Invalid credentials";
            return $nt;
        }

        if($user->statusflag != 1)
        {
            $nt->type = "danger";
            $nt->message ="Account has been disabled, contact administrator";
            return $nt;
        }

        if($user->pwd != $login->pwd)
        {
            $nt->type = "danger";
            $nt->message ="Invalid credentials";
            return $nt;
        }

        $_SESSION["ROLE"] = $user->role;
        $_SESSION["USER"] = $user->id;//$user

        header('location: index.php');


        $nt->type = "success";
        $nt->message ="";
        return $nt;
    }

    public function Edit_User(User $user)
    {
        $ut = new Utility();
        $nt = new Notice();
        //$login->EncryptPassword();

        if($user->uploaded_image['error'] == 0 && $user->uploaded_image['size'] > 0)
        {
            $tmp_file = $user->uploaded_image['tmp_name'];
            $ext = strtolower(pathinfo($user->uploaded_image['name'], PATHINFO_EXTENSION));

            if(!$ut->ValidateFileUploadSize($user->uploaded_image['size']))
            {
                $nt->type = "danger";
                $nt->message ="Invalid Image file: Too Large";
                return $nt;
            }

            if(!$ut->ValidateFileUpload($ext))
            {
                $nt->type = "danger";
                $nt->message ="Invalid Image file: Upload JPG or PNG Only";
                return $nt;
            }

            $target_file = $ut->DateString() . '_'. $user->id .'.'. $ext;

            $file_path = PROFILE_PIC_PATH . $target_file;


            if(move_uploaded_file($tmp_file,$file_path))
            {
                if($user->image != PROFILE_PIC_DEFAULT) {
                    unlink(PROFILE_PIC_PATH . $user->image);
                }
                $user->image = $target_file;

            }
            else
            {
                $nt->type = "danger";
                $nt->message ="File could not be uploaded";
                return $nt;
            }
        }

        if(!$ut->ValidateEmail($user->email))
        {
            $nt->type = "danger";
            $nt->message ="Invalid Email Address";
            return $nt;
        }

        //verify first name
        if(!$ut->ValidateName($user->firstname))
        {
            $nt->type = "danger";
            $nt->message ="Invalid Firstname";
            return $nt;
        }

        //verify last name
        if(!$ut->ValidateName($user->lastname))
        {
            $nt->type = "danger";
            $nt->message ="Invalid lastname";
            return $nt;
        }

        $urp = new UserRepository();
        $id = $urp->UpdateUser($user);
        if($id <= 0)
        {
            $nt->type = "danger";
            $nt->message ="Profile update failed";
            return $nt;
        }

        $nt->type = "success";
        $nt->message = $user->FullName() . ", your Profile has successfully been updated";
        return $nt;
    }
}