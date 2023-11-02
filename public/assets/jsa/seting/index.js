function setSeting(x) {
    const ID = x[0];
    const BASEURL = x[2];
    const APIKEY = x[3];
    const NAMA = x[4];
    const Btn = document.getElementById(ID);
    Toast({
        type: 'info',
        message: 'Memperbarui setting..'
    });

    const load = new Worker(BASEURL + '/assets/js/worker/api.js');
    load.postMessage([BASEURL,APIKEY,'seting','toggle',ID]);
    load.onmessage = function(e) {
        if(e.data == 0){
            Btn.innerHTML = `
                <span class="seting-opsi" id="___{$s->id}">Ya</span>
                <span class="seting-opsi active" id="__{$s->id}">Tidak</span>
            `;
            Toast({
                type: 'error',
                message: NAMA + ' Dinonaktifkan '
            });
        }else{
            Btn.innerHTML = `
                <span class="seting-opsi active" id="___{$s->id}">Ya</span>
                <span class="seting-opsi" id="__{$s->id}">Tidak</span>
            `;
            Toast({
                type: 'success',
                message: NAMA + ' Diaktifkan'
            });
            return false;
        }
    }
}


function setingFileApp() {
    const btnSubmit = document.getElementById('btnFileSeting');
    const form = document.querySelector('form[id="formFileSeting"]');
    const formData = new FormData(form);
    btnSubmit.innerHTML = `Memperbarui setingan`;
    fetch('/'+getMeta('sessionkey')+'/seting', {
        method: 'POST',
        body: formData
    }).then(response => response.text()).then(pesan => {
        btnSubmit.innerHTML = `Simpan perubahan`;
        if(pesan == "Berhasil"){
            Toast({
                type: 'success',
                message: 'Setingan sudah diupdate',
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
        btnSubmit.innerHTML = `Simpan perubahan`;
        Toast({
            type: 'error',
            message: error,
        });
        return false;  
    });
    return false;
}


function setingEmailApp() {
    const btnSubmit = document.getElementById('btnEmailSeting');
    const form = document.querySelector('form[id="formEmailSeting"]');
    const formData = new FormData(form);
    btnSubmit.innerHTML = `Memperbarui setingan..`;
    fetch('/'+getMeta('sessionkey')+'/seting', {
        method: 'POST',
        body: formData
    }).then(response => response.text()).then(pesan => {
        btnSubmit.innerHTML = `Simpan perubahan`;
        if(pesan == "Berhasil"){
            Toast({
                type: 'success',
                message: 'Setingan sudah diupdate',
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
        btnSubmit.innerHTML = `Simpan perubahan`;
        Toast({
            type: 'error',
            message: error,
        });
        return false;  
    });
    return false;
}


removeBtn('tipeimage');
removeBtn('tipemedia');
removeBtn('tipedokumen');
