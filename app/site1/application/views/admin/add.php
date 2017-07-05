<?php
/**
 * User:  ShuHao
 * Date:  2017/3/18
 */
?>
<form action="<?php echo isset($id) ? '/post/update' : '/post/add' ?>" method="post">
    <input type="text" hidden id="id" name="id" value="<?php echo isset($id) ? $id : ''; ?>">
    <!--标题-->
    <div class="form-group">
        <label for="title" class="col-sm-2 control-label">标题</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="title" id="title" value="<?php echo isset($title) ? $title : ''; ?>" placeholder="标题">
        </div>
    </div>
    <!--排序-->
    <div class="form-group">
        <label for="sort" class="col-sm-2 control-label">排序</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name="sort" id="sort" value="<?php echo isset($sort) ? $sort : ''; ?>" placeholder="排序优先级">
        </div>
    </div>
    <!--发布-->
    <div class="form-group">
        <label class="col-sm-2">是否发布</label>
        <div class="col-sm-10">
            <label class="radio-inline">
                <input type="radio" name="deleted" id="pub1" value="0" <?php echo isset($deleted) && $deleted==0 ? 'checked="checked"' :''; ?>> 现在发布
            </label>
            <label class="radio-inline">
                <input type="radio" name="deleted" id="pub2" value="1" <?php echo isset($deleted) && $deleted==1 ? 'checked="checked"' :''; ?>> 放入草稿
            </label>
        </div>
    </div>
    <!--内容-->
    <textarea class="col-sm-12" name="content" id="content"><?php echo isset($content) ? $content : ''; ?></textarea>
    <button type="submit" class="btn btn-primary">保 存</button>
</form>