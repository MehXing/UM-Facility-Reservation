<!DOCTYPE html>
<html>
    <?php include 'HeaderIn.php'; 
    $connect = $db->Connection();
    $logType = $_SESSION['logType'];
    $idNum = $_SESSION['logID'];
    $allData = [];

    if($logType == "Admin"){
        $criteria = "ADMIN_ID";
        $value = $idNum;
        $db->indiSearchAdmin($criteria, $value);

        $fNameArr = $db->getFName();
        $mNameArr = $db->getMName();
        $lNameArr = $db->getLName();
        $addressArr = $db->getAddress();
        $phoneArr = $db->getPhone();
        $emailArr = $db->getEmail();
        $idNumArr = $db->getIDNumber();
        $passArr = $db->getPassword();

        array_push($allData, $fNameArr, $mNameArr, $lNameArr, $addressArr, 
            $phoneArr, $emailArr, $idNumArr, $passArr);

    }elseif($logType == "Student"){
        $criteria = "STUDENT_ID";
        $value = $idNum;
        $db->indiSearchStudent($criteria, $value);

        $fNameArr = $db->getFName();
        $mNameArr = $db->getMName();
        $lNameArr = $db->getLName();
        $addressArr = $db->getAddress();
        $phoneArr = $db->getPhone();
        $emailArr = $db->getEmail();
        $idNumArr = $db->getIDNumber();
        $passArr = $db->getPassword();
        $yearArr = $db->getYear();
        $courseArr = $db->getCourse();

        array_push($allData, $fNameArr, $mNameArr, $lNameArr, $addressArr, 
            $phoneArr, $emailArr, $idNumArr, $passArr, $yearArr, $courseArr);

    }elseif($logType == "Faculty"){
        $criteria = "FACULTY_ID";
        $value = $idNum;
        $db->indiSearchFaculty($criteria, $value);

        $fNameArr = $db->getFName();
        $addressArr = $db->getAddress();
        $phoneArr = $db->getPhone();
        $emailArr = $db->getEmail();
        $idNumArr = $db->getIDNumber();
        $passArr = $db->getPassword();

    }
    ?>
    <body class="um-bg">
        <div class="container-fluid w-100 my-3 px-4">
            <div class="container-fluid w-75 text-center">
                <br>
                <h1 class="h1 text-um"><?php echo $logType." "; ?>Profile</h1>
                <br>
            </div>
            <div class="container-fluid w-75 mt-4 py-3 bg-white shadow-um-1 rounded">
                <form action="Profile.php" method="POST">
                    <div class="container-fluid p-3 form-group">
                        <?php 
                            if($logType == "Admin"){
                                echo '
                                <label class="input w-100 mb-3">
                                    <input class="input__field" type="text" name="fName1" value="'.$fNameArr[0].'" required/>
                                    <span class="input__label">First Name</span>
                                </label>
                                <label class="input w-100 mb-3">
                                    <input class="input__field" type="text" name="mName1" value="'.$mNameArr[0].'" required/>
                                    <span class="input__label">Middle Name</span>
                                </label>
                                <label class="input w-100 mb-3">
                                    <input class="input__field" type="text" name="lName1" value="'.$lNameArr[0].'" required/>
                                    <span class="input__label">Last Name</span>
                                </label>
                                <label class="input w-100 mb-3">
                                    <input class="input__field" type="text" name="address1" value="'.$addressArr[0].'" required/>
                                    <span class="input__label">Address</span>
                                </label>
                                <label class="input w-100 mb-3">
                                    <input class="input__field" type="number" name="phone1" value="'.$phoneArr[0].'" minLength="11" maxlength="11" id="phone"
                                        oninput="javascript: if (this.value.length == this.maxLength) this.value = this.value.slice(0, this.maxLength);" required></input>
                                    <span class="input__label">Phone Number</span>
                                </label>
                                <label class="input w-100 mb-3">
                                    <input class="input__field" type="text" name="email1" value="'.$emailArr[0].'"required/>
                                    <span class="input__label">Email</span>
                                </label>
                                <label class="input w-100 mb-3">
                                    <input class="input__field" type="text" name="idNum1" value="'.$idNumArr[0].'"required/>
                                    <span class="input__label">ID Number</span>
                                </label>
                                <label class="input w-100 mb-3">
                                    <input class="input__field" type="password" name="password1" value="'.$passArr[0].'" required/>
                                    <span class="input__label">Password</span>
                                </label>
                                <div class="container-fluid text-center mb-3">
                                    <button type="submit" class="btn-success w-25" name="Save1">Save Profile</button>
                                    <button type="submit" class="btn-danger w-25" name="Delete1">Delete Account</button>
                                </div>';
                            }elseif($logType == "Student"){
                                echo '
                                <label class="input w-100 mb-3">
                                    <input class="input__field" type="text" name="fName2" value="'.$fNameArr[0].'" required/>
                                    <span class="input__label">First Name</span>
                                </label>
                                <label class="input w-100 mb-3">
                                    <input class="input__field" type="text" name="mName2" value="'.$mNameArr[0].'" required/>
                                    <span class="input__label">Middle Name</span>
                                </label>
                                <label class="input w-100 mb-3">
                                    <input class="input__field" type="text" name="lName2" value="'.$lNameArr[0].'" required/>
                                    <span class="input__label">Last Name</span>
                                </label>
                                <label class="input w-100 mb-3">
                                    <select class="input__field" name="cYear" value="'.$yearArr[0].'" >
                                        <option>1st</option>
                                        <option>2nd</option>
                                        <option>3rd</option>
                                        <option>4th</option>
                                    </select>
                                    <span class="input__label">College Year</span>
                                </label>
                                <label class="input w-100 mb-3">
                                    <input class="input__field" name="course" value="'.$courseArr[0].'" >
                                    <span class="input__label">Course</span>
                                </label>
                                <label class="input w-100 mb-3">
                                    <input class="input__field" type="text" name="address2" value="'.$addressArr[0].'" required/>
                                    <span class="input__label">Address</span>
                                </label>
                                <label class="input w-100 mb-3">
                                    <input class="input__field" type="number" name="phone2" value="'.$phoneArr[0].'" minLength="11" maxlength="11" id="phone"
                                        oninput="javascript: if (this.value.length == this.maxLength) this.value = this.value.slice(0, this.maxLength);" required></input>
                                    <span class="input__label">Phone Number</span>
                                </label>
                                <label class="input w-100 mb-3">
                                    <input class="input__field" type="text" name="email2" value="'.$emailArr[0].'"required/>
                                    <span class="input__label">Email</span>
                                </label>
                                <label class="input w-100 mb-3">
                                    <input class="input__field" type="text" name="idNum2" value="'.$idNumArr[0].'"required/>
                                    <span class="input__label">ID Number</span>
                                </label>
                                <label class="input w-100 mb-3">
                                    <input class="input__field" type="password" name="password2" value="'.$passArr[0].'" required/>
                                    <span class="input__label">Password</span>
                                </label>
                                <div class="container-fluid text-center mb-3">
                                    <button type="submit" class="btn-success w-25" name="Save2">Save Profile</button>
                                    <button type="submit" class="btn-danger w-25" name="Delete2">Delete Account</button>
                                </div>';
                            }elseif($logType == "Faculty"){
                                echo '
                                <label class="input w-100 mb-3">
                                    <input class="input__field" type="text" name="fName3" value="'.$fNameArr[0].'" required/>
                                    <span class="input__label">First Name</span>
                                </label>
                                <label class="input w-100 mb-3">
                                    <input class="input__field" type="text" name="address3" value="'.$addressArr[0].'" required/>
                                    <span class="input__label">Address</span>
                                </label>
                                <label class="input w-100 mb-3">
                                    <input class="input__field" type="number" name="phone3" value="'.$phoneArr[0].'" minLength="11" maxlength="11" id="phone"
                                        oninput="javascript: if (this.value.length == this.maxLength) this.value = this.value.slice(0, this.maxLength);" required></input>
                                    <span class="input__label">Phone Number</span>
                                </label>
                                <label class="input w-100 mb-3">
                                    <input class="input__field" type="text" name="email3" value="'.$emailArr[0].'"required/>
                                    <span class="input__label">Email</span>
                                </label>
                                <label class="input w-100 mb-3">
                                    <input class="input__field" type="text" name="idNum3" value="'.$idNumArr[0].'"required/>
                                    <span class="input__label">ID Number</span>
                                </label>
                                <label class="input w-100 mb-3">
                                    <input class="input__field" type="password" name="password3" value="'.$passArr[0].'" required/>
                                    <span class="input__label">Password</span>
                                </label>
                                <div class="container-fluid text-center mb-3">
                                    <button type="submit" class="btn-success w-25" name="Save3">Save Profile</button>
                                    <button type="submit" class="btn-danger w-25" name="Delete3">Delete Account</button>
                                </div>';
                            }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Save1']))
{
    $fName = $_POST['fName1'];
    $mName = $_POST['mName1'];
    $lName = $_POST['lName1'];
    $address = $_POST['address1'];
    $phone = $_POST['phone1'];
    $email = $_POST['email1'];
    $idNumNew = $_POST['idNum1'];
    $pass = $_POST['password1'];

    $sqlQuery = "UPDATE Admin SET 
        FIRSTNAME='".$fName."',
        MIDDLENAME='".$mName."',
        LASTNAME='".$lName."',
        ADDRESS='".$address."',
        PHONE='".$phone."',
        EMAIL='".$email."',
        ADMIN_ID='".$idNumNew."',
        PASSWORD='".$pass."'
        WHERE ADMIN_ID='".$idNum."'";
    if(mysqli_query($connect,$sqlQuery)){
        echo '<div class="alert alert-success" style="margin-top:-10px">';
        echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
        echo '<strong>Success!</strong> Admin Account UPDATED Successfully! Reload to see changes!';
        echo '</div>';
        $_SESSION['logID'] = $idNumNew;
    } else {
        echo '<div class="alert alert-danger" style="margin-top:-10px">';
        echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
        echo '<strong>Error!</strong> ' . mysqli_error($this->connection);
        echo '</div>';
    }
}elseif($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Delete1']))
{
    $sqlQuery = "DELETE FROM Admin WHERE ADMIN_ID = '".$idNum."'";
    if(mysqli_query($connect,$sqlQuery)){
        header('Location: Logout.php');
        exit();
    }
}

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Save2']))
{
    $fName = $_POST['fName2'];
    $mName = $_POST['mName2'];
    $lName = $_POST['lName2'];
    $year = $_POST['cYear'];
    $course = $_POST['course'];
    $address = $_POST['address2'];
    $phone = $_POST['phone2'];
    $email = $_POST['email2'];
    $idNumNew = $_POST['idNum2'];
    $pass = $_POST['password2'];

    $sqlQuery = "UPDATE Student SET 
        FIRSTNAME='".$fName."',
        MIDDLENAME='".$mName."',
        LASTNAME='".$lName."',
        ADDRESS='".$address."',
        PHONE='".$phone."',
        EMAIL='".$email."',
        ADMIN_ID='".$idNumNew."',
        PASSWORD='".$pass."',
        YEAR ='".$year."',
        COURSE = '".$course."'
        WHERE STUDENT_ID='".$idNum."'";
    if(mysqli_query($connect,$sqlQuery)){
        echo '<div class="alert alert-success" style="margin-top:-10px">';
        echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
        echo '<strong>Success!</strong> Student Account UPDATED Successfully! Reload to see changes!';
        echo '</div>';
        $_SESSION['logID'] = $idNumNew;
    } else {
        echo '<div class="alert alert-danger" style="margin-top:-10px">';
        echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
        echo '<strong>Error!</strong> ' . mysqli_error($this->connection);
        echo '</div>';
    }
}elseif($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Delete2']))
{
    $sqlQuery = "DELETE FROM Student WHERE STUDENT_ID = '".$idNum."'";
    if(mysqli_query($connect,$sqlQuery)){
        header('Location: Logout.php');
        exit();
    }
}
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Save3']))
{
    $fName = $_POST['fName3'];
    $address = $_POST['address3'];
    $phone = $_POST['phone3'];
    $email = $_POST['email3'];
    $idNumNew = $_POST['idNum3'];
    $pass = $_POST['password3'];

    $sqlQuery = "UPDATE Faculty SET 
        FACULTYNAME='".$fName."',
        ADDRESS='".$address."',
        PHONE='".$phone."',
        EMAIL='".$email."',
        FACULTY_ID='".$idNumNew."',
        PASSWORD='".$pass."'
        WHERE FACULTY_ID='".$idNum."'";
    if(mysqli_query($connect,$sqlQuery)){
        echo '<div class="alert alert-success" style="margin-top:-10px">';
        echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
        echo '<strong>Success!</strong> Faculty Account UPDATED Successfully! Reload to see changes!';
        echo '</div>'; 
        $_SESSION['logID'] = $idNumNew;
    } else {
        echo '<div class="alert alert-danger" style="margin-top:-10px">';
        echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
        echo '<strong>Error!</strong> ' . mysqli_error($this->connection);
        echo '</div>';
    }
}elseif($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Delete3']))
{
    $sqlQuery = "DELETE FROM Faculty WHERE FACULTY_ID = '".$idNum."'";
    if(mysqli_query($connect,$sqlQuery)){
        header('Location: Logout.php');
        exit();
    }
}
?>

<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>