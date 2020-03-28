document.querySelector('#register').addEventListener('submit',e=>{
    e.preventDefault();
    let form = document.querySelector('#register');
    const data = new URLSearchParams();
    for(const p of new FormData(form)){
        data.append(p[0],p[1]);
    }

    fetch('action/register', {
        method: 'POST',
        body: data
    }).then(response => response.text()).then(response =>{
        document.querySelector('#info_register').innerHTML = response;
    }).catch(error => console.log(error));
});
