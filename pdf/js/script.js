$(document).ready(function () {
    // hilangkan tombol cari
    $("#tombol-cari").hide();

    // event ketika keyword ditulis
    $("#keyword").on("keyup", function () {
        // memunculkan loading gif
        $(".loading").show();

        // ajax menggunakan load
        // $("#table-container").load("ajax/anime.php?keyword=" + $("#keyword").val());

        // $.get()
        $.get("ajax/anime.php?keyword=" + $("#keyword").val(), function (data) {
            $("#table-container").html(data);
            $(".loading").hide();
        });
    });
});
