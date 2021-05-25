<!DOCTYPE html>
<html>
    <?php include 'HeaderPre.php'; ?>
    <script>
        $(document).ready(function() {
            $("#btnAdmin").click(function(e){
                $("#option").toggle();
                $("#register").toggle();
                $("#admin").toggle();
                $("#admin2").toggle();
                e.preventDefault();
            });
        });
        $(document).ready(function() {
            $("#btnStudent").click(function(e){
                $("#option").toggle();
                $("#register").toggle();
                $("#student").toggle();
                $("#student2").toggle();
                e.preventDefault();
            });
        });
        $(document).ready(function() {
            $("#btnFaculty").click(function(e){
                $("#option").toggle();
                $("#register").toggle();
                $("#faculty").toggle();
                $("#faculty2").toggle();
                e.preventDefault();
            });
        });
    </script>
    <body class="um-bg">
            <div class="container-fluid px-0 mx-0 mt-5" id="option">
                <form action="Register.php" class="container-fluid row" method="POST">
                    <div class="container-fluid col-md text-center">
                        <div class="container-fluid um-red-bg my-5 mx-auto py-3 rounded-lg shadow-lg p-4">
                            <h1 class="h1 text-bold text-white mt-5">Admin</h1>
                            <br>
                            <p class="p text-white">Register as School Administrator, Executives, Staffs and more...</p>
                            <button type="submit" class="um-btn-red-inverted float-center w-75 my-5" name="Admin" id="btnAdmin">
                                <span class="d-block py-2 font-weight-bold">Register Admin &rarr;</span>
                            </button>
                        </div>
                    </div>
                    <div class="container-fluid col-md text-center">
                        <div class="container-fluid um-red-bg my-5 mx-auto py-3 rounded-lg shadow-lg p-4">
                            <h1 class="h1 text-bold text-light mt-5">Student</h1>
                            <br>
                            <p class="p text-light">Register as Student</p>
                            <br>
                            <button type="submit" class="um-btn-red-inverted float-center w-75 my-5" name="Student" id="btnStudent">
                                <span class="d-block py-2 font-weight-bold">Register Student &rarr;</span>
                            </button>
                        </div>
                    </div>    
                    <div class="container-fluid col-md text-center">
                        <div class="container-fluid um-red-bg my-5 mx-auto py-3 rounded-lg shadow-lg p-4">
                            <h1 class="h1 text-bold text-light mt-5">Faculty</h1>
                            <br>
                            <p class="p text-light">Register as Faculty</p>
                            <br>
                            <button type="submit" class="um-btn-red-inverted float-center w-75 my-5" name="Faculty" id="btnFaculty">
                                <span class="d-block py-2 font-weight-bold">Register Faculty &rarr;</span>
                            </button>
                        </div>
                    </div>
                </form>
                <?php $x = "";
                    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Admin'])){
                        $x = "Admin";
                    } elseif($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Student'])){
                        $x = "Student";
                    } elseif($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Faculty'])){
                        $x = "Faculty";
                    }
                ?> 
            </div>
        </span>
        <span id="register">
            <div class="container-fluid w-75 my-5 pt-5">
                <div class="container-fluid w-75 text-center">
                    <h1 class="h1 text-um">Registration</h1>
                </div>
                <div class="container-fluid w-75 mt-4 py-3 bg-white shadow-um-1 rounded">
                    <form action="Register.php" method="POST">
                        <div class="container-fluid p-3 form-group">
                            <span id="admin">
                                <h3 class="h3 text-um mb-3">Admin Fill-up Form</h3>
                                <div class="container-fluid row p-0 mx-0 mb-3">
                                    <label class="input w-100 col p-0">
                                        <input class="input__field" type="text" name="fName1" placeholder=" " />
                                        <span class="input__label">First Name</span>
                                    </label>
                                    <label class="input w-100 col p-0">
                                        <input class="input__field" type="text" name="mName1" placeholder=" " />
                                        <span class="input__label">Middle Name</span>
                                    </label>
                                    <label class="input w-100 col p-0">
                                        <input class="input__field" type="text" name="lName1" placeholder=" " />
                                        <span class="input__label">Last Name</span>
                                    </label>
                                </div>
                            </span>
                            <span id="student">
                                <h3 class="h3 text-um mb-3">Student Fill-up Form</h3>
                                <div class="container-fluid row p-0 mx-0 mb-3">
                                    <label class="input w-100 col p-0">
                                        <input class="input__field" type="text" name="fName2" placeholder=" " />
                                        <span class="input__label">First Name</span>
                                    </label>
                                    <label class="input w-100 col p-0">
                                        <input class="input__field" type="text" name="mName2" placeholder=" " />
                                        <span class="input__label">Middle Name</span>
                                    </label>
                                    <label class="input w-100 col p-0">
                                        <input class="input__field" type="text" name="lName2" placeholder=" " />
                                        <span class="input__label">Last Name</span>
                                    </label>
                                </div>
                                <label class="input w-100 mb-3">
                                    <select class="input__field" name="cYear" placeholder=" " >
                                        <option>1st</option>
                                        <option>2nd</option>
                                        <option>3rd</option>
                                        <option>4th</option>
                                    </select>
                                    <span class="input__label">College Year</span>
                                </label>
                                <label class="input w-100 mb-3">
                                    <input class="input__field" name="course" placeholder=" " >
                                    <span class="input__label">Course</span>
                                </label>
                            </span>
                            <span id="faculty">
                                <h3 class="h3 text-um mb-3">Faculty Fill-up Form</h3>
                                <label class="input w-100 mb-3">
                                    <input class="input__field" type="text" name="fName3" placeholder=" " />
                                    <span class="input__label">Faculty Name</span>
                                </label>
                            </span>
                            <label class="input w-100 mb-3">
                                <input class="input__field" type="text" name="address" placeholder=" " required/>
                                <span class="input__label">Address</span>
                            </label>
                            <label class="input w-100 mb-3">
                                <input class="input__field" type="number" name="phone" placeholder=" " minLength="11" maxlength="11" id="phone"
                                    oninput="javascript: if (this.value.length == this.maxLength) this.value = this.value.slice(0, this.maxLength);" required></input>
                                <span class="input__label">Phone Number</span>
                            </label>
                            <label class="input w-100 mb-3">
                                <input class="input__field" type="text" name="email" placeholder=" " required/>
                                <span class="input__label">Email</span>
                            </label>
                            <label class="input w-100 mb-3">
                                <input class="input__field" type="text" name="idNum" placeholder=" " required/>
                                <span class="input__label">ID Number</span>
                            </label>
                            <label class="input w-100 mb-3">
                                <input class="input__field" type="password" name="password" placeholder=" " required/>
                                <span class="input__label">Password</span>
                            </label>
                        </div>
                        <span id="admin2">
                            <div class="container-fluid text-center mb-3">
                                <input type="submit" class="um-btn-red w-50" name="Admin2" value="Register">
                            </div>
                        </span>
                        <span id="student2">
                            <div class="container-fluid text-center mb-3">
                                <input type="submit" class="um-btn-red w-50" name="Student2" value="Register">
                            </div>
                        </span>
                        <span id="faculty2">
                            <div class="container-fluid text-center mb-3">
                                <input type="submit" class="um-btn-red w-50" name="Faculty2" value="Register">
                            </div>
                        </span>
                    </form>
                </div>
            </div>
        </span>
    </body>
</html>
<?php 
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Admin2'])){
        $fName = $_POST['fName1'];
        $mName = $_POST['mName1'];
        $lName = $_POST['lName1'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $idNum = $_POST['idNum'];
        $password = $_POST['password'];
        $result = $db->insertDataAdmin($fName, $mName, $lName, $address, $phone, $email, $idNum, $password);
        if($result == '1') header('Location: Login.php');
        else echo $result;
    }
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Student2'])){
        $fName = $_POST['fName2'];
        $mName = $_POST['mName2'];
        $lName = $_POST['lName2'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $idNum = $_POST['idNum'];
        $password = $_POST['password'];
        $cYear = $_POST['cYear'];
        $course = $_POST['course'];
        $result = $db->insertDataStudent( $fName, $mName, $lName, $address, $phone, $email, $idNum, $password, $cYear, $course);
        if($result == '1') header('Location: Login.php');
        else echo $result;
    }
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Faculty2'])){
        $fName = $_POST['fName3'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $idNum = $_POST['idNum'];
        $password = $_POST['password'];
        $result = $db->insertDataFaculty($fName, $address, $phone, $email, $idNum, $password);
        if($result == '1') header('Location: Login.php');
        else echo $result;
    }
?>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>