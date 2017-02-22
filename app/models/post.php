<?php

class Post extends AppModel {
  var $name = 'Post';
  var $validate = array(
    'title'=>array(
      'must_not_be_blank'=>array(
        'rule' => 'notEmpty',
        'message' => 'This post is missing a title! Balikan mo!'
      ),
      'must_unique'=>array(
        'rule' => 'isUnique',
        'message' => "Dapat siya'y the one (Title already exists)"
      ),
    ),
    'body'=>array(
      'must_not_be_blank'=>array(
        'rule' => 'notEmpty',
        'message' => "This post is missing it's body. Versoza on the floor"
      ),
    ),
  );
}
