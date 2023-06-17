<?php 
    // require('database.php');
    date_default_timezone_set("Asia/Jakarta");
    setlocale(LC_ALL, 'di_ID');
    switch(date('l')){
        case 'Sunday' : $day = "Minggu"; break;
        case 'Monday' : $day = "Senin"; break;
        case 'Tuesday' : $day = "Selasa"; break;
        case 'Wednesday' : $day = "Rabu"; break;
        case 'Thursday' : $day = "Kamis"; break;
        case 'Friday' : $day = "Jumat"; break;
        case 'Saturday' : $day = "Sabtu"; break;
        default : break;
    }
    $method = $_SERVER["REQUEST_METHOD"];
    $date = date("Y-m-d");
    $time = date("H:i:s");
    // $config = query("SELECT * FROM config")[0];

    if($method === "GET"){
        $show = [
            'jam' => strval($date).' '.strval($time),
            // 'status' => strval($config["card_mode"]),
            'hari' => strval($day)
            ]; 
        print(json_encode($show));
    }
    /*
    if($method === "POST"){
        if(isset($_POST['tag_id'])){
            $tag = strval($_POST['tag_id']);
            // fungsi if card read
            
            $show = ['status_post' => "", 'info' => "", 'info2' => "", 'status' => ""];
    
            if($config["card_mode"] == 'read_card'){
                $result = query("SELECT id_pegawai, nama_pegawai FROM pegawai WHERE tag_id = '$tag'");
                if(!empty($result)){
                    $result = $result[0];
                    $ket = '';
                    if(intval(date("H")) > 8){
                        $ket = 'Telat';
                    }
                    else{
                        $ket = 'Hadir';
                    }
                    $data = [
                        'id' => intval($result['id_pegawai']),
                        'nama' => $result['nama_pegawai'],
                        'day' => $day,
                        'date' => $date,
                        'time' => $time,
                        'ket' => $ket
                    ];
                    if($day == "Senin" || $day == "Selasa" || $day == "Rabu" || $day == "Kamis" || $day == "Jumat"){
                        $namaPegawai = $result['nama_pegawai'];
                        $cekAbsensi = "SELECT * FROM `presensi` WHERE nama_pegawai = '$namaPegawai' AND tanggal_presensi = '$date'";
                        if(!empty($cekAbsensi)){
                            if(addPresensi($data) > 0){
                                $show['status_post'] = "Ok" ;
                                $show['info'] = $data['nama'];
                                $show['info2'] = "Berhasil Presensi";
                                $show['status'] = $ket;
                            }
                            else{
                                $show['status_post'] = "Error";
                                $show['info'] = $data['nama'];
                                $show['info2'] = "Gagal Presensi";
                            }
                        }
                        else{
                            $show['info'] = $namaPegawai;
                            $show['info2'] = "Sudah Presensi";
                        }
                    }
                    else{
                        $show['status_post'] = "Ok" ;
                        $show['info'] = "Hari Libur";
                    }
                }
                else{
                    $show['status_post'] = "Ok";
                    $show['info'] = "Data Belum Ada";
                }
            }
            else if($config["card_mode"] == 'add_card'){
                if(cekTag($tag)){ 
                    if(updateNewTag($tag) > 0){
                        $show['status_post'] = "Ok";
                        $show['info'] = "Tag Baru Terbaca";
                    }
                    else{
                        $show['status_post'] = "Error";
                        $show['info'] = "Tag Sudah Ada";
                    }
                }
            }
            print(json_encode($show));
        }
        else{
        $show = [
            'status_post' => 'OK',
            'info' => 'Paramater Kosong'
        ];
        print(json_encode($show));
        }
    } */
?>