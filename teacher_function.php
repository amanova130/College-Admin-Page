<?php
 require_once("personal_info.php");
 require_once("groups.php");
 require_once("teachers.php");
 require_once("dbClass.php");
 require_once("students.php");
 require_once("additional_functions.php");
 //require_once("header.php");
 $newTeacher= new teachers();
 $db = dbClass::GetInstance();


function getTeacherDetails()
{
     /**getTeacherDetails()-function returns the data from specific table in DB
    * @return:$result - returns array of object.
    */
     $db = dbClass::GetInstance();
                $result=$db->getDetails('teachers', "SELECT t.*, a.*
                FROM teachers t inner join address_book a
             on t.add_id=a.add_id;");
             return $result;
}


if(isset($_POST['submit']))
{
    if($_POST['type']!=3)
    {
        $newTeacher->setId($_POST['id']);
        $newTeacher->setFirstName($_POST['fname']);
        $newTeacher->setLastName($_POST['lname']);
        $newTeacher->setEmail($_POST['email']);
        $newTeacher->setPhone($_POST['phone']);
        $newTeacher->setGender($_POST['gender']);
        $newTeacher->setBirthDate($_POST['bdate']);
        $newTeacher->setAddId($_POST['addId']);
        $newTeacher->setCityName($_POST['city']);
        $newTeacher->setAddress($_POST['address']);
        $newTeacher->setZipCode($_POST['zipcode']);
        
        //Add new teacher
        if($_POST['type']==1)
        {
            $addAdr=$db->addDetails("INSERT INTO address_book VALUES(:addId,:address,:city,:zip_code )", [':addId'=>$newTeacher->getAddId(),":address"=>$newTeacher->getAddress(),':city'=>$newTeacher->getCityName()
            ,':zip_code'=>$newTeacher->getZipCode()]);
            $Info=$db->addDetails("INSERT INTO teachers VALUES(:id,:f_name,:l_name,:email,:phone,:gender,:Birth_date,:addId)", [':id'=>$newTeacher->getId(),':f_name'=>$newTeacher->getFirstName(),':l_name'=>$newTeacher->getLastName()
            ,':email'=>$newTeacher->getEmail(),':phone'=>$newTeacher->getPhone(),':gender'=>$newTeacher->getGender()
            ,':Birth_date'=>$newTeacher->getBirthDate(),':addId'=>$newTeacher->getAddId()]);
        }

        // Edit a teacher details
        else if($_POST['type']==2)
        {
            $editAdd=$db->updateDetail("UPDATE address_book SET address = :address, city = :city, zip_code = :zip_code WHERE address_book.add_id =:addId", [':addId'=>$newTeacher->getAddId(),":address"=>$newTeacher->getAddress(),':city'=>$newTeacher->getCityName()
            ,':zip_code'=>$newTeacher->getZipCode()]);
            
            $Info=$db->updateDetail("UPDATE teachers SET f_name = :f_name, l_name = :l_name, email = :email, phone = :phone, gender = :gender, Birth_date = :Birth_date WHERE teachers.id = :id;
            ", [':id'=>$newTeacher->getId(),':f_name'=>$newTeacher->getFirstName(),':l_name'=>$newTeacher->getLastName()
            ,':email'=>$newTeacher->getEmail(),':phone'=>$newTeacher->getPhone(),':gender'=>$newTeacher->getGender()
            ,':Birth_date'=>$newTeacher->getBirthDate()]);
        }
    }

    // Delete record by id
    else       
    {
        $newTeacher->setId($_POST['id']);
        $newTeacher->setAddId($_POST['addressId']);
        $Info=$db->deleteDetails("teachers",$newTeacher->getId(),"id");
        $db->deleteDetails('address_book',$newTeacher->getAddId(),"add_id");
        
    }

    //Function to pop up alert message, can be found at 'addidtional_function.php' 
    flashMessage($Info, "teachers_view.php");
}

 

 ?>