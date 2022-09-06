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

	.color_animation{
		animation: color 9s infinite linear;
	}

	@keyframes color {
	  0%   { background: #33CCCC; }
	  20%  { background: #33CC36; }
	  40%  { background: #B8CC33; }
	  60%  { background: #FCCA00; }
	  80%  { background: #33CC36; }
	  100% { background: #33CCCC; }
	}
</style>

<?php 
	function is_inside_circle($x, $y)
	{
		// Pakai pythagoras, jika akar dari jarak $x ke titik_pusat(50,50) ditambah $y ke titik_pusat < 50, maka ia berada di dalam lingkaran
		$pusat_x = 50;
		$pusat_y = 50;

		$jarak_x_ke_titik_pusat = $pusat_x - $x;
		$jarak_y_ke_titik_pusat = $pusat_y - $y;

		$akar = sqrt( pow($jarak_x_ke_titik_pusat, 2) + pow($jarak_y_ke_titik_pusat, 2) );

		

		if ( $akar <= 50 ) {
			return true;
		}
		// else
		return false;
	}
?>

<div class="kotak">
	<div class="lingkaran">
		<span id="titiks" style="display:visible;">
			<!-- Looping baris -->
			<?php for ($x=0; $x < 100; $x++) : ?> 
				<!-- Looping kolom -->
				<?php for ($y=0; $y < 100; $y++) : ?> 
					<?php 
						$warna = randomColor();
						if (is_inside_circle($x, $y)) {
							
							if ( $y % 2 == 0 OR $x % 2 == 0 ) {
								$warna = 'url(anya_forger.jpg); background-attachment: fixed; background-size: '.$x_axis*$skala.'px '.$y_axis*$skala.'px;';
							}
							
							$jumlah_dalam_lingkaran++;
						};
					?>
					<div class="titik" style="background:  <?php echo $warna ?>;top: <?php echo $y * $skala ?>; left: <?php echo $x * $skala ?>"></div>
				<?php endfor ?>
			<?php endfor ?>
		</span>
	</div>
	
</div>
<hr>
<div>
	<?php echo $jumlah_dalam_lingkaran; ?>
</div>