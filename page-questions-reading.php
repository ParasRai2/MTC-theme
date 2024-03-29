<?php
    get_header();
    global $wpdb;
    $table_name = $wpdb->prefix . "time_table";
    $data = $wpdb->get_results("SELECT `date`, `time`, `duration_reading`, `qno_reading` FROM $table_name");

    foreach ($data as $row) {
        $date = $row->date;
        $time = $row->time;
        $duration = $row->duration_reading;
        $qno = $row->qno_reading;
    }
    session_start();
    $id = $_SESSION['id'];

    $table_name = $wpdb->prefix . "reading_question_table";
    $data = $wpdb->get_results("SELECT `id`,`question`, `opt1`, `opt2`, `opt3`, `opt4` FROM $table_name ORDER BY RAND() LIMIT " . $qno);

    $question_query = new WP_Query(array(
        'post_type' => 'paragraphs',
        'post_status' => 'publish',
    ));

    ?>
<body>
    <!-- Navbar -->
    <?php include get_template_directory() . '/nav.php'; ?>
    <form action="<?php echo get_permalink(get_page_by_title('save-reading-ans')); ?>" method="post" id="subQuestion">
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



                            <div class="container-fluid d-none" id="page1">
                                <div class="question-1">
                                    <?php
if ($question_query->have_posts()) {
    while ($question_query->have_posts()) {
        $question_query->the_post();
        the_content();
    }
}
?>
                                </div>
                            </div>

                            <?php
$i = 0;
$j = 2;
foreach ($data as $row) {
    $question = $row->question;
    $opt1 = $row->opt1;
    $opt2 = $row->opt2;
    $opt3 = $row->opt3;
    $opt4 = $row->opt4;
    if (is_int($i / 5)) {
        echo '<div class="container-fluid" id="page' . $j . '">';
        $j++;
    }
    ?>
                                <div class="question-1">
                                    <h5>Q.
                                        <?php
$i++;
    echo $i . ".&nbsp; ";
    echo $question;
    ?>
                                    </h5>
                                    <input type="hidden" name="q<?php echo $i; ?>id" value="<?php echo $row->id; ?>">
                                    <!-- Material inline 1 -->
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="q<php echo $i; ?> form-check-input" id="q<?php echo $i; ?>-1" name="question<?php echo $i; ?>" value="1">
                                        <label class="form-check-label" for="q<?php echo $i; ?>-1"><?php echo $opt1; ?></label>
                                    </div>

                                    <!-- Material inline 1 -->
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="q<php echo $i; ?> form-check-input" id="q<?php echo $i; ?>-2" name="question<?php echo $i; ?>" value="2">
                                        <label class="form-check-label" for="q<?php echo $i; ?>-2"><?php echo $opt2; ?></label>
                                    </div>

                                    <!-- Material inline 1 -->
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="q<php echo $i; ?> form-check-input" id="q<?php echo $i; ?>-3" name="question<?php echo $i; ?>" value="3">
                                        <label class="form-check-label" for="q<?php echo $i; ?>-3"><?php echo $opt3; ?></label>
                                    </div>

                                    <!-- Material inline 1 -->
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="q<php echo $i; ?> form-check-input" id="q<?php echo $i; ?>-4" name="question<?php echo $i; ?>" value="4">
                                        <label class="form-check-label" for="q<?php echo $i; ?>-4"><?php echo $opt4; ?></label>
                                    </div>
                                </div>
                                <hr>
                                <?php
if (is_int($i / 5)) {
        echo '</div>';
    }
}
?>
                        </div>

                        <nav>
                            <ul class="pagination pg-purple justify-content-center">
                                <?php
for ($i = 1; $i <= (int) ($qno / 5) + 1; $i++) {
    ?>
                                    <li class="page-item <?php if ($i == 1) {
        echo 'active';
    }
    ?>" id="pagebtn1">
                                        <a class="page-link waves-effect waves-effect" onclick="pageclick('<?php echo $i; ?>')">
                                            <?php echo $i; ?>
                                        </a>
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
                                <button type="button" class="btn btn-info btn-md" onclick="pageclick(1)">Paragraph</button>
                            </div>
                            <hr>
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
                                    <button type="button" class="btn btn-danger btn-sm" style="width:70px;" onclick="pageclick(<?php echo (int) ((($i - 1) / 5) + 2); ?>)" id="questionbtn<?php echo $i; ?>"><?php echo $i; ?></button>
                                </div>
                                <?php }?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </form>
    <?php include get_template_directory() . '/js/reading.php'; ?>
    </body>

    </html>