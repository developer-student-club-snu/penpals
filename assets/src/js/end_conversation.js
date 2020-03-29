
document.querySelector("#end").addEventListener('click', e=> {

    fetch('action/end_conversation')
    .then(response => response.text().then(response => {
        document.querySelector('#waitlist').innerHTML = response;
    }).catch(error => console.log(error)));
    
    });