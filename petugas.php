<?php
include 'connection.php';
$tipe = $_POST['tipe'];
if($tipe == "listpetugas")
{
    $sql = "select * from petugas inner join detail_petugas on detail_petugas.idpetugas = petugas.idpetugas";
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
?>