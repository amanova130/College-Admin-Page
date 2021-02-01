<?php
 require_once ("personal_info.php");
 require_once ("groups.php");
 require_once ("teachers.php");
 require_once ("dbClass.php");
 require_once ("students.php");
if(isset($_POST['teachers']))
{
$teachers=new teachers();
$fileName="teachers.txt";
$class="teachers";
writeSelected($fileName,$teachers,$class);
}

else if(isset($_POST['students']))
{
$students=new students();
$fileName="students.txt";
$class="students";
writeSelected($fileName,$students,$class);
}
else
    writeGroup();



 function writeSelected($fileName,$persons,$class)
{
    $db = dbClass::GetInstance();
    $fp = fopen($fileName, "w");
    $persons=$db->getDetails($class,"SELECT * from $class");

    if($fp!=false)
    {
    foreach($persons as $text)
    {
    fputs($fp,"ID:".$text->getId()."\n");
    fputs($fp,"First Name:".$text->getFirstName()."\n");
    fputs($fp,"Last Name:".$text->getLastName()."\n");
    fputs($fp,"Gender:".$text->getGender()."\n");
    fputs($fp,"Birth date:".$text->getBirthDate()."\n");
    fputs($fp,"Phone:".$text->getPhone()."\n");
    fputs($fp,"Email:".$text->getEmail()."\n");
    fputs($fp,"\n");
    }
   // fputs($fp,$text->getCityName()."\n");
   // fputs($fp,$text->getAddress()."\n");
    fclose($fp);
    downloadFile($fileName);
    }	
}

function writeGroup()
{
    $db = dbClass::GetInstance();
    $fp = fopen('group.txt', "w");
    $groups=$db->getDetails('groups',"SELECT * from groups");

    if($fp!=false)
    {
    foreach($groups as $text)
    {
    fputs($fp,"ID:".$text->getId()."\n");
    fputs($fp,"Group number:".$text->getGroupNumber()."\n");
    fputs($fp,"Members number:".$text->getNumOfStudents()."\n");
    fputs($fp,"Semester:".$text->getSemester()."\n");
    fputs($fp,"Academic year:".$text->getAcademic_year()."\n");
    fputs($fp,"\n");
    }
    fclose($fp);
    downloadFile("group.txt");
    }	
}

function downloadFile($fileName)
{
    header('Content-Description: File Transfer');
    header('Content-Disposition: attachment; filename='.basename($fileName));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($fileName));
    header("Content-Type: text/plain");
    readfile($fileName); 
}

 

 
?>