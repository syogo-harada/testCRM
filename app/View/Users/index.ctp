<?php //echo $this->Html->css('cake.stylesheet'); ?>
<?php echo $this->Html->link('新規管理ユーザーを登録する', '/Users/create'); ?>

<?php // コントローラーから渡された$users_dataを表示する ?>
<h3><?php echo count($users_data); ?>名のUserが登録中です</h3>
<table>
    <tr>
        <th>ID</th>
        <th>ユーザー名</th>
        <th>パスワード</th>
        <th>権限</th>
        <th>登録日</th>
        <th>更新日</th>
        <th>処理</th>

    </tr>
    <?php foreach($users_data as $row): ?>
        <tr>
            <td><?php echo h($row['User']['id']); ?></td>
            <td><?php echo h($row['User']['username']); ?></td>
            <td><?php echo h($row['User']['password']); ?></td>
            <td><?php echo h($row['User']['role']); ?></td>
            <td><?php echo h($row['User']['created']); ?></td>
            <td><?php echo h($row['User']['modified']); ?></td>
            <td><?php echo $this->Html->link('Delete', '/Users/delete/' . $row['User']['id']);
                      echo ' ';
                      echo $this->Html->link('Edit', array('action' => 'edit', $row['User']['id']));?></td>
            
        </tr>
    <?php endforeach; ?>
</table>

