
<?php
class addressBook
{
protected int $add_id;
protected string $address;
protected string $city;
protected int $zip_code;


public function getAddId()
{
    return $this->add_id;
}
public function setAddId(int $addId)
{
    $this->add_id=$addId;
}


public function getCityName()
{
    return $this->city;
}

public function setCityName(string $city)
{
    $this->city = $city;
}

public function setAddress(string $address)
{
   $this->address=$address;

}

public function getAddress()
{
    return $this->address;
    
}

public function getZipCode()
{
  return $this->zip_code;
}

public function setZipCode(int $zip_code)
{
    $this->zip_code=$zip_code;
}

}
?>