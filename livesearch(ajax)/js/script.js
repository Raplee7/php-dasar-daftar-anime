// ambil elemen2 yg dibutuhkan
var keyword = document.getElementById("keyword");
var tombolCari = document.getElementById("tombol-cari");
var tableContainer = document.getElementById("table-container");

// tambahkan event ketika keyword ditulis
keyword.addEventListener("keyup", function () {
    // buat object ajax
    var xhr = new XMLHttpRequest();

    // cek kesiapan ajax
    xhr.onreadystatechange = function () {
        // 4 dan 200 artinya sudah ready
        if (xhr.readyState == 4 && xhr.status == 200) {
            tableContainer.innerHTML = xhr.responseText;
        }
    };
    xhr.open("GET", "ajax/anime.php?keyword=" + keyword.value, true);
    xhr.send();
});
