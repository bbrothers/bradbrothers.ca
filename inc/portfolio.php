<?php 	
$path =  'images/Portfolio/';
$iPath = 'info/Portfolio/';
$tPath = 'images/Portfolio/thumbs/';
//$files = scandir($path);	
$height = 300;
$width = 400; ?>

<?php
$fileTypes = array('jpg','jpeg','gif','png');
// *************************************************************
$f = join(',*.', $fileTypes);
$f = '*.'.$f;
//$height += 20;
include('inc/thumb.php');

?>

<?php 
	$images = array();
	foreach (glob("images/Portfolio/{".$f."}", GLOB_BRACE) as $fileName) {
		$files[] = basename($fileName);
		if(!dirname($fileName).'/thumbs/'.basename($fileName)){
		createthumb($fileName, dirname($fileName).'/thumbs/'.basename($fileName),null,$height);
		}
	}
?>

<h2>Portfolio</h2>
<div class="content">
	<div id="featured">
	<?php
		//$rand = rand(2, count($files)-1);
		//$name = str_replace("_" , " ", $files[$rand]);
		//$name = explode(".", $name );
		//echo ('<h3 style="opacity: .6">'.$name[0].'</h3>');
		//echo ('<img src="'. $path . $files[$rand] . '" alt="'.$files[$rand].'" />');
		// foreach ($files as $file){
			// if ($file != "." && $file != "..") {
				// $info = explode(".", $file);
				// echo ('<span id="'.$info[0].'" class="info">');
				// $info[0] .= '.txt';
				// include_once $iPath . $info[0];
				// echo ('</span>');
		// }		}
	?>
  	</div>
  	<ul id="options">
		<?php foreach ($files as $file){
			if ($file != "." && $file != "..") {?>
			<li >
				<a href="<?php echo $path . $file; ?>">
					<img src="<?php echo $tPath . $file; ?>" alt="<?php echo $file ?>"/>
				</a>
					<?php $info = explode(".", $file);
							echo ('<span id="'.$info[0].'" class="info">');
							$info[0] .= '.txt';
							include_once $iPath . $info[0];
							echo ('</span>'); ?>
			</li>		
		<?php }		}?>
	</ul>
</div>