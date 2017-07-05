/**
 * Created by hao on 2017/3/18.
 */
$(function () {
  //删除
  $('.delete').click(function () {
    var pid = $(this).closest('div').attr('data-id');
    var r = confirm('确定永久删除吗？此操作不可撤销！！');
    if(r){
      var tr = $(this).closest('tr');
      tr.addClass('animated bounceOutLeft').slideUp();

      $.ajax({
        url:'/post/delete',
        data:{id:pid},
        success:function () {
          console.log('delete ok');
        }
      });
    }
  });
  //编辑
  $('.edit').click(function () {
    var pid = $(this).closest('div').attr('data-id');
    location.href = '/post/update?id='+pid;
  });
});