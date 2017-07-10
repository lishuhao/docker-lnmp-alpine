<?php
/**
 * User:  ShuHao
 * Date:  2017/7/8
 */
?>
<div class="row expanded">
<table>
    <thead>
    <tr>
        <th width="200">ID</th>
        <th width="150">标题</th>
        <th width=>内容</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($posts as $post): ?>
        <tr>
            <td><?php echo $post['id']; ?></td>
            <td><?php echo $post['title']; ?></td>
            <td><?php echo $post['content']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</div>
