<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo __assets; ?>src/css/home.css">
</head>
<body>
    <div class="container">
        
        <div class="chat_list col-md-2">
            <div class="list_header">
            </div>
            <div class="actions">
                <label id="waitlist"></label>
                <button class="start" id="start">Start Conversation</button>
                <button class="end">End Conversation</button>
            </div>
            <div class = "logout_div">
                <h2>LOGOUT</h2>
            </div>
        </div>
       
        <div class="convo_area col-md-10">
            <div class="convo_header">
                <div class="col-md-11">
                    <h1><b>USER</b></h1>
                </div>
                <div class = "col-md-1 parent dropdown">
                    <i class="fa fa-bars dropdown-toggle menu"  data-toggle="dropdown"  aria-expanded="false"></i>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <buttin class="btn dropdown-item" href="#">Set Nickname</button>
                    </div>
                    
                </div>
            </div>

            <div class="chat parent">
                 <div class=message>
                    <h4><b>user:</b></h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Mattis nunc sed blandit libero volutpat sed cras ornare. Dolor purus non enim praesent elementum facilisis. Tincidunt augue interdum velit euismod in pellentesque massa. Mauris in aliquam sem fringilla ut. Amet dictum sit amet justo donec enim. Quam viverra orci sagittis eu volutpat odio. Urna molestie at elementum eu. Donec enim diam vulputate ut pharetra sit amet aliquam id. Rutrum quisque non tellus orci ac auctor augue. Tortor posuere ac ut consequat semper viverra.</p>
                </div>
                <div class=message>
                    <h4><b>user:</b></h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Mattis nunc sed blandit libero volutpat sed cras ornare. Dolor purus non enim praesent elementum facilisis. Tincidunt augue interdum velit euismod in pellentesque massa. Mauris in aliquam sem fringilla ut. Amet dictum sit amet justo donec enim. Quam viverra orci sagittis eu volutpat odio. Urna molestie at elementum eu. Donec enim diam vulputate ut pharetra sit amet aliquam id. Rutrum quisque non tellus orci ac auctor augue. Tortor posuere ac ut consequat semper viverra.</p>
                </div>
                
            </div>


            
            <form id="message_send">
                <div class = "message_area">
                    <div class="col-md-11 parent">
                        <textarea class="textbox" name="message_body"></textarea>
                    </div>
                    <div class="col-md-1 parent">
                        <button type = "submit">SEND </button>
                    </div>  
                </div>
            </form>
        </div>
    
    </div>
    
    <script src =" <?php echo __assets ?>src/js/waitlist_check.js"> </script>
    <script src =" <?php echo __assets ?>src/js/start_conversation.js"> </script>
    <script src =" <?php echo __assets ?>src/js/send_message.js"> </script>
    <script src =" <?php echo __assets ?>src/js/end_conversation.js"> </script>
</body>
</html>
