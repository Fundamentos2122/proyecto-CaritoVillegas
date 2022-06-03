const formTweet = document.getElementById("form-gato");
const catList = document.getElementById("gato");
const keyList = "catList";

document.addEventListener("DOMContentLoaded", function() {
    //Agregar evento al formulario
    formTweet.addEventListener("submit", submitgato);
    paintC();
});

function submitgato(e) {
    e.preventDefault();
    e.stopPropagation();

    let tweet = {
        id: Date.now(),
        text: formTweet["titulo"].value,
        img_url: formTweet["img_url"].value
    };

    let list = getCats();

    list.push(tweet);

    localStorage.setItem(keyList, JSON.stringify(list));

    paintC();
}

function paintC() {
    let list = getCats();

    let html = '';

    for(var i = 0; i < list.length; i++) {
        html += 
        `<div class="card" id="${list[i].id}">
        <div class="card-img">
            <img src="${list[i].img_url}" alt="">
        </div>
        <div class="card-text">
            ${list[i].text}
        </div>
        <button class="close" onclick="deleteC(${list[i].id})">X</button>
    </div>`;
    }
    catList.innerHTML = html;
}

function getCats() {
    let list = JSON.parse(localStorage.getItem(keyList));

    if (list === null) {
        return [];
    }
    else {
        return list;
    }
}

function deleteC(id) {
    let list = getCats();

    list = list.filter(i => i.id !== id);

    localStorage.setItem(keyList, JSON.stringify(list));

    let tweet = document.getElementById(id);

    tweet.className += ' hide';

    setTimeout(() => {
        tweet.remove();
    }, 300);
}