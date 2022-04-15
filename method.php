<?php
    require_once "connect.php";
    class Mahasiswa
    {
        public function get_all_nilai_mhs() 
        {
            global $conn;
            $query = "SELECT m.nim, m.nama ,m.alamat ,m.tanggal_lahir,
                            p.kode_mk , m2.nama_mk, m2.sks , p.nilai 
                        FROM mahasiswa m 
                        JOIN perkuliahan p on m.nim = p.nim 
                        JOIN matakuliah m2 on m2.kode_mk = p.kode_mk";
            $result=$conn->query($query);
            while($row=mysqli_fetch_object($result))
            {
                $data[]=$row;
            }

            if ($data) {
                $response=array(
                    'status' => 1,
                    'message' =>'Success',
                    'data' => $data
                );
            } else {
                $response=array(
                    'status' => 0,
                    'message' =>'Data not found'
                );
            }
            
            header('Content-Type: application/json');
            echo json_encode($response);
        }

        public function get_mhs($nim) 
        {
            global $conn;

            $query = "SELECT m.nim, m.nama ,m.alamat ,m.tanggal_lahir,
                            p.kode_mk , m2.nama_mk, m2.sks , p.nilai 
                        FROM mahasiswa m 
                        JOIN perkuliahan p on m.nim = p.nim 
                        JOIN matakuliah m2 on m2.kode_mk = p.kode_mk
                        WHERE m.nim=$nim ";
            $result = $conn->query($query);

            while( $row = mysqli_fetch_object($result) ) {
                $data[] = $row;
            }

            if ( $data ) {
                $response = array(
                    'status' => 1,
                    'message' => 'Success',
                    'data' => $data
                );
            } else {
                $response = array(
                    'status' => 0,
                    'message' => 'Data not found'
                );
            }
            
            header('Content-Type: application/json');
            echo json_encode($response);
        }

        public function insert_nilai_mhs()
        {
            global $conn;
            $check = array(
                'id_perkuliahan' => '',
                'nim' => '',
                'kode_mk' => '',
                'nilai' => ''
            );
            
            $check_match = count(array_intersect_key($_POST, $check));
    
            if ($check_match == count($check)) {
                
                $nim = $_POST['nim'];
                $kode_mk = $_POST['kode_mk'];
                $id_perkuliahan = $_POST['id_perkuliahan'];
                $nilai = $_POST['nilai'];
    
                $result = mysqli_query($conn, "INSERT INTO perkuliahan VALUES($id_perkuliahan,'$nim','$kode_mk',$nilai)");
                
                if ($result) {
                    $response = array(
                        'status' => 1,
                        'message' => 'Insert Success'
                    );
                } else {
                    $response = array(
                        'status' => 0,
                        'message' => 'Insert Failed'
                    );
                }
            } else {
                $response = array(
                    'status' => 0,
                    'message' => 'Wrong parameter'
                );
            }
    
            header('Content-Type: application/json');
            echo json_encode($response);
        }

        public function update_nilai_mhs($nim,$kode_mk)
        {
            global $conn;
            $check = array(
                'nilai' => '',
            );
            
            $check_match = count(array_intersect_key($_POST, $check));
    
            if ($check_match == count($check)) {
                
                $nilai = $_POST['nilai'];
    
                $result = mysqli_query($conn,
                "UPDATE perkuliahan
                SET nilai = $nilai 
                WHERE nim = '$nim' AND kode_mk = '$kode_mk' ");
                
                if ($result) {
                    $response = array(
                        'status' => 1,
                        'message' => 'Update Success'
                    );
                } else {
                    $response = array(
                        'status' => 0,
                        'message' => 'Update Failed'
                    );
                }
            } else {
                $response = array(
                    'status' => 0,
                    'message' => 'Wrong parameter'
                );
            }
    
            header('Content-Type: application/json');
            echo json_encode($response);
        }

        public function delete_nilai_mhs($nim,$kode_mk) 
        {
            global $conn;

            $check = array(
                'id_perkuliahan' => ''
            );

            $result = mysqli_query($conn,
            "DELETE FROM perkuliahan WHERE nim = $nim AND kode_mk = $kode_mk");

            if ($result) {
                $response = array(
                    'status' => 1,
                    'message' => 'Delete Success'
                );
            } else {
                $response = array(
                    'status' => 0,
                    'message' => 'Delete Failed'
                );
            }

            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }
?>