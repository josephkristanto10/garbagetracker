<?php
include 'connection.php';
$tipe = $_POST['tipe'];
if($tipe == "listmarkertong")
{
    $sql = "select * from marker";
    $res = $conn->query($sql);
    $mymarker = array();
    if($res -> num_rows > 0 )
    {
        while($r = mysqli_fetch_array($res))
        {
            $mymarker[] = $r;
        }
        print json_encode(array('data' => $mymarker));
    }
    else{
        echo "none";
    }
}
else if($tipe == "tambahposisi")
{
    $mylat = $_POST['lat'];
    $mylong= $_POST['long'];
    $mynama = $_POST['nama'];
    $sqlcheck = "select * from marker where namamarker = '$mynama'";
    $rescheck = $conn->query($sqlcheck);
    if($rescheck -> num_rows>0)
    {
        echo "exists";
    }
    else{
        $sql = "INSERT into marker values (NULL, '$mynama', '$mylat', '$mylong', 'Active');";
        $res = $conn->query($sql);
        echo "ok";
    }

}
?>