<?php
    require_once "method.php";
    $mahasiswa = new Mahasiswa();
    $request_method=$_SERVER["REQUEST_METHOD"];
    switch ($request_method) {
        case 'GET':
            if ( !empty($_GET['nim']) ) {
                $nim = $_GET['nim'];
                $mahasiswa->get_mhs($nim);
            }  elseif ( !empty($_GET['nim']) && !empty($_GET['kode_mk']) ) {
                $nim = $_GET['nim'];
                $kode_mk = $_GET['kode_mk'];
                $mahasiswa->delete_nilai_mhs($nim,$kode_mk);  
            } else {
                $mahasiswa->get_all_nilai_mhs();
            }
            break;
        case 'POST':
            if ( !empty($_GET['nim']) && !empty($_GET['kode_mk']) )  {
                $nim = $_GET['nim'];
                $kode_mk = $_GET['kode_mk'];
                $mahasiswa->update_nilai_mhs($nim,$kode_mk);
            } else {
                $mahasiswa->insert_nilai_mhs();
            }
            break;
        default:
            header("HTTP/1.0 405 Method Not Allowed");
            break;
    }
?>