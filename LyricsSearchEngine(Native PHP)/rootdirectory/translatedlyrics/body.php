<div class="col-lg-8">
 <div class="box fade-in one">
    	<?php 
    	    include'assets/unset.php'; 
    	    include('pagination.php');    
    	    require('assets/time-ago/westsworld.datetime.class.php');
    	    require('assets/time-ago/timeago.inc.php');  
    	    $timeAgo = new TimeAgo();
    	 ?>
	<table class="table table-bordered">
	                      <thead>
                           <tr>
                              <th>Lyrics ID</th>
                              <th>Name Of Music</th>
                              <th>Lyrics</th>
                              <th>Translated By</th>
                              <th>Translated</th>
                              <th>Posted</th>
                              <th>Unset This</th>
                              <th>Translated Text</th>
                           </tr>
                        </thead>
<?php 
              foreach ($lyrics as $ly):
                # code...
                 // get the current time from database 
                   include_once('assets/current_time.php');
                   $c_time = current_time();
                   include 'assets/fetchdate.php';

                 echo "
                        
                        <tbody>
                           <tr>
                              <td>". $ly['l_id']."
                              </td><td>". $ly['name_of_music']."
                              </td><td>". substr($ly['lyrics'], 0, 40)." ...
                              </td><td>". $ly['translateby']."</td>";
                              if($ly['translateby'] == "no one yet"){
                                   echo"<td>-</td>";  
                              } else{
                                  echo "<td>". $timeAgo->inWords($daterow['translate_date'], $c_time)."</td>";  
                              }
                              echo "<td>". $timeAgo->inWords($ly['post_date'], $c_time)."
                              </td>";
                              if($ly['translateby'] == "no one yet"){
                              
                                echo "<td><a class=\"btn btn-warning\" href=\"javascript:void(0)\" disabled><span class=\"glyphicon glyphicon-alert\"></span> Unset</a>
                              </td>";
                            }
                              else{
                                echo "<td><a class=\"btn btn-warning\" href=\"?unset_id=". $ly['l_id'] ." title=\"click for unset\" onclick=\"return confirm('sure to unset? translated field become empty!')\"><span class=\"glyphicon glyphicon-alert\"></span> Unset</a>
                              </td>";
                                 }
                                 echo "<td><a class=\"btn btn-danger\" href=\"assets/tinymce-edit/index?see_id=". $ly['l_id'] ." title=\"click for see\" onclick=\"return confirm('sure to see ?')\"><span class=\"glyphicon glyphicon-eye-open\"></span> See</a>
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