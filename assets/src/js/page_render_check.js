


fetch('/action/waitlist_check')
.then(response => response.text().then(response => {
    document.querySelector('#waitlist').innerHTML = response;
}).catch(error => console.log(error))
);

fetch('/action/display').then((res) => res.json())
.then(response => {
    let output ="";
    for(let i in response){
        output += `
        <p class="message"><b>${response[i].sender}</b>:&nbsp${response[i].content}<p>
        `
        document.querySelector('#chat').innerHTML = output;
        var objDiv = document.getElementById("chat");
        objDiv.scrollTop = objDiv.scrollHeight;
    }
    
}).catch(error =>console.log(error));

fetch('/action/menu_available')
.then(response => response.text().then(response => {
    document.querySelector('#dropdown').style.display = response;
    document.querySelector('.convo_heading').style.display = response;
    document.querySelector('#ref').style.display = response;
}).catch(error => console.log(error))
);

fetch('/action/nickname_check')
.then(response => response.text().then(response => {
    document.querySelector("#heading").innerHTML = response;
}).catch(error => console.log(error))
);

fetch('/action/greeting')
.then(response => response.text().then(response => {
    document.querySelector('#greeting').innerHTML = response;
}).catch(error => console.log(error))
);

document.querySelector('#ref').addEventListener('click', e=> {
    fetch('/action/display').then((res) => res.json())
    .then(response => {
        let output ="";
        for(let i in response){
            output += `<div class="message">
            <h4><b>${response[i].sender}:</b></h4>
            <p>${response[i].content}<p>
            </div>
            `
            document.querySelector('#chat').innerHTML = output;
        }
        
    }).catch(error =>console.log(error));
});


