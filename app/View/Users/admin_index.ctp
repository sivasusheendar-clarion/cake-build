<!-- File: /app/View/Posts/index.ctp -->

<h2>USER'S</h2>
<table>
    <tr>
        <th>ID</th>
        <th>E-mail</th>
        <th>Created</th>
        <th>Action</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['User']['id']; ?></td>
        <td><?php echo $user['User']['email']; ?></td>
        <td><?php echo $user['User']['created']; ?></td>
        <td><?php echo $this->Html->link('View', array('controller' => 'users', 'action' => 'view', $user['User']['id'])); ?>|
        <?php echo $this->Html->link('Edit', array('controller' => 'users', 'action' => 'edit', $user['User']['id'])); ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($user); ?>
</table>