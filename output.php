<?php
// header
include('header.php');

?>

<div class="col-md col-xl">
	<!-- Bootstrap Table with Header - Light -->
	<h3 class="ui header">Matriks Perbandingan Berpasangan</h3>
	<div class="card">
		<div class="table-responsive text-nowrap">
			<table class="table">
				<thead>
					<tr>
						<th>Kriteria</th>
						<?php
						for ($i = 0; $i <= ($n - 1); $i++) {
							echo "<th>" . getKriteriaNama($i) . "</th>";
						}
						?>
					</tr>
				</thead>
				<tbody>
					<?php
					for ($x = 0; $x <= ($n - 1); $x++) {
						echo "<tr>";
						echo "<td>" . getKriteriaNama($x) . "</td>";
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
		</div>
	</div>
	<!-- Bootstrap Table with Header - Light -->
</div>

<div class="col-md col-xl">

	<h3 class="ui header mt-4">Matriks Nilai Kriteria</h3>
	<div class="card">
		<div class="table-responsive text-nowrap">
			<table class="table">
				<thead>
					<tr>
						<th>Kriteria</th>
						<?php
						for ($i = 0; $i <= ($n - 1); $i++) {
							echo "<th>" . getKriteriaNama($i) . "</th>";
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
						echo "<td>" . getKriteriaNama($x) . "</td>";
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
						<th colspan="<?php echo ($n + 2) ?>">Principle Eigen Vector (λ max)</th>
						<th>
							<?php echo $eigenvektor !== null ? round($eigenvektor, 2) : ''; ?>
						</th>
					</tr>
					<tr>
						<th colspan="<?php echo ($n + 2) ?>">Consistency Index</th>
						<th>
							<?php echo $consIndex !== null ? round($consIndex, 2) : ''; ?>
						</th>
					</tr>
					<tr>
						<th colspan="<?php echo ($n + 2) ?>">Consistency Ratio</th>
						<th>
							<?php echo $consRatio !== null ? round($consRatio, 2) : ''; ?>
						</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>
<?php
if ($consRatio > 0.1) {
?>
	<div class="ui icon red message">
		<i class="close icon"></i>
		<i class="warning circle icon"></i>
		<div class="content">
			<div class="alert alert-danger mt-4" role="alert">Nilai Consistency Ratio melebihi 0.1 !!!
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

?>
	<br>

	<a href="bobot.php?c=1">
		<button class="btn btn-primary mt-3" type="submit" name="submit" value="SUBMIT" style="float: right;">
			<i class="right arrow icon"></i>
			Lanjut
		</button>
	</a>
<?php
}
echo "</section>";
include('footer.php');
?>