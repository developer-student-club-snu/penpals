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
            <div class = "logout_div">
            </div>
        </div>
       
        <div class="convo_area col-md-10">
            <div class="convo_header">

            </div>

            <div class = "message_area">
                <div class="col-md-11 parent">
                    <textarea class="textbox"></textarea>
                </div>
                <div class="col-md-1 parent">
                <i class="fa fa-caret-right send"></i>
                </div> 
            </div>
        </div>
    
    </div>
</body>
</html>
