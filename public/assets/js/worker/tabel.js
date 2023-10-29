onmessage = function(e) {
    let txurl = e.data[0];
    let txapi = e.data[1];
    let txtb = e.data[2];
    fetch(txurl +"/"+ txapi + "?mdl=tabel&fc=" + txtb+"&id=null")
        .then(response => response.json())
        .then(data => {
            postMessage(data)
        })
        .catch(error => console.error(error));
}

