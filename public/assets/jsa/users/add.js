function submitAdd() {
    const btnSubmit = document.getElementById('btnsubmit');
    const nama = document.forms['formAdd']['nama'].value;
    const email = document.forms['formAdd']['email'].value;
    const grupid = document.forms['formAdd']['grupid'].value;
    if (setText(nama)) {
        msg(['nama', 'Nama ' + setText(nama)]);
    } else if (setEmail(email)) {
        msg(['email', 'Email ' + setEmail(email)]);
    } else if (setPilihan(grupid)) {
        msg(['grupid', 'Grup ' + setPilihan(grupid)]);
    } else {
        btnSubmit.innerHTML = "Menyimpan..";
        const form = document.querySelector('form[id="formAdd"]');
        const formData = new FormData(form);
        fetch('/'+getMeta('sessionkey')+'/users', {
            method: 'POST',
            body: formData
        }).then(response => response.text()).then(pesan => {
            btnSubmit.innerHTML = "Simpan";
            if(pesan == "Berhasil"){
                Toast({
                    type: 'success',
                    message: 'User baru telah dibuat',
                });
                document.getElementById('nama').value="";
                document.getElementById('email').value="";
                document.getElementById('grupid').value="";
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