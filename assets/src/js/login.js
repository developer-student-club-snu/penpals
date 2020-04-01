document.querySelector('#login').addEventListener('submit',e=>{
    e.preventDefault();
    let form = document.querySelector('#login');
    const data = new FormData(form);

    fetch('action/login', {
        method: 'POST',
        body: data
    }).then(response => response.text().then(response =>{
        document.querySelector('#info_login').innerHTML = response;
    }).catch(error => console.log(error)));
});
