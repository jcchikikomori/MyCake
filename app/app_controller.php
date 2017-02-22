<?php

/**
 * Custom AppController
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
    $this->set('logged_in', $this->_loggedIn());
    $this->set('users_username', $this->_usersUsername());
  }

  function _isAdmin() {
    $admin = false;
    if ($this->Auth->user('roles') == 'admin') {
      $admin = true;
    }
    return $admin;
  }

  function _loggedIn() {
    $logged_in = false;
    if ($this->Auth->user()) {
      $logged_in = true;
    }
    return $logged_in;
  }

  function _usersUsername() {
    $users_username = null;
    if ($this->Auth->user()) {
      $users_username = $this->Auth->user('username');
    }
    return $users_username;
  }

}
