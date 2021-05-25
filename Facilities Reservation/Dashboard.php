<!DOCTYPE html>
<html>
    <?php include 'HeaderIn.php'; ?>
    <body class="um-background">
        <div class="container-fluid px-0 mx-0 mt-5 row">
            <div class="container-fluid col-md text-center">
                <div class="container-fluid um-bg um-opacity-2 my-5 mx-auto py-3 rounded-lg shadow-lg p-4">
                    <h1 class="h1 text-bold um-red mt-5">Request Form</h1>
                    <br>
                    <p class="p um-red">Request Your Reservation Here</p>
                    <br>
                    <a href="RequestForm.php">
                        <button type="submit" class="um-btn-red float-center w-75 my-5" name="form">
                            <span class="d-block py-2 font-weight-bold">Request Form &rarr;</span>
                        </button>
                    </a>
                </div>
            </div>
            <div class="container-fluid col-md text-center">
                <div class="container-fluid um-bg um-opacity-2 my-5 mx-auto py-3 rounded-lg shadow-lg p-4">
                    <h1 class="h1 text-bold um-red mt-5">Request Table</h1>
                    <br>
                    <p class="p um-red">View All Reservation Requests Here</p>
                    <br>
                    <a href="RequestTable.php">
                        <button type="submit" class="um-btn-red float-center w-75 my-5" name="table">
                            <span class="d-block py-2 font-weight-bold">Request Table &rarr;</span>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>