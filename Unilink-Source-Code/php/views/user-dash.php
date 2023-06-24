<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
session_start();
$meterid = $_SESSION['meterid'];
//if(!isset($_GET['$meterid'])){
//$meterID = $_GET['meterid'];
include "../dbhandler/dbh.class.php";
include "../models/user-dash.model.class.php";
include "../controllers/user-dash.contr.class.php";
$balances = new UserDashContr($meterid);
$balance = $balances->MeterBal($meterid);
$elec = $balance[0]["bal_elec"];
$water = $balance[0]["bal_wat"];
$status_wat = $balance[0]['status_wat'];
if($water==0)
$status_wat=0;
if($elec==0)
$status_elec=0;
if($status_wat==1)
$status_wat="ON";
else
$status_wat="OFF";
$status_elec = $balance[0]['status_elec'];
if($status_elec==1)
$status_elec="ON";
else
$status_elec="OFF";
//$status_elec = $balance[0]['status_elec'];
$consumption = $balances->MeterCons($meterid);
if(empty($consumption[0]["elec_cons"]) && empty($consumption[0]["wat_cons"])){
    $elec_cons=0;
    $water_cons=0; 
}
else{
$elec_cons = $consumption[0]["elec_cons"];
$water_cons = $consumption[0]["wat_cons"];
}
$visualize = array_reverse($balances->latest($meterid));

//$meterID = $_SESSION['meterid'];
//}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        setInterval(function(){
            location.reload();
        },60000);
    </script>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../../css/user-dash.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="person-outline"></ion-icon>
                        </span>
                        <span class="title">Unilink Smart Solutions</span>
                    </a>
                </li>

                <li>
                    <a href="update-user-info.php?meterid=<?php echo $meterid;?>">
                        <span class="icon">
                            <ion-icon name="information-circle-outline"></ion-icon>
                        </span>
                        <span class="title">Update Personal Info</span>
                    </a>
                </li>

                <li>
                    <a href="user-history.php">
                        <span class="icon">
                        <ion-icon name="archive-outline"></ion-icon>
                        </span>
                        <span class="title">Full History</span>
                    </a>
                </li>

                <li>
                    <a href="enquire.php">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Enquire</span>
                    </a>
                </li>

                <li>
                    <a href="faqs.php">
                        <span class="icon">
                            <ion-icon name="help-outline"></ion-icon>
                        </span>
                        <span class="title">FAQs</span>
                    </a>
                </li>

                <li>
                    <a href="../logout.inc.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div class = "userDash">
             <h1>Dashboard</h1>
            </div>

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card" id="elecBtn">
                    <div>
                        <div class="numbers"><?php echo "R".$elec;?></div>
                        <div id="elecButton" class="cardName" >Electricity Bal. Status: <?php echo $status_elec ?></div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="battery-half-outline"></ion-icon>
                    </div>
                </div>

                <div class="card" id="watBtn">
                    <div>
                        <div class="numbers"><?php echo "R".$water;?></div>
                        <div id="waterButton" class="cardName" >Water Bal. Status: <?php echo $status_wat ?></div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="water-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers" style="color:green;"><?php echo $elec_cons."kWh";?></div>
                        <div class="cardName">Electricity Consumption</div>
                    </div>

                    <div class="iconBx">
                    <ion-icon name="trending-down-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers" style="color:green;"><?php echo $water_cons."L";?></div>
                        <div class="cardName">Water Consumption</div>
                    </div>

                    <div class="iconBx">
                    <ion-icon name="color-fill-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Analytics</h2>
                    <div class="chart">
                    
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                    google.charts.load('current', {'packages':['corechart']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                        ['Date', 'Electricity (KWh)', 'Water(L)'],
                        <?php foreach($visualize as $row){
                            echo "['" . $row['update_time']."',".$row['elec_cons'].",".$row['wat_cons']."],";
                        } ?>
                      
                        ]);

                        var options = {
                        backgroundColor: 'white',
                        title: 'Electricity and Water Usage',
                        titleTextStyle: {
                            fontSize: 25,
                            fontName: 'Source Sans Pro',
                            bold: true,
                            textAlign: 'center',
                            color: '#4F4F4F'
                        },
                        curveType: 'function',
                        legend: { position: 'bottom' },
                        vAxis:{title: 'Consumption',
                            titleTextStyle: {
                            fontSize: 25,
                            italic: false,
                            bold: true
                            },
                            viewWindow:{
                                min:0
                            }
                        }
                        };

                        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                        chart.draw(data, options);
                         }
                         </script>
                         <div id="curve_chart" style="width: 100vh; height: 600px; "></div>
                        </div>
                        </div>
                        </div> 

                <!-- ================= Topup ================ -->
                <div class="recentCustomers">
                <div class="myTitle">
                    <h2>Top up Account</h2>
                    </div>
                <div class="cont">
                    <form id="myForm">
                        <div class = "user-details">
                            <div class="input-box">
                                <span class = "details"> Electricity</span>
                                <input type="text" name="elecVoucher" placeholder="Enter voucher">
                            </div>
                            <div class="input-box">
                                <span class = "details"> Water</span>
                                <input type="text" name="waterVoucher" placeholder="Enter voucher">
                            </div>
                        </div>

                         <div class = "button-rech">
                            <input type="submit" id="submitBtn" name="submit" value="Recharge">
                         </div>


                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
        <script>
$(document).ready(function(){
    $('#myForm').submit(function(event){
        event.preventDefault();
        var elecVoucher = $("input[name='elecVoucher']").val();
        var waterVoucher = $("input[name='waterVoucher']").val();
        $.ajax({
            url: "recharge.inc.php",
            type: "POST",
            data: {
                elecVoucher: elecVoucher,
                waterVoucher: waterVoucher,
                submit: true
            },
            success: function(response){
                alert("Your voucher is being processed!"); // add this line
                // do something with response
            },
            error: function(xhr, status, error){
                alert("Error: " + xhr.responseText);
            }
        });
    });
});
</script>

    <script>
 
    
        $(document).ready(function(){
            $("#watBtn").click(function(e){
                e.preventDefault();
                var status = $("#waterButton").text();
            $("#waterButton").load("update-water-status.php", {
                status: status
            });
            });
        });
        $(document).ready(function(){
            $("#elecBtn").click(function(e){
                e.preventDefault();
                var status = $("#elecButton").text();
            $("#elecButton").load("update-elec-status.php", {
                status: status
            });
            });
        });
       
    </script>
    <script >
        // add hovered class to selected list item
let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};

    </script>
    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
   
</body>

</html>
