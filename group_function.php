<?php
 require_once("personal_info.php");
 require_once("groups.php");
 require_once("dbClass.php");
 require_once("students.php");
 //require_once("header.php");
 require_once("faculty.php");
 require_once("additional_functions.php");
 
 $newGroup= new groups();
 $db = dbClass::GetInstance();
 $faculties=$db->getDetails('faculty', "SELECT * FROM faculty");

   
function getGroupDetails()
{
     /**getGroupDetails()-function returns the data from specific table in DB
    * @return:$result - returns array of object.
    */
    $db = dbClass::GetInstance();
    $result=$db->getDetails('groups', "SELECT g.*, f.* 
    FROM groups g inner join faculty f on g.Fac_id=f.fac_id");
    return $result;
}



if(isset($_POST['submit']))
{  
    if($_POST['type']!=3)
    {
        $newGroup->setId($_POST['id']);
        $newGroup->setGroupNumber($_POST['group']);
        $newGroup->setNumOfStudents($_POST['numStud']);
        $newGroup->setAcademic_year($_POST['ayear']);
        $newGroup->setSemester($_POST['semester']);
        $facName=$_POST['faculty'];
        foreach($faculties as $k=>$v)
        {
            if($v->getFacName() == $facName)
            {
                $facId=$v->getFacId();
                break;
            }
        }

         //Add a new group
         if($_POST['type']==1)
         {

            $result=$db->addDetails("INSERT INTO groups VALUES(:group_id,:Num_group,:Academic_year,:Num_of_student,:semester,:Fac_id)", [':group_id'=>$newGroup->getId(), ':Num_group'=>$newGroup->getGroupNumber(), ':Num_of_student'=>$newGroup->getNumOfStudents(), 
            ':semester'=>$newGroup->getSemester(), ':Academic_year'=>$newGroup->getAcademic_year(),':Fac_id'=>$facId]);   
         }
         // Edit a group details
        else if($_POST['type']==2)
        {
            $result=$db->addDetails("UPDATE groups SET Num_group = :Num_group, Academic_year = :Academic_year, Num_of_student = :Num_of_student, semester= :semester, Fac_id=:Fac_id WHERE group_id = :group_id" , [':group_id'=>$newGroup->getId(), ':Num_group'=>$newGroup->getGroupNumber(), ':Num_of_student'=>$newGroup->getNumOfStudents(), 
            ':semester'=>$newGroup->getSemester(), ':Academic_year'=>$newGroup->getAcademic_year(),':Fac_id'=>$facId]);   
        }
    }
    else
    {
        $newGroup->setId($_POST['gid']);
        $result=$db->deleteDetails('groups', $newGroup->getId(), 'group_id'); 
    }
   
    // Functions to fecth data from selected row
    flashMessage($result, "groups_view.php");

}


 
 
 ?>