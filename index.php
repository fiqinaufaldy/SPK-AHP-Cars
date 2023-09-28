<?php
include('config.php');
include('fungsi.php');

// header
include('header.php');
include('sidebar.php');
?>

<div class="row">
	<div class="col-md-12 col-xl-12">
		<div class="card mb-3">
			<h3 class="card-header">Analitycal Hierarchy Process (AHP) </h3>

			<div class="card-body">
				<!-- <h5 class="card-title text-white">Primary card title</h5> -->
				<p><b>Analytical Hierarchy Proccess </b> merupakan suatu metode sistem pendukung keputusan yang dikembangkan oleh Thomas L. Saaty. Model pendukung keputusan ini menggambarkan masalah yang kompleks dengan banyak faktor atau kriteria dalam suatu hierarki. Menurut Saaty (1993), hierarki didefinisikan sebagai representasi masalah kompleks dari struktur bertingkat di mana tingkat pertama adalah tujuannya. Diikuti oleh level faktor, kriteria, sub kriteria, dan seterusnya hingga alternatif level terakhir.</p>
				<p class="card-text">
					Sistem Pendukung Keputusan dapat menjadi solusi untuk membantu konsumen dalam memilih mobil yang tepat. Pengambilan keputusan dalam membeli mobil adalah hal yang sangat penting dan rumit bagi konsumen, terutama karena keputusan yang diambil harus mencakup berbagai faktor seperti anggaran, merek, model, fitur, dan jenis mobil. :
				</p>
				<ol>
					<li>Masukan nama kriteria</li>
					<li>Masukan merk mobil</li>
					<li>Masukan perbandingan antar kriteria dengan menggunakan nilai yang ada pada tabel tingkat kepentingan menurut Saaty 1980, pastikan nilai CR tidak lebih dari 0,1 jika melebihi maka lakukan kembali</li>
					<li>Masukan perbandingan antar rumah dengan menggunakan nilai yang ada pada tabel tingkat kepentingan menurut Saaty 1980, pastikan nilai CR tidak lebih dari 0,1 jika melebihi maka lakukan kembali</li>
					<li>Tunggu hingga sistem memberikan hasil perhitungan dan saran alternatif yang dapat dipilih</li>
				</ol>
			</div>
		</div>
	</div>

	<div class="col-md col-xl">
		<!-- Bootstrap Table with Header - Light -->
		<div class="card">
			<h3 class="card-header">Tabel Tingkat Kepentingan menurut Saaty (1980)</h3>
			<div class="table-responsive text-nowrap">
				<table class="table">
					<thead class="table-light">
						<tr>
							<th>NILAI NUMERIK</th>
							<th>TINGKAT KEPENTINGAN (PREFERENCE)</th>
						</tr>
					</thead>
					<tbody class="table-border-bottom-0">
						<tr>
							<td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1</strong></td>
							<td>Sama pentingnya (Equal Importance)
							</td>
						</tr>
						<tr>
							<td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>2</strong></td>
							<td>Sama hingga sedikit lebih penting
							</td>
						</tr>
						<tr>
							<td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>3</strong></td>
							<td>Sedikit lebih penting (Slightly more importance)
							</td>
						</tr>
						<tr>
							<td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>4</strong></td>
							<td>Sedikit lebih hingga jelas lebih penting
							</td>
						</tr>
						<tr>
							<td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>5</strong></td>
							<td>Jelas lebih penting (Materially more importance)
							</td>
						</tr>
						<tr>
							<td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>6</strong></td>
							<td>Jelas hingga sangat jelas lebih penting
							</td>
						</tr>
						<tr>
							<td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>7</strong></td>
							<td>Sangat jelas lebih penting (Significantly more importance)
							</td>
						</tr>
						<tr>
							<td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>8</strong></td>
							<td>Sangat jelas hingga mutlak lebih penting
							</td>
						</tr>
						<tr>
							<td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>9</strong></td>
							<td>Mutlak lebih penting (Absolutely more importance)
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<!-- Bootstrap Table with Header - Light -->
	</div>


	<?php include('footer.php'); ?>
	