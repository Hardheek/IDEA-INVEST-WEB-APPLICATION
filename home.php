<?php
    session_start();
    include("functions.php");
    if($_SESSION['login']!==true){
        header('location:loginpage.php');
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <link rel="stylesheet" type="text/css" href="css/index.css">
    

    <title>Welcome</title>
    <style>
   
      body {
        font-family: "Arial", Serif;
        background: url("https://imagekit.io/static/img/newPages/homepage-wave-bg.svg");
        background-size: cover;
        background-repeat: no-repeat;
        font-family: "Oxanium";
        overflow-x: hidden;
      }

      
        

      #main {
        transition: margin-left 0.5s;
        padding: 20px;
        overflow: hidden;
        width: 100%;
      }

      @media (max-width: 568px) {
        .navbar-nav {
          display: none;
        }
      }

      @media (min-width: 568px) {
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

				

				@media(max-width:568px){
				  .navbar-nav{display:none}
				}

				@media(min-width:568px){
				}

				.column {
				  float: left;
				  width: 50%;
				  height: 22%;
				  border-radius: 5px;
				}

				
				.card {
				  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
				  padding: 2px 16px;
				  text-align: center;
				  background-color: #414656;
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

    <header>

    

    <header class="main-header">
      <h1><span> Your </span> Dashboard</h1>
    </header>

        
    </header>

    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
            <?php
            
                $query = "select * from `requests`;";
                if(count(fetchAll($query))>0){
                    foreach(fetchAll($query) as $row){

                        ?>
                
                    <h1 class="jumbotron-heading"><?php echo $row['email'] ?></h1>
                      <p class="lead text-muted"><?php echo $row['firstname'] ?></p>
                      <p class="lead text-muted"><?php echo $row['lastname'] ?></p>
                      <p class="lead text-muted"><?php echo $row['phone'] ?></p>
                      <p class="lead text-muted"><?php echo $row['role'] ?></p>
                      <p>
                        <a href="accept.php?id=<?php echo $row['email'] ?>" value="email" class="btn btn-primary my-2">Accept</a>
                        <a href="reject.php?id=<?php echo $row['email'] ?>" value="email" class="btn btn-secondary my-2">Reject</a>
                      </p>
                    <small><i><?php echo $row['date'] ?></i></small>
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
        
        <a href="#">Admin Dashboard</a>
	    <a href="#">Home</a>
	    <a href="share.php">Share values and companies </a>
		<a href="admindash.php">Company Details  </a>
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
