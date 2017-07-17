<?php

	$w_routes = array(
		/**
		 * DefaultController
		 */
		['GET', '/', 'Default#home', 'default_home'],	// Accueil
		['POST', '/', 'Default#commentsAction', 'default_comments_action'],
		['GET', '/howTo', 'Default#howto','how_to'], 	// Page explicative (comment ça marche)

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
		['GET', '/user/profile/edit/[i:id]', 'Profile#profileModify','user_profile_modify'],
		['POST','/user/profile/edit/[i:id]','Profile#profileModifyAction', 'user_profile_modify_action'],

		/**
		 * CatalogController
		 */
		['GET', '/catalog', 'Catalog#catalog', 'catalog'],
		['GET', '/catalog/all', 'Catalog#allcatalog', 'catalog_all'],
		['GET', '/catalog/all/[i:page]', 'Catalog#allcatalog', 'catalog_all_page'],
		//articles par categorie
		['GET', '/catalog/categorie/[:id]', 'Catalog#familycatalog', 'catalog_categorie_item'],
		['GET', '/catalog/categorie/[:id]/[i:page]', 'Catalog#familycatalog', 'catalog_categorie_page'],
		//tous les articles par prix
		['GET', '/catalog/priceASC', 'Catalog#priceASC', 'catalog_priceASC'],
		['GET', '/catalog/priceASC/[i:page]', 'Catalog#priceASC', 'catalog_priceASC_page'],
		['GET', '/catalog/priceDESC', 'Catalog#priceDESC', 'catalog_priceDESC'],
		['GET', '/catalog/priceDESC/[i:page]', 'Catalog#priceDESC', 'catalog_priceDESC_page'],
		//categorie article par prix
		//ASC
		['GET', '/catalog/familypriceASC/[:id]', 'Catalog#familypriceASC', 'catalog_categorie_item_priceASC'],
		['GET', '/catalog/familypriceASC/[:id]/[i:page]', 'Catalog#familypriceASC', 'catalog_categorie__priceASC_page'],
		//DESC
		['GET', '/catalog/familypriceDESC/[:id]', 'Catalog#familypriceDESC', 'catalog_categorie_item_priceDESC'],
		['GET', '/catalog/familypriceDESC/[:id]/[i:page]', 'Catalog#familypriceDESC', 'catalog_categorie__priceDESC_page'],
		//detail de l article
		['GET', '/catalog/item/[:id]', 'Catalog#detail', 'catalog_detail'],
		//404
		['GET', '/catalog/404', 'Catalog#erreur404', 'catalog_404'],
		//recherche
		['POST', '/catalog/search/[:id]', 'Catalog#search', 'catalog_search'],
		['GET', '/catalog/search/[:id]/[i:page]', 'Catalog#search', 'catalog_search_page'],
		//recherche article par prix
		//ASC
		['GET', '/catalog/searchASC/[:id]', 'Catalog#searchPriceASC', 'catalog_search_item_priceASC'],
		['GET', '/catalog/searchASC/[:id]/[i:page]', 'Catalog#searchPriceASC', 'catalog_search_priceASC_page'],
		//DESC['GET', '/catalog/searchASC/[:id]', 'Catalog#searchPriceASC', 'catalog_search_item_priceASC'],
		['GET', '/catalog/searchDESC/[:id]', 'Catalog#searchPriceDESC', 'catalog_search_item_priceDESC'],
		['GET', '/catalog/searchDESC/[:id]/[i:page]', 'Catalog#searchPriceDESC', 'catalog_search_priceDESC_page'],

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
		// route panier article ajouter au panier
		['GET', '/panier/add/[i:id]','Panier#addArticleToPanier', 'ajouter_au_panier'],

		/**
		 * Admin\UsersController
		 *
		 *
		 */
		// Listing utilisateurs - Bouton Update - Bouton Delete - Menu Ajouter
		['GET', '/admin/users', 'Admin\Users#users', 'admin_users'],
		['GET', '/admin/users/[i:page]', 'Admin\Users#users', 'admin_page_users'], // pour gerer la pagination du listing.
		// Ajouter
				// GET ET POST -> voir routes du registry user en front
		// Update
		['GET', '/admin/user/[i:id]/[i:fromPage]', 'Admin\Users#singleUser', 'admin_single_user'],
		['POST', '/admin/user/[i:id]/[i:fromPage]', 'Admin\Users#singleUserAction', 'admin_single_user_action'],
		// Delete
		['GET', '/admin/deleteuser/[i:id]/[i:fromPage]', 'Admin\Users#deleteUser', 'admin_delete_user'],


		/**
		 * Admin\CommentsController
		 *
		 *
		 * HP : Pas d'edit et de single prévu -> juste approve ou delete recupéré via route
		 */
		['GET', '/admin/comments', 'Admin\Comments#comments', 'admin_comments'],
		['GET', '/admin/comments/[i:page]', 'Admin\Comments#comments', 'admin_page_comments'],
		['GET', '/admin/commentApprove/[:id]/[i:fromPage]', 'Admin\Comments#commentApprove', 'admin_approve_comment'],
		['GET', '/admin/commentNotApproved/[:id]/[i:fromPage]', 'Admin\Comments#commentNotApproved', 'admin_notapproved_comment'],
		['GET', '/admin/commentDelete/[:id]/[i:fromPage]', 'Admin\Comments#commentDelete', 'admin_delete_comment'],

		/**
		 * Admin\OrdersController
		 *
		 *
		 *
		 */
		['GET', '/admin/orders', 'Admin\Orders#orders' , 'admin_orders'],
		['GET', '/admin/orders/[i:page]', 'Admin\Orders#orders' , 'admin_page_orders'],
		['GET', '/admin/order/[:id]/[i:fromPage]', 'Admin\Orders#singleOrder', 'admin_single_order'],
		['POST','/admin/order/[:id]/[i:fromPage]', 'Admin\Orders#singleOrderAction', 'admin_single_order_action'],

		/**
		 * Admin\ItemsController
		 *
		 *
		 *
		 */
		//routes admin items
		['GET', '/admin/items', 'Admin\ItemsController#items','admin_items'],
		['GET', '/admin/items/[i:page]', 'Admin\ItemsController#items', 'admin_page_items'],
		['GET', '/admin/item/[:id]', 'Admin\ItemsController#singleItem', 'admin_single_item'],
		//articles par categories
		['GET', '/admin/items/categorie/[:id]', 'Admin\ItemsController#categorieItem', 'admin_categorie_item'],
		['GET', '/admin/items/categorie/[:id]/[i:page]', 'Admin\ItemsController#categorieItem', 'admin_categorie_item_page'],
		//modification d un article
		['POST', '/admin/item/[:id]', 'Admin\ItemsController#singleItemAction', 'admin_single_item_action'],
		//delete item
		['GET', '/admin/item/[i:id]/[i:fromPage]', 'Admin\ItemsController#singleItemDelete', 'admin_single_item_delete'],
		//ajout d un nouvel article
		['GET', '/admin/additem', 'Admin\ItemsController#AddItem','admin_single_item_add'],
		['POST', '/admin/additem', 'Admin\ItemsController#AddItemAction','admin_single_item_add_action'],


		/**
		 * Admin\ItemsFamiliesController
		 *
		 *
		 *
		 */
		['GET', '/admin/itemsFamilies' , 'Admin\ItemsFamiliesController#itemsFamilies', 'admin_items_families'],
		['GET', '/admin/itemsFamilies/[i:page]', 'Admin\ItemsFamiliesController#itemsFamilies', 'admin_page_items_families'],
		['GET', '/admin/itemFamily/[i:id]', 'Admin\ItemsFamiliesController#singleItemFamily', 'admin_single_item_family'],
		['POST', '/admin/itemFamily/[i:id]', 'Admin\ItemsFamiliesController#singleItemFamilyAction', 'admin_single_item_family_action'],
		//delete categorie
		['GET', '/admin/itemFamily/[i:id]/[i:fromPage]', 'Admin\ItemsFamiliesController#singleItemFamilyDelete', 'admin_single_item_family_delete'],
		//ajout d'une nouvelle famille d'objets
		['GET', '/admin/addfamily', 'Admin\ItemsFamiliesController#addItemFamily','admin_items_families_add'],
		['POST', '/admin/addfamily', 'Admin\ItemsFamiliesController#addItemFamilyAction','admin_items_families_add_action'],


	);
