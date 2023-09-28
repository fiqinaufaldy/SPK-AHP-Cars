<?php
include('config.php');
include('fungsi.php');

// menjalankan perintah edit
if (isset($_POST['edit'])) {
	$id = $_POST['id'];

	header('Location: edit.php?jenis=kriteria&id=' . $id);
	exit();
}

// menjalankan perintah delete
if (isset($_POST['delete'])) {
	$id = $_POST['id'];
	deleteKriteria($id);
}

// menjalankan perintah tambah
if (isset($_POST['tambah'])) {
	$nama = $_POST['nama'];
	tambahData('kriteria', $nama);
}

// header
include('header.php');
include('sidebar.php');
?>

<h2 class="ui header">Kriteria</h2>
<div class="card">
	<div class="table-responsive text-nowrap">

		<table class="table">
			<thead>
				<tr>
					<th class="collapsing">No</th>
					<th colspan="2">Nama Kriteria</th>
				</tr>
			</thead>

			<tbody>
				<?php
				// Menampilkan list kriteria
				$query = "SELECT id,nama FROM kriteria ORDER BY id";
				$result	= mysqli_query($koneksi, $query);

				$i = 0;
				while ($row = mysqli_fetch_array($result)) {
					$i++;
				?>
					<tr>
						<td><?php echo $i ?></td>
						<td><?php echo $row['nama'] ?></td>
						<td class="right aligned collapsing">
							<form method="post" action="kriteria.php">
								<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
								<button type="submit" name="edit" class="btn btn-sm btn-warning"><i class="right edit icon"></i>EDIT</button>
								<button type="submit" name="delete" class="btn btn-sm btn-danger"><i class="right remove icon"></i>DELETE</button>
							</form>
						</td>
					</tr>


				<?php } ?>


			</tbody>
			<tfoot class="full-width">
				<tr>
					<th colspan="3">
						<a href="tambah.php?jenis=kriteria">
							<button type="button" class="btn btn-primary">Tambah Data</button>
						</a>
					</th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>

<form action="alternatif.php" class="mt-3">
	<button class="btn btn-primary" style="float: right;">
		<i class="right arrow icon"></i>
		Lanjut
	</button>
</form>

<?php include('footer.php'); ?>