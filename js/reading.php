<script type="text/javascript">
    function dnoneAll() {
        var clock;
        var currentTime;
        var startTime;
        var diff;
        var i;
        for (i = 1; i <= <?php echo (int) ($qno / 5) + 1; ?>; i++) {
            $("#page" + i).css("display", "none");
            $("#pagebtn" + i).removeClass("active");
        }
    }

    function pageclick(pid) {
        dnoneAll()
        $("#page" + pid).css("display", "block");
        $("#pagebtn" + pid).addClass("active")
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
                }
            }
        });
        pageclick(1);

        setInterval(function() {
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