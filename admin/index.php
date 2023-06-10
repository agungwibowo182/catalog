<?php 

session_start();

if (!isset($_SESSION["login"])) {
	header ("location: login.php");
	exit;
}

require 'functions.php';
$buku = query ("SELECT * FROM buku");

//tombol cari ditekan
if( isset($_POST["cari"]) ) {
	$buku = cari($_POST["keyword"]);
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Form Buku</title>
	<title>Catalog</title>
</head>
<body>

<div class="container">
    <div class="row" style="margin : 50px;">
        <div class="col-md-2"></div>

        <div class="col-md-2 text-center">
            <h5><a href="#">Buku</a></h5>
        </div>
         <div class="col-md-2 text-center">
            <h5><a href="#">Katalog</a></h5>
        </div>
         <div class="col-md-2 text-center">
            <h5><a href="#">Penerbit</a></h5>
        </div>
         <div class="col-md-2 text-center">
            <h5><a href="#">Penulis</a></h5>
        </div>
    </div>

	<div class="row">
		<div class="col-md-12 text-right">
            <a href="logout.php" class="btn - btn-danger">Logout </a>
        </div>
		<br><br>
		<div class="col-md-6">
            <a href="tambah.php" class="btn - btn-primary">Add new Buku </a>
        </div>
		<div class="col-md-6 text-right">
			<form action="" method="post">
			<input type="text" name="keyword" size="40" autofocus placeholder="masukan keyword pencarian..." autocomplete="off" id="keyword">
			<button  type="submit" name="cari" id="tombol-cari">Cari !</button>	
			</form>
		</div>
		<br>
		<div class="col-md-12">
			<table class="table table-bordered">

				<tr>
					<th>No.</th>
					<th>Gambar</th>
					<th>Judul</th>
					<th>Harga</th>
					<th>Penerbit</th>
					<th>Tahun Terbit</th>
					<th>Penulis</th>
					<th>Aksi</th>
				</tr>

				<?php $i = 1; ?>
				<?php foreach ($buku as $row) : ?>
				<tr>
					<td><?= $i; ?></td>
					<td><img src="img/<?= $row["gambar"]; ?>" width="50"></td>
					<td><?= $row["judul"]; ?></td>
					<td><?= $row["harga"]; ?></td>
					<td><?= $row["penerbit"]; ?></td>
					<td><?= $row ["tahun_terbit"]; ?></td>
					<td><?= $row ["id_penulis"]; ?></td>
					<td>
						<a href="ubah.php?id=<?= $row["id"] ;?>" class="btn btn-warning">ubah</a> 
						<a href="hapus.php?id=<?= $row["id"]; ?>"onclick="return confirm('yakin hapus data?');" class="btn btn-danger">hapus</a>
					</td>
				</tr>
				<?php $i++; ?>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
</div>

<script src="js/script.js">
	

</script>
</body>
</html>