
<div class="col-lg-8">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h4>Messages List</h4>
    </div>
    <div class="panel-body">
<?php 
    include'assets/deletemsg.php'; 
    include('pagination.php');    
    require('assets/time-ago/westsworld.datetime.class.php');
    require('assets/time-ago/timeago.inc.php');  
    $timeAgo = new TimeAgo();
 ?>
               <table class='table table-striped'>
                       <thead>
                           <tr>
                              <th>ID</th>
                              <th>Usrename</th>
                              <th>Email</th>
                              <th>User Message</th>
                              <th>Your Message</th>
                              <th>Sent</th>
                              <th>Delete it ;-)</th>
                              <th>Reply To :-)</th>
                           </tr>
                        </thead>
<?php 
              foreach ($msg as $ms):
                # code...
                 // get the current time from database 
                   include_once('assets/current_time.php');
                   $c_time = current_time();

                 echo "
                        
                        <tbody>
                           <tr>
                              <td>". $ms['u_id']."
                              </td><td>". $ms['name']."
                              </td><td>". $ms['email']."
                              </td><td>". $ms['message']."
                              </td><td>"; 
                              if($ms['replymsgfromuser'] == ''){
                                echo "none";
                              } else{
                                echo $ms['replymsgfromuser'];
                              }
                              echo"
                              </td><td>". $timeAgo->inWords($ms['msg_date'], $c_time)."
                              </td><td><a class=\"btn btn-error\" href=\"?delete_id=". $ms['u_id'] ." title=\"click for delete\" onclick=\"return confirm('sure to delete ?')\"><span class=\"glyphicon glyphicon-remove-circle\"></span> Delete</a>
                              </td><td><a class=\"btn btn-error\" href=\"assets/tinymce-msg-rep/index?rep_id=". $ms['u_id'] ." title=\"click for reply\" onclick=\"return confirm('sure to reply ?')\"><span class=\"glyphicon glyphicon-send\"></span> Reply</a></td>
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