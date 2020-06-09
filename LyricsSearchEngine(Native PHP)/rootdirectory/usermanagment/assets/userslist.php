<?php 
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
                              <th>Accessing Status</th>
                              <th>User Status</th>
                              <th>Reg Date</th>
                              <th>Delete User</th>
                              <th>Send Email</th>
                              <th>Send Message</th>
                           </tr>
                        <thead>
              <?php 

              foreach($users as $user):
              
                 echo "
                        
                        <tbody>
                           <tr>
                              <td>". $user['u_id']."
                              </td><td>". $user['user_name']."
                              </td><td>". $user['email']."
                              </td><td>";
                              if($user['accessing_status'] == 'unblocked'){
                              	
                              	echo "<a class=\"btn btn-danger\" href=\"?block_id=". $user['u_id'] ." title=\"click for block\" onclick=\"return confirm('sure to block ?')\"><span class=\"glyphicon glyphicon-ban-circle\"></span> Block</a>";
                              } else {
                              	echo "<a class=\"btn btn-danger\" href=\"?unblock_id=". $user['u_id'] ." title=\"click for unblock\" onclick=\"return confirm('sure to unblock ?')\"><span class=\"glyphicon glyphicon-refresh\"></span> Unblock</a>";
                              }

                               // get the current time from database 
                               include_once('assets/current_time.php');
                               $c_time = current_time();

                              	
                                echo"
                              </td><td>". $user['userStatus']."
                              </td><td>". $timeAgo->inWords($user['reg_date'], $c_time)."
                              </td><td><a class=\"btn btn-warning\" href=\"?delete_id=". $user['u_id'] ." title=\"click for delete\" onclick=\"return confirm('sure to delete ?')\"><span class=\"glyphicon glyphicon-remove-circle\"></span> Delete</a>
                              </td><td><a class=\"btn btn-info\" href=\"assets/tinymce-mail/index?sendem_id=". $user['u_id'] ." title=\"click for send\" onclick=\"return confirm('sure to send ?')\"><span class=\"glyphicon glyphicon-envelope\"></span> Send E_mail</a>
                              </td><td>";
                              if($user['userStatus'] == 'N'){
                                echo "
                              <a class=\"btn btn-success\" href=\"javascript:void(0)\" disabled><span class=\"glyphicon glyphicon-send\"></span> Send Message</a>";}
                              else{
                                echo "<a class=\"btn btn-success\" href=\"assets/tinymce-msg/index?sendms_id=". $user['u_id'] ." title=\"click for send\" onclick=\"return confirm('sure to send ?')\"><span class=\"glyphicon glyphicon-send\"></span> Send Message</a>";
                              }
                              echo"
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