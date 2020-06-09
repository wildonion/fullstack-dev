
<div class="col-lg-8">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h4>Edit Translated Lyrics</h4>
    </div>
    <div class="panel-body">
<?php 

    include('pagination.php');    
    require('assets/time-ago/westsworld.datetime.class.php');
    require('assets/time-ago/timeago.inc.php');  
    $timeAgo = new TimeAgo();
 ?>
      <table class='table table-striped'>
                       <thead>
                           <tr>
                              <th>Name Of Music</th>
                              <th>Translated</th>
                              <th>Translated Text</th>
                              <th>Last Edit</th>
                              <th>Action</th>
                           </tr>
                        <thead>
<?php 
              foreach ($translyrics as $transly):
                # code... 
                 // get the current time from database 
                   include_once('assets/current_time.php');
                   $c_time = current_time();
                   include'assets/fetchtranslatedlyrics.php';

                       echo "
                             <tbody>
                                 <tr>
                                    <td>". $transly['name_of_music_that_translated_by_user']."
                                    </td><td>". $timeAgo->inWords($transly['translate_date'], $c_time)."
                                    </td><td>". mb_substr($transtxt['translated_lyrics'], 0, 20, 'UTF-8')." ...</td>";
                                    include'assets/fetcheditdate.php';
                                    if($edittime->rowCount()>0){
                                      if($row['email'] == $edittimerow['edited_by']){
                                          echo "<td>". $timeAgo->inWords($edittimerow['edit_date'], $c_time)."</td>";
                                      }
                                    } else {
                                      echo "<td>not edited!</td>";
                                    }
                                  echo"
                                    <td><a class=\"btn btn-danger btn-sm\" 
                                       href=\"tinymce-edit/index?edit_id=". $transtxt['l_id'] ." title=\"click for edit\" onclick=\"return confirm('sure to edit ?')\"><span class=\"glyphicon glyphicon-pencil\"></span> Edit</a>
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