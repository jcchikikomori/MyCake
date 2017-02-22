<?php

class PostsController extends AppController {
  var $name = 'Posts'; // variable thing for ctp

  function index() {
    $this->set('posts', $this->Post->find('all')); //setting variable
  }

  function view($id=null) {
    $this->set('post', $this->Post->read(NULL, $id)); // NULL here means all models :)
  }

  function add() {
    if (!empty($this->data)) {
      if ($this->Post->save($this->data)) {
        $this->Session->setFlash('The post was successfully added!');
        $this->redirect(array('action'=>'index'));
      } else {
        $this->Session->setFlash('Please try again');
      }
    }
  }

  function edit($id=null) {
    if (empty($this->data)) {
      $this->data = $this->Post->read(NULL, $id);
    } else { // if the form has been submitted and id already saving
      if ($this->Post->save($this->data)) { // re-save
        $this->Session->setFlash('The post has been updated');
        $this->redirect(array('action'=>'view', $id));
      }
    }
  }

  function delete($id=null) {
    $this->Post->delete($id);
    $this->Session->setFlash('The post has been deleted');
    $this->redirect(array('action'=>'index'));
  }

  function say_hello() {
  }

}
