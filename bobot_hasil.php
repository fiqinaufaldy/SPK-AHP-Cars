<?php
include('header.php');

?>

<section class="content">
	<h3 class="ui header">Matriks Perbandingan Berpasangan</h3>
	<table class="ui collapsing celled blue table">
		<thead>
			<tr>
				<th>Kriteria</th>
				<?php
				for ($i = 0; $i <= ($n - 1); $i++) {
					echo "<th>" . getAlternatifNama($i) . "</th>";
				}
				?>
			</tr>
		</thead>
		<tbody>
			<?php
			for ($x = 0; $x <= ($n - 1); $x++) {
				echo "<tr>";
				echo "<td>" . getAlternatifNama($x) . "</td>";
				for ($y = 0; $y <= ($n - 1); $y++) {
					echo "<td>" . round($matrik[$x][$y], 2) . "</td>";
				}

				echo "</tr>";
			}
			?>
		</tbody>
		<tfoot>
			<tr>
				<th>Jumlah</th>
				<?php
				for ($i = 0; $i <= ($n - 1); $i++) {
					echo "<th>" . round($jmlmpb[$i], 2) . "</th>";
				}
				?>
			</tr>
		</tfoot>
	</table>


	<br>

	<h3 class="ui header">Matriks Nilai Kriteria</h3>
	<table class="ui celled red table">
		<thead>
			<tr>
				<th>Kriteria</th>
				<?php
				for ($i = 0; $i <= ($n - 1); $i++) {
					echo "<th>" . getAlternatifNama($i) . "</th>";
				}
				?>
				<th>Jumlah</th>
				<th>Priority Vector</th>
			</tr>
		</thead>
		<tbody>
			<?php
			for ($x = 0; $x <= ($n - 1); $x++) {
				echo "<tr>";
				echo "<td>" . getAlternatifNama($x) . "</td>";
				for ($y = 0; $y <= ($n - 1); $y++) {
					echo "<td>" . round($matrikb[$x][$y], 2) . "</td>";
				}

				echo "<td>" . round($jmlmnk[$x], 2) . "</td>";
				echo "<td>" . round($pv[$x], 2) . "</td>";

				echo "</tr>";
			}
			?>

		</tbody>
		<tfoot>
			<tr>
				<th colspan="<?php echo ($n + 2) ?>">Principe Eigen Vector (λ maks)</th>
				<th><?php echo ($eigenvektor !== null ? round($eigenvektor, 2) : '') ?></th>
			</tr>
			<tr>
				<th colspan="<?php echo ($n + 2) ?>">Consistency Index</th>
				<th><?php echo ($consIndex !== null ? round($consIndex, 2) : '') ?></th>
			</tr>
			<tr>
				<th colspan="<?php echo ($n + 2) ?>">Consistency Ratio</th>
				<th><?php echo ($consRatio !== null ? round($consRatio, 2) : '') ?></th>
			</tr>
		</tfoot>

	</table>



	<?php

	if ($consRatio > 0.1) {
	?>
		<div class="ui icon red message">
			<i class="close icon"></i>
			<i class="warning circle icon"></i>
			<div class="content">
				<div class="alert alert-danger" role="alert">Nilai Consistency Ratio melebihi 0.1 !!!
					<br>
					Mohon input kembali tabel perbandingan.
				</div>
			</div>
		</div>

		<br>

		<a href='javascript:history.back()'>
			<button class="btn btn-warning">
				<i class='bx bxs-chevron-left'></i> Kembali
			</button>
		</a>

		<?php

	} else {
		if ($jenis == getJumlahKriteria()) {
		?>

			<br>

			<form action="hasil.php">
				<button class="btn btn-primary" style="float: right;">
					Lanjut <i class='bx bxs-chevron-right'></i>
				</button>
			</form>


		<?php

		} else {

		?>
			<br>
			<a href="<?php echo "bobot.php?c=" . ($jenis + 1) ?>">
				<button class="btn btn-primary" style="float: right;">
					Lanjut <i class='bx bxs-chevron-right'></i>
				</button>
			</a>

	<?php

		}
	}

	echo "</section>";
	include('footer.php');

	?>