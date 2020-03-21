<meta name="viewport"
	content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script>
    window.fbAsyncInit = function(){
    Facebook={id:"1422121651137034",url:"http://localhost/eclipse/eva"};
            FB.init({
                    appId      : Facebook.id,
                    //channelUrl : '//'+Facebook.url+'/channel.html',
                    status     : true,
                    cookie     : true, 
                    xfbml      : true  
            });
            FB.getLoginStatus(function(response) {
                statusChangeCallback(response);
            });
    };
    
    (function(d){var js,id='facebook-jssdk',ref=d.getElementsByTagName('script')[0];if(d.getElementById(id)){return;}js=d.createElement('script');js.id=id;js.async=true;js.src="//connect.facebook.net/en_US/all.js";ref.parentNode.insertBefore(js,ref);}(document));
     
    $(function(){
           
            $("img").click(function(){
                   
                     FB.login(function(response) {
                     
                             FB.api('/me', {fields: 'email,id,username,name'}, function(response) {
     
                                    $("#loadfbLogin").load('index.php?fblogin',response);
                                    $("#nome").load(resposta.name);
                                    $("#email").load(resposta.email);
                                    $("#id").load(resposta.id);
                                    //$("#foto").load(resposta.picture);
                                    //$("#nome").val(resposta.name);
                                    
                             });
                     }, {'scope': 'email'});
            });
    });
    
    function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }
  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }
  
    function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    
    //FB.api("/me/picture?width=180&height=180", function(response) { console.log(response.data.url); });
    //FB.api('/me', function(response) { document.getElementById('login').style.display = "block"; document.getElementById('login').innerHTML = '<img src="http://graph.facebook.com/' + response.id + '/picture" />'; }); 
    
    FB.api('/me', {fields: 'name,email,id'},function(response) {
      console.log('Successful login for: ' + response.name+ response.email+ response.id+ response.picture);
      
      document.getElementById('nome').value = response.name;
      document.getElementById('email').value = response.email;
      document.getElementById('id').value = response.id;
      //document.getElementById('foto').value = response.picture;
 
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });
  }
    </script>
<body>
		<div class="container">
			<div class="panel-body">
                            <div class="jumbotron text-center"> 
                                    <h1>Sistema Eva</h1>         
                            </div>
				<!--<img src="<?php //echo base_url('public/imagens/logo_eva.png');?>" width="800" height="100" class="img-responsive" alt="111">-->
			</div>
		</div>

		<div class="col-sm-9 col-sm-offset-3 col-md-6 col-md-offset-2 main">
			<div class="row"><!-- Inicio da linha -->
			
			<div class="container">
				<!-- Titulo -->
				<h3 class="page-header">Logue com sua conta do Facebook.</h3>
				
				<!-- Coluna 1 <hr> -->
				<div class="col-md-4">
					<div class="panel panel-footer">
  						<div class="panel-body">
							<fb:login-button scope="public_profile,email" data-layout="button" autologoutlink="true" onlogin="checkLoginState();"> </fb:login-button>
						</div>
					</div>
				</div>
				
				<!-- Cluna 2 -->
				<div class="col-md-4">
					<div class="panel panel-footer">
  						<div class="panel-body">
  							<?php echo validation_errors(); ?>
							<?php echo form_open('login'); ?>
                                                        <!--hidden-->
							   	
								<label for="email">Email:</label><br />
							   	<input type="email" size="20" id="email" name="email" class="form-control" placeholder="Email" required /><br />
								<label for="senha">Senha:</label><br />
								<input type="password" class="form-control" name="senha" id="inputPassword" placeholder="Password" required /><br />								

								<input type="hidden" size="20" id="id" name="id" /> 
								<input type="submit" class="btn btn-primary btn-xs" style="background-color: #00CC00; border-color: #00CC00" value="ENTRAR" />
							<?php echo form_close(); ?>
  						</div>
					</div>
				</div>
				<!-- Fim da linha -->
			</div>
			</div>
		</div>
		
</body>
</html>
