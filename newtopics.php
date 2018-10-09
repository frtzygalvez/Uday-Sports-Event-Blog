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

	<div class="content">
		<?php
			if (isset($_SESSION['username'])) {
				echo "<form action='/forum/addnewtopic.php?cid=".$_GET['cid']."&scid=".$_GET['scid']."'  method='POST'>
				<p>TITLE: </p>
				<input type='text' id='topic' name='topic' size='100' />
				<p>Content: </p>
				<textarea id='content' name='content'></textarea><br />
				<input type = 'submit' value='add new post' /></form>";
			} else {
				echo "<p> Please Login first </p>";
			}



		?>

	</div>

	<?php
	include_once 'footer.php';
?>