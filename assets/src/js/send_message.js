document.querySelector('#message_send').addEventListener('submit',e=>{
    e.preventDefault();
    let form = document.querySelector('#message_send');
    const data = new URLSearchParams();
    for(const p of new FormData(form)){
        data.append(p[0],p[1]);
    }

    fetch('action/send_message', {
        method: 'POST',
        body: data
    }).then(response => response.text().then(response =>{
        console.log(response);
    }).catch(error => console.log(error)));
});

