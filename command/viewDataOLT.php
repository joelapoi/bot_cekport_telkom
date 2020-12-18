<?php 
require_once 'database/configDB.php';

function viewDataOLT($node_ip){

    $queryViewDataOLT = "SELECT witel, sto, vendor, node_ip, jmlh_onu_id, nama_odp1, nama_odp2, nama_odp3, nama_odp4 FROM tb_data WHERE node_ip = $node_ip";
    $resultQueryView      = mysqli_query(connDB(), $queryViewDataOLT);    
    $message = "";

    if ($resultQueryView->num_rows > 0) {
        while ($viewDataBesarOLT = mysqli_fetch_assoc($resultQueryView)) {
            $resultDataOLT = (object) $viewDataBesarOLT;
            if ($resultDataOLT->jmlh_onu_id < 32) {
                $status .= "OK";
            }else {
                $status .= "NOK";
            }
            $message .= "Witel                     : " . $resultDataOLT->witel . PHP_EOL;
            $message .= "STO                       : " . $resultDataOLT->sto . PHP_EOL;
            $message .= "Vendor                : " . $resultDataOLT->vendor . PHP_EOL;
            $message .= "Node IP               : " . $resultDataOLT->node_ip . PHP_EOL;
            $message .= "Jumlah Onu ID   : " . $resultDataOLT->jmlh_onu_id . PHP_EOL;
            $message .= "Nama ODP 1      : " .$resultDataOLT->nama_odp1 . PHP_EOL;
            $message .= "Nama ODP 2      : " .$resultDataOLT->nama_odp2 . PHP_EOL;
            $message .= "Nama ODP 3      : " .$resultDataOLT->nama_odp3 . PHP_EOL;
            $message .= "Nama ODP 4      : " .$resultDataOLT->nama_odp4 . PHP_EOL;
            $message .= "Status                  : " . $status . PHP_EOL;
            $message .= "\n";

        }
    }
    else{
        $message = "Data Masih Kosong 🙄";
    }

    return $message;
    
}

function viewDataODP($nama_odp){

    $queryViewDataODP   = "SELECT witel, sto, vendor, node_ip, jmlh_onu_id, nama_odp1, nama_odp2, nama_odp3, nama_odp4 FROM tb_data WHERE nama_odp1 = '$nama_odp'";
    $resultQueryViewODP = mysqli_query(connDB(), $queryViewDataODP);
    $queryViewDataODP2   = "SELECT witel, sto, vendor, node_ip, jmlh_onu_id, nama_odp1, nama_odp2, nama_odp3, nama_odp4 FROM tb_data WHERE nama_odp2 = '$nama_odp'";
    $resultQueryViewODP2 = mysqli_query(connDB(), $queryViewDataODP2);  
    $queryViewDataODP3   = "SELECT witel, sto, vendor, node_ip, jmlh_onu_id, nama_odp1, nama_odp2, nama_odp3, nama_odp4 FROM tb_data WHERE nama_odp3 = '$nama_odp'";
    $resultQueryViewODP3 = mysqli_query(connDB(), $queryViewDataODP3); 
    $queryViewDataODP4   = "SELECT witel, sto, vendor, node_ip, jmlh_onu_id, nama_odp1, nama_odp2, nama_odp3, nama_odp4 FROM tb_data WHERE nama_odp4 = '$nama_odp'";
    $resultQueryViewODP4 = mysqli_query(connDB(), $queryViewDataODP4); 
    $message            = "";

    if ($resultQueryViewODP->num_rows > 0) {
        while ($viewDataBesarODP = mysqli_fetch_assoc($resultQueryViewODP)) {
            $resultDataODP = (object) $viewDataBesarODP;
            if ($resultDataODP->jmlh_onu_id < 32) {
                $status .= "OK";
            }else {
                $status .= "NOK";
            }
            $message .= "Witel                     : " . $resultDataODP->witel . PHP_EOL;
            $message .= "STO                       : " . $resultDataODP->sto . PHP_EOL;
            $message .= "Vendor                : " . $resultDataODP->vendor . PHP_EOL;
            $message .= "Node IP               : " . $resultDataODP->node_ip . PHP_EOL;
            $message .= "Jumlah Onu ID   : " . $resultDataODP->jmlh_onu_id . PHP_EOL;
            $message .= "Nama ODP 1      : " .$resultDataODP->nama_odp1 . PHP_EOL;
            $message .= "Nama ODP 2      : " .$resultDataODP->nama_odp2 . PHP_EOL;
            $message .= "Nama ODP 3      : " .$resultDataODP->nama_odp3 . PHP_EOL;
            $message .= "Nama ODP 4      : " .$resultDataODP->nama_odp4 . PHP_EOL;
            $message .= "Status                  : " . $status . PHP_EOL;
            $message .= "\n";

        }
    }
    else if ($resultQueryViewODP2->num_rows > 0) {
        while ($viewDataBesarODP = mysqli_fetch_assoc($resultQueryViewODP2)) {
            $resultDataODP2 = (object) $viewDataBesarODP;
            if ($resultDataODP2->jmlh_onu_id < 32) {
                $status .= "OK";
            }else {
                $status .= "NOK";
            }
            $message .= "Witel                     : " . $resultDataODP2->witel . PHP_EOL;
            $message .= "STO                       : " . $resultDataODP2->sto . PHP_EOL;
            $message .= "Vendor                : " . $resultDataODP2->vendor . PHP_EOL;
            $message .= "Node IP               : " . $resultDataODP2->node_ip . PHP_EOL;
            $message .= "Jumlah Onu ID   : " . $resultDataODP2->jmlh_onu_id . PHP_EOL;
            $message .= "Nama ODP 1      : " .$resultDataODP2->nama_odp1 . PHP_EOL;
            $message .= "Nama ODP 2      : " .$resultDataODP2->nama_odp2 . PHP_EOL;
            $message .= "Nama ODP 3      : " .$resultDataODP2->nama_odp3 . PHP_EOL;
            $message .= "Nama ODP 4      : " .$resultDataODP2->nama_odp4 . PHP_EOL;
            $message .= "Status                  : " . $status . PHP_EOL;
            $message .= "\n";

        }
    }
    else if ($resultQueryViewODP3->num_rows > 0) {
        while ($viewDataBesarODP = mysqli_fetch_assoc($resultQueryViewODP3)) {
            $resultDataODP3 = (object) $viewDataBesarODP;
            if ($resultDataODP3->jmlh_onu_id < 32) {
                $status .= "OK";
            }else {
                $status .= "NOK";
            }
            $message .= "Witel                     : " . $resultDataODP3->witel . PHP_EOL;
            $message .= "STO                       : " . $resultDataODP3->sto . PHP_EOL;
            $message .= "Vendor                : " . $resultDataODP3->vendor . PHP_EOL;
            $message .= "Node IP               : " . $resultDataODP3->node_ip . PHP_EOL;
            $message .= "Jumlah Onu ID   : " . $resultDataODP3->jmlh_onu_id . PHP_EOL;
            $message .= "Nama ODP 1      : " .$resultDataODP3->nama_odp1 . PHP_EOL;
            $message .= "Nama ODP 2      : " .$resultDataODP3->nama_odp2 . PHP_EOL;
            $message .= "Nama ODP 3      : " .$resultDataODP3->nama_odp3 . PHP_EOL;
            $message .= "Nama ODP 4      : " .$resultDataODP3->nama_odp4 . PHP_EOL;
            $message .= "Status                  : " . $status . PHP_EOL;
            $message .= "\n";

        }
    }
    else if ($resultQueryViewODP4->num_rows > 0) {
        while ($viewDataBesarODP = mysqli_fetch_assoc($resultQueryViewODP4)) {
            $resultDataODP4 = (object) $viewDataBesarODP;
            if ($resultDataODP4->jmlh_onu_id < 32) {
                $status .= "OK";
            }else {
                $status .= "NOK";
            }
            $message .= "Witel                     : " . $resultDataODP4->witel . PHP_EOL;
            $message .= "STO                       : " . $resultDataODP4->sto . PHP_EOL;
            $message .= "Vendor                : " . $resultDataODP4->vendor . PHP_EOL;
            $message .= "Node IP               : " . $resultDataODP4->node_ip . PHP_EOL;
            $message .= "Jumlah Onu ID   : " . $resultDataODP4->jmlh_onu_id . PHP_EOL;
            $message .= "Nama ODP 1      : " .$resultDataODP4->nama_odp1 . PHP_EOL;
            $message .= "Nama ODP 2      : " .$resultDataODP4->nama_odp2 . PHP_EOL;
            $message .= "Nama ODP 3      : " .$resultDataODP4->nama_odp3 . PHP_EOL;
            $message .= "Nama ODP 4      : " .$resultDataODP4->nama_odp4 . PHP_EOL;
            $message .= "Status                  : " . $status . PHP_EOL;
            $message .= "\n";

        }
    }
    else{
        $message = "Data Masih Kosong 🙄";
    }

    return $message;
    
}


?>