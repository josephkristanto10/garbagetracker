<?php
include 'connection.php';
$tipe  = $_POST['tipe'];
if($tipe == "login")
{
    $myuser = $_POST['username'];
    $mypass = $_POST['password'];
    $sql = "select * from petugas inner join role on role.idrole = petugas.idrole where username = '$myuser' and password = '$mypass'";
    $res = $conn->query($sql);
    $myuser = array();
    if($res -> num_rows > 0 )
    {
        while($r = mysqli_fetch_array($res))
        {
            $myuser[] = $r;
        }
        print json_encode(array('data' => $myuser));
    }
    else{
        echo "none";
    }
}
?>