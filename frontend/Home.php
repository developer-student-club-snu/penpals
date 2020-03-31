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
                <h3 id="greeting"></h3>
            </div>
            <div class="actions">
                
                <button class="start" id="start" data-toggle="modal" data-target="#info"><i class="fa fa-plus"></i> </button>
            </div>
                <button class="end" data-toggle = "modal" data-target="#logout">LOGOUT</button>
        </div>
       
        <div class="convo_area col-md-10">
            <div class="convo_header" >
                <div class="col-md-11" id="convo_header">
                    <h1><b id="heading">USER</b></h1>
                </div>
                <div class = "col-md-1 parent dropdown" id="dropdown">
                    <i class="fa fa-ellipsis-v dropdown-toggle menu" data-toggle="dropdown"  aria-expanded="false"></i>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a type="button" class="btn dropdown-dropdown-content1" data-toggle="modal" data-target="#modal_nickname">Set Nickname</a>
                        <a type="button" id = "end" class="btn dropdown-dropdown-content1" data-toggle="modal" data-target="#info">End Conversation</a>     
                    </div>
                    <div id="info" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body"> 
                                <button type="button" class="close" data-dismiss="modal">&times;</button>                              
                                <span id="waitlist"></span>                                
                                </div>
                            </div>

                        </div>
                    </div>

                    <div id="modal_nickname"  class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <form id = "nickname" >
                                    <label>Set Nickname:</label>
                                    <input name= "nick" placeholder = "Enter Nickname"></input>
                                    <button type ="submit"  >Submit</button>
                                </form>
                                    
                                </div>
                            </div>

                        </div>
                    </div>
                    <div id="logout"  class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <label style="letter-spacing: 1px;">Are you sure you want to logout?</label><br>
                                    <button type ="button" id="logout_btn" style="">Yes</button>
                                    <button type="button" data-dismiss="modal">No</button>
                                </form>
                                    
                                </div>
                            </div>

                        </div>
                    </div>
                                     
                </div>
            </div>

            <div class="chat parent col-md-12" id="chat">
                            
            </div>
            

            <form id="message_send">
                <div class = "message_area">
                
                    <div class="col-md-11 parent">
                        <textarea class="textbox" placeholder="Type a Message" name="message_body"></textarea>
                    </div>
                    <div class="col-md-1 parent">
                        <button class="send_btn" type = "submit"><img src="<?php echo __assets ?>image/send-icon.png" class="send_img"></button>
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
