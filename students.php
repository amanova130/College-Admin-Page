<?php
require_once("personal_info.php");
require_once("groups.php");

class students extends personal_info
{
   protected int $id;
   protected int $group_id;

   
 public function getId()
     {
         return $this->id;
     }
	 
 public function setId(int $id)
     {
         $this->id=$id;
     }
     
     public function getGroupId()
     {
         return $this->group_id;
     }
	 
 public function setGroupId(int $group_id)
     {
         $this->group_id=$group_id;
     }
    
     
   
}
?>