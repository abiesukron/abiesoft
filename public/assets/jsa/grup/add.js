function submitAdd() {
    const btnSubmit = document.getElementById('btnsubmit');
    const nama = document.forms['formAdd']['nama'].value;
    const keterangan = document.forms['formAdd']['keterangan'].value;
    const role = document.forms['formAdd']['role'].value;
    if (setText(nama)) {
        msg(['nama', 'Nama ' + setText(nama)]);
    } else if (setText(keterangan)) {
        msg(['keterangan', 'Keterangan ' + setText(keterangan)]);
    } else if (setText(role)) {
        msg(['role', 'Role ' + setText(role)]);
    } else {
        btnSubmit.innerHTML = "Menyimpan..";
        const form = document.querySelector('form[id="formAdd"]');
        const formData = new FormData(form);
        fetch('/'+getMeta('sessionkey')+'/grup', {
            method: 'POST',
            body: formData
        }).then(response => response.text()).then(pesan => {
            btnSubmit.innerHTML = "Simpan";
            if(pesan == "Berhasil"){
                Toast({
                    type: 'success',
                    message: 'Grup baru telah dibuat',
                });
                document.getElementById('nama').value="";
                document.getElementById('keterangan').value="";
                document.getElementById('role').value="";
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