
const keyword = document.getElementById('keyword');
const tombolCari = document.getElementById('tombol-cari');
const hasilPencarian = document.getElementById('hasil-pencarian');

keyword.addEventListener('keyup', function(){
    // buat object ajax
    const xhr = new XMLHttpRequest();

    // cek kesiapan ajax
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            hasilPencarian.innerHTML = xhr.responseText;
        }
    }

    // eksekusi ajax
    xhr.open('GET', 'ajax/artikel.php?keyword='+ keyword.value, true);
    xhr.send();
});

