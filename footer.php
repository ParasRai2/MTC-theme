
<!-- JQuery -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/mdb.min.js"></script>
<!-- Initializations -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/custom.js"></script>
<!-- data-table -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/addons/datatables.min.js"></script>
<!-- owl Carousel -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/owl.carousel.min.js"></script>
<!-- flipclock -->
<script src="<?php echo get_template_directory_uri(); ?>/compiled/flipclock.js"></script>
<?php
global $wpdb;
  $table_name = $wpdb->prefix ."time_table";
  $data = $wpdb->get_results( "SELECT `date`, `time`, `$row->duration_mcq`, `$row->duration_mcq`, `$row->duration_audio` FROM $table_name" );

  foreach ($data as $row){
    $date = $row->date; 
    $time = $row->time;
    $duration = $row->duration_mcq + $row->duration_reading + $row->duration_audio;
  }
?>
<script type="text/javascript">
    
    var clock;
    var currentTime;
    var startTime;
    var diff;


    $(document).ready(function() {
      currentTime = new Date();
      startTime = new Date("<?php echo $date . ' '. $time; ?>");
      diff = (startTime - currentTime)/1000;
      diff = diff + <?php echo $duration; ?>*60;
      clock = $('#nav-clock').FlipClock( parseInt(diff), {
            clockFace: 'MinuteCounter',
            countdown: true,
            callbacks: {
              stop: function() {
                alert("Time Up! Auto Submitting");
                $("#subQuestion").submit();
              }
            }
        });
    });

</script>
</body>
</html>
