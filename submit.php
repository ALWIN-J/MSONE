<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from viavilab.com/codecanyon/movie_review_demo/ by HTTrack Website Copier/3.x [XR&CO'2017], Thu, 19 Sep 2019 12:25:22 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<meta charset="utf-8">
<title>Msone</title>
<base  />
<link rel="stylesheet" href="css/bootstrap.css" media="screen" />
<link rel="stylesheet" href="css/font-awesome.css" media="all" />
<link rel="stylesheet" href="css/superfish.css" media="all" />
<link rel="stylesheet" href="css/awesome-weather.css" media="all" />
<link rel="stylesheet" href="css/owl.carousel.css" media="all" />
<link rel="stylesheet" href="css/owl.theme.css" media="all" />
<link rel="stylesheet" href="css/flexslider.css" media="all" />
<link rel="stylesheet" href="css/prettyPhoto.css" media="all" />
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="css/example.css">
<link rel="stylesheet" href="css/extra.css">
<link href="css/responsive.css" rel="stylesheet">
<script src="js/modernizr.custom.60104.js"></script>
<link href='../../../external.html?link=http://fonts.googleapis.com/css?family=Roboto+Slab:400,300,700' rel='stylesheet' type='text/css'>
<link href='../../../external.html?link=http://fonts.googleapis.com/css?family=News+Cycle:400,700' rel='stylesheet' type='text/css'>
<link href='../../../external.html?link=http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
<link href='../../../external.html?link=http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,400italic' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="administrator/img/favicon.html">
<script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
<script>
  function getCookie(name) {
  var value = "; " + document.cookie;
  var parts = value.split("; " + name + "=");
  if (parts.length == 2) return parts.pop().split(";").shift();
  }
  function is_logged()
  {
    var user=getCookie('user');
    if(user==null)
    {
      alert("You must be logged in");
      location.href='registration-login.html';
    }
    else
    {
      document.getElementById('user_label').innerHTML=user;
    }
  }
  function logout()
  {
    document.cookie.split(";").forEach(function(c) { document.cookie = c.replace(/^ +/, "").replace(/=.*/, "=; expires=Thu, 01-Jan-1970 00:00:01 GMT;path=/"); });
    location.href='registration-login.html';
  }
  var plot="";
  function lan(x)
  {
     //alert(x);
      var en=document.getElementById('en');
      var ml=document.getElementById('ml');
      

    if(x=='0')
    {
      en.style.backgroundColor='white';
      en.style.color='black';
      ml.style.backgroundColor='black';
      ml.style.color='white';
      var temp=$('#ploten').val();
      $('#ploten').val(window.plot);
      window.plot=temp;
    }
    else
    {
      ml.style.backgroundColor='white';
      ml.style.color='black';
      en.style.backgroundColor='black';
      en.style.color='white';
      var temp=$('#ploten').val();
      $('#ploten').val(window.plot);
      window.plot=temp;
    }  
  }
  get();
  function  get()
  {
    var urlParams = new URLSearchParams(window.location.search);
    var id=urlParams.get('id');
    var xml=new XMLHttpRequest();
    xml.open("get","get.php?by=subdet&i="+id,"true");
    xml.send();
    xml.onreadystatechange=function ()
    {
      if(this.readyState==4)
      {
        var res=this.responseText;
        res=JSON.parse(res);
        $('#ti').html(res['Title']);
        $('#di').val(res['Director']);
        $('#wr').val(res['Writer']);
        $('#ye').val(res['Year']);
        $('#ratd').val(res['Rated']);
        $('#ru').val(res['Runtime']);
        $('#ge').val(res['Genre']);
        $('#iv').val(res['ImdbVote']);
        $('#ac').val(res['Actors']);
        $('#la').val(res['Languages']);
        $('#co').val(res['Country']);
        $('#aw').val(res['Awards']);
        $('#ra').val(res['Ratings']);
        $('#id').val(res['ImdbId']);
        $('#re').val(res['Released']);
        $('#pr').val(res['Production']);
        $('#filmid').val(res['ImdbId']);
        $('#bo').val(res['BoxOffice']);
        $('#ploten').val(res['Plot']);
          //alert($('#filmid').val());
        $('#pos').attr('src','posters/'+res['_id']+'.jpg');
        //window.plot=trans(res['Plot']);
        //alert(trans('hello'));
        trans(res['Plot']);
        
      }
    }
  }
  var mlplot="";
function trans(text)
{
  var res="";
  var url="https://translate.googleapis.com/translate_a/single?client=gtx&sl=en&tl=ml&dt=t&q="+text;
  var xml=new XMLHttpRequest();
  xml.open("get",url,"true");
  xml.send();
  xml.onreadystatechange=function ()
  {
    if(xml.readyState==4&&xml.status==200)
    {
      var j=JSON.parse(this.responseText);
      for (var i = 0; i < j[0].length; i++) {
        res+=j[0][i][0];
      }
      window.plot=res;
      window.mlplot=res;
    }
    else if(this.readyState==0)
      alert('eror')

  }
}
function  subm()
{
  var xml=new XMLHttpRequest();
  var urlParams = new URLSearchParams(window.location.search);
  var id=urlParams.get('id');
  xml.open("POST","get.php?by=subplot","true");
  xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  //alert(id);
  xml.send("mlplot="+window.mlplot+"&id="+id);
  xml.onreadystatechange=function()
  {
    if(xml.readyState==4)
    {
      //alert(this.responseText);
      $('#form').submit();
    }
  }
  //$('#form').submit();
  //alert('kk');
}
  </script>
  <style type="text/css">
    #user_label_i
    {
      font-weight: bolder;
      border: 1px solid white;
      padding: 1px;
    }

    .entry-thumb
    {
      border: 3px solid white;
      transition: .5s ease;
    }
    #subhead
    {
      font-family: avenir;
      align-content: center;
      left: 40%;  
      top:-50%;
      border: 2px solid white;
      width:20%;
      padding: 6px;
      color:white;
      border-radius: 10px;
      background-color: rgba(255,0,40,1);
    }
    .entry-thumb:hover
    {
      border: 3px solid red;
      box-shadow: 0px 0px 50px;
    }
    #main
    {
      width: 100%;
      position: relative;
      height: 100%;
      padding: 1%;  

      border: 1px solid black;
      align-self: center;
    }
    #content
    {
      align-self: center;
      background-color: white;
      padding: 3%;
      align-self: center;
      border: 1px solid red;
      border-radius: 5px 30px;
      font-family: avenir;
    }
    .l
    {
      width:50%;
      position: absolute;
    }
    h2
    {
      align-content: center;
      position: relative;
      margin-bottom: 20px;
    }
    .inp
    {
      border:none;
      border-bottom: 1px solid red;
      outline: none;
      margin: 10px;
      font-size: 16px;
      background-color:rgba(1,1,1,0.02);
      width:125%;
    }
    label
    {
      font-size: 20px;
      padding: 
    }
    .s
    {
      display: inline-block;
      margin: 0px;
      padding: 15px;  
      background-color: rgba(20,20,20,0.1);
      width:28.5%;
      margin-top:-20px;
    }
    #s1
    {
     overflow-y: scroll;
     max-height:520px;
     border:1px solid red;
    }
    @font-face 
    {
     font-family: avenir;
     src:url(fonts/avenir.otf);
    }
    #s2,#s3
    { 
      position: absolute;
      height:520px;
    }
    #ploten{
      width:100%;
      height:380px;
      font-size: 17px;
      font-family:avenir;
      padding: 10px;
      height:480px;

    }
    #ti
    {
      background-color:rgba(255,0,50);
      color: white;
      font-size:30px;
      text-align:  center;  
      width:115%;
      text-transform:uppercase; 
    }
    .l
    {
      background-color: black;
      position: relative;
      margin-left: 0%;
      font-size: 20px;
      padding:4px;
      color:white;
      width: 20%;
      border:1px solid black;
      border-bottom:none; 
      cursor:pointer; 
    }
    #pos
    {
      min-width: 330px;
      border:1px solid red;
    }
    .l2
    {
        transform:0.3s ease;
    }
    .l1
    {
      background-color: white;
      color:black;
    }
    #s3
    {
      left:59%;
      width:24%;
    }
    #en
    {
      transform:0.3s ease;
    }
    #ml
    {
      transform:0.3s ease;
    }
    #srtfile
    {
      position:absolute;top:26%;width:45%;height:  10%;opacity:0;
    }
    #srtbut,#sub
    {
      width:45%; 
      height: 100%;
      background-color:  rgba(255,0,50);
      color:white;
      font-size: 20px;
      border:1px solid rgba(1,1,1,0);
      transition:  0.3s ease;
      margin-top:30%;
    }
    #srtfile:hover + #srtbut
    {
      border:1px solid rgba(1,1,1,1);
      font-size: 25px;
      box-shadow:0px 5px 5px black;
      text-shadow:0px 2px 2px black;
    }
    #sub:hover
    {
      border:1px solid rgba(1,1,1,1);
      font-size: 25px;
      box-shadow:0px 5px 5px black;
      text-shadow:0px 2px 2px black;
    }
  </style>
</head>

<body class="kp-home-2">
<div class="kp-header">
  <div id="header-top">
    <div class="wrapper clearfix">      
      <nav id="top-nav" class="pull-left">
        <ul id="top-menu" class="clearfix" >
          <li><a href="index.html">Home</a></li>
          <li><a href="#"></a></li>
                     <li><a href="registration-login.html">Registration / Login</a></li>
                     </ul>
      </nav>
      <ul class="socials-link clearfix pull-right">
        <li><a href="../../../external.html?link=https://facebook.com/ " target="_blank" class="fa fa-facebook"></a></li>
        <li><a href="../../../external.html?link=https://twitter.com/ " target="_blank" class="fa fa-twitter"></a></li>
        <li><a href="../../../external.html?link=https://twitter.com/ " target="_blank" class="fa fa-google-plus"></a></li>
        <li><a href="../../../external.html?link=https://login.skype.com/login" target="_blank" class="fa fa-skype"></a></li>
        </ul>
    </div>
  </div>
  <div id="header-middle" style="height:150px;">
    <div class="wrapper clearfix">      
      <div id="logo-image" class="pull-left">
      <a href="index.html">
      <img src="upload/og.png" style="width: 30%" />    
      </a>
       <h2 id=subhead>New Submission</h2>
      </div>
     
      <nav id="main-nav" class="pull-right">
        <ul id="main-menu" class="clearfix">
          <li><a href="index.html">Home</a></li>
          <li id="user_label_i"><a onclick="logout()"><span id=user_label></span>&nbsp&nbsp&nbsp<i class="fa fa-power-off"></i></a></li>
          
        </ul>
        <i class='fa fa-align-justify'></i>
        <ul id="mobile-menu">
          <li> <a href="index.html">Home</a></li>
          <li> <a>categories</a>
            <ul>
                                          <li> <a href="category/2.html">Tamil</a></li>
                          <li> <a href="category/5.html">Hindi</a></li>
                          <li> <a href="category/6.html">Nepali</a></li>
                          <li> <a href="category/7.html">Teluga</a></li>
                          <li> <a href="category/8.html">English</a></li>
                         </ul>
          </li>
         <li><a>Genres</a>
          <ul>
                                        <li><a href="genres/1.html">Dance</a></li>
                        <li><a href="genres/3.html">Romance</a></li>
                        <li><a href="genres/6.html">Comedy</a></li>
                        <li><a href="genres/7.html">Action</a></li>
                        <li><a href="genres/9.html">Animation</a></li>
                        <li><a href="genres/10.html">Musical</a></li>
                         </ul>
          </li>
          <li><a href="actors.html">Actors</a></li>
          <li><a href="contact.html"><i class="fa fa-off"></i></a></li>
        </ul>
      </nav>      
    </div>
  </div>
</div>



<div id=main>
     
  <div id=content>
  <table class=s id=s1>

   <tr>
    <td colspan="2"><label class=inp id=ti></label></td>
   </tr>
   <tr>
    <td><label>Director</label></td>
    <td><input class=inp type=text id=di></td>
   </tr>
   <tr>
    <td><label>Writer</label></td>
    <td><input class=inp type=text id=wr></td>
   </tr>
   <tr>
    <td><label>Year</label></td>
    <td><input class=inp type=text id=ye></td>
   </tr>
   <tr>
    <td><label>Rated</label></td>
    <td><input class=inp type=text id=ratd></td>
   </tr>
   <tr>
    <td><label>Production</label></td>
    <td><input class=inp type=text id=pr></td>
   </tr>
   <tr>
    <td><label>Released</label></td>
    <td><input class=inp type=text id=re></td>
   </tr>
   <tr>
    <td><label>Runtime</label></td>
    <td><input class=inp type=text id=ru></td>
   </tr>
   <tr>
    <td><label>Genre</label></td>
    <td><input class=inp type=text id=ge></td>
   </tr>   
   <tr>
    <td><label>ImdbVote</label></td>
    <td><input class=inp type=text id=iv></td>
   </tr>
   <tr>
    <td><label>Actors</label></td>
    <td><input class=inp type=text id=ac></td>
   </tr>
   <tr>
    <td><label>Languages</label></td>
    <td><input class=inp type=text id=la></td>
   </tr>
   <tr>
    <td><label>Country</label></td>
    <td><input class=inp type=text id=co></td>
   </tr>
   <tr>
    <td><label>Awards</label></td>
    <td><input class=inp type=text id=aw></td>
   </tr>
   <tr>
    <td><label>Ratings</label></td>
    <td><input class=inp type=text id=ra></td>
   </tr>
   <tr>
    <td><label>ImdbId</label></td>
    <td><input class=inp type=text id=id></td>
   </tr>
   <tr>
    <td><label>BoxOffice</label></td>
    <td><input class=inp type=text id=bo></td>
   </tr>
  </table>


  <span class=s id=s2>

   <div>
    <div><span class="l l1" id=en onclick="lan(0)">english</span><span id=ml class="l l2" onclick="lan(1)">malayalam</span></div>
    <textarea id=ploten></textarea>
  </div>
  </span>
  <span class=s id=s3>
      <img src='posters/18.jpg' id=pos>
  </span>
  <span class=s style="position: absolute; left: 83.2%;height: 83%;">
  <form method=post enctype='multipart/form-data' id=form action=sub.php>
    <input type=file style="" id=srtfile name=srt>
    <input type=hidden name=filmid value="" id=filmid>
    <input type=button value='Add SRT' style='' id=srtbut><br>
    <input type=button onclick="subm()" id=sub value='Submit' name=sub>
  </form>
  </span>
  </div>
</div>
     
      <div class="widget kp-adv-widget"> <a href="../../../external.html?link=https://www.facebook.com/" target="_blank"><img src="upload/17770_banner-1.html" alt="" /></a> </div>
    </div>  
     
      <div class="widget kp-adv-widget"> <a href="../../../external.html?link=https://www.facebook.com/" target="_blank"><img src="upload/17770_banner-1.html" alt="" /></a> </div>
    </div>  


     
      <div class="widget kp-adv-widget"> <a href="../../../external.html?link=https://www.facebook.com/" target="_blank"><img src="upload/17770_banner-1.html" alt="" /></a> </div>
    </div>  
     
      <div class="widget kp-adv-widget"> <a href="../../../external.html?link=https://www.facebook.com/" target="_blank"><img src="upload/17770_banner-1.html" alt="" /></a> </div>
    </div> 



      <div class="clear"></div>
  </div>
</div>
<script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
<script type="text/javascript">                                     
$(document).ready(function()
{ $("#ajax-contact-form").submit(function() { 
 jQuery("#submit").attr("value", "Sending...");
               
var str = $(this).serialize(); $.ajax( { type: "POST", url: "send.php", data: str, success: function(msg)
            { if(msg == 'OK') // Message Sent? Show the 'Thank You' message and hide the form
              { result = '<div class="notification_ok">Your message has been sent. Thank you!<br> <a href="#" onclick="freset();return false;">send another mail</a></div>'; 
              jQuery("#submit").attr("value", "Signup");
               }              else
              { result = msg; } $("#note").html(result); } 
        }); return false; }); });
function freset()
{   $("#note").html('');  document.getElementById('ajax-contact-form').reset();   $("#fields").show();}

</script>
<div id="bottom-sidebar">
  <div class="wrapper">
    <div class="row">
    <div class="col-md-4 col-sm-4">
        <div class="widget kp-twitter-widget">
          <h6 class="widget-title clearfix"> <i class="fa fa-th-list"></i> <span class="pull-left">Genres Category</span> </h6>
          <div id="footer_nav">
              <ul>
                                                <li><i class="fa fa-angle-double-right"></i>  <a href="genres/1.html">Dance</a></li>
                          <li><i class="fa fa-angle-double-right"></i>  <a href="#">Romance</a></li>
                          <li><i class="fa fa-angle-double-right"></i>  <a href="#">Comedy</a></li>
                          <li><i class="fa fa-angle-double-right"></i>  <a href="#">Action</a></li>
                          <li><i class="fa fa-angle-double-right"></i>  <a href="#">Animation</a></li>
                          <li><i class="fa fa-angle-double-right"></i>  <a href="#">Musical</a></li>
                               
             </ul>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-4">
        <!--
        <div class="widget kp-latest-comments-widget">
          <h6 class="widget-title clearfix"> <i class="fa fa-comments-o pull-left"></i> <span class="pull-left">Recent Movie</span> </h6>
          <ul class="clearfix">
                      <li>
              <article class="entry-item clearfix">
                <div class="entry-thumb pull-left"><a href="prem-ratan-dhan-payo--251.html"><img src="upload/12765_maxresdefault.png" alt="" width="90" height="65" /></a> </div>
                <div class="entry-content">
                 <h6 class="entry-title"><a href="prem-ratan-dhan-payo--251.html">Prem Ratan Dhan Payo </a></h6>
                  <span class="entry-date clearfix"><i class="fa fa-clock-o pull-left"></i><span class="pull-left">Oct 2015</span></span> </div>
              </article>
            </li>
                       <li>
              <article class="entry-item clearfix">
                <div class="entry-thumb pull-left"><a href="blackhat-54.html"><img src="upload/89807_blackhat.png" alt="" width="90" height="65" /></a> </div>
                <div class="entry-content">
                 <h6 class="entry-title"><a href="blackhat-54.html">Blackhat</a></h6>
                  <span class="entry-date clearfix"><i class="fa fa-clock-o pull-left"></i><span class="pull-left">Aug 2015</span></span> </div>
              </article>
            </li>
                       <li>
              <article class="entry-item clearfix">
                <div class="entry-thumb pull-left"><a href="avengers-age-of-ultron-318.html"><img src="upload/47006_avengers-age-of-ultron.png" alt="" width="90" height="65" /></a> </div>
                <div class="entry-content">
                 <h6 class="entry-title"><a href="avengers-age-of-ultron-318.html">Avengers Age Of Ultron</a></h6>
                  <span class="entry-date clearfix"><i class="fa fa-clock-o pull-left"></i><span class="pull-left">Aug 2015</span></span> </div>
              </article>
            </li>
              
          </ul>
        </div>
      -->
      </div>            
      <div class="col-md-4 col-sm-4">
        <div class="widget widget_text">
          <h6 class="widget-title clearfix"> <i class="fa fa-envelope"></i> <span class="pull-left">എന്താണ് എംസോൺ?</span> </h6>
          <p><p>ലോക സിനിമകള്‍ക്ക് ഇംഗ്ലീഷ് കൂടാതെ ഫ്രഞ്ച്, ജര്‍മന്‍, ഇറ്റാലിയൻ, സ്പാനിഷ്, അറബ് അങ്ങനെ എല്ലാ ഭാഷകള്‍ക്കും സബ്ടൈറ്റില്‍ ലഭ്യമാണ്. എന്തുകൊണ്ട് മലയാളത്തിലും അത് ലഭ്യമാക്കിക്കൂടാ എന്ന ആശയത്തിൽ നിന്നാണ് എംസോൺ പിറക്കുന്നത്.
നമ്മുടെ മാതൃഭാഷയായ മലയാളത്തില്‍ ക്ലാസിക്കുകളായ സിനിമകള്‍ക്ക് സബ്ടൈറ്റില്‍ ലഭ്യമാക്കുക എന്നതായിരുന്നു  എംസോണിന്റെ പ്രാഥമിക ദൗത്യം.  എന്നാൽ പ്രേക്ഷകരുടെ പ്രോഹത്സാഹനവും ആവശ്യങ്ങളും മാനിച്ച് ക്ലാസ്സിക് ഇതര സിനിമകളും പ്രസിദ്ധീകരിക്കുന്നുണ്ട് ഇപ്പോൾ. കൂടാതെ ഇന്ത്യയിലെ ഇതര ഭാഷാ സിനിമകളുടേയും പരിഭാഷകൾ പ്രസിദ്ധീകരിക്കുന്നു. ഇപ്പോഴത് തമിഴ് സിനിമകളുടെ വരെ പരിഭാഷയിലെത്തി നിൽക്കുന്നു.</p>

 </p>
        </div><!--
        <div class="widget kp-newsletter-widget">
          <form id="ajax-contact-form" action="javascript:alert('success!');" method="post" class="newsletter-form clearfix">
            <p class="input-email clearfix">
              <input type="text" name="email" placeholder="Type your e-mail adress" class="email" size="40" required="required">
              <input type="submit" value="Send Up" class="submit" id="submit">
            </p>
          </form>
          <div id="newsletter-response"></div>
          </div>
        -->
      </div>
    </div>
  </div>
  <p id="back-top"> <a href="#top"></a> </p>
</div>
<footer id="kp-footer">
</footer>
<script src="js/jquery-1.10.2.min.js"></script> 
<script src="js/retina.js"></script> 
<script type="text/javascript" src="../../../external.html?link=http://maps.google.com/maps/api/js?sensor=true"></script> 
<script src="js/gmaps.js"></script>
<script src="js/bootstrap.min.js"></script> 
<script src="js/custom.js" charset="utf-8"></script>
</body>

<!-- Mirrored from viavilab.com/codecanyon/movie_review_demo/ by HTTrack Website Copier/3.x [XR&CO'2017], Thu, 19 Sep 2019 12:28:58 GMT -->
</html>
<script type="text/javascript">
  
  is_logged();
</script> 
