<form action=" " method="POST" enctype="multipart/form-data">
	<p>Nama : <input type="text" name="nama"></p>
	<p>Input Gambar : <input type="file" name="file"></p>
	<table>
			
			<tr><td><p>Hobi : </p></td></tr>
			<tr><td><input type="checkbox" name="hobi[]" value="Futsal">Futsal</td></tr>
			<tr><td><input type="checkbox" name="hobi[]" value="Badminton">Badminton</td></tr>
			<tr><td><input type="checkbox" name="hobi[]" value="Mancing">Mancing</td></tr>
	
	<tr><td><p>Genre Film : </p></td></tr>
	<tr><td><input type="checkbox" name="genre[]" value="Horror">Horror</td></tr>
	<tr><td><input type="checkbox" name="genre[]" value="Action">Action</td></tr>
	<tr><td><input type="checkbox" name="genre[]" value="Thriller">Thriller</td></tr>
	<tr><td><input type="checkbox" name="genre[]" value="Anime">Anime</td></tr>
	<tr><td><input type="checkbox" name="genre[]" value="Animasi">Animasi</td></tr>

	<tr><td><p>Tujuan Traveling : </p>
	<tr><td><input type="checkbox" name="traveling[]" value="Bali">Bali</td></tr>
	<tr><td><input type="checkbox" name="traveling[]" value="Raja Ampat">Raja Ampat</td></tr>
	<tr><td><input type="checkbox" name="traveling[]" value="Pulau Derawan">Pulau Derawan</td></tr>
	<tr><td><input type="checkbox" name="traveling[]" value="Bangka Belitung">Bangka Belitung</td></tr>
	<tr><td><input type="checkbox" name="traveling[]" value="Labuan Bajo">Labuan Bajo</td></tr>
	
	</table>

		<input type="submit" name="kirim" value="Kirim">
<?php
	if (isset($_POST['kirim'])) {
		# code...
		$nama=$_POST['nama'];
		
		$hobi=$_POST['hobi'];

		$genre=$_POST['genre'];

		$traveling=$_POST['traveling'];

$namaFile = $_FILES['file']['name'];
$namaSementara = $_FILES['file']['tmp_name'];

// tentukan lokasi file akan dipindahkan
$dirUpload = "terupload/";

// pindahkan file
$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);



		echo "<table> <tr><td>Nama</td><td>$nama</td></tr>";
if ($terupload) {
    echo "Upload berhasil!<br/>";
    echo "<img src='".$dirUpload.$namaFile."' width=500px height=200px>";
} else {
    echo "Upload Gagal!";
}

		echo "</td></tr>";
		echo "<tr><td>Hobi </td><td>";
		for ($i=0; $i <count($hobi) ; $i++) { 
			echo $hobi[$i]."<br>";
		}
		echo "<tr><td>Genre </td><td>";
		for ($i=0; $i <count($genre) ; $i++) { 
			echo $genre[$i]."<br>";
		}
		echo "<tr><td>Traveling </td><td>";
		for ($i=0; $i <count($traveling) ; $i++) { 
			echo $traveling[$i]."<br>";
		}
		echo " </td></tr>";
		echo "</table>";
	}


?>
	<button value="<?php unset($hobi);  ?>">Delete</button>
<input type="submit" name="delete" value="<?php unset($hobi);  ?>">
</form>