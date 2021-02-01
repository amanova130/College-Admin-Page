<?php
require_once("personal_info.php");

class teachers extends personal_info
{
   protected int $id;
   
   
     public function getId()
     {
         return $this->id;
     }
     public function setId(int $id)
     {
         $this->id=$id;
     }
   
   
}
?>