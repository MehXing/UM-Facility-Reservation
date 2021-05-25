<?php
class DataManager{
    private $serverName = "localhost";
    private $username = "root";
    private $password = "";
    private $databaseName = "UMReserve"; 

    private $connection;
    private $errorMessage;
    
    private $idNumArr = [];
    private $passArr = [];

    public function __construct()
    {
        @$this->connection = mysqli_connect($this->serverName, $this->username, $this->password);

        if(!$this->connection)
        {
            $this->errorMessage='Connection failed : ' . mysqli_connect_error();
            die($this->errorMessage);
        }
        else
        {
            $isConnected = mysqli_select_db($this->connection, $this->databaseName);

            if(!$isConnected)
            {
                $sqlQuery = "CREATE DATABASE " . $this->databaseName;
                if(mysqli_query($this->connection, $sqlQuery))
                    return 'Database Created';
                else
                {
                    $this->errorMessage = mysqli_error($this->connection);
                    return  $this->errorMessage;
                }
            }
        }
    }
    public static function get()
    {
        return new self;
    }
    public function Connection()
    {
        return $this->connection;
    }
    public function createTableAdmin()
    {
        $sqlQuery = "CREATE TABLE IF NOT EXISTS Admin(
            ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            FIRSTNAME VARCHAR(100) NOT NULL,
            MIDDLENAME VARCHAR(100) NOT NULL,
            LASTNAME VARCHAR(100) NOT NULL,
            ADDRESS VARCHAR(100) NOT NULL,
            PHONE VARCHAR(11) NOT NULL,
            EMAIL VARCHAR(100) NOT NULL,
            ADMIN_ID VARCHAR(100) UNIQUE NOT NULL,
            PASSWORD VARCHAR(100) NOT NULL)";
            if(mysqli_query($this->connection,$sqlQuery)){
                
            } else {
                echo "Table creation error: " . mysqli_error($this->connection);
            }
    }
    public function insertDataAdmin($fname, $mName, $lName, $address, $phone, $email, $idNum, $password){
        $sqlQuery = "INSERT INTO Admin(FIRSTNAME,MIDDLENAME,LASTNAME,ADDRESS,PHONE,EMAIL,ADMIN_ID,PASSWORD)
            VALUES ('".$fname."','". $mName."', '".$lName."', '".$address."', '".$phone."', '".$email."', '".$idNum."', '".$password."')";
        if(mysqli_query($this->connection,$sqlQuery)){
            echo '<div class="alert alert-success fixed-top" style="margin-top:90px">';
            echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
            echo '<strong>Success!</strong> Admin Account created Successfully!';
            echo '</div>';
        } else {
            echo '<div class="alert alert-danger fixed-top" style="margin-top:90px">';
            echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
            echo '<strong>Error!</strong> ' . mysqli_error($this->connection);
            echo '</div>';
        }
    }
    
    public function createTableStudent()
    {
        $sqlQuery = "CREATE TABLE IF NOT EXISTS Student(
            ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            FIRSTNAME VARCHAR(100) NOT NULL,
            MIDDLENAME VARCHAR(100) NOT NULL,
            LASTNAME VARCHAR(100) NOT NULL,
            ADDRESS VARCHAR(100) NOT NULL,
            PHONE VARCHAR(11) NOT NULL,
            EMAIL VARCHAR(100) NOT NULL,
            STUDENT_ID VARCHAR(100) UNIQUE NOT NULL,
            PASSWORD VARCHAR(100) NOT NULL,
            YEAR VARCHAR(100) NOT NULL,
            COURSE VARCHAR(100) NOT NULL)";
            if(mysqli_query($this->connection,$sqlQuery)){
            } else {
                echo "Table creation error: " . mysqli_error($this->connection);
            }
    }
    public function insertDataStudent($fname, $mName, $lName, $address, $phone, $email, $idNum, $password, $year, $course){
        $sqlQuery = "INSERT INTO Student(FIRSTNAME,MIDDLENAME,LASTNAME,ADDRESS,PHONE,EMAIL,STUDENT_ID,PASSWORD,YEAR,COURSE)
            VALUES ('".$fname."','". $mName."', '".$lName."', '".$address."', '".$phone."', '".$email."', '".$idNum."', '".$password."', '".$year."', '".$course."')";
        if(mysqli_query($this->connection,$sqlQuery)){
            echo '<div class="alert alert-success fixed-top" style="margin-top:90px">';
            echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
            echo '<strong>Success!</strong> Student Account created Successfully!';
            echo '</div>';
             
        } else {
            echo '<div class="alert alert-danger fixed-top" style="margin-top:90px">';
            echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
            echo '<strong>Error!</strong> ' . mysqli_error($this->connection);
            echo '</div>';
        }
    }
    public function createTableFaculty()
    {
        $sqlQuery = "CREATE TABLE IF NOT EXISTS Faculty(
            ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            FACULTYNAME VARCHAR(100) NOT NULL,
            ADDRESS VARCHAR(100) NOT NULL,
            PHONE VARCHAR(11) NOT NULL,
            EMAIL VARCHAR(100) NOT NULL,
            FACULTY_ID VARCHAR(100) UNIQUE NOT NULL,
            PASSWORD VARCHAR(100) NOT NULL)";
            if(mysqli_query($this->connection,$sqlQuery)){
            } else {
                echo "Table creation error: " . mysqli_error($this->connection);
            }
    }
    public function insertDataFaculty($fname, $address, $phone, $email, $idNum, $password){
        $sqlQuery = "INSERT INTO Faculty(FACULTYNAME,ADDRESS,PHONE,EMAIL,FACULTY_ID,PASSWORD)
            VALUES ('".$fname."', '".$address."', '".$phone."', '".$email."', '".$idNum."', '".$password."')";
        if(mysqli_query($this->connection,$sqlQuery)){
            echo '<div class="alert alert-success fixed-top" style="margin-top:90px">';
            echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
            echo '<strong>Success!</strong> Faculty Account created Successfully!';
            echo '</div>';
             
        } else {
            echo '<div class="alert alert-danger fixed-top" style="margin-top:90px">';
            echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
            echo '<strong>Error!</strong> ' . mysqli_error($this->connection);
            echo '</div>';
        }
    }

    private $fNameArr = [];
    private $mNameArr = [];
    private $lNameArr = [];
    private $addressArr = [];
    private $phoneArr = [];
    private $emailArr = [];
    private $idNumberArr = [];
    private $passwordArr = [];
    private $yearArr = [];
    private $courseArr = [];

    public function indiSearchAdmin($criteria,$value){
        $sqlQuery = "SELECT * FROM Admin WHERE $criteria = '$value'";
        $result = mysqli_query($this->connection, $sqlQuery);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result))
            {
                $this->fNameArr[] = $row['FIRSTNAME'];
                $this->mNameArr[] = $row['MIDDLENAME'];
                $this->lNameArr[] = $row["LASTNAME"];
                $this->addressArr[] = $row["ADDRESS"];
                $this->phoneArr[] = $row['PHONE'];
                $this->emailArr[] = $row["EMAIL"];
                $this->idNumberArr[] = $row['ADMIN_ID'];
                $this->passwordArr[] = $row['PASSWORD'];
            }
        }
    }
    public function indiSearchStudent($criteria,$value){
        $sqlQuery = "SELECT * FROM Student WHERE $criteria = '$value'";
        $result = mysqli_query($this->connection, $sqlQuery);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result))
            {
                $this->fNameArr[] = $row['FIRSTNAME'];
                $this->mNameArr[] = $row['MIDDLENAME'];
                $this->lNameArr[] = $row["LASTNAME"];
                $this->addressArr[] = $row["ADDRESS"];
                $this->phoneArr[] = $row['PHONE'];
                $this->emailArr[] = $row["EMAIL"];
                $this->idNumberArr[] = $row['STUDENT_ID'];
                $this->passwordArr[] = $row['PASSWORD'];
                $this->yearArr[] = $row["YEAR"];
                $this->courseArr[] = $row["COURSE"];
            }
        }
    }
    public function indiSearchFaculty($criteria,$value){
        $sqlQuery = "SELECT * FROM Admin WHERE $criteria = '$value'";
        $result = mysqli_query($this->connection, $sqlQuery);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result))
            {
                $this->fNameArr[] = $row['FACULTYNAME'];
                $this->addressArr[] = $row["ADDRESS"];
                $this->phoneArr[] = $row['PHONE'];
                $this->emailArr[] = $row["EMAIL"];
                $this->idNumberArr[] = $row['FACULTY_ID'];
                $this->passwordArr[] = $row['PASSWORD'];
            }
        }
    }
    public function getFName(){
        return $this->fNameArr;
    }
    public function getMName(){
        return $this->mNameArr;
    }
    public function getLName(){
        return $this->lNameArr;
    }
    public function getAddress(){
        return $this->addressArr;
    }
    public function getPhone(){
        return $this->phoneArr;
    }
    public function getEmail(){
        return $this->emailArr;
    }
    public function getIDNumber(){
        return $this->idNumberArr;
    }
    public function getPassword(){
        return $this->passwordArr;
    }
    public function getYear(){
        return $this->yearArr();
    }
    public function getCourse(){
        return $this->courseArr;
    }

    public function createTableReserve()
    {
        $sqlQuery = "CREATE TABLE IF NOT EXISTS Reserve(
            ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            REQNAME VARCHAR(100) NOT NULL,
            REQPLACE VARCHAR(100) NOT NULL,
            STARTDATE DATE NOT NULL,
            ENDDATE DATE NOT NULL,
            PHONE VARCHAR(11) NOT NULL,
            PURPOSE VARCHAR(100) NOT NULL,
            STATUS VARCHAR(50) NOT NULL)";
            if(mysqli_query($this->connection,$sqlQuery)){
            } else {
                echo "Table creation error: " . mysqli_error($this->connection);
            }
    }
    public function insertDataReserve($fname, $resFaci, $sDate, $eDate, $phone, $purpose, $status){
        $sqlQuery = "INSERT INTO Reserve(REQNAME,REQPLACE,STARTDATE,ENDDATE,PHONE,PURPOSE,STATUS)
            VALUES ('".$fname."', '".$resFaci."', '".$sDate."', '".$eDate."', '".$phone."', '".$purpose."','".$status."')";
        if(mysqli_query($this->connection,$sqlQuery)){
            echo '<div class="alert alert-success" style="margin-top:-10px">';
            echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
            echo '<strong>Success!</strong> Reservation Form Successfully Submitted!';
            echo '</div>';
        } else {
            echo '<div class="alert alert-danger" style="margin-top:-10px">';
            echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
            echo '<strong>Error!</strong> ' . mysqli_error($this->connection);
            echo '</div>';
        }
    }
    public function fetchDataAdmin(){
        $query = "Select * from Admin";
        $result = mysqli_query($this->connection, $query);
        echo "<br>";
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result))
            {
                $this->idNumArr[] = $row['ADMIN_ID'];
                $this->passArr[] = $row["PASSWORD"];
            }
        }
    }
    public function getIDAdmin(){
        $this->fetchDataAdmin();
        return $this->idNumArr;
    }
    public function getPassAdmin(){
        $this->fetchDataAdmin();
        return $this->passArr;
    }
    public function fetchDataStudent(){
        $query = "Select * from Student";
        $result = mysqli_query($this->connection, $query);
        echo "<br>";
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result))
            {
                $this->idNumArr[] = $row['STUDENT_ID'];
                $this->passArr[] = $row["PASSWORD"];
            }
        }
    }
    public function getIDStudent(){
        $this->fetchDataStudent();
        return $this->idNumArr;
    }
    public function getPassStudent(){
        $this->fetchDataStudent();
        return $this->passArr;
    }
    public function fetchDataFaculty(){
        $query = "Select * from Faculty";
        $result = mysqli_query($this->connection, $query);
        echo "<br>";
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result))
            {
                $this->idNumArr[] = $row['FACULTY_ID'];
                $this->passArr[] = $row["PASSWORD"];
            }
        }
    }
    public function getIDFaculty(){
        $this->fetchDataFaculty();
        return $this->idNumArr;
    }
    public function getPassFaculty(){
        $this->fetchDataFaculty();
        return $this->passArr;
    }

    private $IDArr = [];
    private $reqNameArr = [];
    private $reqPlaceArr = [];
    private $startDateArr = [];
    private $endDateArr = [];
    private $mobileArr = [];
    private $purposeArr = [];
    private $statusArr = [];

    public function indiSearch($criteria,$value){
        $sqlQuery = "SELECT * FROM Reserve WHERE $criteria = '$value'";
        $result = mysqli_query($this->connection, $sqlQuery);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result))
            {
                $this->IDArr[] = $row['ID'];
                $this->reqNameArr[] = $row['REQNAME'];
                $this->reqPlaceArr[] = $row["REQPLACE"];
                $this->startDateArr[] = $row["STARTDATE"];
                $this->endDateArr[] = $row['ENDDATE'];
                $this->mobileArr[] = $row["PHONE"];
                $this->purposeArr[] = $row['PURPOSE'];
                $this->statusArr[] = $row['STATUS'];
            }
        }
    }
    public function getID(){
        return $this->IDArr;
    }
    public function getReqName(){
        return $this->reqNameArr;
    }
    public function getReqPlace(){
        return $this->reqPlaceArr;
    }
    public function getStartDate(){
        return $this->startDateArr;
    }
    public function getEndDate(){
        return $this->endDateArr;
    }
    public function getMobile(){
        return $this->mobileArr;
    }
    public function getPurpose(){
        return $this->purposeArr;
    }
    public function getStatus(){
        return $this->statusArr;
    }
}
?>