<?php
require_once('assets/config.inc.php');
// pagination process
   $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
   $perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 5;

   $start = ($page > 1) ? ($page * $perPage) - $perPage : 0;
   
   $editlyrics = $db->prepare("
      SELECT SQL_CALC_FOUND_ROWS e_id, l_id, edited_by, edit_date, name_of_music_that_edited_by_user
      FROM edditedby ORDER BY edit_date DESC
      LIMIT {$start}, {$perPage}

    ");
   $editlyrics->execute();
   $editlyrics = $editlyrics->fetchAll(PDO::FETCH_ASSOC);
   
   $total = $db->query("SELECT FOUND_ROWS() as total")->fetch()['total'];
   $pages = ceil($total / $perPage);

?>