<?php

/**
 *
 */
class AppController extends Controller
{
  var $components = array('Auth', 'Session');

  function beforeFilter() {
    $this->Auth->allow('display');
    $this->Auth->authError = 'Please login to view that page.';
    $this->Auth->loginError = 'Incorrect username/password.';
    $this->Auth->loginRedirect = array('controller'=>'posts', 'action'=>'index');
    $this->Auth->logoutRedirect = array('controller'=>'pages', 'action'=>'display');

    $this->set('admin', $this->_isAdmin());
  }

  function _isAdmin() {
    $admin = false;
    if ($this->Auth->user('role') == 'admin') {
      $admin = true;
    }
    return $admin;
  }

}
