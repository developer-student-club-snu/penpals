
document.querySelector("#start").addEventListener('click', e=> {

fetch('action/start_conversation')
.then(response => response.text().then(response => {
    document.querySelector('#waitlist').innerHTML = response;
}).catch(error => console.log(error)));

});