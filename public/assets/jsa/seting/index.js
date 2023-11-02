function setSeting(x) {
    const ID = x[0];
    const BASEURL = x[2];
    const APIKEY = x[3];
    const Btn = document.getElementById(ID);

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
                message: 'Tidak Aktif'
            });
        }else{
            Btn.innerHTML = `
                <span class="seting-opsi active" id="___{$s->id}">Ya</span>
                <span class="seting-opsi" id="__{$s->id}">Tidak</span>
            `;
            Toast({
                type: 'success',
                message: 'Aktif'
            });
            return false;
        }
    }
}

removeBtn('tipeimage');
removeBtn('tipemedia');
removeBtn('tipedokumen');