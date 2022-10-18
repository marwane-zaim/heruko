  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" href="css/styles.css">
<style>
 @import url('https://fonts.googleapis.com/css?family=Raleway:400,700');
 *, *:before, *:after {
   box-sizing: border-box;
}
 body {
   min-height: 100vh;
   font-family: 'Raleway', sans-serif;
   background: #E8C8B9;
}
button {
  background: transparent;
  width: 240px;
  border: 0;
  cursor: pointer;
  padding: 0;
}

.ear-left-outer, .ear-right-outer {fill:#919191;}
.ear-left-inner, .ear-right-inner {fill:#6D6D6D;}
.eye-right-outer, .eye-left-outer, .nostril-right-outer, .nostril-left-outer, .body {fill:#AAAAAA;}
.eye-right-inner, .eye-left-inner {fill:#FFFFFF;}
.nostril-right-inner, .nostril-left-inner{fill:#8C8C8C;}
.freckle {fill:#7C7C7C;}
.tongue {fill:#FF4848;}
.tooth-left, .tooth-right {fill:#FFFFE1;}
 .container {
   position: absolute;
   width: 100%;
   height: 100%;
   overflow: hidden;
}
 .container:hover .top:before, .container:active .top:before, .container:hover .bottom:before, .container:active .bottom:before, .container:hover .top:after, .container:active .top:after, .container:hover .bottom:after, .container:active .bottom:after {
   margin-left: 200px;
   transform-origin: -200px 50%;
   transition-delay: 0s;
}
 .container:hover .center, .container:active .center {
   opacity: 1;
   transition-delay: 0.2s;
}
 .top:before, .bottom:before, .top:after, .bottom:after {
   content: '';
   display: block;
   position: absolute;
   width: 200vmax;
   height: 200vmax;
   top: 50%;
   left: 50%;
   margin-top: -100vmax;
   transform-origin: 0 50%;
   transition: all 0.5s cubic-bezier(0.445, 0.05, 0, 1);
   z-index: 10;
   opacity: 0.65;
   transition-delay: 0.2s;
}
 .top:before {
   transform: rotate(45deg);
   background: #e46569;
}
 .top:after {
   transform: rotate(135deg);
   background: #ecaf81;
}
 .bottom:before {
   transform: rotate(-45deg);
   background: #60b8d4;
}
 .bottom:after {
   transform: rotate(-135deg);
   background: #3745b5;
}
 .center {
   position: absolute;
   width: 400px;
   height: 400px;
   top: 50%;
   left: 50%;
   margin-left: -200px;
   margin-top: -200px;
   display: flex;
   flex-direction: column;
   justify-content: center;
   align-items: center;
   padding: 30px;
   opacity: 0;
   transition: all 0.5s cubic-bezier(0.445, 0.05, 0, 1);
   transition-delay: 0s;
   color: #333;
}
 .center input {
   width: 100%;
   padding: 15px;
   margin: 5px;
   border-radius: 1px;
   border: 1px solid #ccc;
   font-family: inherit;

}
.login100-form-btn {
  font-family: Montserrat-Bold;
  font-size: 15px;
  line-height: 1.5;
  color: #fff;
  text-transform: uppercase;

  width: 100%;
  height: 50px;
  border-radius: 25px;
  background: #6595e0;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 0 25px;

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;
}

.tooltip {
  position: relative;
  display: inline-block;

}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: #868280;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  position: absolute;
  z-index: 1;
  bottom: 100%;
  left: 50%;
  margin-left: -60px;
  
  /* Fade in tooltip - takes 1 second to go from 0% to 100% opac: */
  opacity: 0;
  transition: opacity 1s;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
  opacity: 1;
}
  
</style>
<?php include('header.php'); ?>


<div class="container" >
  <div class="top"></div>
  <div class="bottom"></div>
  <div class="center">

        <form class="login100-form validate-form" id="login_form3"  method="post">
   <center><h2>Se Connecter</h2></center> 
    <input type="text" id="username" name="username" placeholder="Identifiant" required/>
    <input type="password" id="password" name="password" placeholder="Mor de Passe" required/>

    <br><br>

    <div class="container-login100-form-btn">




<div class="tooltip">
           <button id="signin" name="login" type="submit">
             <span class="tooltiptext">Se Connecter</span>

    <svg viewBox="0 0 242 109" xmlns="http://www.w3.org/2000/svg">
      <g class="ears">
        <g class="ear-left">
          <ellipse class="ear-left-outer" transform="matrix(0.9391 -0.3436 0.3436 0.9391 -3.6062 17.8444)" cx="48.5" cy="19.1" rx="11.4" ry="13.8"/>
          <ellipse class="ear-left-inner" transform="matrix(0.9391 -0.3436 0.3436 0.9391 -3.8876 17.4659)" cx="47.3" cy="19.7" rx="7.3" ry="11.2"/>
        </g>
        <g class="ear-right">
          <ellipse class="ear-right-outer" transform="matrix(0.3436 -0.9391 0.9391 0.3436 106.5379 189.869)" cx="189.1" cy="18.7" rx="14.4" ry="11.9"/>
          <ellipse class="ear-right-inner" transform="matrix(0.3436 -0.9391 0.9391 0.3436 106.8522 191.5127)" cx="190.4" cy="19.3" rx="11.7" ry="7.7"/>
        </g>
      </g>
      <g class="eyes">
        <g class="eye-right">
          <path class="eye-right-outer" d="M174.9,27H186c0-0.3,0-0.7,0-1c0-14.4-11.6-26-26-26c-14.4,0-26,11.6-26,26 c0,0.3,0,0.7,0,1h6.1H174.9z"/>
          <path class="eye-right-inner" d="M175,25c0-11-7.8-20-17.5-20S140,14,140,25c0,0.7,0,1.3,0.1,2h34.8 C175,26.3,175,25.7,175,25z"/>
          <defs>
            <clipPath id="eye-right-clip" fill="#ffffff">
              <path d="M175,25c0-11-7.8-20-17.5-20S140,14,140,25c0,0.7,0,1.3,0.1,2h34.8 C175,26.3,175,25.7,175,25z"/>
            </clipPath>
          </defs>
          <g clip-path="url(#eye-right-clip)">
            <circle class="eye-right-pupil" cx="158" cy="18" r="5"/>
          </g>
        </g>
        <g class="eye-left">
          <path class="eye-left-outer" d="M96.9,27h6.1c0-0.3,0-0.7,0-1c0-14.4-11.6-26-26-26C62.6,0,51,11.6,51,26 c0,0.3,0,0.7,0,1h11.1H96.9z"/>
          <path class="eye-left-inner" d="M97,25c0-11-7.8-20-17.5-20S62,14,62,25c0,0.7,0,1.3,0.1,2h34.8C97,26.3,97,25.7,97,25z" />
          <defs>
            <clipPath id="eye-left-clip">
              <path d="M97,25c0-11-7.8-20-17.5-20S62,14,62,25c0,0.7,0,1.3,0.1,2h34.8C97,26.3,97,25.7,97,25z" />
            </clipPath>
          </defs>
          <g clip-path="url(#eye-left-clip)">
            <circle class="eye-left-pupil" cx="80" cy="17.7" r="5"/>
          </g>
        </g>
      </g>
      <g class="nostrils">
        <g class="nostril-right">
          <ellipse class="nostril-right-outer" cx="130.5" cy="27.5" rx="6.5" ry="5.5"/>
          <circle class="nostril-right-inner" cx="130" cy="28" r="4"/>
        </g>
        <g class="nostril-left">
          <ellipse class="nostril-left-outer" cx="106.5" cy="27.5" rx="6.5" ry="5.5"/>
          <circle class="nostril-left-inner" cx="107" cy="28" r="4"/>
        </g>
      </g>
      <path class="body" d="M218,98H24C10.8,98,0,87.2,0,74V51c0-13.2,10.8-24,24-24h194c13.2,0,24,10.8,24,24v23 C242,87.2,231.2,98,218,98z"/>
      <g class="freckles">
        <circle class="freckle" cx="13.7" cy="41.4" r="1.6"/>
        <circle class="freckle" cx="20.1" cy="44.7" r="1.6"/>
        <circle class="freckle" cx="19.6" cy="37.8" r="1.6"/>
      </g>
      <defs>
        <clipPath id="mouthClip">
          <path fill="#ffffff" d="M218,98H24C10.8,98,0,87.2,0,74V51c0-13.2,10.8-24,24-24h194c13.2,0,24,10.8,24,24v23 C242,87.2,231.2,98,218,98z"/>
        </clipPath>
      </defs> 
      <g class="mouth" clip-path="url(#mouthClip)">
        <g class="mouth-pieces">
          <path class="mouth-back" d="M23.6,168.2l-3-56.1c0-7.8,6.4-14.1,14.1-14.1h172.4c7.8,0,14.1,6.4,14.1,14.1l-3,56.1"/>
          <path class="tongue" d="M174.9,168.2c-7.3-5-24.5-9.9-54.8-9.9s-48,5.1-54.8,9.9"/>
        </g>
      </g>
      <g class="teeth">
        <path class="tooth-left" d="M115,97.9v7.5c0,2-1.7,3.6-3.6,3.6H89.7c-2,0-3.6-1.7-3.6-3.6v-7.5H115z"/>
        <path class="tooth-right" d="M154,97.9v7.5c0,2-1.7,3.6-3.6,3.6h-21.7c-2,0-3.6-1.7-3.6-3.6v-7.5H154z"/>
      </g>
    </svg>    
    

  </button>

  <script src="https://cdn.jsdelivr.net/npm/gsap@3.0.1/dist/gsap.min.js"></script>
  <script src="js/app.js"></script>
          </div>
  <script type="text/javascript">
                            $(document).ready(function(){
                              $('#signin').tooltip('show');
                              $('#signin').tooltip('hide');
                            });
                            </script>

  </div>
  </form>
  </div>
  <script>
            jQuery(document).ready(function(){
            jQuery("#login_form3").submit(function(e){
                e.preventDefault();
                var formData = jQuery(this).serialize();
                $.ajax({
                  type: "POST",
                  url: "login.php",
                  data: formData,
                  success: function(html){
                  if(html=='true')
                  {
                  $.jGrowl("", { sticky: true });
                  $.jGrowl("", { header: '' });
                  var delay = 1000;
                    setTimeout(function(){ window.location = 'dasboard_teacher.php'  }, delay);  
                  }else if (html == 'true_student'){
                    $.jGrowl("", { header: 'Access Granted' });
                  var delay = 1000;
                    setTimeout(function(){ window.location = 'dashboard_student.php'  }, delay);  
                  }else
                  {
                  $.jGrowl("", { header: '' });
                  }
                  }
                });
                return false;
              });
            });
            </script>


            <script type="text/javascript">
                            $(document).ready(function(){
                              $('#signin_student').tooltip('show'); $('#signin_student').tooltip('hide');
                            });
            </script> 

            

            <script type="text/javascript">
                            $(document).ready(function(){
                              $('#signin_teacher').tooltip('show'); $('#signin_teacher').tooltip('hide');
                            });
            </script>

</div>
  <?php include('script.php'); ?>