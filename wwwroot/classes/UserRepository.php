<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 9/29/2015
 * Time: 10:48 AM
 */

class UserRepository {
    public function IsEmailExist($email)
    {
        $sql = "select * from users where email = :em";
        $conn = new Connect();
        $conn->SetSQL($sql);
        $conn->AddParam(":em", $email);
        $conn->Select();
        if($conn->num_rows > 0) return true;
        else return false;
    }

    public function CreateUser(User $user)
    {
        if($this->IsEmailExist($user->email))
        {
            return 0;
        }

        $ut = new Utility();
        $sql = "INSERT INTO users
(email,firstname,lastname,pwd,added_at,updated_at,id_name,id_number,id_issuer,role,statusflag)
VALUES(:email,:firstname,:lastname,:pwd,:added_at,:updated_at,:id_name,:id_number,:id_issuer,:role,:statusflag)";
        $conn = new Connect();
        $conn->SetSQL($sql);
        $conn->AddParam(":email", $user->email);
        $conn->AddParam(":firstname", $user->firstname);
        $conn->AddParam(":lastname", $user->lastname);
        $conn->AddParam(":pwd", $user->pwd);
        $conn->AddParam(":added_at", $ut->DateDB());
        $conn->AddParam(":updated_at", $ut->DateDB());
        $conn->AddParam(":id_name", $user->id_name);
        $conn->AddParam(":id_number", $user->id_number);
        $conn->AddParam(":id_issuer", $user->id_issuer);
        $conn->AddParam(":role", $user->role);
        $conn->AddParam(":statusflag", $user->statusflag);
        $id = $conn->Insert();
        return $id;
    }2

    public function GetUserByEmail($email)
    {
        $sql = "select * from users where email = :em";
        $conn = new Connect();
        $conn->SetSQL($sql);
        $conn->AddParam(":em", $email);
        $row = $conn->Select();
        if($conn->num_rows <= 0) return null;
        $user = new User();
        $user->Set($row[0]);
        return $user;
    }


    public function GetUserById($id)
    {
        $sql = "select * from users where id = :refid";
        $conn = new Connect();
        $conn->SetSQL($sql);
        $conn->AddParam(":refid", $id);
        $row = $conn->Select();
        if($conn->num_rows <= 0) return null;
        $user = new User();
        $user->Set($row[0]);
        return $user;
    }

    public function GetAllUsers()
    {
        $sql = "Select * from users WHERE role = :user";
        $conn = new Connect();
        $conn->SetSQL($sql);
        $rows = $conn->Select();
        if($conn->num_rows <= 0) return null;

        $users = array();
        for($i = 0; $i < count($rows); $i++)
        {
            $user = new User();
            $user->Set($rows[$i]);
            $users[] = $user;
        }
        return $users;
    }

    public function UpdateUser(User $user)
    {
        //var_dump($user->id);

        $sql = "UPDATE users SET lastname = :lastname, firstname = :firstname, email = :email, image = :image WHERE id = :refid";
        $conn = new Connect();
        $conn->SetSQL($sql);
        $conn->AddParam(":lastname", $user->lastname);
        $conn->AddParam(":firstname", $user->firstname);
        $conn->AddParam(":email", $user->email);
        $conn->AddParam(":image", $user->image);
        $conn->AddParam(":refid", $user->id);
        $id = $conn->Update();

        //var_dump($id);

        return $id;
    }
}