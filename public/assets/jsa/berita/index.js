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
        let status = '';
        for (let i = 0; i < data.length; i++) {
            oe = (i % 2  == 0) ? 'even' : 'odd';

            /*
            // Jika ingin menggunakan row secara otomatis 
            let rowData = '';
            Object.keys(data[i]).forEach(key => {
                if(key != 'id' && key != 'dibuat' && key != 'diupdate'){
                    if(data[i][key] != null){
                        if(data[i][key].split('assets/').length > 1){
                            rowData += `<td class='gambar'><img src='`+url+data[i][key]+`'></td>`;
                        }else{
                            rowData += `<td>`+data[i][key]+`</td>`;
                        }
                    }
                }
            });
            */

            if(data[i].publikasi == "Terbit" && data[i].editorid != null){
                status = `<span class='badge hijau' title='Sudah terbit'>`+data[i].publikasi+`</span>`;
            }else{
                status = `<span class='badge biru' title='Menunggu persetujuan editor'>Menunggu</span>`;
            }

            rowData = `
                <td class="gambar mobile-hide"><img src='`+url+data[i].gambar+`'></td>
                <td>
                    <h3>`+data[i].judul+`</h3>
                    <div>`+data[i].potongan+`</div>
                    <small>`+data[i].dibuat+`</small>
                </td>
                <td class='mobile-hide'><center>`+status+`</center></td>
            `;

            // opsiBtn = `
            //     <form class='btn-grup' method='post' id='formHapus_`+data[i].id+`' name='formHapus_`+data[i].id+`' data-label = '`+data[i].nama+`' data-tb='`+tb+`' data-url = '`+url+`' data-id='`+data[i].id+`' onSubmit='return konfirmasi([this.dataset.label,this.dataset.tb,this.dataset.url,this.dataset.id])'>
            //         <button type='button' id='btnOpsiEdit' onClick=window.location.href='`+url+`/berita/`+data[i].id+`/edit'><i class='edit-18'></i></button>
            //         <input type='hidden' id='__method' name='__method' value='DELETE'>
            //         <input type='hidden' id='__token' name='__token' value='`+csrf+`'>
            //         <input type='hidden' id='id' name='id' value='`+data[i].id+`'>
            //         <button type='submit' class='hapus'><i class='hapus-18'></i></button>
            //     </form>
            // `;

            opsiBtn = `
                <div class='opsiarea'>
                    <button onClick='openOpsi(this.dataset.item)' data-item='`+tb+`-`+data[i].id+`'><i class='las la-ellipsis-v'></i></button>
                    <div id='opsihidemenu-`+data[i].id+`' class='opsihidemenu'>
                        <button type='button' onClick=window.location.href='`+url+`/`+getMeta('sessionkey')+`/berita/`+data[i].id+`'><i class='las la-eye'></i><span>Lihat</span></button>
                        <button type='button' onClick=window.location.href='`+url+`/`+getMeta('sessionkey')+`/berita/`+data[i].id+`/edit'><i class='las la-pen'></i><span>Edit</span></button>
                        <form class='btn-grup' method='post' id='formHapus-`+data[i].id+`' name='formHapus-`+data[i].id+`' onSubmit="return hapus('`+data[i].id+`')">
                            <input type='hidden' id='__info' name='__info' value='`+data[i].judul+`'>
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





// if(el('#search')){
//     el('#search').addEventListener('keyup', () => {
//         let keyword = el('#search').value;
//         if(keyword.length > 0){
//             let url = el('#search').dataset.url;
//             let apikey = el('#search').dataset.apikey;
//             let tb = el('#search').dataset.tb;
//             if(el('#loadmore')){
//                 el('#loadmore').innerHTML = 'Mengambil data ..';
//                 el('#loadmore').disabled = 'true';
//             }
//             batas = angkaBatas;
//             setTimeout(()=>{
//                 collectData([[url,apikey,tb], keyword]);
//             },waktu);
//         }else{
//             let url = el('#search').dataset.url;
//             let apikey = el('#search').dataset.apikey;
//             let tb = el('#search').dataset.tb;
//             if(el('#loadmore')){
//                 el('#loadmore').innerHTML = 'Mengambil data ..';
//                 el('#loadmore').disabled = 'true';
//             }
//             batas = angkaBatas;
//             setTimeout(()=>{
//                 collectData([[url,apikey,tb], 'load']);
//             },waktu);
//         }
//         el('#jumlahdataview').innerHTML = jumlahData;
//     });
// }

// if(el('#loadmore')){
//     el('#loadmore').addEventListener('click', () => {
//         el('#loadmore').innerHTML = 'Mengambil data ..';
//         el('#loadmore').disabled = 'true';
//         setTimeout(()=>{
//             let trID = `tr[data-tb='`+tb+`']`;
//             let elementList = [...document.querySelectorAll(trID)];
//             for(let i = batas;  i < batas + angkaBatas; i++) {
//                 if(elementList[i]){
//                     elementList[i].classList.remove('hidden');
//                 }
//             }
//             batas += angkaBatas;
//             if(batas >= jumlahData) {
//                 el('#loadmore').innerHTML = 'Tidak ada lagi data';
//                 el('#loadmore').disabled = 'true';
//             }else{
//                 el('#loadmore').innerHTML = 'Tampilkan lebih banyak';
//                 el('#loadmore').removeAttribute('disabled');
//             }
//         },waktu);
//     });
// }