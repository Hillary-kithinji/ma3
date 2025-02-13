<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['Username'])) {
    header("Location: ma3.html");
    exit();
}

// Display the username
echo "Welcome, " . htmlspecialchars($_SESSION['Username']) . "!";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ma3.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #333;
            overflow: hidden;
            padding: 10px;
            display: flex;
            align-items: center;
        }
        .navbar a {
            color: white;
            padding: 14px 20px;
            text-decoration: none;
            text-align: center;
        }
        .navbar a:hover {
            background-color: #575757;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: white;
            margin-right: auto;
        }
        .logo img {
            height: 40px; /* Adjust size of the logo */
            width: auto;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 300px;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        .form-container {
            display: none;
        }
        .form-container form {
            display: flex;
            flex-direction: column;
        }
        .form-container input {
            margin: 5px 0;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-container button {
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #333;
            color: white;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #575757;/* navigation */
        } 



        .containerg {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            padding: 20px;
            position: relative;
            background-color: white;
           
        }
        .photo {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: center;
        }
        .photo img {
            width: 100%;
            height: auto;
            object-fit: cover; /* Ensures the image covers the area without distortion */
        }
        .photo-description {
            padding: 10px;
            background-color: #f9f9f9;
            border-top: 1px solid #ddd;
        }
        .photo:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }
        .photo a {
            display: block;
            height: 100%;
            width: 100%;
            text-decoration: none; /* Remove underline from links */
        }
        .photo a:hover .photo-description {
            color: #007bff; /* Change text color on hover */
        }
        header {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .header-logo img {
            height: 40px; /* Adjust logo size as needed */
        }
        /* Style for the search bar */
        #search-bar {
        width: 100px; /* Adjust the width as needed */
        height: 20px; /* Adjust the height as needed */
        padding: 5px; /* Optional: Add padding inside the input */
        font-size: 14px;
        border: 1px solid #ccc; /* Border color */
        border-radius: 20px; /* Rounded corners */
        outline: none; /* Remove default outline */
        box-shadow: inset 0 1px 3px rgba(0,0,0,0.1); /* Subtle inner shadow */
        transition: border-color 0.3s; /* Smooth border color transition */ /* Adjust the font size */
        }

        /* Style for the search button */
       #search-button {
        width: 10px; /* Adjust the width as needed */
        height: 30px; /* Adjust the height as needed */
        font-size: 14px; /* Adjust the font size */
        cursor: pointer; 
        border: none; /* Remove default border */
        border-radius: 20px; /* Rounded corners *//* Optional: Change cursor to pointer on hover */
        }
        .search-button:hover {
        background-color: #0056b3; /* Darker background color on hover */
        }
        .search-button:active {
        background-color: #004494; /* Even darker background color on click */
        }

        
       
      
        
        #home {
            text-align: center;
            padding: 20px 0;
            background-color: #779bbe;
            background-image: url('nairobi-buses.jpg'); /* Add background image */
            background-size: cover;
            background-position: center;

        }
        
        #home h1 {
            font-size: 25px;
            margin-bottom: 20px;
            color: #fff; /* Text color for contrast */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Optional text shadow for better readability */
        }
        
        #home form {
            margin-top: 20px;
        }
        
        #home form input,
        #home form button {
            padding: 10px;
            margin-right: 10px;
            width: calc(33.33% - 10px); /* Adjust width for responsive layout */
        }
        
        @media (max-width: 768px) {
            #home form input,
            #home form button {
                width: 100%; /* Full width on smaller screens */
                margin-right: 0;
                margin-bottom: 10px;
            }
        }
        
        #bus-routes {
            padding: 20px 0;
            position: relative;
            background-color:  #cabebe; 
            cursor:pointer; /* Example of a different section background */
        }
        
        #bus-routes h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .route {
            background-color: #d6cfcf;
            padding: 20px;
            width: auto;
            box-sizing: border-box;

        }

        .route img{
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }
        
        .route h3 {
            font-size: 24px;
        }
        
        .route p {
            margin-bottom: 10px;
        }
        
        
        
        .route a:hover {
            background-color:  #787f86;
        }
        
     
     
  /* Styles for the overlay */
  .overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
    z-index: 999;
  }
    
  .mediascreen {max-width:481;
        
    }
    
   
.nav{align-content: end;}
.align-right {
            width: 200px; /* Set a width for demonstration */
            margin-left: auto; /* Push element to the right */
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #965b5b;
        }
       
       

.product-grid{
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}
footer {
    background-color: #998c8c;
    color: #fff;
    padding: 20px;
    text-align: center;
}

.footer-container {
    max-width: 1200px;
    margin: 0 auto;
}

.social-media {
    margin-top: 10px;
}

.social-media a {
    margin: 0 10px;
    display: inline-block;
}

.social-media img {width: 24px;
    height: 24px;
    vertical-align: middle;
}
        .navbar {
            background-color: #726b6b;
            overflow: hidden;
            padding: 10px;
            display: flex;
            align-items: center;
        }
        .navbar a {
            color: white;
            padding: 14px 20px;
            text-decoration: none;
            text-align: center;
        }
        .navbar a:hover {
            background-color: #575757;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: white;
            margin-right: auto;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 300px;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        .form-container {
            display: none;
        }
        .form-container form {
            display: flex;
            flex-direction: column;
        }
        .form-container input {
            margin: 5px 0;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-container button {
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #333;
            color: white;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #575757;
        }
        .links{
            display: flex;
            justify-content: space-around;
            padding:1px;
            margin-top: 5px 0;
            border: none;
        }
       
        
    </style>
</head>
<body>
<div class="navbar">
        <div class="logo">
            <img src="../Images/logo.png" alt="Logo">
        </div>
        <a href="ma3.html">Home</a>
        
        <a href="#" onclick="showContactUs()">Contact Us</a>
        <a href="logout.php">Logout</a> <!-- Changed from Login to Logout -->
    </div>
    <!-- Contact Us Modal -->
    <div id="contactUsModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeContactUs()">&times;</span>
        <p>
            Contact Us: 
            <a href="mailto:ma3@gmail.com" style="text-decoration: none; color: inherit;">
                <i class="fas fa-envelope"></i> ma3@gmail.com
            </a>
        </p>
        <p>
            Phone: 
            <a href="tel:+1234567890" style="text-decoration: none; color: inherit;">
                <i class="fas fa-phone"></i> +254717703036
            </a>
        </p>
    </div>
</div>


    <!-- Login Form Modal -->
    <div id="loginModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeLoginForm()">&times;</span>
            <div class="form-container" id="loginForm">
                login:
                <form method="POST" action="login.php">
                  
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Username"  name="Username" required>
                </div>

                
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" name="password"  required >
                </div>
            
                <p class="recover password">
                <a href="#">Recover password</a>
                </p>
            
                <button type="submit">Login</button><br>
                <div class="links">
                     Dont have an account?                     
                    <a href="#" onclick="showSignupForm()">Sign Up</a>
                    
                </div><br>
                
                </form>
                <a href="logout.php">Logout</a>    
            </div>
            <div class="form-container" id="signupForm">
                signup:
                <form onsubmit="return signup(event)"  method="POST" action="connect.php">
                    <div class="input-group">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username"  name="Username" required>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-envelope"></i>
                        <input type="text" placeholder="email"  name="email" required>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password"  required >
                    </div>
                    <br>
                    <button type="submit">Sign Up</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function showContactUs() {
            document.getElementById('contactUsModal').style.display = 'block';
        }

        function closeContactUs() {
            document.getElementById('contactUsModal').style.display = 'none';
        }

        function showLoginForm() {
            document.getElementById('loginModal').style.display = 'block';
            document.getElementById('loginForm').style.display = 'block';
            document.getElementById('signupForm').style.display = 'none';
        }

        function closeLoginForm() {
            document.getElementById('loginModal').style.display = 'none';
        }

        function showSignupForm() {
            document.getElementById('loginForm').style.display = 'none';
            document.getElementById('signupForm').style.display = 'block';
        }
    </script>

<br>
     <label for="items" align="center" style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Bus Routes:</label>

     <select onChange="window.location.href=this.value" id="items" name="items" style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">
     <option value="">select here</option>
       <option value="125.php">Ronga 125</a></li></option>
       
       <option value="ngong.php">Ngong 111</option>
       
      
       <option value="17b.php">Kasarani 17B</option>
       <option value="33.php">Embakasi 33</option>
       <option value="35-60.php">Ummoja 35/60</option>
       
     </select>
     
    
     
     
         <!-- Home Section -->
         <section id="home">
             <div class="container1">
                 <h1>Find and Book Your Bus Online</h1>
                 <form class="search-form" action="" method="get">
                     <input type="text" value="" id="search-bar" onchange="openpage()" name="query" class="search-input" placeholder="Search your route here ">
                     
                     <br><br>
                     <button type="submit" class="search-button"  id="search-button">Search</button>
                 </form>
             </div>
             <br><br>
             
            </section>
             
         <script>
            
         function openpage(){
            var x = document.getElementById("search-bar").value;
           

            if (x === "kasarani" ){
                window.open("17b.php")
            }
            if (x === "Kasarani" ){
                window.open("17b.php")
            }
            if (x === "17b" ){
                window.open("17b.php")
            }

            if (x === "ngong"){
                window.open("ngong.php")
            }
            if (x === "Ngong"){
                window.open("ngong.php")
            }
            if (x === "111"){
                window.open("ngong.php")
            }

            if (x === "embakasi"){
                window.open("33.php")
            }
            if (x === "Embakasi"){
                window.open("33.php")
            }
            if (x === "33"){
                window.open("33.php")
            }
            if (x === "ronga"){
                window.open("125.php")
            }
            if (x === "Ronga"){
                window.open("125.php")
            }
            if (x === "125"){
                window.open("125.php")
            }
            if (x === "ummoja"){
                window.open("35-60.php")
            }
            if (x === "Ummoja"){
                window.open("35-60.php")
            }
            if (x === "35/60"){
                window.open("35-60.php")
            }
            


        }
        </script>
        
         </div>

         <div id="bus-routes">
         <marquee  direction="up"scrollamount="2">
         <!-- Bus Routes Section -->
         <section id="bus-routes">
             <div class="container1">
                 <h2>Popular Bus Routes</h2> 
             </marquee>
            </div>
            <main>
                <div class="containerg">
                    <div class="photo">
                        <a href="33.php" >
                            <img src="../Images/Mombasa-Road.jpg" alt="Placeholder Image 1">
                            <div class="photo-description">Embakasi To Town And Back</div>
                        </a>
                    </div>
                    <div class="photo">
                        <a href="17b.php" >
                            <img src="../Images/kasa stadium.jpg" alt="Placeholder Image 2">
                            <div class="photo-description">Kasarani  To Town and Back</div>
                        </a>
                    </div>
                    <div class="photo">
                        <a href="35-60.php" >
                            <img src="../Images/ummo.png" alt="Placeholder Image 3">
                            <div class="photo-description">Umoja-35/60 To Town and Back</div>
                        </a>
                    </div>
                    <div class="photo">
                        <a href="ngong.php" >
                            <img src="../Images/ngong.png" alt="Placeholder Image 4">
                            <div class="photo-description">Ngong - 111 To Town and Back</div>
                        </a>
                    </div>
                    <div class="photo">
                        <a href="125.php" >
                            <img src="../Images/ronga.jpg" alt="Placeholder Image 5">
                            <div class="photo-description">125-Rongai To Town and Back</div>
                        </a>
                    </div>              
             
                   </div>
                 <!-- Add more routes -->
           
           
         </section>
       
     
         
            <!-- Footer -->
    <footer>
        <div class="social-media">
            <div class="social-media">
                <a href="https://facebook.com/yourprofile" target="_blank" aria-label="Facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://instagram.com/yourprofile" target="_blank" aria-label="Instagram">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="mailto:info@yourcompany.com" aria-label="Email">
                    <i class="fas fa-envelope"></i>
                </a>
        </div>
    </div>
        
    </footer>
</body>

</html>
