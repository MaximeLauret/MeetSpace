
<?php

echo '
	<!-- JAPPIX : START.. -->

		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

		<script type="text/javascript">
			jQuery.ajaxSetup({cache: true});

			jQuery.getScript(\'http://chat.meetspace.itinet.fr/server/get.php?l=fr&t=js&g=mini.xml\', function() {
				// Configure application & connect user
				// Notice: exclude "user" and "password" if using anonymous login
				JappixMini.launch({
					connection: {
						user: \''.$_SESSION['USER'] .'\' ,
						password: \''.$_SESSION['PASSWORD'].'\',
						domain: \'meetspace.itinet.fr\',
						resource: \'Jappix\'
					},

					application: {
						network: {
							autoconnect: true
						},

						interface: {
							showpane: true,
							animate: true
						},

						user: {
							random_nickname: false,
							nickname: \''.$_SESSION['USER'].'\'
						},

						chat: {
							open: []
						},

						groupchat: {
							open: [],
							open_passwords: []
						}
					}
				});
			});
		</script>
	<!-- JAPPIX : ..END -->
	';
	
?>