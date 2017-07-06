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
		['GET', '/admin/user/[:id]', 'Admin#singleUser', 'admin_single_user'],
		['POST', '/admin/user/[:id]', 'Admin#singleUserAction', 'admin_single_user_action'],

		// edit // update // delete

		// routes admin comments
		['GET', '/admin/comments' , 'Admin#adminComments', 'admin_comments'],
		['GET', '/admin/commentApprove/[:id]' , 'Admin#adminCommentApprove', 'admin_approve_comment'],
		['GET', '/admin/commentDelete/[:id]' , 'Admin#adminCommentDelete', 'admin_delete_comment'],

			// edit // update // delete

		//routes admin orders
		['GET', '/admin/orders', 'Admin#adminOrders' , 'admin_orders'],
		['GET', '/admin/order/[:id]', 'Admin#adminSingleOrder', 'admin_single_order'],
		['POST','/admin/order/[:id]', 'Admin#adminSingleOrderAction', 'admin_single_order_action'],

			// edit // update // delete

		//routes admin items
		['GET', '/admin/items', 'Admin#adminItems','admin_items'],
		['GET', '/admin/item', 'Admin#adminSingleItem', 'admin_single_item'],
		['POST', '/admin/item', 'Admin#adminSingleItemAction', 'admin_single_item_action'],

			// edit // update // delete

		//routes admin items families
		['GET', '/admin/itemsFamilies' , 'Admin#adminItemsFamilies', 'admin_items_families'],
		['GET', '/admin/itemFamily', 'Admin#adminSingleItemFamily', 'admin_single_item_family'],
		['POST', '/admin/itemFamily', 'Admin#adminSingleItemFamilyAction', 'admin_single_item_family_action'],


			// edit // update // delete




	);
