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
    <?php foreach ($goods as $index=>$item):?>
      <tr>
        <td><?php echo $index+1 ?></td>
        <td><?php echo $item['name'] ?></td>
        <td><?php echo $item['current_price'] ?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
    <?php echo $pages ?>
</div>