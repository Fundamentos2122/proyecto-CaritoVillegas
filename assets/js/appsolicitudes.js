
const formTweet = document.getElementById("form-tweet");
const tweetList = document.getElementById("gatos");
const modalTweet = document.getElementById("modalTweet");

//editar
const idEdit = document.getElementById("form-edit-id");
const id_gatoEdit = document.getElementById("form-edit-id_gato");
const id_userEdit = document.getElementById("form-edit-id_user");
const fechaEdit = document.getElementById("form-edit-fecha");
const aceptadaEdit = document.getElementById("form-edit-aceptada");
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
                <div class="card-text">
                    <p>ID DE GATO:    ${list[i].nombre}</p>
                    <p>ID DE USUARIO:    ${list[i].nombres}</p>
                    <p>FECHA:    ${list[i].fecha}</p>
                </div>

                <div class="options">
                    
                    
                </div>

            </div>`;
    }

    tweetList.innerHTML = html;

}
    


function getTweets() {
    let xhttp = new XMLHttpRequest();

    xhttp.open("GET", "../controllers/solicitudesController.php", true);

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

    xhttp.open("GET", "../controllers/solicitudesController.php?id=" + id, true);

    xhttp.onreadystatechange = function() {
        if (this.readyState === 4) {
            if (this.status === 200) {
                let tweet = JSON.parse(this.responseText);
                console.log(this.responseText);
                idEdit.value = tweet.id;
                id_gatoEdit.value = tweet.id_gato;
                id_userEdit.value = tweet.id_user;
                //fechaEdit.value = tweet.fecha;
                aceptadaEdit.value = tweet.aceptada;
                modalTweet.classList.add("show");
            }
            else {
                console.log("Error");
            }
        }
    };

    xhttp.send();
}
