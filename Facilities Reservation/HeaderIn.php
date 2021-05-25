<?php session_start(); 
require('Database.php');
$db = new DataManager();
$db->createTableAdmin();
$db->createTableStudent();
$db->createTableFaculty();
$db->createTableReserve();?>
    <head>
		<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">

        <link type="text/css" rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<script src="jquery.tabledit.js"></script>
    </head>
    <body>    
        <header class="fixed-top header m-0 p-0">
            <!-- navbar -->
            <div class="navigation w-100">
                <div class="container-fluid m-0 p-0">
                    <nav class="navbar navbar-expand p-0 navbar-dark nav-shadow">
                        <div class="container-fluid">
                            <div class="collapse navbar-collapse" id="collapsableNav">
                                <a class="navbar-brand p-3" href="Dashboard.php">
                                    <img src="img/um-seal.png" alt="Logo" style="width:40px;">
                                </a>
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link text-light p-3 text-white" href="Dashboard.php">Home</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="collapse navbar-collapse justify-content-end" id="collapsableNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item"> 
                                        <a class="nav-link text-light p-3 text-white" href="Profile.php">Profile</a> 
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-light p-3 text-white" href="Logout.php">Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
    </body>