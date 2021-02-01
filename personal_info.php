<?php
require_once("address_book.php");

class personal_info extends addressBook
{
    protected string $f_name;
    protected string $l_name;
    protected string $gender;
    protected string $Birth_date;
    protected int $phone;
    protected string $email;
    
    public function getFirstName()
    {
        return $this->f_name;
    }

    public function setFirstName(string $first_name)
    {
        $this->f_name = $first_name;
    }

    public function getLastName()
    {
        return $this->l_name;
    }

    public function setLastName(string $L_name)
    {
        $this->l_name = $L_name;
    }
    public function getGender()
    {
        return $this->gender;
    }
    public function setGender(string $gender)
    {
        $this->gender=$gender;
    }
    public function getBirthDate()
    {
        return $this->Birth_date;
    }
    public function setBirthDate(string $Birth_date)
    {
        $this->Birth_date=$Birth_date;
    }
    public function setPhone(int $phone)
    {
        $this->phone=$phone;
    }
    public function getPhone()
    {
        return $this->phone;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail(string $email)
    {
        $this->email=$email;
    }
}

?>