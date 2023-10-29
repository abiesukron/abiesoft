function submitAdd() {
    const btnSubmit = document.getElementById('btnsubmit');
    const judul = document.forms['formEdit']['judul'].value;
    const iframepotongan = document.querySelector('iframe#editor0');
    const potongan = document.getElementById('potongan').value = iframepotongan.contentWindow.document.body.innerHTML;
    const iframeisi = document.querySelector('iframe#editor1');
    const isi = document.getElementById('isi').value = iframeisi.contentWindow.document.body.innerHTML;
    const kategoriid = document.forms['formEdit']['kategoriid'].value;
    const tag = document.forms['formEdit']['tag'].value;
    const publikasi = document.forms['formEdit']['publikasi'].value;
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
    } else if (setPilihan(publikasi)) {
        msg(['publikasi', 'Publikasi ' + setPilihan(publikasi)]);
    }  else {
        btnSubmit.innerHTML = "Memperbarui..";
        const form = document.querySelector('form[id="formEdit"]');
        const formData = new FormData(form);
        fetch('/'+getMeta('sessionkey')+'/berita', {
            method: 'POST',
            body: formData
        }).then(response => response.text()).then(pesan => {
            btnSubmit.innerHTML = "Simpan";
            if(pesan == "Berhasil"){
                Toast({
                    type: 'success',
                    message: 'Berita telah diupdate',
                });
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