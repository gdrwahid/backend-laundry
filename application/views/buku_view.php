<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>View Buku</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<table border="1">
		<tr>
			<th>No</th>
			<th>Judul</th>
			<th>Pengarang</th>
			<th>Penerbit</th>
		</tr>
		<?php
		$no = 1;
		 foreach ($buku as $buku) { ?>
		<tr>
			<td><?= $no?></td>
			<td><?= $buku['judul'] ?></td>
			<td><?= $buku['pengarang'] ?></td>
			<td><?= $buku['penerbit'] ?></td>
		</tr>

		<?php
		$no++;
		 } 
		 ?>
		
	</table>
</body>
</html>