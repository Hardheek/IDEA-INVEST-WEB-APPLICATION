<?php

    session_start(); //we need session for the log in thingy XD 
    include("functions.php");
    $email = $_SESSION['email'];
?>
<html>
	
<head>
		<title>Admin DashBoard</title>
		<style>
			body{

				background: url("https://imagekit.io/static/img/newPages/homepage-wave-bg.svg");
				  font-family:"Arial", Serif;
				  background-color:#f4f4f4;
				  overflow-x:hidden;
				}


				.navbar a{
				  float:left;
				  display:block;
				  color:#f2f2f2;
				  text-align:center;
				  padding:14px 16px;
				  text-decoration:none;
				  font-size:17px;
				}

				.navbar a:hover{
				  background-color:#ddd;
				  color:#000;
				}

				.side-nav{
				  height:100%;
				  width:0;
				  position:fixed;
				  z-index:1;
				  top:0;
				  left:0;
				  background-color:#111;
				  opacity:0.9;
				  overflow-x:hidden;
				  padding-top:60px;
				  transition:0.5s;
				}

				.side-nav a{
				  padding:10px 10px 10px 30px;
				  text-decoration:none;
				  font-size:22px;
				  color:#ccc;
				  display:block;
				  transition:0.3s;
				}

				.side-nav a:hover{
				  color:#fff;
				}

				.side-nav .btn-close{
				  position:absolute;
				  top:0;
				  right:22px;
				  font-size:36px;
				  margin-left:50px;
				}

				#main{
				  transition:margin-left 0.5s;
				  padding:20px;
				  overflow:hidden;
				  width:100%;
				}

				@media(max-width:568px){
				  .navbar-nav{display:none}
				}

				@media(min-width:568px){
				  /*.open-slide{display:none}*/
				}
				.card {
				  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
				  transition: 0.3s;
				  width: 95%;
				  border-radius: 5px;
				  justify-content: center;
				  margin-bottom: 20px;
				}

				.card:hover {
				  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
				}

				.container {
				  padding: 2px 16px;
				}
				.column {
				  float: left;
				  width: 25%;
				  padding: 0 10px;
				}
				.row {margin: 0 -5px;}
				.row:after {
				  content: "";
				  display: table;
				  clear: both;
				}
				@media screen and (max-width: 600px) {
				  .column {
				    width: 100%;
				    display: block;
				    margin-bottom: 20px;
				  }
				}

				/* Style the counter cards */
				.card1 {
				  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
				  padding: 70px;
				  text-align: center;
				  background-color: #f1f1f1;
				  margin: 2.5px;
                }
                .card2 {
				  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
				  padding: 50px;
				  text-align: center;
				  background-color: #f1f1f1;
				  margin: 0px;
				}

		</style>
	</head>
	<body>
		<nav class="navbar">
	    <span class="open-slide">
	      <a href="#" onclick="openSlideMenu()">
	        <svg width="30" height="30">
	            <path d="M0,5 30,5" stroke="#111" stroke-width="5"/>
	            <path d="M0,14 30,14" stroke="#111" stroke-width="5"/>
	            <path d="M0,23 30,23" stroke="#111" stroke-width="5"/>
	        </svg>
	      </a>
	    </span>
	  </nav>
	  <br>
	  <br>
	  <hr>
		<h2 align="center"> Companies and Share Values </h2>
		
		<div class="card">
		  <div class="container">
            
            <?php

          
            $query = "select * from `sanctioned`    ";
            
            if(count(fetchAll($query))>0){
                foreach(fetchAll($query) as $row){

                    ?>
            
                <h1 class="jumbotron-heading"><?php echo $row['startupname'] ?></h1>
                  
                <div class="row">
                  <div class="column">
                    <div class="card1">
                    <h3>Client Email </h3>
                    <?php echo $row['cemail'] ?>
                    
                    </div></div>

                    <div class="column">
                    <div class="card1 ">
                    <h3>Sponsor Email </h3>
                    <?php echo $row['semail'] ?>
                    
                    </div>
                    </div>
                    <div class="column">
                    <div class="card2 ">
                    <h3>Share offered By Sponsor  </h3>
                    <?php echo $row['share'] ,"% out of ", $row['tshare'],"%" ?>
                   <br>
                   <h3>Share offered By Sponsor  </h3>
                    <?php echo $row['amount'] ,"INR out of ", $row['tamount'],"INR" ?>
                    </div>
                    </div>
                    
                </div>
                  
            </div>
		</div>
		 
                
                <?php
                        }
                    }else{
                        echo "No Previous Records ";
                    }
                ?>

                 
             
                
	  <div id="side-menu" class="side-nav">
	    <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
		 
		<a href="#">Admin Dashboard</a>
        <a href="home.php">Home</a>
        <a href="admindash.php">Company Details  </a>
	    
		<a href="#"> Shares </a>
		<a href="index.html" id="log">Logout</a>
	  </div>

	  <script>
	    function openSlideMenu(){
	      document.getElementById('side-menu').style.width = '250px';
	      document.getElementById('main').style.marginLeft = '250px';
	    }

	    function closeSlideMenu(){
	      document.getElementById('side-menu').style.width = '0';
	      document.getElementById('main').style.marginLeft = '0';
	    }
  </script>
	</body>
	
</html>