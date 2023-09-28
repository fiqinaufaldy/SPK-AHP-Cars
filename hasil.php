<?php

include('config.php');
include('fungsi.php');


// menghitung perangkingan
$jmlKriteria 	= getJumlahKriteria();
$jmlAlternatif	= getJumlahAlternatif();
$nilai			= array();

// mendapatkan nilai tiap alternatif
for ($x = 0; $x <= ($jmlAlternatif - 1); $x++) {
	// inisialisasi
	$nilai[$x] = 0;

	for ($y = 0; $y <= ($jmlKriteria - 1); $y++) {
		$id_alternatif 	= getAlternatifID($x);
		$id_kriteria	= getKriteriaID($y);

		$pv_alternatif	= getAlternatifPV($id_alternatif, $id_kriteria);
		$pv_kriteria	= getKriteriaPV($id_kriteria);

		$nilai[$x]	 	+= ($pv_alternatif * $pv_kriteria);
	}
}

// update nilai ranking
for ($i = 0; $i <= ($jmlAlternatif - 1); $i++) {
	$id_alternatif = getAlternatifID($i);
	$query = "INSERT INTO ranking VALUES ($id_alternatif,$nilai[$i]) ON DUPLICATE KEY UPDATE nilai=$nilai[$i]";
	$result = mysqli_query($koneksi, $query);
	if (!$result) {
		echo "Gagal mengupdate ranking";
		exit();
	}
}
// header
include('header.php');
include('sidebar.php');

?>

<div class="row">
	<div class="col-md-12 col-xl-12">

		<!-- Bootstrap Table with Header - Light -->
		<h2 class="ui header">Hasil Perhitungan</h2>
		<div class="card col-md-12 col-xl-12">
			<div class="table-responsive text-nowrap text-center">
				<table class="table">
					<thead class="table-light">
						<tr>
							<th>Overall Composite Height</th>
							<th>Priority Vector (rata-rata)</th>
							<?php
							for ($i = 0; $i <= (getJumlahAlternatif() - 1); $i++) {
								echo "<th>" . getAlternatifNama($i) . "</th>\n";
							}
							?>
						</tr>
					</thead>
					<tbody class="table-border-bottom-0">
						<?php
						for ($x = 0; $x <= (getJumlahKriteria() - 1); $x++) {
							echo "<tr>";
							echo "<td>" . getKriteriaNama($x) . "</td>";
							echo "<td>";

							$kriteriaPV = getKriteriaPV(getKriteriaID($x));

							/** added a null check ($kriteriaPV !== null) before calling the round()
							 * This check ensures that the function is only called
							 * when the value is not null, preventing the deprecated warning.
							 */
							if ($kriteriaPV !== null) {
								echo round($kriteriaPV, 2);
							}

							echo "</td>";

							for ($y = 0; $y <= (getJumlahAlternatif() - 1); $y++) {
								echo "<td>";

								$alternatifPV = getAlternatifPV(getAlternatifID($y), getKriteriaID($x));

								/** added a null check ($alternatifPV !== null) before calling the round()
								 * This check ensures that the function is only called
								 * when the value is not null, preventing the deprecated warning.
								 */
								if ($alternatifPV !== null) {
									echo round($alternatifPV, 2);
								}

								echo "</td>";
							}

							echo "</tr>";
						}
						?>
					</tbody>

					<tfoot>
						<tr>
							<th colspan="2">Total</th>
							<?php
							for ($i = 0; $i <= ($jmlAlternatif - 1); $i++) {
								echo "<th>" . ($nilai[$i] !== null ? round($nilai[$i], 2) : '') . "</th>";
							}
							?>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
	<!-- Bootstrap Table with Header - Light -->

	<div class="col-md-12 col-xl-12 mt-5">
		<h2 class="ui header">Pilihan mobil yang tepat</h2>

		<?php
		$query  = "SELECT id,nama,id_alternatif,nilai FROM alternatif,ranking WHERE alternatif.id = ranking.id_alternatif ORDER BY nilai DESC LIMIT 3";
		$result = mysqli_query($koneksi, $query);

		$i = 0;
		while ($row = mysqli_fetch_array($result)) {
			echo "<div class='result'>";
			$i++;

			if ($i == 1) {
				echo "<div class='card bg-primary text-white mb-3'>";
				echo "<div class='card-body'> Untuk pilihan pertama, mobil yang tepat adalah <b>" . $row['nama'] . "</b>, dengan nilai " . round($row['nilai'], 2) . ".</div>";
				echo "</div>";
			} else if ($i == 2) {
				echo "<div class='card bg-primary text-white mb-3'>";
				echo "<div class='card-body'> Untuk pilihan kedua, mobil yang tepat adalah <b>" . $row['nama'] . "</b>, dengan nilai " . round($row['nilai'], 2) . ".</div>";
				echo "</div>";
			} else if ($i == 3) {
				echo "<div class='card bg-primary text-white mb-3'>";
				echo "<div class='card-body'> Untuk pilihan ketiga, mobil yang tepat adalah <b>" . $row['nama'] . "</b>, dengan nilai " . round($row['nilai'], 2) . ".</div>";
				echo "</div>";
			}
			echo "</div>";
		}
		?>
	</div>
</div>

<?php include('footer.php'); ?>