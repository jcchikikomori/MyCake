<!DOCTYPE html>
<html>
  <h2>Posts</h2>
  <table>
    <tr>
      <th>Title</th>
      <th>Body</th>
      <th>Actions</th>
    </tr>
    <?php foreach($posts as $post): ?>
    <tr>
      <td><?php echo $html->link($post['Post']['title'],
          array('action'=>'view', $post['Post']['id'])); ?></td>
      <td><?php echo $post['Post']['body']; ?></td>
      <td>
        <ul>
          <li><?php echo $html->link('Edit', array('action'=>'edit', $post['Post']['id'])); ?></li>
          <?php //DELETE LINK NOTES: //$html->link(:title, :actions(:action/:href, :target_id, :html_attributes(), :javascript_alert)) ?>
          <li><?php echo $html->link('Delete', array('action'=>'delete', $post['Post']['id']), NULL, 'Are you sure you want to delete this post?'); ?></li>
        </ul>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>
  <p><?php echo $html->link('Add Post', array('action'=>'add')); ?></p>
</html>
