<?php

session_start(); //we need session for the log in thingy XD                
 
include("functions.php");
           
        
?>

<html>
 
	<head>
		<title>Sponsor DashBoard</title>
		<!-- Compiled and minified CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!-- Compiled and minified JavaScript -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
			  
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
    <?php

            if(isset($_POST['send'])){

                $email = $_SESSION['email'];
                $cemail = $_POST['cemail'];
                $startupname = $_POST['startupname'];
                $share = $_POST['share'];
                $amount = $_POST['amount'];
                $comment = $_POST['comment'];

                        
                               
                $query = "INSERT INTO `sponsorrequest` ( `email`,`cemail`, `startupname`,  `share`, `amount`, `comment` ) VALUES (  '$email','$cemail', '$startupname',  '$share', '$amount', '$comment'  )";
                if(performQuery($query)){
                    echo "<script>alert('Your Request is successfully registered ,  Thank you.')</script>";
                }else{
                    echo "<script>alert('Unknown error occured, Please Try After Sometime')</script>";
                }
           }
    ?>

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
      <form name="send"  method="POST">
        <h5 align="center"> Send Request </h5>
        
		<div class="container">
		  <div class="card">
			<div class="container row">
				<div class="input-field col s6">
					<input id="email" type="text" class="validate" name="cemail">
					<label for="email"> Client's Email  </label>
                  </div>
                  <div class="input-field col s6">
					<input id="startupname" type="text" class="validate" name="startupname">
					<label for="startupname"> StartUp Name </label>
				  </div>
				  
				</div>
		    </div>
		</div>
		<h5 align="center">Request Form</h5>
		<div class="container">
		  <div class="card">
			  <div class="container row">
				<div class="input-field col s6">
					<input id="share" type="text" class="validate" name="share">
					<label for="share">Share of Percentage Offered</label>
				</div>
				<div class="input-field col s6">
					<input id="amount" type="text" class="validate" name="amount">
					<label for="amount"> Offered  Amount</label>
				</div>
				<div class="input-field col s12">
					<textarea id="textarea2" class="materialize-textarea" name="comment"></textarea>
					<label for="textarea2">Comments </label>
                </div>
               
                
			  </div>
		  </div>
		</div>
		<div class="container">
			<div class="container row">
				<button class="btn waves-effect waves-light" type="submit" name="send">Submit
					<i class="material-icons right">send</i>
                  </button>
                  
                  
			</div>
		</div>
    </form>
    

    <div id="side-menu" class="side-nav">
	    <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
        
        <a href="#">DashBoard</a>
	    <a href="sponsordash.php">Home</a>
		<a href="smessages.php">My Messages </a>
		<a href="sponsor.php">Sponsorings </a>
		<a href="sponsorlist.php">Your Sponsorships </a>
		<a href="#">Send Details</a>
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