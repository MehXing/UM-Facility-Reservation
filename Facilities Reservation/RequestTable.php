<!DOCTYPE html>
<html>
    <?php include 'HeaderIn.php'; 
    $connect = $db->Connection();
    $sqlQuery = "Select * from Reserve";
    $result = mysqli_query($connect, $sqlQuery);
    ?>
    <body class="um-bg">
        <div class="container-fluid w-100 my-3 px-4">
            <div class="container-fluid w-75 text-center">
                <br>
                <h1 class="h1 text-um">Reservation Requests</h1>
                <br>
            </div>
            <?php 
                $logType = $_SESSION['logType'];

                if($logType=="Admin"){
                    
                }elseif($logType=="Student"||$logType=="Faculty"){
                    $criteria = "STATUS";
                    $value = "Approved";
                    $db->indiSearch($criteria,$value);
                }

                $IDArr = $db->getID();
                $reqNameArr = $db->getReqName();
                $reqPlaceArr = $db->getReqPlace();
                $startDateArr = $db->getStartDate();
                $endDateArr = $db->getEndDate();
                $phoneArr = $db->getMobile();
                $purposeArr = $db->getPurpose();
                $statusArr = $db->getStatus();

                echo "<div class='table-responsive'>";
                if($logType == "Admin")
                    echo "<table id='editable_table' class='w-100 text-center table table-bordered table-striped'>";
                else echo "<table class='w-100 text-center table table-bordered table-striped'>";
                
                echo "<thead class='thead-dark text-center'><tr>
                    <th class='align-middle'>ID</th>
                    <th class='align-middle'>Name</th>
                    <th class='align-middle' style='width:350px'>Venue</th>
                    <th class='align-middle'>Start Date</th>
                    <th class='align-middle'>End Date</th>
                    <th class='align-middle'>Phone</th>
                    <th class='align-middle' style='width:250px'>Purpose</th>
                    <th class='align-middle'>Status</th>";
                    if($logType == "Admin"){
                        echo 
                        '<th class="tabledit-toolbar-column">Edit/Delete</th>
                        </tr></thead>
                        <tbody>';
                        while($row = mysqli_fetch_array($result)){
                            echo'
                            <tr>
                                <td class="align-middle">'.$row["ID"].'</td>
                                <td class="align-middle">'.$row["REQNAME"].'</td>
                                <td class="align-middle">'.$row["REQPLACE"].'</td>
                                <td class="align-middle">'.$row["STARTDATE"].'</td>
                                <td class="align-middle">'.$row["ENDDATE"].'</td>
                                <td class="align-middle">'.$row["PHONE"].'</td>
                                <td class="align-middle">'.$row["PURPOSE"].'</td>
                                <td class="align-middle">'.$row["STATUS"].'</td>
                            </tr>
                            ';
                        }
                    }else{
                        for($x = 0; $x < sizeof($reqNameArr); $x++){
                            echo "<tr><td class='align-middle'>$IDArr[$x]</td>";
                            echo "<td class='align-middle'>$reqNameArr[$x]</td>";
                            echo "<td class='align-middle'>$reqPlaceArr[$x]</td>";
                            echo "<td class='align-middle'>$startDateArr[$x]</td>";
                            echo "<td class='align-middle'>$endDateArr[$x]</td>";
                            echo "<td class='align-middle'>$phoneArr[$x]</td>";
                            echo "<td class='align-middle'>$purposeArr[$x]</td>";
                            echo "<td class='align-middle'>$statusArr[$x]</td>";
                        }
                    }
                echo "</tbody></table></div>";
            ?>
        </div>
    </body>
</html>
<script>
    $(document).ready(function(){
        $('#editable_table').Tabledit({
            url: 'action.php',
            columns:{
                identifier:[0,"ID"],
                editable:[[1,"REQNAME"],[2,"REQPLACE"],[3,"STARTDATE"],[4,"ENDDATE"],[5,"PHONE"],[6,"PURPOSE"],[7,"STATUS"]]
            },
            restoreButton:false,
            onSuccess:function(data, textStatus, jqXHR){
                if(data.action == 'delete'){
                    $('#'+data.ID).remove();
                }
            }
        })
    });
</script>