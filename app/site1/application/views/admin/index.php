<?php
/**
 * User:  ShuHao
 * Date:  2017/3/17
 */
?>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Hover Data Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>标题</th>
                        <th>内容</th>
                        <th>创建时间</th>
                        <th>排序</th>
                        <th>发布状态</th>
                        <th>编辑</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($posts as $post): ?>
                        <tr>
                            <td><?php echo $post['title']; ?></td>
                            <td><?php echo $post['content']; ?></td>
                            <td><?php echo $post['created']; ?></td>
                            <td><?php echo $post['sort']; ?></td>
                            <td><?php echo $post['deleted']; ?></td>
                            <td>
                                <div data-id="<?php echo $post['id']; ?>" class="btn-group" role="group" aria-label="...">
                                    <button type="button" class="btn btn-primary edit">编辑</button>
                                    <button type="button" class="btn btn-danger delete">删除</button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->