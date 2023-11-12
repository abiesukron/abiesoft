function collectData (x) {
    let worker = '';
    let workerfile = '';
    let workerpost = [];
    let keyword = '';
    let url = x[0][0];
    let apikey = x[0][1];
    let tb = x[0][2];
    if(x[1] == 'load') {
        workerfile = url + '/assets/js/worker/tabel.js';
        workerpost = [url,apikey,tb];
    }else {
        keyword = x[1];
        workerfile = url + '/assets/js/worker/search.js';
        workerpost = [url,apikey,tb,keyword];
    }
    worker = new Worker(workerfile);
    worker.postMessage(workerpost);
    worker.onmessage = function(e) {
        let data = e.data;
        let tbody = el('tbody');
        let items = '';
        let num = 1;
        let oe = 'odd';
        let opsiBtn = '';
        jumlahData = data.length;
        let rowData = '';
        for (let i = 0; i < data.length; i++) {
            oe = (i % 2  == 0) ? 'even' : 'odd';

            rowData = `
                <td class="photo"><img src='`+url+data[i].photo+`'></td>
                <td>
                    <h3>`+data[i].nama+`</h3>
                    <div>`+data[i].email+`</div>
                    <div>`+data[i].namagrup+`</div>
                </td>
            `;

            // <button type='button' onClick=window.location.href='`+url+`/`+getMeta('sessionkey')+`/users/`+data[i].id+`'><i class='las la-eye'></i><span>Lihat</span></button>

            opsiBtn = `
                <div class='opsiarea'>
                    <button onClick='openOpsi(this.dataset.item)' data-item='`+tb+`-`+data[i].id+`'><i data-model='opsitable' class='las la-ellipsis-v'></i></button>
                    <div id='opsihidemenu-`+data[i].id+`' class='opsihidemenu'>
                        <button type='button' onClick=window.location.href='`+url+`/`+getMeta('sessionkey')+`/users/`+data[i].id+`/edit'><i class='las la-pen'></i><span>Edit</span></button>
                        <form class='btn-grup' method='post' id='formHapus-`+data[i].id+`' name='formHapus-`+data[i].id+`' onSubmit="return hapus('`+data[i].id+`')">
                            <input type='hidden' id='__info' name='__info' value='`+data[i].nama+`'>
                            <input type='hidden' id='__token' name='__token' value='`+csrf+`'>
                            <input type='hidden' id='__url' name='__url' value='`+url+`'>
                            <input type='hidden' id='id' name='id' value='`+data[i].id+`'>
                            <input type='hidden' id='__tb' name='__tb' value='`+tb+`'>
                            <input type='hidden' id='__method' name='__method' value='DELETE'>
                            <button type='submit'><i class="las la-times"></i><span>Hapus</span></button>
                        </form>
                    </div>
                </div>
            `;

            if(i < batas){
                items += `<tr class='`+oe+`' data-tb='`+tb+`'><td>`+num+`</td>`+rowData+`<td>`+opsiBtn+`</td></tr>`;
            }else{
                items += `<tr class='`+oe+` hidden' data-tb='`+tb+`'><td>`+num+`</td>`+rowData+`<td>`+opsiBtn+`</td></tr>`;
            }

            num++;

        }



        tbody.innerHTML = items;
        if(batas >= jumlahData) {
            el('#loadmore').innerHTML = 'Tidak ada lagi data';
            el('#loadmore').disabled = 'true';
        }else{
            el('#loadmore').innerHTML = 'Tampilkan lebih banyak';
            el('#loadmore').removeAttribute('disabled');
        }

        el('#jumlahdataview').innerHTML = jumlahData;

    }
}



