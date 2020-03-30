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
        
        <div class="chat_list col-md-2 ">
            <div class="list_header">
            </div>
            <div class="actions">
                <label id="waitlist"></label>
                <button class="start" id="start">Start Conversation</button>
                <button class="end" id = "end">End Conversation</button>
            </div>
            <div class = "logout_div">
                <button>LOGOUT</button>
            </div>
        </div>
       
        <div class="convo_area col-md-10">
            <div class="convo_header" >
                <div class="col-md-11" id="convo_header">
                    <h1 id="heading"><b></b></h1>
                </div>
                <div class = "col-md-1 parent dropdown" id="dropdown">
                    <i class="fa fa-bars dropdown-toggle menu"  data-toggle="dropdown"  aria-expanded="false"></i>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <button type="buttom" class="btn dropdown-item" data-toggle="modal" data-target="#modal_nickname">Set Nickname</button>      
                    </div>
                    <div id="modal_nickname" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <form id = "nickname" >
                                    <label>Set Nickname:</label>
                                    <input name= "nick" placeholder = "nickname"></input>
                                    <button type ="submit">Submit</button>
                                </form>
                                    
                                </div>
                            </div>

                        </div>
                    </div>
                    
                </div>
            </div>

            <div class="chat parent" id="chat">
                                                        
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
    
    <script src =" <?php echo __assets ?>src/js/page_render_check.js"> </script>
    <script src =" <?php echo __assets ?>src/js/start_conversation.js"> </script>
    <script src =" <?php echo __assets ?>src/js/send_message.js"> </script>
    <script src =" <?php echo __assets ?>src/js/nickname.js"> </script>
    <script src =" <?php echo __assets ?>src/js/end_conversation.js"> </script>
    <script src =" <?php echo __assets ?>src/js/message_display.js"> </script>
    
</body>
</html>
