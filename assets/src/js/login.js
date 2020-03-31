document.querySelector('#login').addEventListener('submit',e=>{
    e.preventDefault();
    let form = document.querySelector('#login');
    const data = new URLSearchParams();
    for(const p of new FormData(form)){
        data.append(p[0],p[1]);
    }

    fetch('action/login', {
        method: 'POST',
        body: data
    }).then(response => response.text().then(response =>{
        document.querySelector('#info_login').innerHTML = response;
    }).catch(error => console.log(error)));
});

