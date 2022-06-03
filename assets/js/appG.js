const formTweet = document.getElementById("form-tweet");
const tweetList = document.getElementById("gatos")
const keyList = "catList";

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
                <p>EL USUARIO ID :    ${list[i].id_user} </p>
                <p>AHORA ES DUEÑO DEL GATO:    ${list[i].id_gato}</p>
                    
                    <p>POR FAVOR PASAR POR EL EN LA FECHA:    ${list[i].fecha}</p>
                </div>


            </div>`;
    }

    tweetList.innerHTML = html;

}
    


function getTweets() {
    let xhttp = new XMLHttpRequest();

    xhttp.open("GET", "../controllers/solicitudController.php", true);

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

    xhttp.open("GET", "../controllers/solicitudController.php?id=" + id, true);

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
