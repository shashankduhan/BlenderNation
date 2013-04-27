<!DOCTYPE html>
<html>
<head>
    <title>Blender Nation</title>
    <link href="http://www.loudcurtain.com/extra/blendernation/pic/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        body{margin:0 auto;font: 100% "Lucida Grande", Verdana, Arial, Helvetica, sans-serif;padding:0;margin:0 auto;min-width:1000px; }
        button, a{cursor:pointer;margin:0 12px;font-weight:lighter;}
        #title{background:white;padding:4px 0 12px;font-size:12px;}
        #header{background:url(pic/blue-check-seemless.png) top left,#3f8db4;height:288px;width:100%;border-top:1px solid #666;background-size:5px 5px;}
        #cover{width:1000px;height:288px;background:url(pic/mock-cover.jpg);margin:0 auto;}
        #headbar{background:#0079b0;border-bottom:1px solid #404040;position:relative;}
        #headtools{padding:7px 0 3px 200px;width:1000px;margin:0 auto;}
        ::-webkit-input-placeholder { /* WebKit browsers */color:#4baf28 !important;}
        :-moz-placeholder { /* Mozilla Firefox 4 to 18 */color:#4baf28 !important;}
        ::-moz-placeholder { /* Mozilla Firefox 19+ */color:#4baf28 !important;}
        :-ms-input-placeholder { /* Internet Explorer 10+ */color:#4baf28 !important;}
        #headtools .orangy_but{margin:0 210px 0 12px;*}
        #bLogo{background:url(pic/blender-logo-small-bnw.png)left center no-repeat;height:34px;width:49px;display:inline-block;top:7px;position:relative;/*margin:0 40px 0 65px;*/position:absolute;left:0;right:0;margin:0 auto;top:-1px;}
        #newsstream{text-align:center;padding:12px 0;background:url(pic/blue-line-tile.png) center top repeat-y;}
        #newstream a{color:#c8d956;}
        #sortngMenu{border:1px solid rgb(38, 66, 117);width:120px;display:inline-block;margin-bottom:125px;border-radius:4px;background:white;overflow:hidden;}
        #default_sort{background:rgb(186, 215, 241);color: rgb(76, 95, 122);cursor:pointer;}
        #sorting_opts{display:non;}
        #sorting_opts div{padding:4px 6px;text-align:left;list-style-type: none;font-size:11px;border-bottom:1px solid #444;cursor:pointer;}
        #sorting_opts div:hover{background:rgb(186, 215, 241);}
        
        
        #footer{height:125px;background:rgb(146, 156, 163);padding:12px;font-size:12px;}
        
        .orangy_but{background:#e3622f;color:white;font-size:16px;padding:3px 17px;border:1px solid #005b85;border-radius:8px;}
        .blue_but{background:#0094d7;color:white;font-size:16px;padding:3px 17px;border:1px solid #005b85;border-radius:8px;}
        .blue_input{background: #badbea;color:#404040;font-size:16px;padding:3px 17px;border:1px solid #005b85;border-radius:8px;margin:0 25px;font-size:14px;}
        .text, .text-engraving, .text-inner-shadow{margin: 0; word-wrap: break-word;}
        .text {position: absolute;top: 0;left: 0;right: 0;background-image: -webkit-linear-gradient(rgba(100, 100, 100, 0.9), rgba(100, 100, 100, 0.9));background-repeat: repeat;-webkit-background-clip: text;-webkit-text-fill-color: transparent;}
        .text-engraving {position: relative;top: 1px;width: 100%;color: #eee;}
        .text-inner-shadow {position: absolute;top: 1px;left: 0;right: 0;color: rgba(255, 255, 255, 0.25);}
        .text-container{position: relative;width: 100%;-webkit-font-smoothing: antialiased;font-size:inherit;}
        .newsbox{width:512px;display:inline-block;border:1px solid black;border-radius:8px;overflow:hidden;margin-bottom:120px;}
        .newstitle{font-size:33px;font-weight:lighter;color:#666;border-bottom:1px solid black;padding:17px 12px 12px;background:rgba(255,255,255,0.8);}
        .newscontent{text-align:left;font-size:16px;min-height:45px;}
        .newsDesc{float:right;background:#e3622f;color:white;border:1px solid black;padding:12px;border-radius:8px 0 0 8px;180px 30px 100px;border-right:0;max-width:250px;}
        .creditbox{margin:180px 30px 100px;}
        .ppic{width:30px;height:40px;border:1px solid black;padding:0 10px;}
        .time{font-size:13px;padding:0 12px;}
        .username{font-size:11px;padding:0 12px;}
        
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
    <div id="newsstream" align="center">
        <div id="sortngMenu">
            <div id="default_sort"><div id="def_sort_indic"></div><div id="def_sort_title">Most recent</div></div>
            <div id="sorting_opts">
                    <div>Most liked</div>
                    <div>Most discussed</div>
                    <div>Editor's Pick</div>
            </div>
        </div>
        <div class="newscontainer">
            <div id="nb_1" class="newsbox" style="background:url(pic/story-1.jpg);">
                <div class="newstitle">Laughing Gentleman</div>
                <div class="newscontent">
                    <div class="newsDesc">My first render using sss.<br/>It was an awesome experience and i found the sss & cycles awesome with together...<br/><a>...Read more</a></div>
                    <div class="creditbox">
                        <table cellspacing="0" border="0">
                            <tr><td rowspan="2" class="ppic" style="background:url(pic/boylogo-50x.jpg) center top;"></td><td class="username">moxiecrimefight</td></tr>
                            <tr><td class="time">2 Hour ago</td></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="footer" align="center">
        <div class="text-container">
            <p class="text-engraving">Blender Nation</p>
            <p class="text">Blender Nation</p>
            <p class="text-inner-shadow">Blender Nation</p>
        </div>
    </div>
</body>
</html>