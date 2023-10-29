onmessage = function(e) {
    const txurl = e.data[0];
    const txapi = e.data[1];
    const txmdl = e.data[2];
    const txfc = e.data[3];
    const txid = e.data[4];
    fetch(txurl +"/"+ txapi + "?mdl=" + txmdl + "&fc=" + txfc + "&id=" + txid)
        .then(response => response.text())
        .then(data => {
            postMessage(data)
        })
        .catch(error => console.error(error));
}

