<?php
require_once "groups.php";
class faculty
{
    protected int $fac_id;
    protected string $Fac_name;
  

public function getFacId()
{
    return $this->fac_id;
}
public function setFacId(int $id)
{
    $this->fac_id=$id;
}
public function getFacName()
     {
        return $this->Fac_name;
     }
 public function setFacName(int $Fac_name)
{
    $this->Fac_name=$Fac_name;
}
}
?>