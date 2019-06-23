<?php 
  get_header();
  session_start();
  $id = $_SESSION['id']; 

  global $wpdb;
  $table_name = $wpdb->prefix ."question_table";
  $data = $wpdb->get_results( "SELECT * FROM $table_name ORDER BY RAND() LIMIT 25" );

?>
<form action="<?php echo get_permalink(get_page_by_path('saveAns')); ?>" method="post" id="subQuestion">
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
              $i=0;
              $j=1;
              foreach ($data as $row) {

                if(is_int($i/5))
                { 
            ?>
            <div class="container-fluid d-none" id="page<?php echo $j;?>">
              <?php 
                $j++;
                }
              ?>
              <div class="question-1">
                <h5>Q.<?php 
                            $i++;
                            echo $i. ".&nbsp; ";
                            echo $row->Question; 
                      ?>
                </h5>
                <input type="hidden" name="q<?php echo $i; ?>id" value="<?php echo $row->ID; ?>">
                <!-- Material inline 1 -->
                <div class="form-check form-check-inline">
                  <input type="radio" class="q<php echo $i; ?> form-check-input" id="q<?php echo $i; ?>-1" name="question<?php echo $i; ?>">
                  <label class="form-check-label" for="q<?php echo $i; ?>-1"><?php echo $row->Opt1; ?></label>
                </div>
               
                <!-- Material inline 1 -->
                <div class="form-check form-check-inline">
                  <input type="radio" class="q<php echo $i; ?> form-check-input" id="q<?php echo $i; ?>-2" name="question<?php echo $i; ?>">
                  <label class="form-check-label" for="q<?php echo $i; ?>-2"><?php echo $row->Opt2; ?></label>
                </div>

                <!-- Material inline 1 -->
                <div class="form-check form-check-inline">
                  <input type="radio" class="q<php echo $i; ?> form-check-input" id="q<?php echo $i; ?>-3" name="question<?php echo $i; ?>">
                  <label class="form-check-label" for="q<?php echo $i; ?>-3"><?php echo $row->Opt3; ?></label>
                </div>

                <!-- Material inline 1 -->
                <div class="form-check form-check-inline">
                  <input type="radio" class="q<php echo $i; ?> form-check-input" id="q<?php echo $i; ?>-4" name="question<?php echo $i; ?>">
                  <label class="form-check-label" for="q<?php echo $i; ?>-4"><?php echo $row->Opt4; ?></label>
                </div>
                <input type="hidden" name="Ans<?php echo $i; ?>" value="<?php echo $row->Ans; ?>">
              </div>
              <hr>
              <?php
                if(is_int($i/5))
                { 
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
            
            <li class="page-item active" id="pagebtn1"><a class="page-link waves-effect waves-effect" onclick="pageclick(1)">1</a></li>
            <li class="page-item" id="pagebtn2"><a class="page-link waves-effect waves-effect" onclick="pageclick(2)">2</a></li>
            <li class="page-item" id="pagebtn3"><a class="page-link waves-effect waves-effect" onclick="pageclick(3)">3</a></li>
            <li class="page-item" id="pagebtn4"><a class="page-link waves-effect waves-effect" onclick="pageclick(4)">4</a></li>
            <li class="page-item" id="pagebtn5"><a class="page-link waves-effect waves-effect" onclick="pageclick(5)">5</a></li>
          
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
            <?php for ($i=1; $i <= 25; $i++) {
              ?>
              <div>
                <button type="button" class="btn btn-danger btn-sm" style="width:70px;" onclick="pageclick(<?php echo (int)((($i-1)/5)+1); ?>)" id="questionbtn<?php echo $i; ?>"><?php echo $i; ?></button>
              </div>
            <?php } ?>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>
</form>
 <?php get_footer(); ?>

<script type="text/javascript">
  function dnoneAll()
  {
    $("#page1").removeClass("d-block");
    $("#page2").removeClass("d-block");
    $("#page3").removeClass("d-block");
    $("#page4").removeClass("d-block");
    $("#page5").removeClass("d-block");
    $("#page1").addClass("d-none");
    $("#page2").addClass("d-none");
    $("#page3").addClass("d-none");
    $("#page4").addClass("d-none");
    $("#page5").addClass("d-none");
    $("#pagebtn1").removeClass("active");
    $("#pagebtn2").removeClass("active");
    $("#pagebtn3").removeClass("active");
    $("#pagebtn4").removeClass("active");
    $("#pagebtn5").removeClass("active");
  }
  function pageclick(pid)
  {
    dnoneAll()
    $("#page"+pid).addClass("d-block")
    $("#pagebtn"+pid).addClass("active");

  }
  $("#page1").removeClass("d-none");
  $("#page1").addClass("d-block");



  window.setInterval(function()
  {
    var i;
    var status;
    var name;
    for (i = 1; i <= 25; i++) { 
      name = "question"+i;
      status = $('[name="'+name+'"]').is(':checked');
      if(status)
      {
        $('#questionbtn'+i).removeClass("btn-danger");
        $('#questionbtn'+i).addClass("btn-info");
      }
    }
  },800);
  function submitAns()
  {
    $("#subQuestion").submit();
  }
</script>