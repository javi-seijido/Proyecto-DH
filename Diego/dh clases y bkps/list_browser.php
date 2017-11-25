<nav>
     <ol>
       <?php foreach ($list_browser as $value) { ?>
           <li><?php $value['id']. '-'. $value['username'] ?></li>
       <?php } ?>

     </ol>
</nav>
