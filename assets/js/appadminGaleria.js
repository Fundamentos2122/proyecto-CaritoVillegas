

const formTweet = document.getElementById("form-gato");
const tweetList = document.getElementById("gatos");
const modalTweet = document.getElementById("modalTweet");

//editar
const idEdit = document.getElementById("form-edit-id");
const nombreEdit = document.getElementById("form-edit-nombre");
const descripcionEdit = document.getElementById("form-edit-descripcion");
const edadEdit = document.getElementById("form-edit-edad");
const btnSaveEdit = document.getElementById("btnSaveEdit");

//eliminar
const modalDeleteTweet = document.getElementById("modalDeleteTweet");
const idDelete = document.getElementById("form-delete-id");
//const keyList = "tweetList";

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

function submitTweet(e) {
    e.preventDefault();
    e.stopPropagation();

    let tweet = {
        id: Date.now(),
        titulo: formTweet["titulo"].value,
        descripcion: formTweet["descripcion"].value,
        completa: formTweet["completa"].value
        //photo: formTweet["photo"].value
    };

    let list = getTweets();

    list.push(tweet);

    localStorage.setItem(keyList, JSON.stringify(list));

    paintTweets();
}

function paintTweets(list) {
    let html = '';

    for(var i = 0; i < list.length; i++) {

        html += 
        `<div class="card" id="${list[i].id}">
                <div class="card-img">
                    <img class="imagen" src="data:image/jpg;base64,${list[i].photo}">
                </div>
                <div class="card-text">
                <h2> ${list[i].nombre}</h2>
                    <p>${list[i].edad}</p>
                    <p>${list[i].descripcion}</p>
                </div>
                <div class="options">
                    <button class="btn-option" onclick="editTweet(${list[i].id})">
                        editar
                    </button>
                    <button class=\"btn-option\" onclick=\"deleteTweet(${list[i].id})\">
                        borrar
                    </button>
                    </div>
            </div>`;
    }

    tweetList.innerHTML = html;

}
    


function getTweets() {
    let xhttp = new XMLHttpRequest();

    xhttp.open("GET", "../controllers/galeriaController.php", true);

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

function hideDelete() {
    let btnDelete = document.querySelectorAll("button[onclick^='deleteTweet']");

    btnDelete.forEach(btn => btn.remove());
}

function deleteTweet(id) {
    idDelete.value = id;

    modalDeleteTweet.classList.add("show");
}



function editTweet(id) {
    console.log(id);
    
    let xhttp = new XMLHttpRequest();

    xhttp.open("GET", "../controllers/galeriaController.php?id=" + id, true);

    xhttp.onreadystatechange = function() {
        if (this.readyState === 4) {
            if (this.status === 200) {
                let tweet = JSON.parse(this.responseText);
                console.log(this.responseText);
                idEdit.value = tweet.id;
                nombreEdit.value = tweet.nombre;
                descripcionEdit.value = tweet.descripcion;
                edadEdit.value = tweet.edad;

                modalTweet.classList.add("show");
            }
            else {
                console.log("Error");
            }
        }
    };

    xhttp.send();
}

