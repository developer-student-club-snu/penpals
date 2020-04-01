
document.querySelector("#end").addEventListener('click', e=> {

    fetch('/action/end_conversation')
    .then(response => response.text().then(response => {
        document.querySelector('#waitlist').innerHTML = response;
    }).catch(error => console.log(error)));
    
    
    fetch('/action/menu_available')
    .then(response => response.text().then(response => {
        document.querySelector('#dropdown').style.display = response;
        document.querySelector('#convo_header').style.display = response;
    }).catch(error => console.log(error))
    );

    document.querySelector("#chat").innerHTML="";

});