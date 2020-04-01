document.querySelector('#logout_btn').addEventListener('click',e=>{
    e.preventDefault();

    fetch('action/logout')
    .then(response => response.text().then(response => {
        document.querySelector("#heading").innerHTML = response;
    }).catch(error => console.log(error))
    );

});