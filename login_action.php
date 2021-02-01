<?php
require_once("dbClass.php");
require_once("users.php");
    session_start();
    $errorMsg='';
if(isset($_POST['submit']))
{
   $user_name=$_POST["user_name"];
   $password=$_POST["password"];
   $row= new Users();
    $db = dbClass::GetInstance();
    if($user_name != "" && $password != "")
    {
        $row=$db->getDetails('users',"SELECT * FROM user where user_name = '" .$user_name ."' and password ='". $password."'");
            
        if($row!=NULL)
        {
            $_SESSION["ID"] = $row[0]->getUserId();
            $_SESSION["Password"]=$row[0]->getPwd();
            $_SESSION["User_Name"]=$row[0]->getUserName();
            header("Location: home.php"); 
        }
        else
            $errorMsg="Login failed, user name or password is invalid!";
        
    }
    
}
?> 