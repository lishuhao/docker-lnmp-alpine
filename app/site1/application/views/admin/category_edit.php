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


<div class="row column expanded">
  <div class="column small-2">
    <h4>分类名称：</h4>
  </div>

  <div class="column small-10">
    <input id="category-name" type="text" value="<?php echo $category['name'] ?>">
    <input id="category-id" type="hidden" value="<?php echo $category['id'] ?>">
  </div>
</div>

<div class="row">
  <div class="column small-2">
    <button id="save" class="button">保存</button>
  </div>
</div>