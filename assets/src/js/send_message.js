document.querySelector('#message_send').addEventListener('submit',e=>{
    e.preventDefault();
    let form = document.querySelector('#message_send');
    const data = new FormData(form);

    fetch('/action/send_message', {
        method: 'POST',
        body: data
    }).then(response => response.text().then(response =>{
        if(response){
        $("#info").modal('show');
        document.querySelector("#waitlist").innerHTML= response;}
        else{
            document.querySelector("#textbox").value = "";
        }
      
    }).catch(error => console.log(error)));

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

