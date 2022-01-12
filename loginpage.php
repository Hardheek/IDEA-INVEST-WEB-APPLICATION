<?php
    session_start(); 
    include("functions.php");
?>
<html>
  
  <head>
    <title>Login</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"
    />
    <link
      rel="stylesheet"
      href="../iii/css/login1.css"
    />
    
  </head>
  <body>
    <?php

         
        
        if(isset($_POST['signin'])){
            $password = $_POST['password'];
            $email = $_POST['email'];
            $_SESSION['email'] = $_POST['email'];
            $a = "client";
            $b = "sponsor";
            $c = "accept";
            $query = "SELECT * from `account`;";
            if(count(fetchAll($query)) > 0){ 
                    foreach(fetchAll($query) as $row){
                    if($row['email']==$email&&$row['password']==$password){
                        $_SESSION['login'] = true;

                        if($row['role']==$c ){
                            $_SESSION['type'] = $row['type'];
                            header('location:home.php');
                        }
                        elseif($row['role']==$a){
                            $_SESSION['type'] = $row['type'];
                          
                            header('location:clientdash.php');
                        }
                        elseif($row['role']==$b){
                            $_SESSION['type'] = $row['type'];
                            header('location:sponsordash.php');
                        }
                        
                    }else{
                        echo "<script>alert('Wrong login details.')</script>";
                    }
                }
            }

        }
        if(isset($_POST['signup'])){
            
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $role = $_POST['role'];
            
                
                $query = "INSERT INTO `requests` ( `firstname`, `lastname`, `email`, `password`, `phone`, `role`,`date`,`id`) VALUES (  '$firstname', '$lastname', '$email', '$password', '$phone', '$role', CURRENT_TIMESTAMP, '0')";
                if(performQuery($query)){
                    echo "<script>alert('We received your request, we will get back to you,  Thank you.')</script>";
                }else{
                    echo "<script>alert('Unknown error occured or Email is already registred')</script>";
                }
            }

            
            

        
        
        ?>
    <div id="navbar">
      <ul>
        <li><a href="../iii/index.html">Home</a></li>
        <li><a href="../iii/about.html">About</a></li>
        <li><a href="#"> Login </a></li>
        
      </ul>
    </div>
    <br />
    <div>
      <div class="container" id="container">
        <div class="form-container sign-up-container">
        <form name="signup" method="POST">
              
             
              <label for="inputEmail" class="sr-only">Firstname</label>
              <input name="firstname" type="text" id="inputEmail" class="form-control" placeholder="Firstname" required autofocus>
                <label for="inputEmail" class="sr-only">Lastname</label>
              <input name="lastname" type="text" id="inputEmail" class="form-control" placeholder="Lastname" required autofocus>
                <label for="inputEmail" class="sr-only">Email address</label>
              <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
              <label for="inputPassword" class="sr-only">Password</label>
              <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
              <select name="role" id="role">
              <option value="client">Client</option>
              <option value="sponsor">Sponsor</option>
            </select>
              <label for="inputPassword" class="sr-only">Phone Number</label>
              <input name="phone" type="number" id="phone" class="form-control" placeholder="Phone " required>
              <button name="signup"  type="submit">Sign up</button>
             
            </form>
        </div>
        <div class="form-container sign-in-container">
             <form name="signin"  method="POST">
          
                
              <label for="inputEmail" class="sr-only">Email address</label>
              <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
              <label for="inputPassword" class="sr-only">Password</label>
              <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
             
              <button name="signin"  type="submit">Sign in</button>

              
            </form>

            

        </div>
        <div class="overlay-container">
          <div class="overlay">
            <div class="overlay-panel overlay-left">
              <h1>Welcome Back! Users </h1>
              <p>
                To keep connected with us please login with your personal info
              </p>
              <button class="ghost" id="signIn">Sign In</button>
            </div>
            <div class="overlay-panel  overlay-right">
              <h1>Hello, Guys!</h1>
              <p>Enter your personal details and start journey with us</p>
              <p>Grab oppurtunities directly to your place</p>
              <button class="ghost" id="signUp">Sign Up</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script>
    const signUpButton = document.getElementById("signUp");
    const signInButton = document.getElementById("signIn");
    const container = document.getElementById("container");

    signUpButton.addEventListener("click", () => {
      container.classList.add("right-panel-active");
    });

    signInButton.addEventListener("click", () => {
      container.classList.remove("right-panel-active");
    });
  </script>
  
  
</html>
