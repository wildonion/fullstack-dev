<?php
//include the dbconnection file
require_once("dbconfig.php");
//if search term exist then process the below lines of code
if(!empty($_POST["searchterm"])) {
	//the query responsible for fetch matched data
	$query ="SELECT movie_name, movie_img FROM movies WHERE movie_name like '" . $_POST["searchterm"] . "%' ORDER BY movie_name LIMIT 0,4";
	$result = mysqli_query($conn,$query);

		if(!empty($result)) {
			//prepare the list for append
		?>
                <ul id="name-list" style="list-style: none">
                <?php
                while($name=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                ?>
                <li onClick="selectname('<?php echo $name["movie_name"]; ?>');">
                <?php echo '<img src="images/'.$name['movie_img'].'" width="40" height="60"/>'.' '. '<b>'.$name["movie_name"].'<b><hr width="90%">'; ?></li>
                <?php } ?>
                </ul>
		<?php } 
} ?>