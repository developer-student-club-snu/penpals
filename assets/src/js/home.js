class ChatPage
{
    state = {
        conversations: [], //Conversations retrieved from server
        openConvoId: 0, //The conversation open right now.
        starters: []
    }

    init = async () => {
        this.checkWaitList();
        this.menuAvailable();
        await this.getStarters();
        this.getConvos();
        this.autoReload();

        this.bind();
    }

    bind = () => {
        document.querySelector('#ref').addEventListener('click', this.display);
        document.querySelector("#start").addEventListener('click', this.startConvo);
        document.querySelector('#message_send').addEventListener('submit', this.sendMessage);
        document.querySelector('#nickname').addEventListener('submit', this.getNickName);
        document.querySelector("#end").addEventListener('click', this.endConversation);
        document.querySelectorAll(".phone-menu-button").forEach(e => e.addEventListener('click', this.toggleMenu));
    }

    checkWaitList = () => {
        fetch('/action/waitlist_check')
        .then(response => response.text().then(response => {
            document.querySelector('#waitlist').innerHTML = response;
        }).catch(error => console.log(error))
        );
    }

    display = () => {
        if(document.getElementById("ref").classList.contains("loading"))
        return;
        document.getElementById("ref").classList.add("loading");
        const { conversations, openConvoId } = this.state;
        if(conversations.length == 0)
        return;
        fetch('/action/display?conv='+conversations[openConvoId].convId).then((res) => res.json())
        .then(response => {
            let output ="";
            if(response.length > 0)
                for(let i in response)
                    output += `<p class="message ${response[i].sender}">${response[i].content}<p>`;
            else
            {
                let suggestion = this.state.starters[Math.round(Math.random() * (this.state.starters.length - 1))];
                output = `
                    <div class="starters">
                        <h2>Here's something you could send:</h2>
                        <p>"${suggestion}"</p>
                    </div>
                `;
            }
            document.querySelector('#chat').innerHTML = output;
            var objDiv = document.getElementById("chat");
            objDiv.scrollTop = objDiv.scrollHeight;
            document.getElementById("ref").classList.remove("loading");
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
        if(conversations.length == 0)
        return;
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
            this.menuAvailable();
            this.nickNameCheck();
            this.getConvos();
        }).catch(error => console.log(error)));
    }

    sendMessage = e => {
        const { conversations, openConvoId } = this.state;
        e.preventDefault();
        document.querySelector("button.send_btn").setAttribute("disabled", true);
        let form = document.querySelector('#message_send');
        const data = new FormData(form);
        let msg = document.querySelector("#textbox").value;
        document.querySelector("#textbox").value = "";

        fetch('/action/send_message?conv='+conversations[openConvoId].convId, {
            method: 'POST',
            body: data
        }).then(response => response.text().then(response =>{
            if(response){
                $("#info").modal('show');
                document.querySelector("#waitlist").innerHTML= response;
                document.querySelector("#textbox").value = msg;
            }
            this.display();
            document.querySelector("button.send_btn").removeAttribute("disabled");
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
                if(i == this.state.openConvoId)
                createButton.classList.add("open");

                document.getElementById('conversations').appendChild(createButton);
                
                var objDiv = document.getElementById("conversations");
                objDiv.scrollTop = objDiv.scrollHeight;
            }
            this.display();
            this.nickNameCheck();
            if(this.state.conversations.length == 0)
            document.querySelector("body").classList.add("menuOpen");
        }).catch(error =>console.log(error));
    }

    changeCongo = i => {
        return (e) => {
            document.querySelectorAll(".convo-listing").forEach(e=> e.classList.remove("open"));
            e.target.classList.add("open");
            this.state.openConvoId = i;
            this.display();
            this.nickNameCheck();
            this.toggleMenu();
        }
    }

    getStarters = async () => {
        try{
            const response = await fetch("/assets/src/starters.json");
            const respArr = await response.json();
            this.state.starters = [...respArr];
        }
        catch(e)
        {
            console.log(e);
        }
    }

    autoReload = async () => {
        setInterval(
            () => {
                this.display();
            }
        , 10000);
    }

    toggleMenu = () => {
        if(document.querySelector("body").classList.contains("menuOpen"))
        document.querySelector("body").classList.remove("menuOpen");
        else
        document.querySelector("body").classList.add("menuOpen");
    }
}

const chatpage = new ChatPage();
chatpage.init();