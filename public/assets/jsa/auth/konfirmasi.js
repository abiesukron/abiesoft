function submitAuth() {
    const btnSubmit = document.getElementById('btnlogin');
    const email = document.forms['formAuth']['email'].value;
    const psw = document.forms['formAuth']['psw'].value;
    const kpsw = document.forms['formAuth']['kpsw'].value;
    const kodereset = document.forms['formAuth']['kodereset'].value;
    if (setEmail(email)) {
        msg(['email', 'Email ' + setEmail(email)]);
    } else if (setText(psw)) {
        msg(['psw', 'Password ' + setText(psw)]);
    } else if (setText(kpsw)) {
        msg(['kpsw', 'Konfirmasi Password ' + setText(kpsw)]);
    } else if (psw !== kpsw) {
        msg(['kpsw', 'Password tidak sama']);
    } else if (setAngka(kodereset)) {
        msg(['kodereset', 'Kode Reset ' + setAngka(kodereset)]);
    } else {
        btnSubmit.innerHTML = "Mengirim perubahan ..";
        const form = document.querySelector('form[id="formAuth"]');
        const formData = new FormData(form);
        fetch('/konfirmasi', {
            method: 'POST',
            body: formData
        }).then(response => response.text()).then(pesan => {
            if(pesan === "Berhasil"){
                btnSubmit.innerHTML = "Simpan Perubahan";
                Toast({
                    type: 'success',
                    message: 'Password berhasil diubah',
                });
                btnSubmit.innerHTML = "Ke halaman login...";
                setTimeout(()=>{
                    window.location.href='/login';
                },2000);
                return false;   
            }else{
                btnSubmit.innerHTML = "Simpan Perubahan";
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
                message: 'Gagal memperbarui password',
            });
            return false;  
        });
        return false;
    }
    return false;
}