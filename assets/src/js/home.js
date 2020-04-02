
class ChatPage
{
    state = {
        conversations: [], //Conversations retrieved from server
        openConvoId: 0, //The conversation open right now.
    }

    init = () => {
        this.checkWaitList();
        this.display();
        this.menuAvailable();
        this.nickNameCheck();
        this.getConvos();

        this.bind();
    }

    bind = () => {
        document.querySelector('#ref').addEventListener('click', this.display);
        document.querySelector("#start").addEventListener('click', this.startConvo);
        document.querySelector('#message_send').addEventListener('submit', this.sendMessage);
        document.querySelector('#nickname').addEventListener('submit', this.getNickName);
        document.querySelector("#end").addEventListener('click', this.endConversation);
    }

    checkWaitList = () => {
        fetch('/action/waitlist_check')
        .then(response => response.text().then(response => {
            document.querySelector('#waitlist').innerHTML = response;
        }).catch(error => console.log(error))
        );
    }

    display = () => {
        fetch('/action/display').then((res) => res.json())
        .then(response => {
            let output ="";
            for(let i in response){
                output += `<div class="message ${response[i].sender}">
                <p>${response[i].content}<p>
                </div>
                `
            }
            document.querySelector('#chat').innerHTML = output;
            
        }).catch(error =>console.log(error));
    }

    menuAvailable = () => {
        fetch('/action/menu_available')
        .then(response => response.text().then(response => {
            document.querySelector('#dropdown').style.display = response;
            document.querySelector('.convo_heading').style.display = response;
            document.querySelector('#ref').style.display = response;
        }).catch(error => console.log(error))
        );
    }

    nickNameCheck = () => {
        fetch('/action/nickname_check')
        .then(response => response.text().then(response => {
            document.querySelector("#heading").innerHTML = response;
        }).catch(error => console.log(error))
        );
    }

    startConvo = () => {
        fetch('/action/start_conversation')
        .then(response => response.text().then(response => {
            document.querySelector('#waitlist').innerHTML = response;
        }).catch(error => console.log(error)));
        
        
        fetch('/action/menu_available')
        .then(response => response.text().then(response => {
            document.querySelector('#convo_heading').style.display = response;
            document.querySelector('#dropdown').style.display = response;
            document.querySelector('#ref').style.display = response;
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
            }
            
        }).catch(error =>console.log(error));
        
        fetch('/action/nickname_check')
        .then(response => response.text().then(response => {
            document.querySelector("#heading").innerHTML = response;
        }).catch(error => console.log(error)));
    }

    sendMessage = e => {
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
    }

    getNickName = e => {
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
    }

    endConversation = e => {
        fetch('/action/end_conversation')
        .then(response => response.text().then(response => {
            document.querySelector('#waitlist').innerHTML = response;
        }).catch(error => console.log(error)));
        
        
        fetch('/action/menu_available')
        .then(response => response.text().then(response => {
            document.querySelector('#dropdown').style.display = response;
            document.querySelector('#convo_header').style.display = response;
        }).catch(error => console.log(error))
        );

        document.querySelector("#chat").innerHTML="";
    }

    getConvos = () => {
        fetch('/action/get_conversations').then((res) => res.json())
        .then(response => {
            let output = "";
            for(let i in response){
                output += `
                <button class="convo-listing"><b>${(response[i].nickname.length > 0 ? response[i].nickname : "Pal #" + i)}</b></button>
                `
                document.getElementById('conversations').innerHTML = output;
                
                var objDiv = document.getElementById("conversations");
                objDiv.scrollTop = objDiv.scrollHeight;
            }
            
        }).catch(error =>console.log(error));
    }

    changeCongo = i => {
        return (e) => {
            this.state.openConvoId = i;
            this.display();
        }
    }
}

const chatpage = new ChatPage();
chatpage.init();