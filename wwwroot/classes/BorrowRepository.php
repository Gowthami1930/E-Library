<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 9/29/2015
 * Time: 10:48 AM
 */

class BorrowRepository {


    public function CreateBorrow(User $user)
    {
        if($this->IsEmailExist($user->email))
        {
            return 0;
        }

        $ut = new Utility();

        $sql = "INSERT INTO borrows (user_id, book_id, approver_id, statusflag, date_requested, date_approved, date_collected, date_expected, date_returned)  VALUES ( :user_id, :book_id, :approver_id, :statusflag, :date_requested, :date_approved, :date_collected, :date_expected, :date_returned) ";
        $cn = new Connect();
        $cn->SetSQL($sql);
        $cn->AddParam(':user_id', $borrow->user_id);
        $cn->AddParam(':book_id', $borrow->book_id);
        $cn->AddParam(':approver_id', $borrow->approver_id);
        $cn->AddParam(':statusflag', $borrow->statusflag);
        $cn->AddParam(':date_requested', $borrow->date_requested); //ut->datedb()
        $cn->AddParam(':date_approved', $borrow->date_approved);
        $cn->AddParam(':date_collected', $borrow->date_collected);
        $cn->AddParam(':date_expected', $borrow->date_expected);
        $cn->AddParam(':date_returned', $borrow->date_returned);
        $cn->AddParam(':id', $borrow->id);

        $id = $conn->Insert();

        return $id;
    }

    public function GetBorrowID($borrow_id)
    {
        $sql = "select * from users where id = :borrow_id";
        $conn = new Connect();
        $conn->SetSQL($sql);
        $conn->AddParam(":borrow_id", $borrow_id);
        $row = $conn->Select();
        if($conn->num_rows <= 0) return null;
        $user = new User();
        $user->Set($row[0]);
        return $borrow;
    }

    public function GetAllBorrowed()
    {
        $sql = "Select * from borrows";
        $conn = new Connect();
        $conn->SetSQL($sql);
        $rows = $conn->Select();
        if($conn->num_rows <= 0) return null;

        $borrowed_books = array();
        for($i = 0; $i < count($rows); $i++)
        {
            $book = new Book();
            $book->Set($rows[$i]);
            $borrowed_books[] = $book;
        }
        return $borrowed_books;
    }

    public function GetDateRequested($date_requested)
    {
        $sql = "select * from borrows WHERE date_requested = :date_requested";
        $conn = new Connect();
        $conn->SetSQL($sql);
        $conn->AddParam(":date_requested", $date_requested);
        $row = $conn->Select();
        if($conn->num_rows <= 0) return null;
        $user = new User();
        $user->Set($row[0]);
        return $borrow;
    }

    public function GetDateApproved($date_approved)
    {
        $sql = "select * from borrows WHERE date_approved = :date_approved";
        $conn = new Connect();
        $conn->SetSQL($sql);
        $conn->AddParam(":date_approved", $date_approved);
        $row = $conn->Select();
        if($conn->num_rows <= 0) return null;
        $user = new User();
        $user->Set($row[0]);
        return $borrow;
    }

    public function GetDateCollected($date_collected)
    {
        $sql = "select * from borrows WHERE date_collected = :date_collected";
        $conn = new Connect();
        $conn->SetSQL($sql);
        $conn->AddParam(":date_collected", $date_collected);
        $row = $conn->Select();
        if($conn->num_rows <= 0) return null;
        $user = new User();
        $user->Set($row[0]);
        return $borrow;
    }

    public function GetDateExpected($date_expected)
    {
        $sql = "select * from borrows WHERE date_expected = :date_expected";
        $conn = new Connect();
        $conn->SetSQL($sql);
        $conn->AddParam(":date_expected", $date_expected);
        $row = $conn->Select();
        if($conn->num_rows <= 0) return null;
        $user = new User();
        $user->Set($row[0]);
        return $borrow;
    }

    public function GetDateReturned($date_returned)
    {
        $sql = "select * from borrows WHERE date_returned = :date_returned";
        $conn = new Connect();
        $conn->SetSQL($sql);
        $conn->AddParam(":date_returned", $date_returned);
        $row = $conn->Select();
        if($conn->num_rows <= 0) return null;
        $user = new User();
        $user->Set($row[0]);
        return $borrow;
    }
}