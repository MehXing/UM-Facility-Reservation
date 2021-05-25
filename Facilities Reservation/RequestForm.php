<!DOCTYPE html>
<html>
    <?php include 'HeaderIn.php'; ?>
    <body class="um-bg">
        <div class="container-fluid w-75 my-5 pt-5">
            <div class="container-fluid w-75 text-center">
                <h1 class="h1 text-um">Request Form</h1>
            </div>
            <div class="container-fluid w-75 mt-4 py-3 bg-white shadow-um-1 rounded">
                <form action="RequestForm.php" method="POST">
                    <div class="container-fluid p-3 form-group">
                        <h3 class="h3 text-um mb-3">Reservation Fill-up Form</h3>
                        <label class="input w-100 mb-3">
                            <input class="input__field" type="text" name="fName" placeholder=" " required/>
                            <span class="input__label">Name</span>
                        </label>
                        <label class="input w-100 mb-3">
                            <select class="input__field" name="resFaci" placeholder=" " required>
                                <option>AVR1-Main Campus</option>
                                <option>AVR2-Main Campus</option>
                                <option>AVR3-Main Campus</option>
                                <option>AVR4-Visayan Campus</option>
                                <option>COMPUTER LABORATORY 1-Main Campus</option>
                                <option>COMPUTER LABORATORY 2-Main Campus</option>
                                <option>COMPUTER LABORATORY 3-Visayan Campus</option>
                                <option>SCIENCE LABORATORY</option>
                                <option>SPEECH LABORATORY</option>
                                <option>GYM</option>
                                <option>VOLLEYBALL COURT</option>
                                <option>BUSES</option>
                            </select>
                            <span class="input__label">Facility to Reserve</span>
                        </label>
                        <label class="input w-100 mb-3">
                            <input class="input__field" type="date" name="sDate" placeholder=" " required/>
                            <span class="input__label">Start Date</span>
                        </label>
                        <label class="input w-100 mb-3">
                            <input class="input__field" type="date" name="eDate" placeholder=" " required/>
                            <span class="input__label">End Date</span>
                        </label>
                        <label class="input w-100 mb-3">
                            <input class="input__field" type="number" name="phone" placeholder=" " minLength="11" maxlength="11" id="phone"
                                oninput="javascript: if (this.value.length == this.maxLength) this.value = this.value.slice(0, this.maxLength);" required></input>
                            <span class="input__label">Phone Number</span>
                        </label>
                        <label class="input w-100 mb-3">
                            <input class="input__field" type="text" name="purpose" placeholder=" " required/>
                            <span class="input__label">Purpose</span>
                        </label>
                        <div class="container-fluid text-center mb-3">
                            <button type="submit" class="um-btn-red w-50" name="Form">Submit Request</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
<?php 
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Form'])){
        $fName = $_POST['fName'];
        $resFaci = $_POST['resFaci'];
        $sDate = $_POST['sDate'];
        $eDate = $_POST['eDate'];
        $phone = $_POST['phone'];
        $purpose = $_POST['purpose'];
        $status = "Pending";
        $result = $db->insertDataReserve($fName, $resFaci, $sDate, $eDate, $phone, $purpose, $status);
        if($result == '1') header('Location: RequestForm.php');
        else echo $result;
    }
?>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>