function submitEdit() {
    const btnSubmit = document.getElementById('btnsubmit');
    const nama = document.forms['formEdit']['nama'].value;
    const keterangan = document.forms['formEdit']['keterangan'].value;
    const role = document.forms['formEdit']['role'].value;
    if (setText(nama)) {
        msg(['nama', 'Nama ' + setText(nama)]);
    } else if (setText(keterangan)) {
        msg(['keterangan', 'Keterangan ' + setText(keterangan)]);
    } else if (setText(role)) {
        msg(['role', 'Role ' + setText(role)]);
    } else {
        btnSubmit.innerHTML = "Memperbarui..";
        const form = document.querySelector('form[id="formEdit"]');
        const formData = new FormData(form);
        fetch('/'+getMeta('sessionkey')+'/grup', {
            method: 'POST',
            body: formData
        }).then(response => response.text()).then(pesan => {
            btnSubmit.innerHTML = "Simpan Perubahan";
            if(pesan == "Berhasil"){
                Toast({
                    type: 'success',
                    message: 'Grup baru telah dibuat',
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
            btnSubmit.innerHTML = "Simpan Perubahan";
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