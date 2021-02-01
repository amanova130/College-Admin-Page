<?php
require_once "faculty.php";

class groups
{
    private int $group_id;
    private int $Num_group;
    private int $Num_of_student;
    private int $semester;
    private int $Academic_year;


public function getId()
{
    return $this->group_id;
}
public function setId(int $id)
{
    $this->group_id=$id;
}
public function getGroupNumber()
     {
        return $this->Num_group;
     }
 public function setGroupNumber(int $Num_group)
{
    $this->Num_group=$Num_group;
}

public function getNumOfStudents()
     {
        return $this->Num_of_student;
     }
 public function setNumOfStudents(int $Num_of_student)
{
    $this->Num_of_student=$Num_of_student;
}

public function getSemester()
     {
        return $this->semester;
     }
 public function setSemester(int $semester)
{
    $this->semester=$semester;
}
public function getAcademic_year()
     {
        return $this->Academic_year;
     }
 public function setAcademic_year(int $Academic_year)
{
    $this->Academic_year=$Academic_year;
}
}
?>