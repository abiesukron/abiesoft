function submitEdit() {
    const btnSubmit = document.getElementById('btnsubmit');
    const nama = document.forms['formEdit']['nama'].value;
    const email = document.forms['formEdit']['email'].value;
    const grupid = document.forms['formEdit']['grupid'].value;
    const nohp = document.forms['formEdit']['nohp'].value;
    if (setText(nama)) {
        msg(['nama', 'Nama ' + setText(nama)]);
    } else if (setEmail(email)) {
        msg(['email', 'Email ' + setEmail(email)]);
    } else if (setPilihan(grupid)) {
        msg(['grupid', 'Grup ' + setPilihan(grupid)]);
    } else if (setNoHp(nohp)) {
        msg(['nohp', 'Nomor Hp ' + setNoHp(nohp)]);
    } else {
        btnSubmit.innerHTML = "Menyimpan..";
        const form = document.querySelector('form[id="formEdit"]');
        const formData = new FormData(form);
        fetch('/'+getMeta('sessionkey')+'/users', {
            method: 'POST',
            body: formData
        }).then(response => response.text()).then(pesan => {
            btnSubmit.innerHTML = "Simpan Perubahan";
            if(pesan == "Berhasil"){
                Toast({
                    type: 'success',
                    message: 'User telah diperbarui',
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