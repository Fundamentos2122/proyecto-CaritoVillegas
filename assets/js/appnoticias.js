
const formTweet = document.getElementById("form-noticia");
const tweetList = document.getElementById("gatos");
const modalTweet = document.getElementById("modalTweet");

//editar
const idEdit = document.getElementById("form-edit-id");
const tituloEdit = document.getElementById("form-edit-titulo");
const descripcionEdit = document.getElementById("form-edit-descripcion");
const completaEdit = document.getElementById("form-edit-completa");
const btnSaveEdit = document.getElementById("btnSaveEdit");

//eliminar
const modalDeleteTweet = document.getElementById("modalDeleteTweet");
const idDelete = document.getElementById("form-delete-id");

document.addEventListener("DOMContentLoaded", function() {
    //Agregar evento al formulario
    // formTweet.addEventListener("submit", submitTweet);

    getTweets();

    let modals = document.getElementsByClassName("modal");

    for(var i = 0; i < modals.length; i++) {
        modals[i].addEventListener("click", function(e) {
            if(e.target === this){
                this.classList.remove("show");
            }
        });
    }

    
});

function paintTweets(list) {
    let html = '';

    for(var i = 0; i < list.length; i++) {

        html += 
        `<div class="card" id="${list[i].id}">
                <div class="card-img">
                    <img class="imagen" src="data:image/jpg;base64,${list[i].photo}">
                </div>
                <div class="card-text">
                <h2> ${list[i].titulo}</h2>
                    <p>${list[i].descripcion}</p>
                </div>
                <div class="options">
                    <button class="btn-option" onclick="editTweet(${list[i].id})">
                        vermás
                    </button>
                    </div>
            </div>`;
    }

    tweetList.innerHTML = html;

}
    


function getTweets() {
    let xhttp = new XMLHttpRequest();

    xhttp.open("GET", "../controllers/noticiaController.php", true);

    xhttp.onreadystatechange = function() {
        if (this.readyState === 4) {
            if (this.status === 200) {
                console.log(this.responseText);
                let list = JSON.parse(this.responseText);

                paintTweets(list);
            }
            else {
                console.log("Error");
            }
        }
    };

    xhttp.send();

    return [];
}

function editTweet(id) {
    let xhttp = new XMLHttpRequest();

    xhttp.open("GET", "../controllers/noticiaController.php?id=" + id, true);

    xhttp.onreadystatechange = function() {
        if (this.readyState === 4) {
            if (this.status === 200) {
                let tweet = JSON.parse(this.responseText);
                console.log(this.responseText);
                /*idEdit.value = tweet.id;
                tituloEdit.value = tweet.titulo;
                descripcionEdit.value = tweet.descripcion;*/
                completaEdit.value = tweet.completa;

                modalTweet.classList.add("show");
            }
            else {
                console.log("Error");
            }
        }
    };

    xhttp.send();
}
