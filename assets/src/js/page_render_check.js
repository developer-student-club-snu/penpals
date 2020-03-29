fetch('action/waitlist_check')
.then(response => response.text().then(response => {
    document.querySelector('#waitlist').innerHTML = response;
}).catch(error => console.log(error))
);

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