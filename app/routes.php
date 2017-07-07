<?php

	$w_routes = array(
		/**
		 * DefaultController
		 */
		['GET', '/', 'Default#home', 'default_home'],	// Accueil
		['GET', '/howTo', 'Default#how-to','how_to'], 	// Page explicative (comment ça marche)

		/**
		 * UsersController
		 */

		/** Inscription **/
		['GET', '/user/inscription','Users#inscription','inscription'],
		['POST', '/user/inscription','Users#inscriptionAction','inscription_action'],

		/** Login **/
		['GET', '/user/login', 'Users#login', 'login'],
		['POST', '/user/login', 'Users#loginAction', 'login_action'],

		/** Logout **/
		['GET', '/user/logout', 'Users#logout', 'logout'],

		/** Password Lost **/
		['GET', '/user/passwordLost', 'Users#passwordLost', 'password_lost'],
		['POST', '/user/passwordLost', 'Users#passwordLostAction', 'password_lost_action'],

		/** Password Modify **/
		['GET', '/user/passwordModify', 'Users#passwordModify', 'password_modify'],
		['POST', '/user/passwordModify', 'Users#passwordModifyAction', 'password_modify_action'],

		/**
		 * ProfileController
		 */
		['GET', '/user/profile', 'Profile#profile', 'user_profile'],
		['GET', '/user/profile/edit', 'Profile#profileModify','user_profile_modify'],
		['POST','/user/profile/edit','Profile#profileModifyAction', 'user_profile_modify_action'],

		/**
		 * CatalogController
		 */
		['GET', '/catalogue', 'Catalog#catalog', 'catalog'],

		/**
		 * DevisController
		 */
		['GET', '/devis' , 'Devis#devis', 'devis'],
		['POST', '/devis' , 'Devis#devisAction', 'devis_action'],

		/**
		 * PanierController
		 */
		['GET', '/panier', 'Panier#panier', 'panier_client'],
		['POST', '/panier', 'Panier#panier', 'panier_client_action'],

		/**
		 * Admin\UsersController
		 *
		 * AQ : edit // update // delete
		 * HP : Voir comment traiter l'action sans route à partir du post recuperé
		 *
		 */
		['GET', '/admin/users', 'Admin\Users#users', 'admin_users'],
		['GET', '/admin/user/[:id]', 'Admin\Users#singleUser', 'admin_single_user'],
		['POST', '/admin/user/[:id]', 'Admin\Users#singleUserAction', 'admin_single_user_action'],

		/**
		 * Admin\CommentsController
		 *
		 * AQ : edit // update // delete
		 * HP : Pas d'edit et de single prévu -> juste approve ou delete recupéré via route
		 */
		['GET', '/admin/comments', 'Admin\Comments#comments', 'admin_comments'],
		['GET', '/admin/commentApprove/[:id]', 'Admin\Comments#commentApprove', 'admin_approve_comment'],
		['GET', '/admin/commentDelete/[:id]', 'Admin\Comments#commentDelete', 'admin_delete_comment'],

		/**
		 * Admin\OrdersController
		 *
		 * AQ : edit // update // delete
		 * HP : Voir comment traiter l'action sans route à partir du post recuperé
		 */
		['GET', '/admin/orders', 'Admin\Orders#orders' , 'admin_orders'],
		['GET', '/admin/order/[:id]', 'Admin\Orders#singleOrder', 'admin_single_order'],
		['POST','/admin/order/[:id]', 'Admin\Orders#singleOrderAction', 'admin_single_order_action'],

		/**
		 * Admin\ItemsController
		 *
		 * AQ : edit // update // delete
		 * HP : Voir comment traiter l'action sans route à partir du post recuperé
		 */
		//routes admin items
		['GET', '/admin/items', 'Admin\ItemsController#items','admin_items'],
		['GET', '/admin/item/[:id]', 'Admin\ItemsController#singleItem', 'admin_single_item'],
		//modification d un article
		['POST', '/admin/item/[:id]', 'Admin\ItemsController#singleItemAction', 'admin_single_item_action'],
		//ajout d un nouvel article
		['GET', '/admin/additem', 'Admin\ItemsController#AddItem','admin_single_item_add'],
		['POST', '/admin/additem', 'Admin\ItemsController#AddItemAction','admin_single_item_add_action'],


		/**
		 * Admin\ItemsFamiliesController
		 *
		 * AQ : edit // update // delete
		 * HP : Voir comment traiter l'action sans route à partir du post recuperé
		 */
		['GET', '/admin/itemsFamilies' , 'Admin\ItemsFamiliesController#itemsFamilies', 'admin_items_families'],
		['GET', '/admin/itemFamily/[:id]', 'Admin\ItemsFamiliesController#singleItemFamily', 'admin_single_item_family'],
		['POST', '/admin/itemFamily/[:id]', 'Admin\ItemsFamiliesController#singleItemFamilyAction', 'admin_single_item_family_action'],



	);
