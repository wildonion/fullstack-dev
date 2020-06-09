<!DOCTYPE html>
<html lang="en">
<head>
      <title>Find Your Lyrics</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <meta charset="UTF-8">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	  <meta name="description" content="Lyrics Search Enginee">
	  <meta name="keywords" content="lyrics, lyrics song, lyrics enginee, song, lyrics musics">     
	  <link rel="stylesheet" href="<?=base_url();?>assets/css/home_style.css">
      <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/fadecss.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
  </head>
    
    
    <style>
    
        input{
  font-size: 12px;
  font-family:'Helvetica Neue', Helvetica, Arial, sans-serif;
}
input[type=text] {
  -webkit-appearance: textfield;
  -webkit-box-sizing: content-box;
	background: #ededed url(<?=base_url();?>assets/images/search-icon.png) no-repeat 9px center;
  border:solid 1px #ccc;
  padding:9px 10px 9px 32px;
  width:100px;
  -webkit-border-radius:10em;
  -mox-border-radius:10em;
  border-radius:10em;
  -webkit-transition: all .5s;
  -moz-transition: all .5s;
  transition: all .5s;
}
input[type=text]:focus{
  width:300px;
  outline:0;
  background-color:#fff;
  border-color:#6dcff6;
  -webkit-box-shadow:0 0 5px rgba(109,207,246,.5);
  -moz-box-shadow:0 0 5px rgba(109,207,246,.5);
  box-shadow:0 0 5px rgba(109,207,246,.5);
}

form{

  margin: 50px;
  text-align: center;
}
body {
  padding-top: 300px;
}
@import "compass/css3";

@import url(http://fonts.googleapis.com/css?family=Share+Tech+Mono);


body{
  background: black;
}

svg{
  width: 600px;
  height: 120px;
  display: block;
  position: relative;
  overflow: hidden; 
  margin: 0 auto;
  background: black;
}
    </style>
    <body class="box fade-in one">

<svg version="1.1" id="Ebene_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
     width="600px" height="100px" viewBox="0 0 600 100">
<style type="text/css">

<![CDATA[

    text {
        filter: url(#filter);
        fill: white;
        font-family: 'Share Tech Mono', sans-serif;
        font-size: 100px;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
            }
]]>
</style>
    <defs>

        <filter id="filter">
            <feFlood flood-color="black" result="black" />
            <feFlood flood-color="red" result="flood1" />
            <feFlood flood-color="limegreen" result="flood2" />
            <feOffset in="SourceGraphic" dx="3" dy="0" result="off1a"/>
            <feOffset in="SourceGraphic" dx="2" dy="0" result="off1b"/>
            <feOffset in="SourceGraphic" dx="-3" dy="0" result="off2a"/>
            <feOffset in="SourceGraphic" dx="-2" dy="0" result="off2b"/>
            <feComposite in="flood1" in2="off1a" operator="in"  result="comp1" />
            <feComposite in="flood2" in2="off2a" operator="in" result="comp2" />

            <feMerge x="0" width="100%" result="merge1">
                <feMergeNode in = "black" />
                <feMergeNode in = "comp1" />
                <feMergeNode in = "off1b" />

                <animate 
                    attributeName="y" 
                    id = "y"
                    dur ="4s"
                    
                    values = '104px; 104px; 30px; 105px; 30px; 2px; 2px; 50px; 40px; 105px; 105px; 20px; 6ßpx; 40px; 104px; 40px; 70px; 10px; 30px; 104px; 102px'

                    keyTimes = '0; 0.362; 0.368; 0.421; 0.440; 0.477; 0.518; 0.564; 0.593; 0.613; 0.644; 0.693; 0.721; 0.736; 0.772; 0.818; 0.844; 0.894; 0.925; 0.939; 1'

                    repeatCount = "indefinite" />
 
                <animate attributeName="height" 
                    id = "h" 
                    dur ="4s"
                    
                    values = '10px; 0px; 10px; 30px; 50px; 0px; 10px; 0px; 0px; 0px; 10px; 50px; 40px; 0px; 0px; 0px; 40px; 30px; 10px; 0px; 50px'

                    keyTimes = '0; 0.362; 0.368; 0.421; 0.440; 0.477; 0.518; 0.564; 0.593; 0.613; 0.644; 0.693; 0.721; 0.736; 0.772; 0.818; 0.844; 0.894; 0.925; 0.939; 1'

                    repeatCount = "indefinite" />
            </feMerge>
            

            <feMerge x="0" width="100%" y="60px" height="65px" result="merge2">
                <feMergeNode in = "black" />
                <feMergeNode in = "comp2" />
                <feMergeNode in = "off2b" />

                <animate attributeName="y" 
                    id = "y"
                    dur ="30s"
                    values = '103px; 104px; 69px; 53px; 42px; 104px; 78px; 89px; 96px; 100px; 67px; 50px; 96px; 66px; 88px; 42px; 13px; 100px; 100px; 104px;' 

                    keyTimes = '0; 0.055; 0.100; 0.125; 0.159; 0.182; 0.202; 0.236; 0.268; 0.326; 0.357; 0.400; 0.408; 0.461; 0.493; 0.513; 0.548; 0.577; 0.613; 1'

                    repeatCount = "indefinite" />
 
                <animate attributeName="height" 
                    id = "h"
                    dur = "30s"
                    
                    values = '0px; 0px; 0px; 16px; 16px; 12px; 12px; 0px; 0px; 5px; 10px; 22px; 33px; 11px; 0px; 0px; 10px'

                    keyTimes = '0; 0.055; 0.100; 0.125; 0.159; 0.182; 0.202; 0.236; 0.268; 0.326; 0.357; 0.400; 0.408; 0.461; 0.493; 0.513;  1'
                     
                    repeatCount = "indefinite" />
            </feMerge>
            
            <feMerge>
                <feMergeNode in="SourceGraphic" />  

                <feMergeNode in="merge1" /> 
            <feMergeNode in="merge2" />

            </feMerge>
        </filter>

    </defs>

<g>
    <text x="0" y="100">Lyrics Search</text>
</g>
</svg>

        
<form method="post">
    <div class="content">
      	<input type="text" name="search" class="search" id="search" placeholder="name of music + name of singer" autocomplete="off">
    </div>
    
</form>

        
        
        
        
        
        
        
        
        
        
        
        
        

</body>
</html>