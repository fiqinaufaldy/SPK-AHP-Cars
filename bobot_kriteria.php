<?php
include('config.php');
include('fungsi.php');
// header
include('header.php');
include('sidebar.php');
?>

<section class="content">
	<h2 class="ui header">Perbandingan Kriteria</h2>
	<?php showTabelPerbandingan('kriteria', 'kriteria'); ?>
</section>

<?php include('footer.php'); ?>