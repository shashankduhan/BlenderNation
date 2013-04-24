<!DOCTYPE html>
<html>
<head>
    <link href="http://www.loudcurtain.com/extra/blendernation/pic/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        body{margin:0 auto;font: 100% "Lucida Grande", Verdana, Arial, Helvetica, sans-serif;padding:0;margin:0 auto;min-width:1000px; }
        button, a{cursor:pointer;margin:0 12px;font-weight:lighter;}
        #title{background:white;padding:4px 0 12px;font-size:12px;}
        #header{background:url(pic/blue-check-seemless.png) top left,#3f8db4;height:288px;width:100%;border-top:1px solid #666;background-size:5px 5px;}
        #cover{width:1000px;height:288px;background:url(pic/mock-cover.jpg);margin:0 auto;}
        #headbar{background:#0079b0;border-bottom:1px solid #404040;}
        #headtools{padding:1px 0 3px 200px;width:1000px;margin:0 auto;}
        ::-webkit-input-placeholder { /* WebKit browsers */color:#4baf28 !important;}
        :-moz-placeholder { /* Mozilla Firefox 4 to 18 */color:#4baf28 !important;}
        ::-moz-placeholder { /* Mozilla Firefox 19+ */color:#4baf28 !important;}
        :-ms-input-placeholder { /* Internet Explorer 10+ */color:#4baf28 !important;}
        #bLogo{background:url(pic/blender-logo-small-bnw.png)center center no-repeat;height:34px;width:45px;display:inline-block;top:7px;position:relative;margin:0 40px 0 65px;}
        #newsstream{}
        
        .orangy_but{background:#e3622f;color:white;font-size:16px;padding:3px 17px;border:1px solid #005b85;border-radius:8px;}
        .blue_but{background:#0094d7;color:white;font-size:16px;padding:3px 17px;border:1px solid #005b85;border-radius:8px;}
        .blue_input{background: #badbea;color:#404040;font-size:16px;padding:3px 17px;border:1px solid #005b85;border-radius:8px;margin:0 25px;font-size:14px;}
        .text, .text-engraving, .text-inner-shadow{margin: 0; word-wrap: break-word;}
        .text {position: absolute;top: 0;left: 0;right: 0;background-image: -webkit-linear-gradient(rgba(100, 100, 100, 0.9), rgba(100, 100, 100, 0.9));background-repeat: repeat;-webkit-background-clip: text;-webkit-text-fill-color: transparent;}
        .text-engraving {position: relative;top: 1px;width: 100%;color: #eee;}
        .text-inner-shadow {position: absolute;top: 1px;left: 0;right: 0;color: rgba(255, 255, 255, 0.25);}
        .text-container{position: relative;width: 100%;-webkit-font-smoothing: antialiased;font-size:inherit;}
    </style>
</head>
<body>
    <div id="title" align="center">
        <div class="text-container">
            <p class="text-engraving">Blender Nation</p>
            <p class="text">Blender Nation</p>
            <p class="text-inner-shadow">Blender Nation</p>
        </div>
    </div>
    <div id="header"><div id="cover"></div></div>
    <div id="headbar">
        <div id="headtools">
            <?php 
                if(isset($_SESSION['bnation_uid'])){echo $_SESSION['bnation_ufname']." ".$_SESSION['bnation_ulname'];}
                else{?> 
            <button id="fb_login" class="orangy_but" onclick="window.location='http://loudcurtain.com/extra/blendernation/fb/login.php'">Login with facebook</button>
            <?php }?>
            <div id="bLogo"></div>
            <button class="blue_but">Post something new</button>
            <input type="text" placeholder="Search" aria-title="Search" title="Search" class="blue_input"/>
        </div>
    </div>
    <div id="newsstream"></div>
</body>
</html>