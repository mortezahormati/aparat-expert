<script src="<?= asset('js/bootstrap.bundle.js') ?>"></script> <!-- Menu Toggle Script -->
<!--<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>-->
<!--<script src="--><?php //= asset('js/persian-datepicker.min.js') ?><!--" ></script>-->
<script>
    $(document).ready(function () {

        $(".video-play").on("mouseover", function (event) {
            this.play();
        }).on('mouseout', function (event) {
            this.load();
        });

    })


    $(function () {
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

        $(window).resize(function (e) {
            if ($(window).width() <= 768) {
                $("#wrapper").removeClass("toggled");
            } else {
                $("#wrapper").addClass("toggled");
            }
        });
    });


</script>
