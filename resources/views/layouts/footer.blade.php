<footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      <?php
      //echo base_path();
      date_default_timezone_set('Europe/Athens');
      $timestamp = filemtime(base_path()."/.git/index");
      echo "Last update: ".date('d/m/Y H:i:s',$timestamp);
      ?>
    </div>
    <!-- Default to the left -->
    University of Western Macedonia
</footer>
