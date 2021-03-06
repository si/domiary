<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'home', 'action' => 'index', 'home'));

  Router::connect('/home', array( 'controller' => 'app_users', 'action' => 'home'));
  Router::connect('/admin', array( 'controller' => 'pages', 'action' => 'display', 'admin'));
  Router::connect('/users', array( 'controller' => 'app_users', 'action' => 'home'));
  Router::connect('/users/index/*', array( 'controller' => 'app_users'));
  Router::connect('/users/:action/*', array( 'controller' => 'app_users'));
  Router::connect('/users/users/:action/*', array( 'controller' => 'app_users'));
  Router::connect('/login', array( 'controller' => 'app_users', 'action' => 'login'));
  Router::connect('/logout', array( 'controller' => 'app_users', 'action' => 'logout'));
  Router::connect('/register', array( 'controller' => 'app_users', 'action' => 'add'));
  Router::connect('/auth_login/*', array( 'controller' => 'app_users', 'action' => 'auth_login'));
  Router::connect('/auth_callback/*', array( 'controller' => 'app_users', 'action' => 'auth_callback'));

/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	Router::connect('/info/*', array('controller' => 'pages', 'action' => 'display'));

  Router::parseExtensions();
/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
