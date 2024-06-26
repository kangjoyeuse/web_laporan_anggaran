<?php

function select($query) {
  global $mysqli;
  $result = mysqli_query($mysqli, $query);
  $data = [];

  while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
  }
  return $data;
}

// Menambah data laporan
function create_laporan($post) {
  global $mysqli;
  $nama_program = $post["nama_program"];
  $anggaran = $post["anggaran"];
  $realisasi_anggaran = $post["realisasi_anggaran"];
  $rasio_realisasi_anggaran = ($realisasi_anggaran / $anggaran) * 100;
  // $post["rasio_realisasi_anggaran"];
  $keterangan = $post["keterangan"];

  // Query tambah data
  $query = "INSERT INTO laporan (nama_program, anggaran, realisasi_anggaran, rasio_realisasi_anggaran, keterangan, tanggal) VALUES ('$nama_program', '$anggaran', '$realisasi_anggaran', '$rasio_realisasi_anggaran', '$keterangan', CURRENT_TIMESTAMP())";

  // Eksekusi query
  mysqli_query($mysqli, $query);

  return mysqli_affected_rows($mysqli);
}

// Mengubah data laporan
function ubah_laporan($post) {
  global $mysqli;
  $id_laporan = $post["id_laporan"];
  $nama_program = $post["nama_program"];
  $anggaran = $post["anggaran"];
  $realisasi_anggaran =$post["realisasi_anggaran"];
  $rasio_realisasi_anggaran = ($realisasi_anggaran / $anggaran) * 100;
  // $post["rasio_realisasi_anggaran"];
  $keterangan = $post["keterangan"];

  // Query ubah data
  $query = "UPDATE laporan SET nama_program = '$nama_program', anggaran = '$anggaran', realisasi_anggaran = '$realisasi_anggaran', rasio_realisasi_anggaran = '$rasio_realisasi_anggaran', keterangan = '$keterangan' WHERE id_laporan = $id_laporan";

  // Eksekusi query
  mysqli_query($mysqli, $query);

  return mysqli_affected_rows($mysqli);
}

function delete_laporan($id_laporan) {
  global $mysqli;

  // Query hapus data
  $query = "DELETE FROM laporan WHERE id_laporan = $id_laporan";

  return mysqli_query($mysqli, $query);
}

function create_akun($post) {
  global $mysqli;
  $nama = strip_tags($post["nama"]);
  $username =strip_tags($post["username"]);
  $email = strip_tags($post["email"]);
  $password = strip_tags($post["password"]);
  $level = strip_tags($post["level"]);

  // Query tambah data
  $query = "INSERT INTO akun VALUES (null, '$nama', '$username', '$email', '$password', '$level')";

  mysqli_query($mysqli, $query);

  return mysqli_affected_rows($mysqli);
}

function ubah_akun($post) {
  global $mysqli;

  $id_akun = strip_tags($post["id_akun"]);
  $nama = strip_tags($post["nama"]);
  $username =strip_tags($post["username"]);
  $email = strip_tags($post["email"]);
  $password = strip_tags($post["password"]);
  $level = strip_tags($post["level"]);

  // Query tambah data
  $query = "UPDATE akun SET nama_akun = '$nama', username = '$username', email = '$email', password =  '$password', level = '$level' WHERE id_akun = $id_akun";

  mysqli_query($mysqli, $query);

  return mysqli_affected_rows($mysqli);
}


function delete_akun($id_akun) {
  global $mysqli;

  // Query hapus data
  $query = "DELETE FROM akun WHERE id_akun = $id_akun";

  mysqli_query($mysqli, $query);

  return mysqli_query($mysqli, $query);
} 