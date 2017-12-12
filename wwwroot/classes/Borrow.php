<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 9/29/2015
 * Time: 10:36 AM
 */

class Borrow {
    var $id;
    var $user_id;
    var $book_id;
    var $approver_id;
    var $statusflag;
    var $date_requested;
    var $date_approved;
    var $date_collected;
    var $date_expected;
    var $date_returned;


    function __construct()
    {
        $this->id = '';
        $this->user_id = '';
        $this->book_id = '';
        $this->approver_id = '';
        $this->statusflag = '';
        $this->date_requested = '';
        $this->date_approved = '';
        $this->date_collected = '';
        $this->date_expected = '';
        $this->date_returned = '';
    }

    /*function Load()
    {
        $sql = "SELECT id, user_id, book_id, approver_id, statusflag, date_requested, date_approved, date_collected, date_expected, date_returned FROM borrows WHERE id = :id";
        $cn = new Connect();
        $cn->SetSQL($sql);
        $cn->AddParam(':id', $this->id);

        $ds = $cn->Select();
        $this->id = 0;
        if($cn->num_rows > 0)
        {
            $this->Set($ds[0]);
        }
    }*/

    function Set($row)
    {
        $this->id = $row['id'];
        $this->user_id = $row['user_id'];
        $this->book_id = $row['book_id'];
        $this->approver_id = $row['approver_id'];
        $this->statusflag = $row['statusflag'];
        $this->date_requested = $row['date_requested'];
        $this->date_approved = $row['date_approved'];
        $this->date_collected = $row['date_collected'];
        $this->date_expected = $row['date_expected'];
        $this->date_returned = $row['date_returned'];
    }

}