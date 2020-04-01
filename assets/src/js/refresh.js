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