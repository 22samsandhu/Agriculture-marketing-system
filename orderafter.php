<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <style>
        * {
            margin: 0px;
            padding: 0px;
        }

        body {
            background: url("afterorderbg.jpeg");
            z-index: -1;

            background-repeat: no-repeat;
            background-size: cover;
        }

        h1 {
            color: #e0c8ac;
        }

        .container {
            background-color: rgb(70 19 19 / 40%);
            border-radius: 30px;
            display: flex;

            margin: auto;
            width: 60%;

            padding: 15% 10%;

            align-items: center;
            margin-top: 5%;
            box-shadow: 0px 0px 20px rgba(24, 30, 46, 0.178);



        }

        .container .content {
            display: grid;
            text-align: center;
        }

        a {
            background-color: rgba(0, 68, 255, 0.8);
            text-decoration: none;
            margin: 10px;
            outline: none;
            border: none;
            color: rgb(240, 205, 164);
            padding: 10px;
            border-radius: 10px;

        }

        a:hover {
            box-shadow: 0px 0px 10px blue;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="content">
            <h1>Your Ordered has been placed successfully!!! wait for your product to come</h1><br><br><hr><br>
            <a href="home.php">Go back to home</a>
        </div>
    </div>
</body>

</html>