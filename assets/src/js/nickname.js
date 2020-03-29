
document.querySelector("#nickname").addEventListener('click', e=> {

    fetch('action/nickname')
    .then(response => response.text().then(response => {
        console.log(response);
    }).catch(error => console.log(error)));
    
    });