document.querySelector('#register').addEventListener('submit',e=>{
    e.preventDefault();
    let form = document.querySelector('#register');
    const data = new FormData(form);

    fetch('action/register', {
        method: 'POST',
        body: data
    }).then(response => response.json().then(response =>{
        if(response.status !== true)
        document.querySelector('#info_register').innerHTML = response.status;
        else
        window.location.href = "/index.php";
    }).catch(error => console.log(error)));
});
