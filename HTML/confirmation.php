<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma3</title>
    <style>
        /* Styles for the pop-up */
        #popup {
            display: none; /* Hidden by default */
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Black background with opacity */
            z-index: 1; /* Sit on top */
        }
        #popup-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
            max-width: 500px; /* Max width of the pop-up */
            text-align: center;
        }
        #close-btn {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }
        #close-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div id="popup">
        <div id="popup-content">
            <h2>Booking Confirmation</h2>
            <p>Your booking has been successfully made!</p>
            <button id="close-btn">Close</button>
        </div>
    </div>

    <script>
        // Show the pop-up
        window.onload = function() {
            document.getElementById("popup").style.display = "block";
        };

        // Close the pop-up when the button is clicked
        document.getElementById("close-btn").onclick = function() {
            document.getElementById("popup").style.display = "none";
        };
    </script>
</body>
</html>
