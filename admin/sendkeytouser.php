<?php
// Start a session for error reporting
include 'config.php';

session_start();
// Get our POSTed variables
$a1 = $_POST['a1'];
$a2 = $_POST['a2'];
$a3 = $_POST['a3'];




 //$con = mysqli_connect("sql6.freemysqlhosting.net","sql6453269","13gSHbLs1b");
                                if (!$con)
                                    echo('Could not connect: ' . mysqli_error());
                                else
                                {
                                    //mysqli_select_db( $con,"sql6453269");
	$sql = "UPDATE askkey SET k='$a2',status='yes' WHERE filename='$a3'and user='$a1' ";
    $result = mysqli_query($con,$sql) or die ("Could not send data into DB: " . mysqli_error($con));
    $sql = "INSERT INTO record(subject,topic,sendto,time) VALUES ('" . $_POST["a3"] ."','" . $_POST["a2"] . "','" . 
							  $_POST["a1"] ."','".date("Y/m/d")."');";
						if (!mysqli_query($con,$sql))
							echo('Error : ' . mysqli_error($con));
						else
							echo '<script language="javascript">alert("Key has been successfully send!")</script>';
						
	header("Location: https://cse3501project.herokuapp.com/admin/admin.php");
	exit;
								}
?>
