<div class="col-lg-9">
    <div style="width: 50px;height: 5px;"></div>

<!-- COMMENTS -->

    <div class="col-md-4">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-3"><i class="glyphicon glyphicon-comment" style="font-size: 4.5em"></i></div>
            <div class="col-xs-9 text-right">
              <div style="font-size: 2.5em">
                <?php
                  require_once("../dbconfig/db.class.php");
                  $pdo_obj = new pdoCRUD();
                  $selectQuery='select * from comments';
                  $results=$pdo_obj->selectData($selectQuery);
                  if(sizeof($results) == 0)
                    echo "0";
                  else
                    echo sizeof($results);
                  
                 ?> 
               <div>Comments</div>
             </div>
            </div>
          </div>
        </div>
        <a href="allcomments/allcomments">
          <div class="panel-footer">
            <div class="pull-left">View All Comments</div>
            <div class="pull-right"><i class="glyphicon glyphicon-circle-arrow-left"></i></div>
            <div class="clearfix"></div>
          </div>
          </a>
      </div>
    </div>

<!-- USERS -->
    <div class="col-md-4">
      <div class="panel panel-warning">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-3"><i class="glyphicon glyphicon-user" style="font-size: 4.5em"></i></div>
            <div class="col-xs-9 text-right">
              <div style="font-size: 2.5em">
                <?php
                  require_once("../dbconfig/db.class.php");
                  $pdo_obj = new pdoCRUD();
                  $selectQuery='select * from useraccepttranslate';
                  $results=$pdo_obj->selectData($selectQuery);
                  if(sizeof($results) == 0)
                    echo "0";
                  else
                    echo sizeof($results);
                  
                 ?> 
               <div>Users</div>
             </div>
            </div>
          </div>
        </div>
        <a href="allusers/allusers">
          <div class="panel-footer">
            <div class="pull-left">View All Users</div>
            <div class="pull-right"><i class="glyphicon glyphicon-circle-arrow-left"></i></div>
            <div class="clearfix"></div>
          </div>
          </a>
      </div>
    </div>

<!-- TRANSLATED -->
    <div class="col-md-4">
      <div class="panel panel-danger">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-3"><i class="glyphicon glyphicon-list-alt" style="font-size: 4.5em"></i></div>
            <div class="col-xs-9 text-right">
              <div style="font-size: 2.5em">
                <?php
                  require_once("../dbconfig/db.class.php");
                  $pdo_obj = new pdoCRUD();
                  $selectQuery='select name_of_music_that_translated_by_user from translateby';
                  $results=$pdo_obj->selectData($selectQuery);
                  if(sizeof($results) == 0)
                    echo "0";
                  else
                    echo sizeof($results);
                  
                 ?> 
               <div>Lyrics Translated</div>
             </div>
            </div>
          </div>
        </div>
        <a href="alltranslatedlyrics/alltranslatedlyrics">
          <div class="panel-footer">
            <div class="pull-left">View All Translated Lyrics</div>
            <div class="pull-right"><i class="glyphicon glyphicon-circle-arrow-left"></i></div>
            <div class="clearfix"></div>
          </div>
          </a>
      </div>
    </div>

<!-- EDITED -->
     <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-3"><i class="glyphicon glyphicon-edit" style="font-size: 4.5em"></i></div>
            <div class="col-xs-9 text-right">
              <div style="font-size: 2.5em">
                <?php
                  require_once("../dbconfig/db.class.php");
                  $pdo_obj = new pdoCRUD();
                  $selectQuery='select l_id from edditedby';
                  $results=$pdo_obj->selectData($selectQuery);
                  if(sizeof($results) == 0)
                    echo "0";
                  else
                    echo sizeof($results);
                  
                 ?> 
               <div>Lyrics Edited</div>
             </div>
            </div>
          </div>
        </div>
        <a href="alleditedlyrics/alleditedlyrics">
          <div class="panel-footer">
            <div class="pull-left">View All Edited Lyrics</div>
            <div class="pull-right"><i class="glyphicon glyphicon-circle-arrow-left"></i></div>
            <div class="clearfix"></div>
          </div>
          </a>
      </div>
    </div>


<!-- MSG -->
     <div class="col-md-4">
      <div class="panel panel-info">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-3"><i class="glyphicon glyphicon-envelope" style="font-size: 4.5em"></i></div>
            <div class="col-xs-9 text-right">
              <div style="font-size: 2.5em">
                <?php
                  require_once("../dbconfig/db.class.php");
                  $pdo_obj = new pdoCRUD();
                  $selectQuery='select u_id from msgforadmin';
                  $results=$pdo_obj->selectData($selectQuery);
                  if(sizeof($results) == 0)
                    echo "0";
                  else
                    echo sizeof($results);
                  
                 ?> 
               <div>Massages</div>
             </div>
            </div>
          </div>
        </div>
        <a href="allmsg/allmsg">
          <div class="panel-footer">
            <div class="pull-left">View All Massages</div>
            <div class="pull-right"><i class="glyphicon glyphicon-circle-arrow-left"></i></div>
            <div class="clearfix"></div>
          </div>
          </a>
      </div>
    </div>

<!-- LYRICS -->
<div class="col-md-4">
      <div class="panel panel-success">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-3"><i class="glyphicon glyphicon-book" style="font-size: 4.5em"></i></div>
            <div class="col-xs-9 text-right">
              <div style="font-size: 2.5em">
                <?php
                  require_once("../dbconfig/db.class.php");
                  $pdo_obj = new pdoCRUD();
                  $selectQuery='select lyrics from lyrics';
                  $results=$pdo_obj->selectData($selectQuery);
                  if(sizeof($results) == 0)
                    echo "0";
                  else
                    echo sizeof($results);
                  
                 ?> 
               <div>Lyrics</div>
             </div>
            </div>
          </div>
        </div>
        <a href="alllyrics/alllyrics">
          <div class="panel-footer">
            <div class="pull-left">View All Lyrics</div>
            <div class="pull-right"><i class="glyphicon glyphicon-circle-arrow-left"></i></div>
            <div class="clearfix"></div>
          </div>
          </a>
      </div>
    </div>
</div>

<!-- profile area -->  
<div class="col-lg-4">
  
  <div class="panel panel-primary">
    <div class="panel-heading">
      <div class="col-md-7">
        <div class="page-header"><h4></h4><span class="label label-warning">Available Now</span>: <?php echo $_SESSION['user']['username']?></h4></div>
      </div>
      <div class="col-md8">
       <?php
           require_once("../dbconfig/db.class.php");
           $pdo_obj = new pdoCRUD(); // instantiate PDO class
          $selectQuery='select admin_pic from admin where username=?';
          $results=$pdo_obj->selectData($selectQuery, array($_SESSION['user']['username']));
          for($i=0; $i<sizeof($results);$i++)
          {
             ?>
               <img src="adminprof/<?php echo $results[$i]['admin_pic']?>" class="img-circle" alt="<?php echo $_SESSION['user']['username'];?>" width="30%"/> </br>
             <?php
               }

           ?>
      </div>
       
       <div class="panel-body">
         <table class="table table-condensed">
           <tbody>
             <tr>
              <th>Role:</th>
              <td>Admin</td>
             </tr>
             <tr>
              <th>Email:</th>
              <td><?php
               require_once("../dbconfig/db.class.php");
               $pdo_obj = new pdoCRUD(); // instantiate PDO class
              $selectQuery='select email from admin where username=?';
              $results=$pdo_obj->selectData($selectQuery, array($_SESSION['user']['username']));
              for($i=0; $i<sizeof($results);$i++)
              {
                 echo $results[$i]['email'];
              }

               ?>
              </td>
              </tr>
          </tbody>
         </table>
       </div>
    </div>
  </div>
 </div>

<!-- Admin area -->

<div class="col-lg-6">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h4>Admins List</h4>
    </div>
    <div class="panel-body">
      <?php 
        require_once("../dbconfig/db.class.php");
               $pdo_obj = new pdoCRUD(); // instantiate PDO class
              $selectQuery='select a_id, username, email, enter_added from admin';
              $results=$pdo_obj->selectData($selectQuery);
              ?>
               <table class='table table-striped'>
                       <thead>
                           <tr>
                              <th>ID</th>
                              <th>Usrename</th>
                              <th>Email</th>
                              <th>Rigistered Date</th>
                           </tr>
                        <thead>
              <?php 
              for($i=0; $i<sizeof($results);$i++)
              {
                 echo "
                        
                        <tbody>
                           <tr>
                              <td>". $results[$i]['a_id']."
                              </td><td>". $results[$i]['username']."
                              </td><td>". $results[$i]['email']."
                              </td><td>". $results[$i]['enter_added']."
                           </tr>
                        </tbody>
                        ";
              }
           ?>
      </table>
    </div>
  </div>
</div>
<div class="clearfix"></div>
