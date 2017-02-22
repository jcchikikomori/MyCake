<!DOCTYPE html>
<html>
  <h2>Edit Post</h2>
<?php
  echo $form->create('Post', array('action'=>'edit'));
  echo $form->input('title');
  echo $form->input('body');
  echo $form->input('id', array('type'=>'hidden'));
  echo $form->end('Finish Changes');
?>
</html>
