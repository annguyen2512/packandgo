<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">    
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type ="text/css" href="vendors/css/normalize.css">
    <link rel="stylesheet" type ="text/css" href="vendors/css/ionicons.min.css">
    <link rel="stylesheet" type ="text/css" href="vendors/css/grid.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,300i,400" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type ="text/css" href="resource/css/style3.css">

         <meta charset="UTF-8">
    <script src="./resource/js/jquery-1.9.1.js"></script>
    <script src="./resource/js/script.js"></script>
    <title>travelmate</title>

      <script src="./resource/js/jquery-1.9.1.js"></script>
    <script src="./resource/js/script.js"></script>

    <script>

      $(function () {
        $('.contact-form').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: '/packandgo/get_feedback.php',
            data: $('.contact-form').serialize(),
            success: function () {
                $('.contact-form')[0].reset();
              alert('Feedback was submitted');
            }
          });

        });

        $('.register-form').on('submit', function (e) {

          e.preventDefault();

        var data = new FormData(this); 

        $.ajax({
            type: 'post',
            url: '/packandgo/register.php',
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            success: function (data) {
               var obj = jQuery.parseJSON(data);
                if(obj.message == "Success") {
                  $('.register-form')[0].reset();
                  document.getElementById('register').style.display = "none";

                  alert('Register successful');

                  // Append say hello and logout
                       
                 $('.main-nav li:last').remove();
                 $('.main-nav li:last').remove();

                 $( ".main-nav" ).append( " <li><a href='#'>Hello, " + obj.data.name + "</a></li>" );
                 $( ".main-nav" ).append( "<li><a href='./logout.php'>Logout</a></li>" );
               }else if(obj.message == "Fail"){
                  alert(obj.data);
               }else{
                  alert("Register Fail");
               }
            }
          });

        });

        $('.login-form').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: '/packandgo/login.php',
            data: $('.login-form').serialize(),
            success: function (data) {
                var obj = jQuery.parseJSON(data);
                console.log(obj);
                if(obj.message == "Success") {
                    
                     $('.login-form')[0].reset();
                     document.getElementById('login').style.display = "none";
                     // Append say hello and logout
                      
                     $('.main-nav li:last').remove();
                     $('.main-nav li:last').remove();

                     $( ".main-nav" ).append( " <li><a href='#'>Hello, " + obj.data.name + "</a></li>" );
                     $(".main-nav" ).append (" <li><a href='./logout.php'>Logout</a></li>");
                   }else{
                  alert("Login Fail");
                }
              
            }
          });

        });

      });
    </script>

    </head>
<body>

<header id="places">
        <nav>
    <div class ="row">
    <a href="index.php"><img src="resource/css/img/logo1.jpg" alt="Pack&gologo" class ="logo"></a>
    <ul class ="main-nav">
    <li><a href="#">About us</a></li>
    <li><a href="travelmate.php">Travel mate</a></li>
    <li><a href="places.php">Our Places</a></li>
   
     <?php
	   if (isset($_SESSION['email']) && $_SESSION['email'] != '') {
	      echo "<li><a href='#'>Hello, ".$_SESSION['name']."</a></li>";
	      echo "<li><a href='./logout.php'>Logout</a></li>"; 
	   }else{
	      echo "<li><a href='#register' id='click-register'   style='width:auto;'>Sign up</a></li>";         
	      echo "<li><a id='click-login' href='#login' style='width:auto;'>Login</a></li>";               
	   }
    ?>
   </ul>  
        
            </div></nav></header>

<div class="introduction">
  <div class="wrapper">
    <h1>Fabulous Places</h1>
    <p id="intro">Welcome to our super amazing places. We will take you to somewhere Google cannot search. It is all about discovery, challenges, expenditures which you won't ever forget. BOOK NOW.</p>
  </div>
</div>
    
    
<div class="flexsearch">
		<div class="flexsearch--wrapper">
			<form class="flexsearch--form" action="#" method="post">
				<div class="flexsearch--input-wrapper">
					<input class="flexsearch--input" type="search" placeholder="Enter your destination">
				</div>
				<input class="flexsearch--submit" type="submit" value="&#10140;"/>
			</form>
		</div>
</div>
    
    
    
<ul class="products">
  <li class="product"> 
    <div class="product__content">
      <h2>CAVES DISCOVERY</h2>
      <p class="price">$336.99</p>
         <p class="details"><a href="#">More info</a></p>
      <p>A great description that explains what this product is all about. Here's what you get!</p>
      <ul class="features">
        <li>This thing</li>
        <li>That thing</li>
        <li>And of course the other thing that's really essential</li>
      </ul>
      <button value="336.99">Book Now</button>
      <div class="icon__check"></div>
    </div>
  </li>
  <li class="product"> 
    <div class="product__content">
      <h2>CAU ISLAND</h2>
      <p class="price">$122.99</p>
         <p class="details"><a href="#">More info</a></p>
      <p>A great description that explains what this product is all about. Here's what you get!</p>
      <ul class="features">
        <li>This thing</li>
        <li>That thing</li>
        <li>And of course the other thing that's really essential</li>
      </ul>
      <button value="122.99">Book Now</button>
      <div class="icon__check"></div>
    </div>
  </li>
  <li class="product"> 
    <div class="product__content">
      <h2>North East Adventure</h2>
      <p class="price">$511.99</p>
         <p class="details"><a href="#">More info</a></p>
      <p>A great description that explains what this product is all about. Here's what you get!</p>
      <ul class="features">
        <li>This thing</li>
        <li>That thing</li>
        <li>And of course the other thing that's really essential</li>
      </ul>
      <button value="511.99">Book Now</button>
      <div class="icon__check"></div>
    </div>
  </li>
  <li class="product"> 
    <div class="product__content">
      <h2>Cham Island</h2>
      <p class="price">193.99</p>
         <p class="details"><a href="#">More info</a></p>
      <p>A great description that explains what this product is all about. Here's what you get!</p>
      <ul class="features">
        <li>This thing</li>
        <li>That thing</li>
        <li>And of course the other thing that's really essential</li>
      </ul>
      <button value="193.99">Book Now</button>
      <div class="icon__check"></div>
    </div>
  </li>
  <li class="product"> 
    <div class="product__content">
      <h2>5 Waterfalls in 1 day</h2>
      <p class="price">$122.99</p>
         <p class="details"><a href="#">More info</a></p>
      <p>A great description that explains what this product is all about. Here's what you get!</p>
      <ul class="features">
        <li>This thing</li>
        <li>That thing</li>
        <li>And of course the other thing that's really essential</li>
      </ul>
      <button value="122.99">Book Now</button>
      <div class="icon__check"></div>
    </div>
  </li>
  <li class="product"> 
    <div class="product__content">
      <h2>Paradise trail in Central mountain</h2>
      <p class="price">$48.99</p>
         <p class="details"><a href="#">More info</a></p>
      <p>A great description that explains what this product is all about. Here's what you get!</p>
      <ul class="features">
        <li>This thing</li>
        <li>That thing</li>
        <li>And of course the other thing that's really essential</li>
      </ul>
      <button value="48.99">Book Now</button>
      <div class="icon__check"></div>
    </div>
  </li>
  <li class="product"> 
    <div class="product__content">
      <h2>Hiking race</h2>
      <p class="price">$24.99</p>
    <p class="details"><a href="#">More info</a></p>
      <p>A great description that explains what this product is all about. Here's what you get!</p>
      <ul class="features">
        <li>This thing</li>
        <li>That thing</li>
        <li>And of course the other thing that's really essential</li>
      </ul>
      <button value="24.99">Book Now</button>
      <div class="icon__check"></div>
    </div>
  </li>
  <li class="product"> 
    <div class="product__content">
      <h2>Climb the toughest mountain</h2>
      <p class="price">$69.99</p>
         <p class="details"><a href="#">More info</a></p>
      <p>A great description that explains what this product is all about. Here's what you get!</p>
      <ul class="features">
        <li>This thing</li>
        <li>That thing</li>
        <li>And of course the other thing that's really essential</li>
      </ul>
      <button value="69.99">Book Now</button>
      <div class="icon__check"></div>
    </div>
  </li>
</ul>
    
    
<div id="register" class="registerform">
<span onclick="document.getElementById('register').style.display='none'" class="close" title="Close">&times;</span>    
        <!-- <form class="register-form" action="/packandgo/register.php" method="post"> -->
        <form id ="register-form" class="register-form" action="" method="post" enctype="multipart/form-data">
 <div class="container">
      <h3>Sign Up</h3>
      <p>Please fill in this form to create an account.</p>
      <hr>
      <label for="name"><b>Name</b></label>
      <input type="text" placeholder="Input your name" name="signup_name" required>
      
      <label for="email"><b>Email</b></label>
      <input type="email" placeholder="Enter Email" name="email" required>
    
      <label for="gender"><b>Gender</b></label>
      </br>
      <label>
      <input type="radio" name="gender" id="female" value="female" checked > Female
      &nbsp;
      <input type="radio" name="gender" id="male" value="male"> Male
      </label>

      </br>
      </br>
      <label for="image"><b>Upload the image</b></label>
      <input type="file" name="image"><br>
      
      <label for="country"><b>Country</b></label>
      <select name="country" id="country">
	<option value="AFG">Afghanistan</option>
	<option value="ALA">Åland Islands</option>
	<option value="ALB">Albania</option>
	<option value="DZA">Algeria</option>
	<option value="ASM">American Samoa</option>
	<option value="AND">Andorra</option>
	<option value="AGO">Angola</option>
	<option value="AIA">Anguilla</option>
	<option value="ATA">Antarctica</option>
	<option value="ATG">Antigua and Barbuda</option>
	<option value="ARG">Argentina</option>
	<option value="ARM">Armenia</option>
	<option value="ABW">Aruba</option>
	<option value="AUS">Australia</option>
	<option value="AUT">Austria</option>
	<option value="AZE">Azerbaijan</option>
	<option value="BHS">Bahamas</option>
	<option value="BHR">Bahrain</option>
	<option value="BGD">Bangladesh</option>
	<option value="BRB">Barbados</option>
	<option value="BLR">Belarus</option>
	<option value="BEL">Belgium</option>
	<option value="BLZ">Belize</option>
	<option value="BEN">Benin</option>
	<option value="BMU">Bermuda</option>
	<option value="BTN">Bhutan</option>
	<option value="BOL">Bolivia, Plurinational State of</option>
	<option value="BES">Bonaire, Sint Eustatius and Saba</option>
	<option value="BIH">Bosnia and Herzegovina</option>
	<option value="BWA">Botswana</option>
	<option value="BVT">Bouvet Island</option>
	<option value="BRA">Brazil</option>
	<option value="IOT">British Indian Ocean Territory</option>
	<option value="BRN">Brunei Darussalam</option>
	<option value="BGR">Bulgaria</option>
	<option value="BFA">Burkina Faso</option>
	<option value="BDI">Burundi</option>
	<option value="KHM">Cambodia</option>
	<option value="CMR">Cameroon</option>
	<option value="CAN">Canada</option>
	<option value="CPV">Cape Verde</option>
	<option value="CYM">Cayman Islands</option>
	<option value="CAF">Central African Republic</option>
	<option value="TCD">Chad</option>
	<option value="CHL">Chile</option>
	<option value="CHN">China</option>
	<option value="CXR">Christmas Island</option>
	<option value="CCK">Cocos (Keeling) Islands</option>
	<option value="COL">Colombia</option>
	<option value="COM">Comoros</option>
	<option value="COG">Congo</option>
	<option value="COD">Congo, the Democratic Republic of the</option>
	<option value="COK">Cook Islands</option>
	<option value="CRI">Costa Rica</option>
	<option value="CIV">Côte d'Ivoire</option>
	<option value="HRV">Croatia</option>
	<option value="CUB">Cuba</option>
	<option value="CUW">Curaçao</option>
	<option value="CYP">Cyprus</option>
	<option value="CZE">Czech Republic</option>
	<option value="DNK">Denmark</option>
	<option value="DJI">Djibouti</option>
	<option value="DMA">Dominica</option>
	<option value="DOM">Dominican Republic</option>
	<option value="ECU">Ecuador</option>
	<option value="EGY">Egypt</option>
	<option value="SLV">El Salvador</option>
	<option value="GNQ">Equatorial Guinea</option>
	<option value="ERI">Eritrea</option>
	<option value="EST">Estonia</option>
	<option value="ETH">Ethiopia</option>
	<option value="FLK">Falkland Islands (Malvinas)</option>
	<option value="FRO">Faroe Islands</option>
	<option value="FJI">Fiji</option>
	<option value="FIN">Finland</option>
	<option value="FRA">France</option>
	<option value="GUF">French Guiana</option>
	<option value="PYF">French Polynesia</option>
	<option value="ATF">French Southern Territories</option>
	<option value="GAB">Gabon</option>
	<option value="GMB">Gambia</option>
	<option value="GEO">Georgia</option>
	<option value="DEU">Germany</option>
	<option value="GHA">Ghana</option>
	<option value="GIB">Gibraltar</option>
	<option value="GRC">Greece</option>
	<option value="GRL">Greenland</option>
	<option value="GRD">Grenada</option>
	<option value="GLP">Guadeloupe</option>
	<option value="GUM">Guam</option>
	<option value="GTM">Guatemala</option>
	<option value="GGY">Guernsey</option>
	<option value="GIN">Guinea</option>
	<option value="GNB">Guinea-Bissau</option>
	<option value="GUY">Guyana</option>
	<option value="HTI">Haiti</option>
	<option value="HMD">Heard Island and McDonald Islands</option>
	<option value="VAT">Holy See (Vatican City State)</option>
	<option value="HND">Honduras</option>
	<option value="HKG">Hong Kong</option>
	<option value="HUN">Hungary</option>
	<option value="ISL">Iceland</option>
	<option value="IND">India</option>
	<option value="IDN">Indonesia</option>
	<option value="IRN">Iran, Islamic Republic of</option>
	<option value="IRQ">Iraq</option>
	<option value="IRL">Ireland</option>
	<option value="IMN">Isle of Man</option>
	<option value="ISR">Israel</option>
	<option value="ITA">Italy</option>
	<option value="JAM">Jamaica</option>
	<option value="JPN">Japan</option>
	<option value="JEY">Jersey</option>
	<option value="JOR">Jordan</option>
	<option value="KAZ">Kazakhstan</option>
	<option value="KEN">Kenya</option>
	<option value="KIR">Kiribati</option>
	<option value="PRK">Korea, Democratic People's Republic of</option>
	<option value="KOR">Korea, Republic of</option>
	<option value="KWT">Kuwait</option>
	<option value="KGZ">Kyrgyzstan</option>
	<option value="LAO">Lao People's Democratic Republic</option>
	<option value="LVA">Latvia</option>
	<option value="LBN">Lebanon</option>
	<option value="LSO">Lesotho</option>
	<option value="LBR">Liberia</option>
	<option value="LBY">Libya</option>
	<option value="LIE">Liechtenstein</option>
	<option value="LTU">Lithuania</option>
	<option value="LUX">Luxembourg</option>
	<option value="MAC">Macao</option>
	<option value="MKD">Macedonia, the former Yugoslav Republic of</option>
	<option value="MDG">Madagascar</option>
	<option value="MWI">Malawi</option>
	<option value="MYS">Malaysia</option>
	<option value="MDV">Maldives</option>
	<option value="MLI">Mali</option>
	<option value="MLT">Malta</option>
	<option value="MHL">Marshall Islands</option>
	<option value="MTQ">Martinique</option>
	<option value="MRT">Mauritania</option>
	<option value="MUS">Mauritius</option>
	<option value="MYT">Mayotte</option>
	<option value="MEX">Mexico</option>
	<option value="FSM">Micronesia, Federated States of</option>
	<option value="MDA">Moldova, Republic of</option>
	<option value="MCO">Monaco</option>
	<option value="MNG">Mongolia</option>
	<option value="MNE">Montenegro</option>
	<option value="MSR">Montserrat</option>
	<option value="MAR">Morocco</option>
	<option value="MOZ">Mozambique</option>
	<option value="MMR">Myanmar</option>
	<option value="NAM">Namibia</option>
	<option value="NRU">Nauru</option>
	<option value="NPL">Nepal</option>
	<option value="NLD">Netherlands</option>
	<option value="NCL">New Caledonia</option>
	<option value="NZL">New Zealand</option>
	<option value="NIC">Nicaragua</option>
	<option value="NER">Niger</option>
	<option value="NGA">Nigeria</option>
	<option value="NIU">Niue</option>
	<option value="NFK">Norfolk Island</option>
	<option value="MNP">Northern Mariana Islands</option>
	<option value="NOR">Norway</option>
	<option value="OMN">Oman</option>
	<option value="PAK">Pakistan</option>
	<option value="PLW">Palau</option>
	<option value="PSE">Palestinian Territory, Occupied</option>
	<option value="PAN">Panama</option>
	<option value="PNG">Papua New Guinea</option>
	<option value="PRY">Paraguay</option>
	<option value="PER">Peru</option>
	<option value="PHL">Philippines</option>
	<option value="PCN">Pitcairn</option>
	<option value="POL">Poland</option>
	<option value="PRT">Portugal</option>
	<option value="PRI">Puerto Rico</option>
	<option value="QAT">Qatar</option>
	<option value="REU">Réunion</option>
	<option value="ROU">Romania</option>
	<option value="RUS">Russian Federation</option>
	<option value="RWA">Rwanda</option>
	<option value="BLM">Saint Barthélemy</option>
	<option value="SHN">Saint Helena, Ascension and Tristan da Cunha</option>
	<option value="KNA">Saint Kitts and Nevis</option>
	<option value="LCA">Saint Lucia</option>
	<option value="MAF">Saint Martin (French part)</option>
	<option value="SPM">Saint Pierre and Miquelon</option>
	<option value="VCT">Saint Vincent and the Grenadines</option>
	<option value="WSM">Samoa</option>
	<option value="SMR">San Marino</option>
	<option value="STP">Sao Tome and Principe</option>
	<option value="SAU">Saudi Arabia</option>
	<option value="SEN">Senegal</option>
	<option value="SRB">Serbia</option>
	<option value="SYC">Seychelles</option>
	<option value="SLE">Sierra Leone</option>
	<option value="SGP">Singapore</option>
	<option value="SXM">Sint Maarten (Dutch part)</option>
	<option value="SVK">Slovakia</option>
	<option value="SVN">Slovenia</option>
	<option value="SLB">Solomon Islands</option>
	<option value="SOM">Somalia</option>
	<option value="ZAF">South Africa</option>
	<option value="SGS">South Georgia and the South Sandwich Islands</option>
	<option value="SSD">South Sudan</option>
	<option value="ESP">Spain</option>
	<option value="LKA">Sri Lanka</option>
	<option value="SDN">Sudan</option>
	<option value="SUR">Suriname</option>
	<option value="SJM">Svalbard and Jan Mayen</option>
	<option value="SWZ">Swaziland</option>
	<option value="SWE">Sweden</option>
	<option value="CHE">Switzerland</option>
	<option value="SYR">Syrian Arab Republic</option>
	<option value="TWN">Taiwan, Province of China</option>
	<option value="TJK">Tajikistan</option>
	<option value="TZA">Tanzania, United Republic of</option>
	<option value="THA">Thailand</option>
	<option value="TLS">Timor-Leste</option>
	<option value="TGO">Togo</option>
	<option value="TKL">Tokelau</option>
	<option value="TON">Tonga</option>
	<option value="TTO">Trinidad and Tobago</option>
	<option value="TUN">Tunisia</option>
	<option value="TUR">Turkey</option>
	<option value="TKM">Turkmenistan</option>
	<option value="TCA">Turks and Caicos Islands</option>
	<option value="TUV">Tuvalu</option>
	<option value="UGA">Uganda</option>
	<option value="UKR">Ukraine</option>
	<option value="ARE">United Arab Emirates</option>
	<option value="GBR">United Kingdom</option>
	<option value="USA">United States</option>
	<option value="UMI">United States Minor Outlying Islands</option>
	<option value="URY">Uruguay</option>
	<option value="UZB">Uzbekistan</option>
	<option value="VUT">Vanuatu</option>
	<option value="VEN">Venezuela, Bolivarian Republic of</option>
	<option value="VNM">Viet Nam</option>
	<option value="VGB">Virgin Islands, British</option>
	<option value="VIR">Virgin Islands, U.S.</option>
	<option value="WLF">Wallis and Futuna</option>
	<option value="ESH">Western Sahara</option>
	<option value="YEM">Yemen</option>
	<option value="ZMB">Zambia</option>
	<option value="ZWE">Zimbabwe</option>
</select>

      <label for="psw"><b>Password</b></label>
      <input type="password" id="mypass" placeholder="Enter Password" name="password" required onkeyup='check();'> 
       
      <label for="psw-confirm"><b>Confirm password</b></label>
      <input type="password" id="confirmpass" placeholder="Confirm Password" name="confirmpass" required onkeyup='check();'><span id='message'></span>
      
      <label>
        <input type="checkbox" name="showpass" onclick="showPasswordFunction()"><i>Show password</i>
      </label>
    
     
     
     <br><br>
          
      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('register').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn">Sign Up</button>
      </div>
    </div>
        </form>
       
        
    </div> 

 <div id="login" class="loginform">
<span onclick="document.getElementById('login').style.display='none'" class="close" title="Close">&times;</span>    
        <!-- <form class="login-form" action="/packandgo/login.php" method="post"> -->
        <form id ="login-form" class="login-form" action="" method="post">
 <div class="container">
      <h3>Log in</h3>
      <hr>
      <label for="email"><b>Email</b></label>
      <input type="email" placeholder="Enter Email" name="email" required  value=<?php echo isset($_COOKIE['email']) ? $_COOKIE['email'] : "";  ?> >

      <label for="psw"><b>Password</b></label>
      <input type="password" id="myInput" placeholder="Enter Password" name="password" required value=<?php echo isset($_COOKIE['password']) ? $_COOKIE['password'] : "";  ?> > 
      
       <label>
        <input type="checkbox" <?php if(isset($_COOKIE['email'])){
          echo " checked";
        } ?> name="remember" onclick="rememberUserFunction()" style="margin:15px auto"> Remember me
      </label>
      <div class="clearfix">
        <button type="button" onclick="document.getElementById('login').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn">Login</button>
      </div>
      	<p> Not a member yet?								<a href="#register" id="click-register-again" style="width:auto;"  class="to_register">Sign up now</a>
    </div>
        </form>
       
        
    </div> 
<!-- google library-->      
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- these scripts to enanble css 3.0 and html5 to browers with old versions-->
<!-- <script src="https://cdn.jsdelivr.net/npm/respond@0.9.0/main.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/selectivizr@1.0.3/selectivizr.min.js"></script>
<script src="vendors/js/jquery.waypoints.min.js"></script>
<script>
  function showPasswordFunction() {
      var x = document.getElementById("mypass");
      var y = document.getElementById("confirmpass");

      if (x.type === "password") {
          x.type = "text";
          y.type = "text";           
      } else {
          x.type = "password";
          y.type = "password";          
      }
  }

  function rememberUserFunction() {
      
      
  }
</script>    
    
    </body>
    
    

</html>