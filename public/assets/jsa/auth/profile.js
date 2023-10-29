function submitUpdateProfile(url) {
    const btnUpdateProfile = document.getElementById('btnUpdateProfile');
    const nama = document.forms['formProfile']['nama'].value;
    const email = document.forms['formProfile']['email'].value;
    if (setText(nama)) {
        msg(['nama', 'Nama ' + setText(nama)]);
    } else if (setEmail(email)) {
        msg(['email', 'Email ' + setEmail(email)]);
    }else {
        btnUpdateProfile.innerHTML = "Mengirim perubahan ..";
        const form = document.querySelector('form[id="formProfile"]');
        const formData = new FormData(form);
        fetch('/'+getMeta('sessionkey')+'/profile', {
            method: 'POST',
            body: formData
        }).then(response => response.text()).then(pesan => {
            btnUpdateProfile.innerHTML = `<span>Perbarui</span>`;
            if(pesan == "Berhasil"){
                Toast({
                    type: 'success',
                    message: 'Data telah diperbarui',
                });
                if(el('#namaArea1')){
                    el('#namaArea1').innerHTML = nama;
                }
                if(el('#namaArea2')){
                    el('#namaArea2').innerHTML = nama;
                }
                if(el('#emailArea1')){
                    el('#emailArea1').innerHTML = email;
                }
                if(el('#emailArea2')){
                    el('#emailArea2').innerHTML = email;
                }
                return false;
            }else{
                Toast({
                    type: 'error',
                    message: 'Gagal memperbarui profile',
                });
                return false;
            }
        }).catch(error => {
            btnUpdateProfile.innerHTML = `<span>Perbarui</span>`;
            Toast({
                type: 'error',
                message: 'Gagal memperbarui profile',
            });
            return false;  
        });
        return false;
    }
    return false;
}