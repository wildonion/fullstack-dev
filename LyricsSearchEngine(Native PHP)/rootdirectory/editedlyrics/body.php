<div class="col-lg-8">
  <div class="box fade-in one">
    	<?php 
    	    include('pagination.php');    
    	    require('assets/time-ago/westsworld.datetime.class.php');
    	    require('assets/time-ago/timeago.inc.php');  
    	    $timeAgo = new TimeAgo();
    	 ?>
	<table class="table table-bordered">
	                      <thead>
                           <tr>
                              <th>Music ID</th>
                              <th>Edited By</th>
                              <th>Name Of Music</th>
                              <th>Edited</th>
                              <th>Show Edited Lyrics</th>
                           </tr>
                        </thead>
<?php 
              foreach ($editlyrics as $edly):
                # code...
                 // get the current time from database 
                   include_once('assets/current_time.php');
                   $c_time = current_time();

                 echo "
                        
                        <tbody>
                           <tr>
                              <td>". $edly['l_id']."
                              </td><td>". $edly['edited_by']."
                              </td><td>". $edly['name_of_music_that_edited_by_user']."
                              </td><td>". $timeAgo->inWords($edly['edit_date'], $c_time)."</td>";
                              $fetchtranslatedlyrics = $db->prepare("SELECT translated_lyrics FROM lyrics WHERE l_id=:id");
                              $fetchtranslatedlyrics->execute(array(':id'=>$edly['l_id']));
                              $fetchrow = $fetchtranslatedlyrics->fetch(PDO::FETCH_ASSOC);
                              $translated_lyrics = $fetchrow['translated_lyrics'];
                              if($fetchrow['translated_lyrics'] != 'no'){
                              echo "<td><a class=\"btn btn-danger\" href=\"assets/tinymce-edit/index?see_id=". $edly['l_id'] ." title=\"click for see\" onclick=\"return confirm('sure to see ?')\"><span class=\"glyphicon glyphicon-eye-open\"></span> See</a>
                              </td>";
                             } else {
                                echo "<td><a class=\"btn btn-danger\" href=\"javascript:void(0)\" disabled><span class=\"glyphicon glyphicon-eye-open\"></span> See</a>
                              </td>";
                             }
                           echo "</tr>
                        </tbody>
                        ";
              endforeach; 
?>

        </table>
      <div class="pag">
        <ul class="pagination">
             <?php for($x = 1; $x <= $pages; $x++):?>
                <li><a href="?page=<?php echo $x; ?>&per-page=<?php echo $perPage; ?>"<?php if($page === $x){echo ' class="selected"';} ?>><?php echo $x; ?></a></li>
             <?php endfor; ?>
        </ul>     
      </div>
 </div>
</div>