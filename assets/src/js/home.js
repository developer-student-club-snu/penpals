class ChatPage
{
    state = {
        conversations: [], //Conversations retrieved from server
        openConvoId: 0, //The conversation open right now.
    }

    init = () => {
        this.checkWaitList();
        this.menuAvailable();
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
        const { conversations, openConvoId } = this.state;
        fetch('/action/display?conv='+conversations[openConvoId].convId).then((res) => res.json())
        .then(response => {
            let output ="";
            for(let i in response){
                output += `
        <p class="message ${response[i].sender}">${response[i].content}<p>
        `
            }
            document.querySelector('#chat').innerHTML = output;
            var objDiv = document.getElementById("chat");
            objDiv.scrollTop = objDiv.scrollHeight;
            
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
        const { conversations, openConvoId } = this.state;
        fetch('/action/nickname_check?conv='+conversations[openConvoId].convId)
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
        
        this.menuAvailable();
        this.nickNameCheck();
        this.getConvos();
    }

    sendMessage = e => {
        const { conversations, openConvoId } = this.state;
        e.preventDefault();
        let form = document.querySelector('#message_send');
        const data = new FormData(form);

        fetch('/action/send_message?conv='+conversations[openConvoId].convId, {
            method: 'POST',
            body: data
        }).then(response => response.text().then(response =>{
            if(response){
            $("#info").modal('show');
            document.querySelector("#waitlist").innerHTML= response;}
            else{
                document.querySelector("#textbox").value = "";
            }
            this.display();
        }).catch(error => console.log(error) && this.display()));
    }

    getNickName = e => {
        const { conversations, openConvoId } = this.state;
        e.preventDefault();
        let form = document.querySelector('#nickname');
        const data = new FormData(form);

        fetch('/action/nickname?conv='+conversations[openConvoId].convId, {
            method: 'POST',
            body: data
        }).then(response => response.text()).then(response =>{
            console.log(response);
        }).catch(error => console.log(error));

        fetch('/action/nickname_check?conv='+conversations[openConvoId].convId)
        .then(response => response.text().then(response => {
            document.querySelector("#heading").innerHTML = response;
        }).catch(error => console.log(error))
        );
    }

    endConversation = e => {
        const { conversations, openConvoId } = this.state;
        fetch('/action/end_conversation?conv='+conversations[openConvoId].convId)
        .then(response => response.text().then(response => {
            document.querySelector('#waitlist').innerHTML = response;
            this.getConvos();
            this.state.openConvoId = 0;
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
            this.state.conversations = [...response];
            document.getElementById('conversations').innerHTML = "";
            for(let i in response){
                let createButton = document.createElement("button");
                createButton.classList.add("convo-listing");
                createButton.innerHTML = response[i].nickname.length > 0 ? response[i].nickname : "Pal #" + i;
                createButton.onclick = (e) => this.changeCongo(i)(e);

                document.getElementById('conversations').appendChild(createButton);
                
                var objDiv = document.getElementById("conversations");
                objDiv.scrollTop = objDiv.scrollHeight;
            }
            this.display();
            this.nickNameCheck();
            
        }).catch(error =>console.log(error));
    }

    changeCongo = i => {
        return (e) => {
            document.querySelectorAll(".convo-listing").forEach(e=> e.classList.remove("open"));
            e.target.classList.add("open");
            this.state.openConvoId = i;
            this.display();
            this.nickNameCheck();
        }
    }
}

const chatpage = new ChatPage();
chatpage.init();