<?php

require __DIR__ . '/../database/config.php';

$connection = getConnection();

// function query

function query($query){
    global $connection;
    return $connection->query($query)->fetchAll();
}

// function format tanggal indonesia
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
 
// function format waktu 
function waktu($waktu){
    $getJamMenitDetik = explode('.', $waktu);
    $pecahkan = explode(':', $getJamMenitDetik[0]);

    return $pecahkan[0] . " : " . $pecahkan[1] . " : " . $pecahkan[2] ;
}

// function registrasi
function registrasi($data){
    global $connection;

    $namaLengkap = htmlentities($data["nama_depan"]) . " " . htmlentities($data["nama_belakang"]);
    $email =  htmlentities($data["email"]);
    $bio = htmlentities($data["bio"]);
    $username = htmlentities(strtolower(stripslashes($data["username"])));
    $password = htmlentities($data["password"]);
    $konfirmasiPassword = htmlentities($data["konfirmasi_password"]);

    $image = uploadAvatar();
    
    // jika return 4 error ukuran gambar
    if( uploadAvatar() == 4 ){
        return 4;
    }

    // cek password
    if($password !== $konfirmasiPassword){
        return 3;
    }

    // cek username
    $result = $connection->query("SELECT * FROM admin WHERE username = '$username'");
    if( $result->fetchColumn() ){
        return 2;
    }


    // penegecekan berhasil
    // enkripsi passowrd
    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = <<<SQL
        INSERT INTO admin (nama_lengkap, username, password, email, bio, image)
        VALUES (?, ?, ?, ?, ?, ?)
    SQL;

    $statement = $connection->prepare($sql);
    $statement->execute([$namaLengkap, $username, $password, $email, $bio, $image]);

    return $statement->rowCount();
}

// function upload
function uploadAvatar(){

    $namaFile = $_FILES["image"]["name"];
    $ukuranFile = $_FILES["image"]["size"];
    $tmpName = $_FILES["image"]["tmp_name"];

    // pengecekan ukuran gambar
    if( $ukuranFile > 1000000 ){
        return 4; 
    }

    // lolos pengecekan
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    $namaFile = explode('.', $namaFile);
    $namaFile = $namaFile[0];
    $tanggalUplaod = date("YmdHis");
    $namaFileBaru = "$namaFile" . "_" . $tanggalUplaod . "." . $ekstensiGambar;

    move_uploaded_file($tmpName, 'assets/img/avatar/'.$namaFileBaru);
    return $namaFileBaru;
}

function uploadArtikel(){

    $namaFile = $_FILES["image"]["name"];
    $ukuranFile = $_FILES["image"]["size"];
    $tmpName = $_FILES["image"]["tmp_name"];

    // pengecekan ukuran gambar
    if( $ukuranFile > 1000000 ){
        return 4; 
    }

    // lolos pengecekan
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    $namaFile = explode('.', $namaFile);
    $namaFile = $namaFile[0];
    $tanggalUplaod = date("YmdHis");
    $namaFileBaru = "$namaFile" . "_" . $tanggalUplaod . "." . $ekstensiGambar;

    move_uploaded_file($tmpName, 'assets/img/articles/'.$namaFileBaru);
    return $namaFileBaru;
}


// function tambah artikel
function createPost($data){
    global $connection;

    $judulArtikel = htmlentities($data["judul_artikel"]);
    $pic = htmlentities($data["pic"]);
    $idKategori = $data["id_kategori"];
    $idUser = $data["id_user"];
    $isiArtikel = $data["isi_artikel"];

    $image = uploadArtikel();
    
    // jika return 4 error ukuran gambar
    if( uploadArtikel() == 4 ){
    return 4;
    }


    $sql = <<<SQL
        INSERT INTO artikel (id_kategori, id_user, judul_artikel, image, pic, isi_artikel)
        VALUES (?, ?, ?, ?, ?, ?)
    SQL;

    $statement = $connection->prepare($sql);
    $statement->execute([$idKategori, $idUser, $judulArtikel, $image, $pic, $isiArtikel]);

    return  $statement->rowCount();
}

function editPost($data){
    global $connection;

    $idArtikel = $data["id_artikel"];
    $judulArtikel = htmlentities($data["judul_artikel"]);
    $idKategori = $data["id_kategori"];
    $isiArtikel = $data["isi_artikel"];
    $oldImage = $data["old_image"];

    // waktu edit sekarang
    $tz = 'Asia/Jakarta';
    $dt = new DateTime("now", new DateTimeZone($tz));
    $time = $dt->format('G:i:s');
    $date = $dt->format('Y-m-d');


    if( $_FILES["image"]["error"] === 4 ){
        $image = $oldImage;
    }else{
        $image = uploadArtikel();
    }

    $sql = <<<SQL
        UPDATE artikel SET 
        judul_artikel=?, id_kategori=?, isi_artikel=?,  image=?, tanggal_modifikasi=?, waktu_modifikasi=?
        WHERE id_artikel=?;
    SQL;

    $statement = $connection->prepare($sql);
    $statement->execute([$judulArtikel, $idKategori, $isiArtikel, $image, $date, $time, $idArtikel]);

    return  $statement->rowCount();
}

// function delete artikel
function deleteArtikel($id){
    global $connection;

    $sql = "DELETE FROM artikel WHERE id_artikel = $id";
    $statement = $connection->query($sql);
    
    return $statement->rowCount();
}


// function edit user
function editUser($data){

    global $connection;

    $id = $data["id_user"];
    $nama = htmlentities($data["nama_lengkap"]);
    $username = htmlentities($data["username"]);
    $email = htmlentities($data["email"]);
    $bio = htmlentities($data["bio"]);

    $sql = <<<SQL
    UPDATE admin SET 
    nama_lengkap=?, username=?, email=?,  bio=?
    WHERE id_user=?;
    SQL;

    $statement = $connection->prepare($sql);
    $statement->execute([$nama, $username, $email, $bio, $id]);

    return  $statement->rowCount();


}