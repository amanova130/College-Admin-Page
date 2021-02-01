<?php
require_once ("personal_info.php");
require_once ("groups.php");
require_once ("dbClass.php");
require_once ("students.php");
require_once ("header.php");
require_once ("faculty.php");


function getCount($className)
{
/**getCount()-is resposible to count row of given table
 * @param: $className - it is name of class and laso name of table into DB
 * @retrun: $result - int, number of rows 
 */
    $db = dbClass::GetInstance();
    $result= $db->getCount($className,"SELECT count('id') as count from $className");
    return $result;
}

function selectGroup($items, $selected=0)
{
/**selectGroup()-is resposible to fill select box in HTML template
 * @param: $items - object of Groups which we need to display in select box 
 * @param: $selected - index of items
 * @retrun:$text - items to select.
 */
    $text = "";

    foreach ($items as $k=>$v)
    {
        if ($k === $selected)
            $ch = " selected";
        else
            $ch = "";
            $value=$v->getGroupNumber();
        $text .= "<option$ch value='$value'>$value</option>\n";
    }
    return $text;
}

function selectFaculty($items, $selected=0)
{
/**selectFaculty()-is resposible to fill select box in HTML template
 * @param: $items - object of Faculties which we need to display in select box 
 * @param: $selected - index of items
 * @retrun:$text - items to select.
 */
    foreach ($items as $k=>$v)
    {
        if ($k === $selected)
            $ch = " selected";
        else
            $ch = "";
            $Facname=$v->getFacName();
            
        $text .= "<option$ch value='$Facname'>$Facname</option>\n";
       
    }
    return $text;
}
function flashMessage($isQueryPass, $fileLocation)
{
/**flashMessage()- function to display an popup message, check if query is pass
 * @param: $isQueryPass - response from DB
 */
    if($isQueryPass)
    {
        $_SESSION['status']="Successfully done";
        $_SESSION['status_code']="success";
        header("Location: $fileLocation");
    }
    else 
    {
        $_SESSION['status']="Some error occurs";
        $_SESSION['status_code']="error";
        header("Location: $fileLocation");
    }

}
?>