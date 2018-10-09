<?php
	include_once 'header.php';
	include 'content_function.php';
?>

	<section class="main-container">
		<div class="main-wrapper">
			<h2>UDAY SPORTS EVENTS</h2>
			<?php dispcategories();
				if (isset($_SESSION['u_uid'])) {
					echo "You are logged in.";
				}
			?>
		</div>
	</section>
	<?php
		if (isset($_SESSION['username']) {
			echo "<div claa='content'><p><a href='/forum/newtopic.php?cid=".$_GET[cid]."&scid".$_GET['scid']."'> add new topic</a></p></div>"; 
		}
	?>


	<div class="content">
		<?php disptopics($_GET[cid], $_GET[scid]); ?>

	</div>

	<?php
	include_once 'footer.php';
?>