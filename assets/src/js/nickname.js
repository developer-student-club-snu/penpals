
document.querySelector('#nickname').addEventListener('submit', e=> {
    e.preventDefault();
    let form = document.querySelector('#nickname');
    const data = new FormData(form);

    fetch('/action/nickname', {
        method: 'POST',
        body: data
    }).then(response => response.text()).then(response =>{
        console.log(response);
    }).catch(error => console.log(error));

    fetch('/action/nickname_check')
.then(response => response.text().then(response => {
    document.querySelector("#heading").innerHTML = response;
}).catch(error => console.log(error))
);
});