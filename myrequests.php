<?php

session_start(); //we need session for the log in thingy XD                
 
include("functions.php");
           
        
?>

<html>

	<head>
		<title>Client DashBoard</title>
		<!-- Compiled and minified CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!-- Compiled and minified JavaScript -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/index.css">
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
				button{
					background-color: #dddd; 
					border-radius: 5px;
					margin: 20px;
				}
		</style>
	</head>
	<body>
    
		<nav class="navbar transparent">
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
                
                <main role="main">

            <section class="jumbotron text-center">
            <div class="container">
                <?php

                    $email = $_SESSION['email'];
                
                    $query = "select * from `sponsorrequest` WHERE cemail= '$email'   ";

                    if(count(fetchAll($query))>0){
                        foreach(fetchAll($query) as $row){

                            $_SESSION['semail'] = $row['email'];

                            ?>
                    
                        <h1 class="jumbotron-heading"><?php echo $row['email'] ?></h1>
                            <p class="lead text-muted"><?php echo $row['share'] ?></p>
                            <p class="lead text-muted"><?php echo $row['startupname'] ?></p>
                            <p class="lead text-muted"><?php echo $row['amount'] ?></p>
                            <p class="lead text-muted"><?php echo $row['comment'] ?></p>
                            <p>
                            <a href="caccept.php?id=<?php echo $row['email'] ?>" value="email" class="btn btn-primary my-2">Accept</a>
                            <a href="creject.php?id=<?php echo $row['email'] ?>" value="email" class="btn btn-secondary my-2">Reject</a>
                            </p>
                        
                <?php
                        }
                    }else{
                        echo "No Pending Requests.";
                    }
                ?>
                
                
            </div>
                
            </section>

            </main>

    <div id="side-menu" class="side-nav">
	    <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
        <a href="#">DashBoard</a>
        <a href="clientdash.php">Home</a>
	    <a href="receivedsponsors.php">Received Investors</a>
		<a href="sendrequest.php">Send Request</a>
		<a href="#">My Requests</a>
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