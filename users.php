<?php

class Users 
{
   private int $user_id;
   private string $user_name;
   private string $password;

   
    public function getUserId()
    {
        return $this->user_id;
    }
        
    public function setUserId(int $userId)
    {
        $this->user_id=$userId;
    }
        
    public function getUserName()
    {
        return $this->user_name;
    }
        
    public function setUserName(int $user_name)
    {
        $this->user_name=$user_name;
    }

    public function getPwd()
    {
        return $this->password;
    }
            
    public function setPwd(int $password)
    {
        $this->password=$password;
    }  
        
   
}