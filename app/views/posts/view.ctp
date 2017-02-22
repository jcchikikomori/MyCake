<!DOCTYPE html>
<html>
  <h2><?php echo $post['Post']['title'];?></h2>
  <p><?php echo $post['Post']['body'];?></p>
  <p><small>Created on: <?php echo $post['Post']['created'];?></small></p>
  <p><small>Last Modified on: <?php echo $post['Post']['modified'];?></small></p>

  <br />

  <p><?php echo $html->link('Back', array('action'=>'index')); ?></p>
  <p><?php echo $html->link('Edit post', array('action'=>'edit', $post['Post']['id'])); ?></p>
  <p><?php echo $html->link('Delete', array('action'=>'delete', $post['Post']['id']), NULL, 'Are you sure bes? Wala nang balikan to. Move on na kaagad pagkatapos!'); ?></p>
</html>
