let inputJudul = el('#judul');
if(inputJudul){
    inputJudul.addEventListener('keyup', ()=>{
        let prevslug = el('#prevslug');
        prevslug.value = inputJudul.value.toLowerCase().replaceAll(" ","-").replaceAll("'","").replaceAll("!","").replaceAll("`","").replaceAll("?","");
    });
}

let inputGambar =  el('#gambar');
if(inputGambar){
    inputGambar.addEventListener('change', ()=>{
        const file = inputGambar.files[0];
        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const image = new Image();
                image.src = e.target.result;
                el('#prevgambar').src = e.target.result;
                image.addEventListener('load', function() {
                    el('#imagecontainer').innerHTML = '';
                    el('#imagecontainer').appendChild(image);
                });
                image.setAttribute('style', 'width: 100%;');
            }

            reader.readAsDataURL(file);
        }
    });
}

function submitAdd() {
    const btnSubmit = document.getElementById('btnsubmit');
    const judul = document.forms['formAdd']['judul'].value;
    const iframepotongan = document.querySelector('iframe#editor0');
    const potongan = document.getElementById('potongan').value = iframepotongan.contentWindow.document.body.innerHTML;
    const iframeisi = document.querySelector('iframe#editor1');
    const isi = document.getElementById('isi').value = iframeisi.contentWindow.document.body.innerHTML;
    const kategoriid = document.forms['formAdd']['kategoriid'].value;
    const tag = document.forms['formAdd']['tag'].value;
    const gambar = document.forms['formAdd']['gambar'].value;
    const publikasi = document.forms['formAdd']['publikasi'].value;
    if (setText(judul)) {
        msg(['judul', 'Judul ' + setText(judul)]);
    } else if (setText(potongan)) {
        msg(['potongan', 'Potongan berita ' + setText(potongan)]);
    } else if (setText(isi)) {
        msg(['isi', 'Isi berita ' + setText(isi)]);
    } else if (setPilihan(kategoriid)) {
        msg(['kategoriid', 'Kategori ' + setPilihan(kategoriid)]);
    } else if (setText(tag)) {
        msg(['tag', 'Tag ' + setText(tag)]);
    } else if (setPilihan(gambar)) {
        msg(['gambar', 'Gambar ' + setPilihan(gambar)]);
    } else if (setPilihan(publikasi)) {
        msg(['publikasi', 'Publikasi ' + setPilihan(publikasi)]);
    }  else {
        btnSubmit.innerHTML = "Menyimpan..";
        const form = document.querySelector('form[id="formAdd"]');
        const formData = new FormData(form);
        fetch('/'+getMeta('sessionkey')+'/berita', {
            method: 'POST',
            body: formData
        }).then(response => response.text()).then(pesan => {
            btnSubmit.innerHTML = "Simpan";
            if(pesan == "Berhasil"){
                Toast({
                    type: 'success',
                    message: 'Berita baru telah dibuat',
                });
                document.getElementById('judul').value="";
                document.getElementById('potongan').value="";
                iframepotongan.contentWindow.document.body.innerHTML = "";
                document.getElementById('isi').value="";
                iframeisi.contentWindow.document.body.innerHTML = "";
                document.getElementById('kategoriid').value="";
                document.getElementById('tag').value="";
                document.getElementById('gambar').value="";
                document.getElementById('publikasi').value="";
                return false;
            }else{
                Toast({
                    type: 'error',
                    message: pesan,
                });
                return false;
            }
        }).catch(error => {
            btnSubmit.innerHTML = "Simpan";
            Toast({
                type: 'error',
                message: error,
            });
            return false;
        });
        return false;
    }
    return false;
}