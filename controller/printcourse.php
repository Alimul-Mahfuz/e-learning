<?php
/*This file will only print the course that a logged in user took
Mean if the user logged in and already enrolled in one or many course this file will only show those enrolled course.
if hes or she didn't enrolled with will also disply that he or she didn't enrolled yet.
*/

//Exter file to connect to database
require '../../model/db-connect.php';


if ($conn->connect_error) {
    echo "Faild to connect database";
    exit;
} else {
    // Fetching user_id based on the usermail address
    /*The user_id will later used to find course id */
    if (empty($_SESSION['uid'])) {
        $q = "select user_id from users where email='" . $_SESSION['umail'] . "'";
        $result = $conn->query($q); //return the database result object which is stored in $result here
        //$result has a property num_rows which will return the number of rows return by the execution of the query
        if ($result->num_rows > 0) {
            /*The following loop will iterate over all the value that values are associate with the matched 
            data in an associative array format. */
            while ($row = $result->fetch_assoc()) {
                $_SESSION['uid'] = $row['user_id'];
            }
        }
    }
    $id = $_SESSION['uid'];
    $qc = "select c_id from payment where user_id='" . $id . "'";
    /*This return course id */
    $courseArray = [];

    $res = $conn->query($qc);
    // print_r($res);
    /*Printing the ccourse form payment, course table using user table*/

    /*The following code will used to find the course detail and user_id of the instructor of the course */
    if ($res->num_rows > 0) {
        while ($rw = $res->fetch_assoc()) {
            $cid = $rw['c_id'];
            array_push($courseArray,$cid);
            $qd = "select c_name,user_id from courses where c_id='" . $rw['c_id'] . "'";
            $rs = $conn->query($qd);
            if ($rs->num_rows > 0) {
                while ($ro = $rs->fetch_assoc()) {
                    echo '<tr>';
                    $cname = $ro['c_name'];
                    /*This will find the instructor details of the instructor who took the course */
                    $qe = "select name from users where user_id='" . $ro['user_id'] . "'";
                    $rt = $conn->query($qe);
                    if ($rt->num_rows > 0) {
                        while ($r = $rt->fetch_assoc()) {
                            // array_push($instructorArray, $r['name']);
                            $instname = $r['name'];
                        }
                    }
                    
?> 
<!-- Styling to print the course -->
<td style="background: linear-gradient(92.11deg, #487EB0 30.92%, rgba(<?php echo rand(10, 255); ?>, <?php echo rand(180, 255); ?>, 95, 0.536913) 80.37%, rgba(<?php echo rand(177, 255); ?>, 111, <?php echo rand(50, 255); ?>, 0) 124.93%);"><?php echo $cname; ?> <br> <span style="font-size: 12pt;font-weight: 300;"><?php echo 'Offered By: ' . $instname; ?></span>
                        <button><a href="../../controller/dropCourse.php?c_id=<?php echo $cid;?>">Drop</a></button>
                    </td><?php
                            echo '</tr>';
                        }
                    } else {
                        "faild to retrive course name";
                    }
                }
            } else {
                ?>
                <div>
                    <p style="text-align: center; font-size:18pt; font-weight:400">
                    <?php echo "You didn't enrolled any courses yet";?>
                </p>
                </div>
                <?php

            }
        }
