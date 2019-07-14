<script type="text/javascript">
    var clock;
    var currentTime;
    var startTime;
    var diff;

    function dnoneAll() {
        var i;
        for (i = 1; i <= <?php echo (int) ($qno / 5); ?>; i++) {
            $("#page" + i).removeClass("d-block");
            $("#page" + i).addClass("d-none");
            $("#pagebtn" + i).removeClass("active");
        }
    }

    function pageclick(pid) {
        dnoneAll()
        $("#page" + pid).addClass("d-block")
        $("#pagebtn" + pid).addClass("active");
    }
    
    $(window).ready(function() {
        currentTime = new Date();
        startTime = new Date("<?php echo $date . ' ' . $time; ?>");
        diff = (startTime - currentTime) / 1000;
        diff = diff + <?php echo $duration; ?> * 60;
        clock = $('#nav-clock').FlipClock(parseInt(diff), {
            clockFace: 'MinuteCounter',
            countdown: true,
            callbacks: {
                stop: function() {
                    alert("Time Up! Auto Submitting");
                    $("#subQuestion").submit();
                }
            }
        });
        $("#page1").removeClass("d-none");
        $("#page1").addClass("d-block");
        window.setInterval(function() {
            var i;
            var status;
            var name;
            var attem = 0;
            for (i = 1; i <= <?php echo $qno; ?>; i++) {
                name = "question" + i;
                status = $('[name="' + name + '"]').is(':checked');
                if (status) {
                    $('#questionbtn' + i).removeClass("btn-danger");
                    $('#questionbtn' + i).addClass("btn-info");
                    attem++;
                }
            }
            $("#attempted").html(attem + "/" + <?php echo $qno; ?>);
        }, 800);

        $("#subbtn").click(function() {
            $('#subQuestion').submit();
        });
    });
</script>