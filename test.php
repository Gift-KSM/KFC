<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    .container {
      position: relative;
      width: 100%;
      max-width: 400px;
    }

    .container img {
      width: 100%;
      height: auto;
    }

    .container .btn {
      position: absolute;
      top: 60%;
      left: 50%;
      transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      background-color: #CC0000;
      color: white;
      font-size: 25px;
      padding: 18px 20px;
      border: none;
      cursor: pointer;
      border-radius: 5px;
      text-align: center;
    }

    .container .btn:hover {
      background-color: black;
    }
  </style>
</head>

<body>


  <div class="container">
    <!-- <img src="img/KFC1.jpg" alt="Snow" style="width:100%"> -->
    <button class="btn" style="top:-60px;" href="login/signin.php;">SHOP NOW</button>
    
    <!-- <a href="login/signin.php">SHOP NOW</a> -->
  </div>

</body>

</html>