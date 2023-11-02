function el(nama) {
    if(document.querySelector(nama)){
        return document.querySelector(nama);
    }    
    return false;
}

function getMeta(metaName) {
    const metas = document.getElementsByTagName('meta');
  
    for (let i = 0; i < metas.length; i++) {
      if (metas[i].getAttribute('name') === metaName) {
        return metas[i].getAttribute('content');
      }
    }
  
    return '';
}

if(el('#toggle-menu')){
    el('#toggle-menu').addEventListener('click', ()=>{
        if(el('.sidebar').classList.contains('active')) {
            el('.sidebar').classList.remove('active');
        }else{
            el('.sidebar').classList.add('active');
        }
    });
    el('.block').addEventListener('click', ()=>{
        if(el('.sidebar').classList.contains('active')) {
            el('.sidebar').classList.remove('active');
        }else{
            el('.sidebar').classList.add('active');
        }
    });
    el('.close').addEventListener('click', ()=>{
        if(el('.sidebar').classList.contains('active')) {
            el('.sidebar').classList.remove('active');
        }else{
            el('.sidebar').classList.add('active');
        }
    });
}

let subMenu = document.querySelectorAll('.sub');
if(subMenu){
    for(let i = 0; i < subMenu.length; i++) {
        subMenu[i].addEventListener('click', () => {
            if(subMenu[i].classList.contains('active')){
                subMenu[i].classList.remove('active');
                subMenu[i].children[0].children[1].className = "las la-angle-right";
            }else{
                subMenu[i].classList.add('active');
                subMenu[i].children[0].children[1].className = "las la-angle-down";
            }
        });
    }
}

if(el('#pp1')){
    el('#pp1').addEventListener('click', ()=>{
        if(el('#pp1-menu').classList.contains('active')) {
            el('#pp1-menu').classList.remove('active');
        }else{
            el('#pp1-menu').classList.add('active');
        }
    });
}

if(el('#editphoto')){
    el('#editphoto').addEventListener('click', ()=>{
        if(el('#modalprofile').classList.contains('active')) {
            el('#modalprofile').classList.remove('active');
        }else{
            el('#modalprofile').classList.add('active');
        }
    });
}

if(el('#editphoto2')){
    el('#editphoto2').addEventListener('click', ()=>{
        if(el('#modalprofile').classList.contains('active')) {
            el('#modalprofile').classList.remove('active');
        }else{
            el('#modalprofile').classList.add('active');
        }
    });
}

if(el('#modalboxprofile')){
    el('#modalboxprofile').addEventListener('click', ()=>{
        if(el('#modalprofile').classList.contains('active')) {
            el('#modalprofile').classList.remove('active');
        }else{
            el('#modalprofile').classList.add('active');
        }
    });
}

if(el('#modalclose')){
    el('#modalclose').addEventListener('click', ()=>{
        if(el('#modalprofile').classList.contains('active')) {
            el('#modalprofile').classList.remove('active');
        }else{
            el('#modalprofile').classList.add('active');
        }
    });
}


window.document.addEventListener('click',(e)=>{
    if(e.target.id != "pp1") {
        if(el('#pp1-menu')){
            el('#pp1-menu').classList.remove('active');
        }
    }
    
    if(e.target.dataset.model != 'buttonopsi') {
        if(el('.card-opsi')){
            el('.card-opsi').classList.remove('active');   
        }
    }

    if(e.target.dataset.model != 'opsitable') {
        if(el('.opsihidemenu')){
            el('.opsihidemenu').classList.remove('active');   
        }
    }
});

var observe;
if (window.attachEvent) {
    observe = function (element, event, handler) {
        element.attachEvent('on'+event, handler);
    };
}else {
    observe = function (element, event, handler) {
        element.addEventListener(event, handler, false);
    };
}

function autoheight (x) {
    let text = document.getElementById(x);
    function resize () {
        text.style.height = 'auto';
        text.style.height = text.scrollHeight+'px';
    }
    /* 0-timeout to get the already changed text */
    function delayedResize () {
        window.setTimeout(resize, 0);
    }
    observe(text, 'change',  resize);
    observe(text, 'cut',     delayedResize);
    observe(text, 'paste',   delayedResize);
    observe(text, 'drop',    delayedResize);
    observe(text, 'keydown', delayedResize);

    text.focus();
    text.select();
    resize();
}

let textarea = document.querySelectorAll('textarea');
if(textarea){
    for (let i=0; i < textarea.length; i++) {
        autoheight(textarea[i].id);
    }
}

let password = document.getElementById('password');
if(password){
    password.parentElement.children[1].addEventListener('click',()=>{
        if(password.parentElement.children[1].classList.contains('la-eye')){
            password.parentElement.children[1].classList.remove('la-eye');
            password.parentElement.children[1].classList.add('la-eye-slash');
            password.setAttribute('type', 'text');
        }else{
            password.parentElement.children[1].classList.remove('la-eye-slash');
            password.parentElement.children[1].classList.add('la-eye');
            password.setAttribute('type', 'password');
        }
    });
}


let psw = document.getElementById('psw');
if(psw){
    psw.parentElement.children[1].addEventListener('click',()=>{
        if(psw.parentElement.children[1].classList.contains('la-eye')){
            psw.parentElement.children[1].classList.remove('la-eye');
            psw.parentElement.children[1].classList.add('la-eye-slash');
            psw.setAttribute('type', 'text');
        }else{
            psw.parentElement.children[1].classList.remove('la-eye-slash');
            psw.parentElement.children[1].classList.add('la-eye');
            psw.setAttribute('type', 'password');
        }
    });
}

let konfirmasipsw = document.getElementById('konfirmasipsw');
if(konfirmasipsw){
    konfirmasipsw.parentElement.children[1].addEventListener('click',()=>{
        if(konfirmasipsw.parentElement.children[1].classList.contains('la-eye')){
            konfirmasipsw.parentElement.children[1].classList.remove('la-eye');
            konfirmasipsw.parentElement.children[1].classList.add('la-eye-slash');
            konfirmasipsw.setAttribute('type', 'text');
        }else{
            konfirmasipsw.parentElement.children[1].classList.remove('la-eye-slash');
            konfirmasipsw.parentElement.children[1].classList.add('la-eye');
            konfirmasipsw.setAttribute('type', 'password');
        }
    });
}





/*
    Text Editor
*/


let editor = document.querySelectorAll("[data-type='editor']");

if(editor){
    let elID = "";
    let elParent = "";
    let newEl = "";
    let newDiv = "";
    let btnBold = "";
    let btnItalic = "";
    let btnUnderline = "";
    let btnSelect = "";
    let btnLeft = "";
    let btnCenter = "";
    let btnRight = "";
    let btnJustify = "";
    let btnLink = "";
    let btnImage = "";
    let btnOl = "";
    let btnUl = "";
    for(let i=0; i < editor.length; i++) {
        elID = "editor"+i;
        elParent = editor[i].parentElement;

        newDiv = document.createElement("div");
        newDiv.setAttribute("class","btnopsi");

            btnBold = document.createElement("button");
            btnBold.setAttribute("type","button");
            btnBold.setAttribute("onClick","setBold('"+elID+"')");
            btnBold.innerHTML = `<span>B</span>`;
            newDiv.insertBefore(btnBold, newDiv.children[0]);

            btnItalic = document.createElement("button");
            btnItalic.setAttribute("type","button");
            btnItalic.setAttribute("onClick","setItalic('"+elID+"')");
            btnItalic.innerHTML = `<span style='font-style: italic;'>I</span>`;
            newDiv.insertBefore(btnItalic, newDiv.children[1]);

            btnUnderline = document.createElement("button");
            btnUnderline.setAttribute("type","button");
            btnUnderline.setAttribute("onClick","setUnderline('"+elID+"')");
            btnUnderline.innerHTML = `<span>U</span>`;
            newDiv.insertBefore(btnUnderline, newDiv.children[2]);

            // btnSelect = document.createElement("select");
            // btnSelect.setAttribute("onChange","setFontFamily(['"+elID+"', this.value])");
            // btnSelect.innerHTML = `
            //     <option style='font-family: Arial;' value='Arial'>Arial</option>
            //     <option style='font-family: Time New Roman;' value='Time New Roman'>Time New Roman</option>
            // `;
            // newDiv.insertBefore(btnSelect, newDiv.children[3]);

            btnLeft = document.createElement("button");
            btnLeft.setAttribute("type","button");
            btnLeft.setAttribute("onClick","setLeft('"+elID+"')");
            btnLeft.innerHTML = `<span><i class="las la-align-left"></i></span>`;
            newDiv.insertBefore(btnLeft, newDiv.children[3]);

            btnCenter = document.createElement("button");
            btnCenter.setAttribute("type","button");
            btnCenter.setAttribute("onClick","setCenter('"+elID+"')");
            btnCenter.innerHTML = `<span><i class="las la-align-center"></i></span>`;
            newDiv.insertBefore(btnCenter, newDiv.children[4]);

            btnRight = document.createElement("button");
            btnRight.setAttribute("type","button");
            btnRight.setAttribute("onClick","setRight('"+elID+"')");
            btnRight.innerHTML = `<span><i class="las la-align-right"></i></span>`;
            newDiv.insertBefore(btnRight, newDiv.children[5]);

            btnJustify = document.createElement("button");
            btnJustify.setAttribute("type","button");
            btnJustify.setAttribute("onClick","setJustify('"+elID+"')");
            btnJustify.innerHTML = `<span><i class="las la-align-justify"></i></span>`;
            newDiv.insertBefore(btnJustify, newDiv.children[6]);

            btnLink = document.createElement("button");
            btnLink.setAttribute("type","button");
            btnLink.setAttribute("onClick","setHref('"+elID+"')");
            btnLink.innerHTML = `<span><i class="las la-link"></i></span>`;
            newDiv.insertBefore(btnLink, newDiv.children[7]);

            btnImage = document.createElement("button");
            btnImage.setAttribute("type","button");
            btnImage.setAttribute("onClick","setImage('"+elID+"')");
            btnImage.innerHTML = `<span><i class="las la-image"></i></span>`;
            newDiv.insertBefore(btnImage, newDiv.children[8]);

            btnOl = document.createElement("button");
            btnOl.setAttribute("type","button");
            btnOl.setAttribute("onClick","setOl('"+elID+"')");
            btnOl.innerHTML = `<span><i class="las la-list-ol"></i></span>`;
            newDiv.insertBefore(btnOl, newDiv.children[9]);

            btnUl = document.createElement("button");
            btnUl.setAttribute("type","button");
            btnUl.setAttribute("onClick","setUl('"+elID+"')");
            btnUl.innerHTML = `<span><i class="las la-list-ul"></i></span>`;
            newDiv.insertBefore(btnUl, newDiv.children[10]);
        
        elParent.insertBefore(newDiv, elParent.children[2]);

        editor[i].style = "opacity: 0; position: absolute; height: 0px; z-index: -1;";
        newEl = document.createElement("iframe");
        newEl.setAttribute("id","editor"+i);
        newEl.setAttribute("scrolling","no");
        elParent.insertBefore(newEl, elParent.children[3]);

        document.querySelector('iframe#'+elID).contentWindow.document.body.style = "font-family: Arial;";

    }
    let iframe = document.querySelectorAll('iframe');
    let doc = "";
    for(let i=0; i < iframe.length; i++) {
        doc = iframe[i].contentDocument || iframe[i].contentWindow.document;
        doc.designMode = "on";
        for(let i=0; i < iframe.length; i++) {
            iframe[i].contentWindow.document.addEventListener('keyup',() => {
                if(iframe[i].parentElement.classList.contains('is-error')) {
                    iframe[i].parentElement.classList.remove('is-error');
                }
                autoHeightFrame('editor'+i);            
            });
            // iframe[i].contentWindow.document.addEventListener('click',() => {
            //     posisi('editor'+i);
            // });
        }
    }
}

function setBold(x) {
    let iframe = document.querySelector('iframe#'+x);
    iframe.contentWindow.document.execCommand("bold");
    cekTextarea(x);
}

function setItalic(x) {
    let iframe = document.querySelector('iframe#'+x);
    iframe.contentWindow.document.execCommand("italic");
    cekTextarea(x);
}

function setUnderline(x) {
    let iframe = document.querySelector('iframe#'+x);
    iframe.contentWindow.document.execCommand("underline");
    cekTextarea(x);
}

function setFontFamily(x) {
    let iframe = document.querySelector('iframe#'+x[0]);
    iframe.contentWindow.document.execCommand("fontName", false, x[1]);
    cekTextarea(x);
}

function setLeft(x) {
    let iframe = document.querySelector('iframe#'+x);
    iframe.contentWindow.document.execCommand("justifyLeft");
    cekTextarea(x);
}

function setCenter(x) {
    let iframe = document.querySelector('iframe#'+x);
    iframe.contentWindow.document.execCommand("justifyCenter");
    cekTextarea(x);
}

function setRight(x) {
    let iframe = document.querySelector('iframe#'+x);
    iframe.contentWindow.document.execCommand("justifyRight");
    cekTextarea(x);
}

function setJustify(x) {
    let iframe = document.querySelector('iframe#'+x);
    iframe.contentWindow.document.execCommand("justifyFull");
    cekTextarea(x);
}

function setHref(x) {
    let iframe = document.querySelector('iframe#'+x);
    let linkURL = prompt('Masukan URL:', 'http://');
    let linkLabel = iframe.contentWindow.document.getSelection();
    iframe.contentWindow.document.execCommand("insertHTML", false, "<a href='"+linkURL+"'>"+linkLabel+"</a>");
    cekTextarea(x);
}

function setImage(x) {
    let iframe = document.querySelector('iframe#'+x);
    let linkImage = prompt('Masukan URL Image:', 'http://');
    iframe.contentWindow.document.execCommand("insertHTML", false, "<img src='"+linkImage+"'>");
    cekTextarea(x);
}

function setOl(x) {
    let iframe = document.querySelector('iframe#'+x);
    iframe.contentWindow.document.execCommand("insertOrderedList");
    cekTextarea(x);
}

function setUl(x) {
    let iframe = document.querySelector('iframe#'+x);
    iframe.contentWindow.document.execCommand("insertUnorderedList");
    cekTextarea(x);
}

function cekTextarea(x){
    let iframe = document.querySelector('iframe#'+x);
    let txt = document.getElementById('keterangan').value = iframe.contentWindow.document.body.innerHTML;
    // console.log(txt);
}

function autoHeightFrame(x) {
    let iframe = document.querySelector('iframe#'+x);
    iframe.style = "min-height: 170px;";
    iframe.style.height = iframe.contentWindow.document.documentElement.scrollHeight + 'px';
}

function posisi(x){
    let iframe = document.querySelector('iframe#'+x);
    // console.log(iframe.contentWindow.document.body.innerHTML);
}















function hapus(x) {
    let info = document.forms['formHapus-'+x]['__info'].value;
    let tb = document.forms['formHapus-'+x]['__tb'].value;
    let url = document.forms['formHapus-'+x]['__url'].value;
    if(confirm("Anda ingin menghapus "+info+"?") == true){
        const form = document.querySelector('form[id="formHapus-'+x+'"]');
        const formData = new FormData(form);
        fetch(url+'/'+getMeta('sessionkey')+'/'+tb, {
            method: 'POST',
            body: formData
        }).then(response => response.text()).then(pesan => {
            if(pesan == "Berhasil"){
                Toast({
                    type: 'success',
                    message: 'Data '+info+' sudah dihapus',
                });
                setTimeout(()=>{
                    window.location.href=url+'/'+getMeta('sessionkey')+"/"+tb;
                },50);
                return false;
            }else{
                Toast({
                    type: 'error',
                    message: 'Gagal menghapus data',
                });
                return false;
            }
        }).catch(error => {
            Toast({
                type: 'error',
                message: error,
            });
            return false;
        });
        return false;
    }else{
        Toast({
            type: 'error',
            message: 'Dibatalkan',
        });
        return false;
    }
}


function gantiPhoto() {
    const url = document.forms['formPhoto']['__url'].value;
    const form = document.querySelector('form[id="formPhoto"]');
    const formData = new FormData(form);
    fetch(url+'/'+getMeta('sessionkey')+'/ganti-photo', {
        method: 'POST',
        body: formData
    }).then(response => response.text()).then(pesan => {
        if(pesan.split("|")[0] == "photo"){
            let photo = pesan.split("|")[1];
            if(el("#pp1")){
                el("#pp1").setAttribute("src", url+photo);
            }
            if(el("#pp2")){
                el("#pp2").setAttribute("src", url+photo);
            }
            if(el("#pp3")){
                el("#pp3").setAttribute("src", url+photo);
            }
            if(el("#pp4")){
                el("#pp4").setAttribute("src", url+photo);
            }
            Toast({
                type: 'success',
                message: 'Photo sudah diganti',
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
        Toast({
            type: 'error',
            message: error,
        });
        return false;
    });
    return false;
}


function hapusPhoto() {
    if(confirm("Hapus photo profil?") == true){
        const url = document.forms['formHapusPhoto']['__url'].value;
        const form = document.querySelector('form[id="formHapusPhoto"]');
        const formData = new FormData(form);
        fetch(url+'/'+getMeta('sessionkey')+'/hapus-photo', {
            method: 'POST',
            body: formData
        }).then(response => response.text()).then(pesan => {
            if(pesan.split("|")[0] == "Berhasil"){
                let photo = pesan.split("|")[1];
                if(el("#pp1")){
                    el("#pp1").setAttribute("src", url+photo);
                }
                if(el("#pp2")){
                    el("#pp2").setAttribute("src", url+photo);
                }
                if(el("#pp3")){
                    el("#pp3").setAttribute("src", url+photo);
                }
                if(el("#pp4")){
                    el("#pp4").setAttribute("src", url+photo);
                }
                Toast({
                    type: 'success',
                    message: "Photo sudah terbaru",
                });
                return false;
            }else{
                Toast({
                    type: 'error',
                    message: "Gagal menghapus photo",
                });
                return false;
            }           
        }).catch(error => {
            Toast({
                type: 'error',
                message: error,
            });
            return false;
        });
        return false;
    }else{
        Toast({
            type: 'error',
            message: 'Dibatalkan',
        });
        return false;
    }
}



if(el('#back')){
    el('#back').setAttribute("onClick", "window.location.href=history.go(-1)");
}

if(el('.card-option-btn')){
    el('.card-option-btn').addEventListener('click', () => {
        if(el('.card-opsi').classList.contains('active')) {
            el('.card-opsi').classList.remove('active');
        }else{
            el('.card-opsi').classList.add('active');
        }
    });
}

let ingat = document.querySelectorAll('label');
if(ingat){
    for(let i=0; i<ingat.length; i++) {
        if(ingat[i].dataset.control == "switch"){
            ingat[i].addEventListener('click', ()=>{
                if(el('#for'+ingat[i].dataset.for).children[0].classList.contains("active")){
                    el('#for'+ingat[i].dataset.for).children[0].classList.remove("active");
                    el('#'+ingat[i].dataset.for).setAttribute("checked", "false");
                }else{
                    el('#for'+ingat[i].dataset.for).children[0].classList.add("active");
                    el('#'+ingat[i].dataset.for).setAttribute("checked", "true");
                }
            });
        }
    }
}






/*
    Seting
*/

function setingFileApp() {
    const btnSubmit = document.getElementById('btnFileSeting');
    const form = document.querySelector('form[id="formFileSeting"]');
    const formData = new FormData(form);
    fetch('/'+getMeta('sessionkey')+'/seting', {
        method: 'POST',
        body: formData
    }).then(response => response.text()).then(pesan => {
        btnSubmit.innerHTML = `<i class="las la-share"></i><span>Simpan</span>`;
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
        btnSubmit.innerHTML = `<i class="las la-share"></i><span>Simpan</span>`;
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
    fetch('/'+getMeta('sessionkey')+'/seting', {
        method: 'POST',
        body: formData
    }).then(response => response.text()).then(pesan => {
        btnSubmit.innerHTML = `<i class="las la-share"></i><span>Simpan</span>`;
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
        btnSubmit.innerHTML = `<i class="las la-share"></i><span>Simpan</span>`;
        Toast({
            type: 'error',
            message: error,
        });
        return false;  
    });
    return false;
}




if(el('#tabButton')) {
    for(let i=0; i<el('#tabButton').children.length; i++) {
        el('#tabButton').children[i].addEventListener('click', (e)=> {
            for(let x=0; x<el('#tabButton').children.length; x++) {
                if(el('#tabButton').children[x].dataset.tab != e.target.dataset.tab){
                    el('#tabButton').children[x].classList.remove("active");
                    el('#seting'+el('#tabButton').children[x].dataset.tab).classList.add("hide");
                }
            }
            el('#tabButton').children[i].classList.add("active");
            el('#seting'+el('#tabButton').children[i].dataset.tab).classList.remove("hide");
        });
    }
}





/*










    Tag
*/

let taginput = document.querySelectorAll("#taginput");

$(document).ready(function() {
    $(window).keydown(function(event){
        if(event.keyCode == 13) {
            if(event.target.dataset.type == "tag"){
                event.preventDefault();
                let val = event.target.value;
                let inval = event.target.parentElement.parentElement.children[2].value.split(",");

                if(event.target.parentElement.parentElement.classList.contains('is-error')) {
                    event.target.parentElement.parentElement.classList.remove('is-error');
                }

                if(inval.includes(val)) {
                    return false;
                }else{
                    if(val.length > 1){
                        let elTag = document.createElement("div");
                        elTag.setAttribute("class","item");
                        elTag.innerHTML = "<label>"+val+"</label><button type='button' class='removetagbtn'><i class='las la-times'></i></buttton>";
                        event.target.parentElement.children[0].appendChild(elTag);
                        event.target.value = "";
                        if(event.target.parentElement.parentElement.children[2].value.length < 2){
                            event.target.parentElement.parentElement.children[2].value += val; 
                        }else{
                            event.target.parentElement.parentElement.children[2].value += "," + val;
                        }
                    }
                    let removetagbtn = document.querySelectorAll('.removetagbtn');
                    if(removetagbtn){
                        for(let i=0; i < removetagbtn.length; i++){
                            removetagbtn[i].addEventListener('click', ()=>{
                                removetagbtn[i].parentElement.remove();
                                let txt = removetagbtn[i].parentElement.children[0].innerHTML;
                                let valueSebelumnya = event.target.parentElement.parentElement.children[2].value.split(",");
                                for (let i = valueSebelumnya.length - 1; i >= 0; i--) {
                                    if (valueSebelumnya[i] === txt) {
                                        valueSebelumnya.splice(i, 1);
                                    }
                                }
                                let valueBaru = valueSebelumnya;
                                event.target.parentElement.parentElement.children[2].value = valueBaru;
                                if(event.target.parentElement.parentElement.children[2].value.slice(-1) == ","){
                                    event.target.parentElement.parentElement.children[2].value = event.target.parentElement.parentElement.children[2].value.slice(0,-1);
                                }
                            });
                        }
                    }
                }
                    
            }else{
                return true;
            }
            return false;
        }
    });
});

function removeBtn (id) {
    let event = document.getElementById(id);
    let removetagbtn = document.querySelectorAll('.removetagbtn');
    if(removetagbtn){
        for(let i=0; i < removetagbtn.length; i++){
            removetagbtn[i].addEventListener('click', ()=>{
                removetagbtn[i].parentElement.remove();
                let txt = removetagbtn[i].parentElement.children[0].innerHTML;
                let valueSebelumnya = event.value.split(",");
                for (let i = valueSebelumnya.length - 1; i >= 0; i--) {
                    if (valueSebelumnya[i] === txt) {
                        valueSebelumnya.splice(i, 1);
                    }
                }
                let valueBaru = valueSebelumnya;
                event.value = valueBaru;
                if(event.value.slice(-1) == ","){
                    event.value = event.value.slice(0,-1);
                }
            });
        }
    }
}

$(document).ready(function() {
    $(window).keydown(function(event){
        if(event.keyCode == 8) {
            event.preventDefault();
                let valueInput = event.target.value.length;
                event.target.value = event.target.value.slice(0,-1);
                if(valueInput < 1){
                    event.target.value = "";
                    let valueSebelumnya = event.target.parentElement.parentElement.children[2].value;
                    let jlvalueSebelumnya = valueSebelumnya.split(",").length -1;
                    let itemyanghilang = "";
                    if(valueSebelumnya.split(",").length < 2){
                        itemyanghilang = valueSebelumnya.split(",")[jlvalueSebelumnya];
                    }else{
                        itemyanghilang = ","+valueSebelumnya.split(",")[jlvalueSebelumnya];
                    }
                    let jlitem = event.target.parentElement.children[0].children.length -1;
                    if(jlitem != -1) {
                        event.target.parentElement.children[0].children[jlitem].remove();
                        event.target.parentElement.parentElement.children[2].value = valueSebelumnya.replace(itemyanghilang,"",valueSebelumnya);
                    }
                    if(event.target.parentElement.parentElement.children[2].value.slice(-1) == ","){
                        event.target.parentElement.parentElement.children[2].value = event.target.parentElement.parentElement.children[2].value.slice(0,-1);
                    }
                }
            return false;
        }
    });
});



let inputfile = document.querySelectorAll('input[type="file"]');
if(inputfile){
    for(let i=0; i<inputfile.length; i++) {
        inputfile[i].addEventListener('change', ()=> {
            inputfile[i].parentElement.children[3].innerHTML = inputfile[i].files[0].name;
        });
    }
}

















/*
    Tabel












    -------------------------------------

*/

let angkaBatas = 10;
let batas = angkaBatas;
let jumlahData = 0;
let tb = '';
let waktu = 500;
let csrf = '';

function loadTabel(x) {
    if(el('#loadmore')){        
        el('#loadmore').innerHTML = 'Mengambil data ..';
        el('#loadmore').disabled = 'true';
    }
    tb = x[2];
    csrf = x[3];
    setTimeout(()=>{
        collectData([x, 'load']);
    },waktu);
}

if(el('#search')){
    el('#search').addEventListener('keyup', () => {
        let keyword = el('#search').value;
        if(keyword.length > 0){
            let url = el('#search').dataset.url;
            let apikey = el('#search').dataset.apikey;
            let tb = el('#search').dataset.tb;
            if(el('#loadmore')){
                el('#loadmore').innerHTML = 'Mengambil data ..';
                el('#loadmore').disabled = 'true';
            }
            batas = angkaBatas;
            setTimeout(()=>{
                collectData([[url,apikey,tb], keyword]);
            },waktu);
        }else{
            let url = el('#search').dataset.url;
            let apikey = el('#search').dataset.apikey;
            let tb = el('#search').dataset.tb;
            if(el('#loadmore')){
                el('#loadmore').innerHTML = 'Mengambil data ..';
                el('#loadmore').disabled = 'true';
            }
            batas = angkaBatas;
            setTimeout(()=>{
                collectData([[url,apikey,tb], 'load']);
            },waktu);
        }
        el('#jumlahdataview').innerHTML = jumlahData;
    });
}

if(el('#loadmore')){
    el('#loadmore').addEventListener('click', () => {
        el('#loadmore').innerHTML = 'Mengambil data ..';
        el('#loadmore').disabled = 'true';
        setTimeout(()=>{
            let trID = `tr[data-tb='`+tb+`']`;
            let elementList = [...document.querySelectorAll(trID)];
            for(let i = batas;  i < batas + angkaBatas; i++) {
                if(elementList[i]){
                    elementList[i].classList.remove('hidden');
                }
            }
            batas += angkaBatas;
            if(batas >= jumlahData) {
                el('#loadmore').innerHTML = 'Tidak ada lagi data';
                el('#loadmore').disabled = 'true';
            }else{
                el('#loadmore').innerHTML = 'Tampilkan lebih banyak';
                el('#loadmore').removeAttribute('disabled');
            }
        },waktu);
    });
}


function openOpsi (x) {
    if(el('#opsihidemenu-'+x.split("-")[1]).classList.contains('active')) {
        el('#opsihidemenu-'+x.split("-")[1]).classList.remove('active');
    }else{
        el('#opsihidemenu-'+x.split("-")[1]).classList.add('active');
    }
}