function submitAuth() {
    const btnSubmit = document.getElementById('btnlogin');
    const email = document.forms['formAuth']['email'].value;
    const psw = document.forms['formAuth']['psw'].value;
    if (setEmail(email)) {
        msg(['email', 'Email ' + setEmail(email)]);
    } else if (setText(psw)) {
        msg(['psw', 'Password ' + setText(psw)]);
    } else {
        btnSubmit.innerHTML = "Mengautentikasi..";
        const form = document.querySelector('form[id="formAuth"]');
        const formData = new FormData(form);
        fetch('/login', {
            method: 'POST',
            body: formData
        }).then(response => response.text()).then(pesan => {
            if(pesan == "Berhasil"){
                btnSubmit.innerHTML = "Membuat sesi..";
                window.location.href = "/";
            }else if(pesan == "Login gagal"){
                btnSubmit.innerHTML = "Login";
                Toast({
                    type: 'error',
                    message: pesan,
                });
                return false;   
            }else if(pesan == "Token Expire"){
                btnSubmit.innerHTML = "Login";
                Toast({
                    type: 'error',
                    message: pesan,
                });
                return false;   
            }else{
                let lupaarea = document.getElementById('lupaarea');
                lupaarea.innerHTML = '<a class="link" href="/konfirmasi?rid='+pesan+'">Reset Password?</a>';
                btnSubmit.innerHTML = "Login";
                Toast({
                    type: 'error',
                    message: 'Login gagal',
                });
                return false;
            }
        }).catch(error => {
            btnSubmit.innerHTML = "Login";
            Toast({
                type: 'error',
                message: 'Login gagal',
            });
            return false;
        });
        return false;
    }
    return false;
}