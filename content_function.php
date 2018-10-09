<?php 
function dispcategories() {
	include ('dbconn.php');

	$select = mysqli_query($con, "SELECT * FROM categories");

	while ($row = mysqli_fecth_assoc($select)) {
		echo "<table class = 'category-table'>";
		echo "<tr><td class='main-category' colspan='2'>".$row['category_title']."</td></tr>";
		despcategories($row['cat_id']);
		echo "</table>";
	}
}

function dispcategories($parent_id) {
	include ('dbconn.php');
	$select = mysqli_query($con, "SELECT cat_id, subcat_id, subcategory_title, FROM categories, subcategories WHERE ($parent_id = subcategories.parent_id)");
	echo "<tr><th width='90%'>Categories</th><th width ='10%'>Topics</th></tr>";
	while ($row = mysqli_fecth_assoc($select)) {
		echo "<tr><td class='category_title'><a href='/forum/topics.php?cid=".$row['cat_id']."$scid=".$row['subcat_id']."'>".$row['subcategory_title']."<br />";
		echo "<td class='num-topics'>".getnumtopics($parent_id, $row['subcat_id'])."</td></tr>";
	}
}
function getnumtopics($cat_id, $subcat_id) {
	include ('dbconn.php');
	$select = mysqli_query($con, "SELECT category_id, subcategory_id FROM topics WHERE".$cat_id." = category_id AND".$subcat_id." = subcategory_id");
	return mysqli_num_rows($select);
		}

		function distopics($cid, $scid) {
			include ('dbconn.php');
			$select = mysqli_query($con, "SELECT topic_id, author, title, date_posted, views, replies FROM categories, topics WHERE ($cid = topics.category_id) AND ($scid = topics.subcategory_id) AND ($cid = categories.cat_id) AND ($scid subcategories.subcat_id) ORDER BY topic_id DESC");

			if (mysqli_num_rows($select) !=0) {
				echo "<table class = 'topic-table'>";
				echo "<tr><th>Title</th><th>Posted by</th><th>Date Posted</th><th>Views</th><th>Replies</th></tr>";
				while ($row = mysqli_fecth_assoc($select)) {
					echo "<tr><td><a href='/forum/readtopics.php? cid=".$cid."&scid=".$scid."&tid=".$row['topic_id']."'>
					".$row['title']."</a></td><td>".$row['author']."</td><td>".$row['date_posted']."</td><td>".$row['views']."</td><td>".$row['replies']."</td></tr>";
				}
				echo "</tables>";
				}else {
					echo "<p>This category has no topics yet. <a href='/forum/newtopic.php?cid=".$cid."&scid=".$scid"> add the very first topic like a boss</a></p>"; 	
				}
			}
		
?>