<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

use Acl\Controller\Component\AclComponent;
use Cake\Controller\ComponentRegistry;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    public $components = [
        'Acl' => [
            'className' => 'Acl.Acl'
        ]
    ];
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
		$this->loadComponent('Cookie', ['expiry' => '1 day']);
		$this->loadComponent('Auth', [
            'loginRedirect' => [
                'controller' => 'pages',
                'action' => 'display',
                'home'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
			'authError' => __('No está autorizado para acceder a esta ubicación.', true),
			'storage' => 'Session',
			'authorize' => [
                'Acl.Actions' => ['actionPath' => 'controllers/']
            ]
        ]);
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
	
	public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['logout','login']);
    }
    
	public function isAuthorized($user)
	{
		// Admin can access every action
		/*if (isset($user['role_id']) && $user['role_id'] === 1) {
			return true;
		}
		// Default deny
		return false;*/
		
		$Collection = new ComponentRegistry();
        $acl= new AclComponent($Collection);
        $username=$user['username'];
        $controller=$this->request->controller;
        $action=$this->request->action;
        $check=$acl->check($user['username'],"$controller/$action");
        return $check;
	}
}
