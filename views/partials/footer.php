<script src="<?= asset('js/jquery-3.5.1.slim.min.js') ?>"></script>
<script src="<?= asset('js/bootstrap.bundle.js') ?>"></script> <!-- Menu Toggle Script -->
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
</body>
</html>