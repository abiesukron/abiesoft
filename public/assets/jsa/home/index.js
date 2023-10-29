function loadTabel(url){
    const t = $('#tabelhome').DataTable({
         retrieve: true,
         dom: 'Bfrtip',
         buttons: [
             'excel', 'pdf', 'print'
         ]
    });
    t.row.add([
        '<div style="position: absolute; width: 100%; height: 200px; margin-left: -10px;" class="center"><div>Menyiapkan data..</div></div><div style="height: 200px;"></div>',
        ''
    ]).draw(false);
    let button;
    let worker = new Worker(url + '/assets/js/worker/worker-load.js');
    worker.postMessage([url,APIKEY,'home','tabel']);
    worker.onmessage = function(e) {
        clear();
        let data = e.data;
        let i = 1;
        for(let d = 0; d < data.length; d++){
            button = `<div class='btn-opsi-grup tabel'>
                             <div><a href='`+url+`/limbah/`+data[d][d].id+`/edit'><span class='material-icons-sharp'>edit</span></a></div>
                             <div><a href='`+url+`/limbah/`+data[d][d].id+`'><span class='material-icons-sharp'>visibility</span></a></div>
                             <div>
                                 <form method='POST' id='formDelete`+data[d][d].id+`' name='formDelete`+data[d][d].id+`' onSubmit='return excuse([this.dataset.id,this.dataset.nama,this.dataset.from])' data-id='`+data[d][d].id+`' data-nama='`+data[d][d].nama+`' data-from='tabel'>
                                     <input type='hidden' id='id' name='id' value='`+data[d][d].id+`'>
                                     <input type='hidden' id='tb' name='tb' value='limbah'>
                                     <input type='hidden' id='__method' name='__method' value='DELETE'>
                                     <input type='hidden' id='__token' name='__token' value='`+__token+`'>
                                     <button type='submit' class='btn-delete'><span class='material-icons-sharp'>delete</span></button>
                                 </form>
                             </div>
                        </div>`;
            t.row.add([
                i,
                /*
                    Javascript ini mengambil data dari HomeController::tabel()
                    outputnya berupa json. Tambahkan Spesifikasi Tabelnya disini
                    Silahkan anda lanjutkan.. Sebelumnya sudah ada tabel No dan Opsi.
                    i untuk tabel No dan opsi untuk tabel opsi
                */
                button
            ]).draw(false);
            i++;
        }
    }
}

function clear(){
    let t = $('#tabelhome').DataTable();

    return t
    .rows()
    .remove()
    .draw();
}

