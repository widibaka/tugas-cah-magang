<?php 
$skala = 10;
$x_axis = 100;
$y_axis = 100;

$jumlah_dalam_lingkaran = 0;

function randomColor(){
    $result = array('rgb' => '', 'hex' => '');
    foreach(array('r', 'b', 'g') as $col){
        $rand = mt_rand(0, 255);
        $dechex = dechex($rand);
        if(strlen($dechex) < 2){
            $dechex = '0' . $dechex;
        }
        $result['hex'] .= $dechex;
    }
    return '#'.$result['hex'];
}
?>

<style type="text/css">
	.kotak{
		height: <?php echo $y_axis * $skala ?>px;
		width: <?php echo $x_axis * $skala ?>px;
		background-color: #f2f2f2;
	}
	.lingkaran{
		height: <?php echo $y_axis * $skala ?>px;
		width: <?php echo $x_axis * $skala ?>px;
		background-color: #df2023;
		border-radius: 50%;
		opacity: .8;
		position: relative;
	}
	.titik{
		height: <?php echo 1 * $skala ?>px;
		width: <?php echo 1 * $skala ?>px;
		background-color: black;
		opacity: .6;
		border-radius: 50%;
		position: absolute;
	}
</style>

<div class="kotak">
	<div class="lingkaran">
		<span id="titiks" style="display:visible;">
			<!-- Looping baris -->
			<?php for ($x=0; $x < 100; $x++) : ?> 
				<!-- Looping kolom -->
				<?php for ($y=0; $y < 100; $y++) : ?> 
					<?php 
						$warna = randomColor();
					?>
					<div class="titik" style="background-color:  <?php echo $warna ?>;top: <?php echo $y * $skala ?>; left: <?php echo $x * $skala ?>"></div>
				<?php endfor ?>
			<?php endfor ?>
		</span>
	</div>
	
</div>