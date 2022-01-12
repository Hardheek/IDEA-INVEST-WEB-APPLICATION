<?php

session_start();               
 
include("functions.php");

           
        
?>

<html>
	<head>
		<title>Sponsor Dashboard</title>
		<style>
			body{

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
				  color:#ddd;
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
				}

				.column {
				  float: left;
				  width: 100%;
				  border-radius: 5px;
				}

				
				.card {
				  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
				  height: 25%;
				  padding: 2px 16px;
				  text-align: center;
				  background-color: #555555;
				  border-radius: 5px;
				  margin: 30px;
				}
				.card:hover{
					box-shadow: 0 8px 16px 0 #008DFF;

				}
				h4 , p{
					color: white;
				}
				#ptag{
					float: right;
				}
				#pleft{
					float: left;
				}
				#pbottom{
					color: red;
					float: left;
					font-weight: bold;
				}
				#pbottomright{
					color: red;
					float: right;
					font-weight: bold;
				}
				#note{
					color: red;
				}
				span{
					color: blue;
					font-weight: bold;
				}
				#notedis{
					color: black;
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

        if(isset($_POST['sponsor'])){

            $semail = $_SESSION['email'];
            $cemail = $_POST['cemail'];
            $startupname = $_POST['startupname'];
            $share = $_POST['share'];
            $amount = $_POST['amount'];
            $tshare = $_POST['tshare'];
            $tamount = $_POST['tamount'];
           

                    
                        
            $query = "INSERT INTO `sanctioned` ( `semail`,`cemail`, `startupname`,  `share`, `amount`,  `tshare`, `tamount`  ) VALUES (  '$semail','$cemail', '$startupname',  '$share', '$amount',  '$tshare', '$tamount'  )";
            if(performQuery($query)){
                echo "<script>alert('Your Request is successfully registered , Your Part of $startupname now..')</script>";
               
            }else{
                echo "<script>alert('Unknown error occured, Please Try After Sometime')</script>";
            }
        }
        ?>
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
	  <br>
		<div id="req">
			<h1 align="center"> New Ideas From Our Young Brains </h1>
			<p id="note">
				Note: <br><br>
				*******
			</p>
			<p id="notedis">
				1. Once the Sponsering value is submitted,  The Sponsership will be freezed for  <span>One Year </span>.
				<br>
				<br>
				2. Aftre the freezing time we request <span>You(or Your representative)</span> and the <span>Start-up </span>	Representative Should come to our Office to attend a meeting.
				<br>
				<br>
                3. This form submission is the  <span>Legal Agreement</span> as per  rules and Regulation of <span>III</span>
                <br>
                <br>
                4. You have confirmed this request, after receiving a positive response from the <span>client </span>
                <br>
                <br>
                5. <span>III</span> is not responsible for any Bussiness Losses and completely upon Client and You(your company).
                <br>
                <br>
                6. As per the policy, we collect <span>5%(2.5% from each)</span> of your share value from the <span>Client and You(Your company) </span>as service charge.
			<br>
			<p id="note">
				*******
			</p>

            <hr>
            
            <form name="sponsor"  method="POST">
			<div class="row">
				<div class="column">
				  <div class="card">
				  	<p id="pleft"><input type="text" name="startupname" > StartUp Name </p>
				  	<p id="ptag"><input type="text" name="cemail" > Client Email</p>
				    <h4><b> Invest here </b></h4> 
				   
                    <p id="pbottom"><input type="number" name="amount" > Sponsered Value/amount</p>
                    <p id="pbottom"><input type="number" name="tamount" > of Total amount</p>
                   
                    <p id="pbottomright"><input type="number" name="tshare">% out of Total Share</p>
                    <p id="pbottomright"><input type="number" name="share">%of your Share</p>
                     
                  <button class="btn waves-effect waves-light" type="submit" name="sponsor">Submit
					
                  </button>
                  </div>
                 
				</div>
				
			</div> </form>
        </div>
        
        	
		</div>
		
   
    







	  <div id="side-menu" class="side-nav">
        <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
        <a href="#">Dashboard</a>
	    <a href="sponsordash.php">Home</a>
        <a href="senddetails.php">Send Request</a>
        <a href="#">Sponsorings </a>
        <a href="sponsorlist.php">Your Sponsorships </a>
		<a href="smessages.php">My Messages</a>
	    <a href="index.html"> Log Out </a>
	    
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