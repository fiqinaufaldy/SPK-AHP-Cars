<?php
include('config.php');
include('fungsi.php');

$jenis = $_GET['c'];

include('header.php');
include('sidebar.php');
?>
<section class="content">
	<h2 class="ui header">Perbandingan Mobil &rarr; <?php echo getKriteriaNama($jenis - 1) ?></h2>
	<?php showTabelPerbandingan($jenis, 'alternatif'); ?>
</section>

<?php include('footer.php'); ?>