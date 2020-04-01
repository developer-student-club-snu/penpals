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
        if(response){
        $("#info").modal('show');
        document.querySelector("#waitlist").innerHTML= response;}
    }).catch(error => console.log(error)));

    fetch('action/display').then((res) => res.json())
    .then(response => {
    let output ="";
    for(let i in response){
        output += `<div class="message">
        <h4><b>You:</b></h4>
        <p>${response[i].content}<p>
        </div>
        `
        document.querySelector('#chat').innerHTML = output;
    }
    
}).catch(error =>console.log(error));
});

