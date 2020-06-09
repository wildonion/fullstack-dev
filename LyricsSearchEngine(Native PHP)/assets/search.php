<?php
include'../dbconfig/dbpdologin.php';
if(!empty($_POST))
{
    $search = filter_var($_POST['search'],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        $val = mb_convert_encoding($search, 'UTF-8', 'auto');
if($val){
    
    $query = $db->prepare("SELECT * FROM lyrics WHERE name_of_music LIKE '%$search%' 
						OR name_of_singer LIKE '%$search%' LIMIT 0, 5");
    $query->bindValue(1, "%$search%", PDO::PARAM_STR);
	$query->execute();
    $rowq = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rowq as $row){
        $name_of_music   = $row['name_of_music'];
        $name_of_singer  = $row['name_of_singer'];
        $b_name_of_music = '<strong>'.$search.'</strong>';
        $b_name_of_singer    = '<strong>'.$search.'</strong>';
        $final_name_of_music = str_ireplace($search, $b_name_of_music, $name_of_music);
        $final_name_of_singer = str_ireplace($search, $b_name_of_singer, $name_of_singer);
        ?>
            <div class="show" align="left">
                <img src="assets/music.png" style="width:50px; height:50px; float:left; margin-right:6px;" /><span class="name"><?php echo $final_name_of_music; ?></span>&nbsp;<br/><?php echo $final_name_of_singer; ?><br/>
            </div>
        <?php
       }
    }
   }

?>