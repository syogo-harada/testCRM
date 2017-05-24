<?php echo $this->Html->link('代理店を新規登録する', '/Agencies/create'); ?>

<?php // コントローラーから渡された$agencies_dataを表示する ?>
<h4><?php echo count($agencies_data); ?>件の代理店が登録中です</h4>
<table>
    <tr>
        <th>ID</th>
        <th>代理店名</th>
        <th>登録日</th>
        <th>更新日</th>
        <th>処理</th>
    </tr>
    <?php foreach($agencies_data as $row): ?>
       

        <tr>
            <td><?php echo h($row['Agency']['id']); ?></td>
            <td><?php echo h($row['Agency']['agency_name']); ?></td>
            <td><?php echo h($row['Agency']['created']); ?></td>
            <td><?php echo h($row['Agency']['modified']); ?></td>
            <td><?php echo $this->Html->link('削除', '/Agencies/done/' . $row['Agency']['id']); ?></td>
        </tr>

    <?php endforeach; ?>
</table>