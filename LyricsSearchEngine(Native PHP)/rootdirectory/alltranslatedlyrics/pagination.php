<?php
require_once('assets/config.inc.php');
// pagination process
   $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
   $perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 5;

   $start = ($page > 1) ? ($page * $perPage) - $perPage : 0;
   
   $translyrics = $db->prepare("
      SELECT SQL_CALC_FOUND_ROWS u_id, user_name, email, name_of_music_that_translated_by_user, translate_date
      FROM translateby ORDER BY translate_date DESC
      LIMIT {$start}, {$perPage}

    ");
   $translyrics->execute();
   $translyrics = $translyrics->fetchAll(PDO::FETCH_ASSOC);
   
   $total = $db->query("SELECT FOUND_ROWS() as total")->fetch()['total'];
   $pages = ceil($total / $perPage);

?>