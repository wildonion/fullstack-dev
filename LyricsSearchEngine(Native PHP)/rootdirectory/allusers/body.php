<div class="col-lg-8">
  <div class="panel panel-warning">
    <div class="panel-heading">
      <h4>Users List</h4>
    </div>
    <div class="panel-body">
<?php 
    include('pagination.php');      
 ?>
               <table class='table table-striped'>
                       <thead>
                           <tr>
                              <th>ID</th>
                              <th>Usrename</th>
                              <th>Email</th>
                              <th>User Status</th>
                              <th>Accessing Status</th>
                           </tr>
                        <thead>
<?php 
              foreach ($users as $user):
                # code...
                 echo "
                        
                        <tbody>
                           <tr>
                              <td>". $user['u_id']."
                              </td><td>". $user['user_name']."
                              </td><td>". $user['email']."
                              </td><td>". $user['userStatus']."
                              </td><td>". $user['accessing_status']."
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