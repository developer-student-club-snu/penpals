document.querySelector("#logout_btn").addEventListener('click',e=>{

    fetch('action/logout')
    .then(response => response.text().then(response => {
    }).catch(error => console.log(error))
    );

});