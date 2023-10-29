onmessage = function(e) {
    let txurl = e.data[0];
    let txapi = e.data[1];
    let txtb = e.data[2];
    let txsr = e.data[3];
    fetch(txurl +"/"+ txapi + "?mdl=tabel&fc=" + txtb+"&id="+txsr)
        .then(response => response.json())
        .then(data => {
            postMessage(data)
        })
        .catch(error => console.error(error));
}

