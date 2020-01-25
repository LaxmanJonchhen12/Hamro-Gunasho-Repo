<?php
// establishing the conncetion
include("dbConnection.php");

if (isset($_POST['submit'])) {

    // checking whether the fields are empty or not
    if ($_POST['name'] == "" || $_POST['email'] == "" || $_POST['CitizenshipNo'] == "" || $_POST['password'] == "") {
        $message = "<div>all fiells are empty</div>";

        // applly styling to the div for erro message styling
    } else {

        // checking whether the email has been taken or not

        $sql = "select uemail from user_info where uemail='" . $_POST['email'] . "' ";
        $result = $conn->query($sql);

        if ($result->num_rows >= 1) {
            $message = "email id already registerd";
        } else {

            // super global variables
            $Name = $_POST['name'];
            $Email = $_POST['email'];
            $Password = $_POST['password'];
            $CitizenNo = $_POST['CitizenshipNo'];

            $sql = "insert into user_info(uname,uemail,upassword,cno) values('$Name','$Email','$Password','$CitizenNo');";

            // checking whether the query is sucessful or not

            if ($conn->query($sql) == true) {
                $message = "<div>Account created sucessfully</div>";
            } else {
                $message = "<div>Account not created</div>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Register</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" />
    <style>
        * {
            /* 
        -May want to add "border-box for "box-sizing so padding does not affect width
        -Reset margin and padding 
       */
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            /* 
          -Background color is #344a72
        */
            background-color: grey;
            background-image: url("");
            background-repeat: no-repeat;
            background-size: 100% 100%;
            font-family: sans-serif;
            color: white;
            line-height: 1.8;
        }

        a {
            /* 
        Underlined links are ugly :)
       */
            text-decoration: none;
        }

        #container {
            /* 
        -Remember, margin: auto on left and right will center a block element 
        -I would also set a "max-width" for responsiveness
        -May want to add some padding
        */
            max-width: 400px;
            margin: 30px auto;
            padding: 20px;
        }

        .form-wrap {
            /* 
          This is the white area around the form and heading, etc
        */
            background: white;
            color: #333;
            padding: 15px 25px;
            border-radius: 10px;
        }

        .form-wrap h1,
        .form-wrap p {
            /* 
          May want to center these
        */
            text-align: center;
        }

        .form-wrap .form-group {
            /* 
          Each label, input is wrapped in .form-group
        */
            margin-top: 15px;
        }

        .form-wrap .form-group label {
            /* 
          Label should be turned into a block element
        */
            display: block;
            color: #666;
        }

        .form-wrap .form-group input {
            /* 
          Inputs should reach accross the .form-wrap 100% and have some padding
        */
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-wrap button {
            /* 
          Button should wrap accross 100% and display as block
          Background color for button is #49c1a2
        */
            background: #49c1a2;
            display: block;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            padding: 10px;
        }

        .form-wrap button:hover {
            /* 
          Hover background color for button is #37a08e
        */
            background: #37a08e;
        }

        .form-wrap .bottom-text {
            /* 
          Bottom text is smaller
        */
            font-size: 13px;
            margin-top: 20px;
        }

        footer {
            /* 
        Should be centered
       */
            text-align: center;
            margin-top: 10px;
        }

        footer a {
            /* 
          Footer link color is #49c1a2
        */
            color: black;
        }

        button {
            background-color: #37a08e;
            border-radius: 8px;
            height: 40px;
            width: 80px;
        }
    </style>
</head>

<body>
    <!-- Sign Up Form Styling -->
    <div id="container">
        <div class="form-wrap">
            <h1>Sign Up</h1>
            <form method="post" action="formtry.php">
                <div class="form-group">
                    <label for="Name"> Name</label>
                    <input type="text" name="name" id="name" autofocus="on" placeholder="Your Full Name" />
                </div>

                <div class="form-group">
                    <label for="CitizenshipNo"> Citizenship No</label>
                    <input type="text" name="CitizenshipNo" id="CitizenshipNo" autofocus="on" placeholder="Your Citizenship No" />
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" />
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autofocus required />
                </div>

                <div>
                    <input type="submit" name="submit" value="Sign Up and Address your Problem">
                </div>


                <p class="bottom-text">
                    By clicking the Sign Up button, you agree to our
                    <a href="#">Terms & Conditions</a> and
                    <a href="#">Privacy Policy</a>
                </p>

                <?php if (isset($message)) {
                    echo $message;
                }

                ?>
            </form>
        </div>
        <footer>
            <p>
                Already have an account?
                <button><a href="logintry.php">Login Here</a></button>
            </p>
        </footer>
        <a href="index.php"> Go To Home</a>
    </div>
</body>

</html>