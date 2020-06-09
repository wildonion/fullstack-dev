<?php
require_once('assets/dbpag.php');
// pagination process
   $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
   $perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 5;

   $start = ($page > 1) ? ($page * $perPage) - $perPage : 0;
   
   $msg = $db->prepare("
      SELECT SQL_CALC_FOUND_ROWS m_id, user_id, reg_date, message, replymsgfromadmin 
      FROM msgfromadmin 
      WHERE user_id=:id
      ORDER BY reg_date DESC
      LIMIT {$start}, {$perPage}

    ");
   $msg->execute(array(':id'=>$row['u_id']));
   $msg = $msg->fetchAll(PDO::FETCH_ASSOC);
   
   $total = $db->query("SELECT FOUND_ROWS() as total")->fetch()['total'];
   $pages = ceil($total / $perPage);

?>