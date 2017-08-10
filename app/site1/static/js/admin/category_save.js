
//保存
$('#save').click(function () {
  var category_id = $('#category-id').val();
  var category_name = $('#category-name').val().trim();
  console.log(category_name);
  console.log(category_id);
  if(!category_name){
    alert('分类名不能为空');
    return false;
  }
  $.ajax({
      url:'/category/update_category',
      type:'post',
      data:{
        id:category_id,
        name:category_name
      },
      dataType:"json",
      success:function (data) {
        console.log(data);
        if(!data['status']){
          alert('修改成功');
        }else{
          alert('修改失败');
        }
      }
    }
  );
});

//删除
