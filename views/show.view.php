<?php 
require 'partials/header.view.php';
$hosts = require 'app/utilites/hosts.php';
?>

<div class="container">
  <h1>LOGS</h1>
  

  <nav class="navbar navbar-default">
  <div class="container">
    <ul class="nav navbar-nav">
      <li><a href="/">Reset</a></li>
      <li><a href="/?level=err">Error</a></li>
      <li><a href="/?level=notice">Notice</a></li>
      <li><a href="/?level=info">Info</a></li>
      <li><a href="/?level=warning">Warning</a></li>
      <li class="dropdown">
        <a a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Host<span class="caret"></span>
        </a>
          <ul class="dropdown-menu">
            <?php foreach ($hosts as $host) : ?>
              <li><a href="?host=<?=$host?>"><?=$host?></a></li>
            <?php endforeach; ?>
          </ul>  
      </li>

    </ul>
  </div>
</nav>

  <table id="log_table" class="table">
  <!-- Table header -->
   <thead>
      <tr>
        <th class="col-md-3 col-sm-3">Host</th>
        <th class="col-md-1">Level</th>
        <th class="col-md-2 col-sm-2">Datetime</th>
        <th class="col-md-6">Message</th>
      </tr>
    </thead>
    <!-- /Table header -->

    <tbody id='tbody'>
<!-- Row coloring rules -->
    <?php foreach ($result as $row) :
        switch ($row->level) {
          case 'err': $tr_class = "danger";break;
          //case 'info': $tr_class = "info";break;
          case 'notice': $tr_class = "info";break;
          case 'warning': $tr_class = "warning";break;
          default: $tr_class = '';
        }
      ?>
  <!-- /Row coloring rules -->
  <tr class="<?=$tr_class?>">
        <td><?=$row->host?></td>
        
        <td><a href="?level=<?=$row->level ?>"><?=$row->level ?></a></td>
        <td><?= $row->datetime ?></td>
        <td><?= $row->msg ?></td>
        </tr>    
        
    <?php endforeach; ?>

</tbody>
</table>




<?php require 'partials/footer.view.php';?>
