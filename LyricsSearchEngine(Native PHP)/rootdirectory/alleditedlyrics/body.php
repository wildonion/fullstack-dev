<div class="col-lg-8">
 <div class="panel">
    <div class="panel-heading">
      <h4>Edited Lyrics List</h4>
    </div>
    <div class="panel-body">
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
                              </td><td>". $timeAgo->inWords($edly['edit_date'], $c_time)."
                              </td>
                           </tr>
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
</div>