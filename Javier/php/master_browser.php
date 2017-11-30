<?php
function stmt_list_browser($param_table, $db){
  $stmt = $db->prepare("SELECT * FROM user");

  $stmt->bindParam(':table',$param_table, PDO::PARAM_STR);
  // echo "<pre>";
  // var_dump(':table');
  // echo "</pre>";
  $stmt->execute();

  $listado = $stmt->fetchall(PDO::FETCH_ASSOC);

  return $listado;
}
?>
