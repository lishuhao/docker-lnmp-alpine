<?php
/**
 * User:  ShuHao
 * Date:  2017/7/8
 */
?>
<div class="row expanded small-up-2 medium-up-3 large-up-4">
    <table>
        <thead>
        <tr>
            <th width="50">ID</th>
            <th width="150">商品名</th>
            <th width=>价格</th>
        </tr>
        </thead>
        <tbody>
        <?php for($i=0;$i<10;$i++): ?>
            <tr>
                <td><?php echo $i+1 ?></td>
                <td>小星星</td>
                <td>小星星</td>
            </tr>
        <?php endfor; ?>
        </tbody>
    </table>
    <?php echo $pages ?>
</div>