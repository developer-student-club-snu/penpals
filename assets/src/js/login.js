document.querySelector('#login').addEventListener('submit',e=>{
    e.preventDefault();
    let form = document.querySelector('#login');
    const data = new FormData(form);

    fetch('action/login', {
        method: 'POST',
        body: data
    }).then(response => response.json().then(response =>{
        if(response.status != true)
        document.querySelector('#info_login').innerHTML = response.status;
        else
        window.location.href = "/index.php";
    }).catch(error => console.log(error)));
});
