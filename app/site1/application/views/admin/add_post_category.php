<?php
/**
 * User:  ShuHao
 * Date:  2017/7/8
 */
?>
<style>
  .class-1{
    font-size: larger;
    font-weight: 800;
  }
  .class-2{
    font-size: large;
    font-weight: 500;
    color: red;

  }
  .class-3{
    font-size: small;
    font-weight: 200;
    color: #4a831c;
  }

</style>

<div class="row">
  <div class="column small-2">
    <h3>添加分类：</h3>
  </div>
  <div class="column small-2 text-right">
    <h4>父类：</h4>
  </div>
  <div class="column small-3 text-left">
    <select name="" id="">
        <option value="0">顶级分类</option>
        <?php foreach ($all_category as $item): ?>
          <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
        <?php endforeach; ?>
    </select>
  </div>
  <div class="column small-4">
    <input type="text" placeholder="请输入分类名">
  </div>
  <div class="column small-1">
    <button class=" button">保存</button>
  </div>
</div>
<hr>
<div class="row expanded">
  <div class="column">
    <table class="unstriped">
      <?php foreach ($all_category as $item): ?>
        <tr>
          <?php $space_count = substr_count($item['name'],'&nbsp;'); ?>
          <td class="class-<?php echo $space_count ?>">
              <?php echo str_repeat('&nbsp;',$space_count*$space_count*3).$item['name']; ?>
          </td>
          <td>
            <div class="small button-group">
              <a class="button small alert">删除</a>
              <a class="button small">编辑</a>
            </div>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>
</div>

