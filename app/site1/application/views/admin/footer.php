<?php
/**
 * User:  ShuHao
 * Date:  2017/7/8
 */
?>
</div>
</div>
</div>
<script src="<?php echo base_url('static/foundation/js/vendor/jquery.js');?>"></script>
<script src="<?php echo base_url('static/foundation/js/vendor/what-input.js');?>"></script>
<script src="<?php echo base_url('static/foundation/js/vendor/foundation.js');?>"></script>
<script>
    //初始化foundation
    $(document).foundation();
</script>

<!--js文件-->
<?php if (isset($js) && !empty($js)): ?>
    <?php foreach ($js as $item): ?>
        <script src="<?php echo $item; ?>"></script>
    <?php endforeach; ?>
<?php endif; ?>

<script>
    $(function () {
        //退出登录
        $('#logout').click(function () {
            var r = confirm('确定退出？');
            if(r){
                $.ajax('/admin/logout',{
                    method:'get',
                    success:function () {
                        location.href = '/admin/login';
                    }
                })
            }
        })
    })
</script>
</body>
</html>