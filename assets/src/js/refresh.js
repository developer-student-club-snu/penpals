document.querySelector('#ref').addEventListener('click', e=> {
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
});