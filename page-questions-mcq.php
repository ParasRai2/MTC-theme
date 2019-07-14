<?php
get_header();
global $wpdb;
$table_name = $wpdb->prefix . "time_table";
$data = $wpdb->get_results("SELECT `date`, `time`, `duration_mcq`, `qno_mcq` FROM $table_name");
foreach ($data as $row) {
    $date = $row->date;
    $time = $row->time;
    $duration = $row->duration_mcq;
    $qno = $row->qno_mcq;
}
session_start();
$id = $_SESSION['id'];

$table_name = $wpdb->prefix . "mcq_question_table";
$data = $wpdb->get_results("SELECT `id`,`question`, `opt1`, `opt2`, `opt3`, `opt4` FROM $table_name ORDER BY RAND() LIMIT " . $qno);

?>
<body>
<!-- Navbar -->
<?php include get_template_directory() . '/nav.php'; ?>


<form action="<?php echo get_permalink(get_page_by_title('save-mcq-ans')); ?>" method="post" id="subQuestion">
<section class="questions">
  <div class="row">
    <div class="col-md-8">
      <div class="card card-cascade narrower">
        <!-- Card image -->
        <div class="view view-cascade gradient-card-header purple-gradient">
          <!-- Title -->
          <h2 class="card-header-title">MTC Questions</h2>
        </div>
        <!-- Card content -->
        <div class="card-body card-body-cascade">
          <?php
            $i = 0;
            $j = 1;
            foreach ($data as $row) {
                if (is_int($i / 5)) {
                    ?>
            <div class="container-fluid d-none" id="page<?php echo $j; ?>">
              <?php
                $j++;
                    }
                    ?>
              <div class="question-1">
                <h5>Q.
                <?php
                  $i++;
                      echo $i . ".&nbsp; ";
                      echo $row->question;
                      ?>
                </h5>
                <input type="hidden" name="q<?php echo $i; ?>id" value="<?php echo $row->id; ?>">
                <!-- Material inline 1 -->
                <div class="form-check form-check-inline">
                  <input type="radio" class="q<php echo $i; ?> form-check-input" id="q<?php echo $i; ?>-1" name="question<?php echo $i; ?>" value = "1">
                  <label class="form-check-label" for="q<?php echo $i; ?>-1"><?php echo $row->opt1; ?></label>
                </div>

                <!-- Material inline 1 -->
                <div class="form-check form-check-inline">
                  <input type="radio" class="q<php echo $i; ?> form-check-input" id="q<?php echo $i; ?>-2" name="question<?php echo $i; ?>" value="2">
                  <label class="form-check-label" for="q<?php echo $i; ?>-2"><?php echo $row->opt2; ?></label>
                </div>

                <!-- Material inline 1 -->
                <div class="form-check form-check-inline">
                  <input type="radio" class="q<php echo $i; ?> form-check-input" id="q<?php echo $i; ?>-3" name="question<?php echo $i; ?>" value="3">
                  <label class="form-check-label" for="q<?php echo $i; ?>-3"><?php echo $row->opt3; ?></label>
                </div>

                <!-- Material inline 1 -->
                <div class="form-check form-check-inline">
                  <input type="radio" class="q<php echo $i; ?> form-check-input" id="q<?php echo $i; ?>-4" name="question<?php echo $i; ?>" value = "4">
                  <label class="form-check-label" for="q<?php echo $i; ?>-4"><?php echo $row->opt4; ?></label>
                </div>
              </div>
              <hr>
              <?php
                if (is_int($i / 5)) {
                        ?>
              </div>
                <?php
                  }
                      ?>
                          <?php
                }
                ?>
        </div>

        <nav>
          <ul class="pagination pg-purple justify-content-center">
            <?php
for ($i = 1; $i <= (int) ($qno / 5); $i++) {
    ?>
            <li class="page-item <?php if ($i == 1) {
        echo 'active';
    }
    ?>" id="pagebtn1">
              <a class="page-link waves-effect waves-effect" onclick="pageclick('<?php echo $i; ?>')"><?php echo $i; ?></a>
            </li>
            <?php
}
?>

          </ul>
        </nav>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card card-cascade narrower">

        <!-- Card image -->
        <div class="view view-cascade gradient-card-header purple-gradient">

          <!-- Title -->
          <h2 class="card-header-title">Index</h2>
        </div>

        <!-- Card content -->
        <div class="card-body card-body-cascade text-center">
          <style>
          .flex-container {
            display: flex;
            flex-wrap: wrap;
          }
          </style>
          <div class="flex-container">
            <div>
              <button type="button" class="btn btn-info btn-md" disabled>Answered</button>
            </div>
            <div>
              <button type="button" class="btn btn-danger btn-md" disabled>Unanswered</button>
            </div>
          </div>
          <hr>
          <div class="flex-container">
            <?php for ($i = 1; $i <= $qno; $i++) {
    ?>
              <div>
                <button type="button" class="btn btn-danger btn-sm" style="width:70px;" onclick="pageclick(<?php echo (int) ((($i - 1) / 5) + 1); ?>)" id="questionbtn<?php echo $i; ?>"><?php echo $i; ?></button>
              </div>
            <?php }?>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>
</form>


<?php include get_template_directory() . '/js/mcq.php';?>

</body>
</html>
