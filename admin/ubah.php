<?php 
session_start();

if (!isset($_SESSION["login"])) {
	header ("location: login.php");
	exit;
}


require 'functions.php';


//ambil data di URL
$id = $_GET["id"];

//query data buku berdasarkan id
$books = query ( "SELECT * FROM buku WHERE id = $id")[0];


//cek apakah tombol submit sudah di tekan atau belum
if( isset($_POST["submit"]) ) {
		
	//cek apakah data berhasil di ubah atau tidak 
	if(ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil di ubah!');
				document.location.href = 'index.php';
			</script>
		";
	}else {
		echo "
		<script>
			alert('data gagal di ubah!');
			document.location.href = 'index.php';
		</script>
		";
	}

}
 ?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Form Buku</title>
</head>
<body>
	<div class="container">
        <div class="row" style="margin: 50px;">
            <div class="col-md-12 text-center">
                <h4>EDIT BUKU</h4>
            </div>
        </div>

        <div class="row">
			<div class="col-md-12 text-right">
            	<a href="index.php" class="btn - btn-primary">Kembali </a>
        	</div>
            <div class="col-md-12">
				<form action="" method="post" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?= $books["id"]; ?>">
					<input type="hidden" name="gambarLama" value="<?= $books["gambar"]; ?>">
						<table width="100%" class="table-border" callpadding="10" border="0">
							<tr>
								<td>Judul</td>
								<td><input type="text" class="form-control" name="judul" id="judul" required value="<?= $books["judul"]; ?>"></td>
							</tr>

							<tr>
								<td>Harga</td>
								<td><input type="number" class="form-control" name="harga" id="harga" value="<?= $books["harga"]; ?>"></td>
							</tr>

							<tr>
								<td>Penerbit</td>
								<td><input type="text" class="form-control" name="penerbit" id="penerbit" value="<?= $books["penerbit"]; ?>"></td>
							</tr>

							<tr>
								<td>Tahun terbit</td>
								<td><input type="text" class="form-control" name="tahun_terbit" id="tahun_terbit" value="<?= $books["tahun_terbit"]; ?>"></td>
							</tr>

							<tr>
								<td>Penulis</td>
								<td><input type="text" class="form-control" name="id_penulis" id="id_penulis" value="<?= $books["id_penulis"]; ?>"></td>
							</tr>

							<tr>
								<td>Gambar</td>
								<td><input type="file" class="form-control" name="gambar" id="gambar">
								<img src="img/<?= $books['gambar']; ?>" width="60"><br></td>
							</tr>
							<tr>
								<td></td>
								<td><button type="submit" class="form-control btn btn-primary" name="submit">Ubah Data!</button></td>
							</tr>
						</table>
				</form>
			</div>
		</div>
	</div>

</body>
</html>