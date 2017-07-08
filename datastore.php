<?php
$modno = $_GET["modno"];
    $lakeno = $_GET["lakeno"];
    $temp =$_GET["temp"];
    $sal =$_GET["sal"];
    $turb =$_GET["turb"];
    $ph =$_GET["ph"];


$sql= new mysqli('localhost','root', '', 'wss' );

                                                        if($sql->connect_error)

                                                            { die("connection failed:". $sql->connect_error);
                                                            }

$query= $sql->query("insert into ard (sno, modno, temp, sal, turb, ph) values ($lakeno, $modno , $temp, $sal, $turb, $ph ) ");

if ($query!=TRUE){
    echo "error".$sql->error;
}
?>
