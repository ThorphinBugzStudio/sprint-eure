<?php

	$w_routes = array(
		//routes home

		['GET', '/', 'Default#home', 'default_home'],


		//routes Users
		['GET', '/users/inscription','Users#inscription','inscription'],
		['POST', '/users/inscription','Users#inscriptionAction','inscription_action'],
		['GET', '/users/login', 'Users#login', 'login'],
		['POST', '/users/login', 'Users#loginAction', 'login_action'],
		['GET', '/users/logout', 'Users#logout', 'logout'],
		['GET', '/users/passwordLost', 'Users#passwordLost', 'password_lost'],
		['POST', '/users/passwordLost', 'Users#passwordLostAction', 'password_lost_action'],
		['GET', '/users/passwordModify', 'Users#passwordModify', 'password_modify'],
		['POST', '/users/passwordModify', 'Users#passwordModifyAction', 'password_modify_action'],

		//Routes profiles utilisateurs
		['GET', '/users/profile', 'Profile#profile', 'user_profile'],
		['GET', '/users/profile/edit', 'Profile#profileModify','user_profile_modify'],
		['POST','/users/profile/edit','Profile#profileModifyAction', 'user_profile_modify_action'],

		//Routes How TO (Services de l'entreprises)
		['GET', '/howTo', 'HowTo#howTo','how_to'],

		//Routes catalogue articles
		['GET', '/catalogue', 'Catalog#catalog', 'catalog'],

		//Routes devis en ligne
		['GET', '/devis' , 'Devis#devis', 'devis'],
		['POST', '/devis' , 'Devis#devisAction', 'devis_action'],

		//routes Panier client
		['GET', '/panier', 'Panier#panier', 'panier_client'],
		['POST', '/panier', 'Panier#panier', 'panier_client_action'],

		//routes Admin
		['GET', '/admin/users', 'Admin#usersAdmin', 'admin_users'],

	);
