<?php
require_once('assets/config.inc.php');
// pagination process
   $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
   $perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 5;

   $start = ($page > 1) ? ($page * $perPage) - $perPage : 0;
   
   $lyrics = $db->prepare("
      SELECT SQL_CALC_FOUND_ROWS l_id, name_of_music, lyrics, post_date, translateby
      FROM lyrics ORDER BY post_date DESC
      LIMIT {$start}, {$perPage}

    ");
   $lyrics->execute();
   $lyrics = $lyrics->fetchAll(PDO::FETCH_ASSOC);
   
   $total = $db->query("SELECT FOUND_ROWS() as total")->fetch()['total'];
   $pages = ceil($total / $perPage);

?>