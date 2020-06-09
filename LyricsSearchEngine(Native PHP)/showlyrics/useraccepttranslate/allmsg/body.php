
<div class="col-lg-8">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h4>Messages List</h4>
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
                              <th>Admin Message</th>
                              <th>Your Message</th>
                              <th>Sent</th>
                           </tr>
                        <thead>
<?php 
              foreach ($msg as $ms):
                # code...
                 // get the current time from database 
                   include_once('assets/current_time.php');
                   $c_time = current_time();
                   include("assets/dbpag.php");
                    $old = "old";
                    $stmt = $db->prepare("UPDATE msgfromadmin SET havenewitem=:old WHERE user_id=:uid");
                    $stmt->bindParam(':old', $old);
                    $stmt->bindParam(':uid', $ms['user_id']);
                    $stmt->execute();

                 echo "
                        
                        <tbody>
                           <tr>
                              <td>". $ms['message']."
                              </td><td>"; 
                              if($ms['replymsgfromadmin'] == ''){
                                echo "none";
                              } else{
                                echo $ms['replymsgfromadmin'];
                              }
                              echo"
                              </td><td>". $timeAgo->inWords($ms['reg_date'], $c_time)."
                              </td><td><a class=\"btn btn-primary\" href=\"tinymce-msg/index.php?rep_id=". $ms['m_id'] ." title=\"click for reply\" onclick=\"return confirm('sure to reply ?')\"><span class=\"glyphicon glyphicon-send\"></span> Reply Message</a>
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