function submitAuth() {
    const btnSubmit = document.getElementById('btnregistrasi');
    const nama = document.forms['formAuth']['nama'].value;
    const email = document.forms['formAuth']['email'].value;
    const psw = document.forms['formAuth']['psw'].value;
    if (setText(nama)) {
        msg(['nama', 'Nama ' + setText(nama)]);
    } else if (setEmail(email)) {
        msg(['email', 'Email ' + setEmail(email)]);
    } else if (setText(psw)) {
        msg(['psw', 'Password ' + setText(psw)]);
    } else {
        btnSubmit.innerHTML = "Mendaftar..";
        const form = document.querySelector('form[id="formAuth"]');
        const formData = new FormData(form);
        fetch('/registrasi', {
            method: 'POST',
            body: formData
        }).then(response => response.text()).then(pesan => {
            btnSubmit.innerHTML = "Registrasi";
            if(pesan == "Berhasil"){
                Toast({
                    type: 'success',
                    message: 'User baru sudah dibuat'
                });
              document.getElementById('nama').value = "";
              document.getElementById('nama').focus();
              document.getElementById('email').value = "";
              document.getElementById('psw').value = "";   
            }else{
                Toast({
                    type: 'error',
                    message: pesan,
                });    
            }
        }).catch(error => {
            btnSubmit.innerHTML = "Registrasi";
            Toast({
                type: 'error',
                message: 'Registrasi gagal',
            });
            return false;
        });
        return false;
    }
    return false;
}