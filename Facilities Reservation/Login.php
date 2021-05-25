<!DOCTYPE html>
<html>
    <?php include 'HeaderPre.php'; ?>
    <body class="um-bg">
    <div class="container-fluid w-75 my-5 pt-5">
            <div class="container-fluid w-75 text-center">
                <h1 class="h1 text-um">Login</h1>
            </div>
            <div class="container-fluid w-75 mt-4 py-3 bg-white shadow-um-1 rounded">
                <form action="Login.php" method="POST">
                    <div class="container-fluid p-3 form-group">
                        <label class="input w-100 mb-3">
                            <input class="input__field" type="text" name="idNum" placeholder=" " required/>
                            <span class="input__label">ID Number</span>
                        </label>
                        <label class="input w-100 mb-3">
                            <input class="input__field" type="password" name="pass" placeholder=" " required/>
                            <span class="input__label"> Password</span>
                        </label>
                        <div class="container-fluid text-center mb-3">
                            <button type="submit" class="um-btn-red w-25" name="login1">Login as Admin</button>
                            <button type="submit" class="um-btn-red w-25" name="login2">Login as Student</button>
                            <button type="submit" class="um-btn-red w-25" name="login3">Login as Faculty</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
<?php 
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['login1']))
    {
        $logType = "Admin";
        $idNum = $_POST['idNum'];
        $pass = $_POST['pass'];

        $idNumArr = $db->getIDAdmin();
        $passArr = $db->getPassAdmin();

        $bool = false;
        for($x = 0; $x < sizeof($idNumArr); $x++)
        {
            if($idNum == $idNumArr[$x] and $pass == $passArr[$x])
            {
                $bool = true;
                break;
            }
        }
        if($bool)
        {
            $_SESSION['logType'] = $logType;
            $_SESSION['logID'] = $idNum;
            $_SESSION['logPass'] = $pass;
            header("Location:  Dashboard.php");
            exit();
        }
        else
        {
            echo '<div class="alert alert-danger">';
            echo '<strong>Error!</strong> Invalid  ID Number or  Password!';
            echo '</div>';
        }
    }elseif($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['login2']))
    {
        $logType = "Student";
        $idNum = $_POST['idNum'];
        $pass = $_POST['pass'];

        $idNumArr = $db->getIDStudent();
        $passArr = $db->getPassStudent();

        $bool = false;
        for($x = 0; $x < sizeof($idNumArr); $x++)
        {
            if($idNum == $idNumArr[$x] and $pass == $passArr[$x])
            {
                $bool = true;
                break;
            }
        }
        if($bool)
        {
            $_SESSION['logType'] = $logType;
            $_SESSION['logID'] = $idNum;
            header("Location:  Dashboard.php");
            exit();
        }
        else
        {
            echo '<div class="alert alert-danger">';
            echo '<strong>Error!</strong> Invalid  ID Number or  Password!';
            echo '</div>';
        }
    }elseif($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['login3']))
    {
        $logType = "Faculty";
        $idNum = $_POST['idNum'];
        $pass = $_POST['pass'];

        $idNumArr = $db->getIDFaculty();
        $passArr = $db->getPassFaculty();

        $bool = false;
        for($x = 0; $x < sizeof($idNumArr); $x++)
        {
            if($idNum == $idNumArr[$x] and $pass == $passArr[$x])
            {
                $bool = true;
                break;
            }
        }
        if($bool)
        {
            $_SESSION['logType'] = $logType;
            $_SESSION['logID'] = $idNum;
            $_SESSION['logPass'] = $pass;
            header("Location:  Dashboard.php");
            exit();
        }
        else
        {
            echo '<div class="alert alert-danger">';
            echo '<strong>Error!</strong> Invalid  ID Number or  Password!';
            echo '</div>';
        }
    }
?>
