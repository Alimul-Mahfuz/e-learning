<?php 


/*This form is submitted to self and validated from reg-control.php*/
require '../controller/reg-control.php'; 


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- External css links -->
    <link rel="stylesheet" href="./css/registrationstyle.css" />
    <link rel="stylesheet" href="./css/navbar-style.css">
    <link rel="stylesheet" href="./css/footerstyle.css">
    <title>Register To E-Learning</title>
</head>

<style>
    /* Error styling for */
    .errorstyle {
        font-size: 10pt;
        color: red;
    }
</style>

<body>
    <!-- Global footer -->
    <?php include 'index-navbar.php'; ?>
    <!-- End of the footer -->

    <!-- Registration main area -->
    <div class="registration-container">
        <div class="reg-form">
            <h3>Thanks for joining with us</h3>
            <!-- Staring seciton of registration form area -->
            <div class="regform-container">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <!-- Table container -->
                    <table>
                        <tr>
                            <td>
                                <input type="text" name="fname" value="<?php echo $fname; ?>" placeholder="First Name" id="" />
                                <br>
                            </td>
                            <td>
                                <input type="text" id="lname" name="lname" value="<?php echo $lname; ?>" placeholder="Last Name" id="" />
                            </td>

                        </tr>
                        <tr>
                            <td> <span class="errorstyle"><?php echo $fnameErr; ?></span></td>
                            <td> <span class="errorstyle"><?php echo $lnameErr; ?></span></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input style="width: 100%" type="email" value="<?php echo $email; ?>" name="email" placeholder="Email" />
                                <br>
                                <span class="errorstyle"><?php echo $emailErr; ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input style="width: 100%" type="text" value="<?php echo $phone; ?>" name="phone" placeholder="Phone" />
                                <span class="errorstyle"><?php echo $phoneErr; ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input style="width: 100%" type="password" name="password" placeholder="Password" />
                                <br>
                                <span class="errorstyle"><?php echo $passwordErr; ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input style="width: 100%" type="password" name="re-password" placeholder="Re-type Password" />
                                <span class="errorstyle"><?php echo $retypePasswordErr; ?>
                                <span class="errorstyle"><?php echo $passmismatchErr; ?>
                            </td>
                        </tr>
                        <tr>
                            <!-- Role selection combobox -->
                            <td colspan="2">
                                <select style="width: 100%;" name="urole" id="">
                                    <option value="" disabled selected>I am a ...</option>
                                    <option value="1">Teacher</option>
                                    <option value="2">Student</option>
                                </select>
                                <span class="errorstyle"><?php echo $urollErr; ?>
                            </td>
                        </tr>
                        <tr>
                            <!-- sungup button -->
                            <td colspan="2" id="btn-comb"><button id="singupbtn" name="btn-singup" type="submit">Sing Up</button>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <p>Already have a account? <a href="./login.php">Login</a></p>
                            </td>
                        </tr>
                    </table>
                    <!-- End of table container -->

                </form>
                <!-- End of the form -->
            </div>
        </div>
    </div>
    <!-- End of the main area -->



    <!-- footer section -->
    <?php include 'footer.php'; ?>
</body>

</html>