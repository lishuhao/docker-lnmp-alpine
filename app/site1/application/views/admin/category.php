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
  <ul class="tabs" data-tabs id="category-tabs">
    <?php foreach ($top_category as $index => $item): ?>
      <li class="tabs-title <?php echo $index==0 ? 'is-active': '' ?>"><a href="#panel<?php echo $item['module']; ?>"><?php echo $item['module'] ?></a></li>
    <?php endforeach; ?>
  </ul>

  <div class="tabs-content" data-tabs-content="category-tabs">
    <?php foreach ($all_category as $index => $item): ?>
      <div class="tabs-panel  <?php echo $index==0 ? 'is-active': '' ?>" id="panel<?php echo $item[0]['module'] ?>">
        <p><?php echo $item[0]['module'] ?></p>
        <table class="unstriped">
            <?php foreach ($item as $i): ?>
              <tr>
                  <?php $space_count = substr_count($i['name'],'&nbsp;'); ?>
                <td class="class-<?php echo $space_count ?>">
                    <?php echo str_repeat('&nbsp;',$space_count*$space_count*3).$i['name']; ?>
                </td>
                <td>
                  <div class="small button-group">
                    <a class="button small alert delete-category" data-id="<?php echo $i['id']; ?>">删除</a>
                    <a class="button small" href="<?php echo base_url('category/get_category/'.$i['id']); ?>">编辑</a>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
        </table>
      </div>
    <?php endforeach; ?>
  </div>

</div>

