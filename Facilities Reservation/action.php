<?php 
require('Database.php');
$db = new DataManager();
$connect = $db->Connection();

$input = filter_input_array(INPUT_POST);

$reqname = mysqli_real_escape_string($connect, $input["REQNAME"]);
$reqplace = mysqli_real_escape_string($connect, $input["REQPLACE"]);
$startdate = mysqli_real_escape_string($connect, $input["STARTDATE"]);
$enddate = mysqli_real_escape_string($connect, $input["ENDDATE"]);
$phone = mysqli_real_escape_string($connect, $input["PHONE"]);
$purpose = mysqli_real_escape_string($connect, $input["PURPOSE"]);
$status = mysqli_real_escape_string($connect, $input["STATUS"]);

if($input["action"] === 'edit'){
    $query = "UPDATE Reserve SET 
    REQNAME = '".$reqname."',
    REQPLACE = '".$reqplace."',
    STARTDATE = '".$startdate."',
    ENDDATE = '".$enddate."',
    PHONE = '".$phone."',
    PURPOSE = '".$purpose."',
    STATUS = '".$status."'
    WHERE ID = '".$input["ID"]."'
    ";
    mysqli_query($connect, $query);
}
if($input["action"] === 'delete'){
    $query ="DELETE FROM Reserve
    WHERE ID = '".$input["ID"]."'
    ";
    mysqli_query($connect, $query);
}

echo json_encode($input);

?>