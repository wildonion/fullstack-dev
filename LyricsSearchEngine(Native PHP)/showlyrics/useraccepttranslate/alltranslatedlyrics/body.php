<div class="col-lg-8">
 <div class="panel panel-info">
    <div class="panel-heading">
      <h4>Translated Lyrics List</h4>
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
                              <th>Name Of Music</th>
                              <th>Translated By</th>
                              <th>Translated</th>
                           </tr>
                        </thead>
<?php 
              foreach ($translyrics as $transly):
                # code...
                 // get the current time from database 
                   include_once('assets/current_time.php');
                   $c_time = current_time();

                 echo "
                        
                        <tbody>
                           <tr>
                           </td><td>". $transly['name_of_music_that_translated_by_user'];
                              if($transly['user_name'] == $row['user_name']){
                                  echo "<td>You ;-)</td>";  
                              } else {
                                  echo "<td>". $transly['user_name']."</td>"; 
                              }
                              echo"
                              </td><td>". $timeAgo->inWords($transly['translate_date'], $c_time)."
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