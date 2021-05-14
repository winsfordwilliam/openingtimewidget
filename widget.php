<?php
include('inc/functions.php');
var_dump(openingTime());
var_dump(displayOpening());
?>
<html>
<link rel="stylesheet" href="stlye.css">
<div class="widget">
 <h2 class="store-opening"> The store is <?php displayOpening() ?></h2>
</div>
</html>