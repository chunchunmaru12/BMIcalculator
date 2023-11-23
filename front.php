<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Calculator</title>
    <style>
        /* Resetting default margin */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            background-image: url("./image/furina.png");
            background-size: cover;
        }

        header {
            height: 100px;
            text-align: center;
            font-size: 36px;
            line-height: 100px;
            color: white;
        }

        footer {
            background-color: #f0f0f0;
            text-align: center;
            padding: 20px;
            position: fixed;
            bottom: 0;
            width: 100%;
            font-size: 18px;
        }

        .main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 200px);
        }

        .container {
            max-width: 800px;
            padding: 20px;
            margin: auto;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            font-size: 36px;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        ul {
            list-style-type: none;
            padding-left: 20px;
        }

        li {
            margin-bottom: 10px;
        }

        .healthy {
            color: #2ecc71;
            font-weight: bold;
        }

        .underweight {
            color: #e74c3c;
            font-weight: bold;
        }

        .overweight {
            color: #f39c12;
            font-weight: bold;
        }

        .obese {
            color: #e67e22;
            font-weight: bold;
        }

        .login,
        .register {
            margin: 20px;
            text-align: center;
        }

        .login input,
        .register input {
            padding: 15px 30px;
            font-size: 18px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }

        .login input:hover,
        .register input:hover {
            background-color: pink;
        }
    </style>
</head>

<body>
    <header>
        BMI Calculator
    </header>
    <div class="main">
        <div class="container">
            <h1>Body Mass Index (BMI)</h1>
            <p>
                BMI, which stands for <span class="healthy">Body Mass Index</span>,
                measures the amount of body fat based on a person's weight and height. According to the
                <span class="healthy">World Health Organization (WHO)</span>, the standard BMI values are as follows:
            </p>
            <ul>
                <li><span class="healthy">18.5 to 24.9:</span> A person's body height and weight ratio is considered <span
                        class="healthy">healthy</span> within this range.</li>
                <li><span class="underweight">Less than 18.5:</span> Indicates a very skinny and <span class="underweight">underweight</span>
                    person who may need to increase their calorie and carbohydrate intake.</li>
                <li><span class="overweight">25 to 29.9:</span> Indicates that the person is <span class="overweight">overweight</span>.</li>
                <li><span class="obese">30 or greater:</span> Considered very dangerous, and such a person can be
                    classified as <span class="obese">obese</span>.</li>
            </ul>
        </div>

        <div class="login">
            <p>Already a User? Log in here</p>
            <form action="login.php" method="POST">
                <input type="submit" name="login" value="Log In">
            </form>
        </div>

        <div class="register">
            <p>Want to know your BMI? Register now</p>
            <form action="signup.php" method="POST">
                <input type="submit" name="Register" value="Register">
            </form>
        </div>

        <div class="img">
            <img src="./image/bmi.jpg" alt="" width="400px">
        </div>
    </div>
    <footer>&copy; Noorullah Khan</footer>
</body>

</html>
