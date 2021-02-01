<?php
require_once("personal_info.php");
 require_once("groups.php");
 require_once("dbClass.php");
 require_once("students.php");
 require_once("faculty.php");
 require_once("additional_functions.php");

 $newStudent=new students();
 $db = dbClass::GetInstance();
 $groups=$db->getDetails('groups', "SELECT * FROM groups");
 

function getStudentDetails()
{
   /**getTeacherDetails()-function returns the data from specific table in DB
    * @return:$result - returns array of object.
    */
    $db = dbClass::GetInstance();
    $result=$db->getDetails('students', "SELECT s.*, g.*, a.*
    FROM students s inner join groups g inner join address_book a
     on s.group_id=g.group_id and s.add_id=a.add_id;");
     return $result;
}


if(isset($_POST['submit']))
{
    if($_POST['type']!=3)
    {
        $newStudent->setId($_POST['id']);
        $newStudent->setFirstName($_POST['fname']);
        $newStudent->setLastName($_POST['lname']);
        $newStudent->setEmail($_POST['email']);
        $newStudent->setPhone($_POST['phone']);
        $newStudent->setGender($_POST['gender']);
        $newStudent->setBirthDate($_POST['bdate']);
        $newStudent->setAddId($_POST['addId']);
        $newStudent->setCityName($_POST['city']);
        $newStudent->setAddress($_POST['address']);
        $newStudent->setZipCode($_POST['zipcode']);
        $groupNumber=$_POST['group'];
    
        foreach($groups as $k=>$v)
        {
            if($v->getGroupNumber() == $groupNumber)
            {
                $groupId=$v->getId();
                break;
            }
        }
          //Add a new student
          if($_POST['type']==1)
          {
            $addAdr=$db->addDetails("INSERT INTO address_book VALUES(:addId,:address,:city,:zip_code )", [':addId'=>$newStudent->getAddId(),":address"=>$newStudent->getAddress(),':city'=>$newStudent->getCityName()
            ,':zip_code'=>$newStudent->getZipCode()]);
            $Info=$db->addDetails("INSERT INTO students VALUES(:id,:f_name,:l_name,:email,:phone,:gender,:Birth_date, :addId, :groupId)", [':id'=>$newStudent->getId(),':f_name'=>$newStudent->getFirstName(),':l_name'=>$newStudent->getLastName()
            ,':email'=>$newStudent->getEmail(),':phone'=>$newStudent->getPhone(),':gender'=>$newStudent->getGender()
            ,':Birth_date'=>$newStudent->getBirthDate(), ':groupId'=>$groupId, ':addId'=>$newStudent->getAddId()]);

            if($Info==NULL)
            {
              $db->deleteDetails('address_book',$newStudent->getAddId(),"add_id");
            }
          }
          // Edit student details
          else if($_POST['type']==2)
          {
            $editAdd=$db->updateDetail("UPDATE address_book SET address = :address, city = :city, zip_code = :zip_code WHERE address_book.add_id =:addId", [':addId'=>$newStudent->getAddId(),":address"=>$newStudent->getAddress(),':city'=>$newStudent->getCityName()
            ,':zip_code'=>$newStudent->getZipCode()]);
            $Info=$db->updateDetail("UPDATE students SET f_name = :f_name, l_name = :l_name, email = :email, phone = :phone, gender = :gender, Birth_date = :Birth_date, group_id=:groupId, add_id=:addId WHERE students.id = :id;
            ",[':id'=>$newStudent->getId(),':f_name'=>$newStudent->getFirstName(),':l_name'=>$newStudent->getLastName()
            ,':email'=>$newStudent->getEmail(),':phone'=>$newStudent->getPhone(),':gender'=>$newStudent->getGender()
            ,':Birth_date'=>$newStudent->getBirthDate(),':addId'=>$newStudent->getAddId(),':groupId'=>$groupId]);
          }
          
    }
    //Delete student by id
    else       
    {
        $newStudent->setId($_POST['id']);
        $newStudent->setAddId($_POST['addressId']);
        $Info=$db->deleteDetails("students",$newStudent->getId(),"id");
        $db->deleteDetails('address_book',$newStudent->getAddId(),"add_id");
    }
    //Function to pop up alert message, can be found at 'addidtional_function.php'
    flashMessage($Info, "students_view.php");
 

}