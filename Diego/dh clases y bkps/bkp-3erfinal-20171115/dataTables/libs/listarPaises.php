<?php require_once('conexion.php');
$cn=  Conectarse();
$listado=  mysql_query("select * from user",$cn);
?>

 <script type="text/javascript" language="javascript" src="js/jslistadopaises.js"></script>



            <table cellpadding="0" cellspacing="0" border="0" class="display" id="tabla_lista_paises">
                <thead>
                    <tr>
                        <th>id</th><!--Estado-->
                        <th>Pais</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>


                    </tr>
                </tfoot>
                  <tbody>
                    <?php


                   while($reg=  mysql_fetch_array($listado))
                   {
                               echo '<tr>';
                               echo '<td >'.mb_convert_encoding($reg['id'], "UTF-8").'</td>';
                               echo '<td>'.mb_convert_encoding($reg['username'], "UTF-8").'</td>';
                               echo '</tr>';

                        }
                    ?>
                <tbody>
            </table>
