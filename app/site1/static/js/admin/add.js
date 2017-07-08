/**
 * Created by hao on 2017/3/18.
 */

//初始化编辑器
var E = window.wangEditor;
var editor = new E('#editor');
editor.customConfig.uploadImgServer = '/post/upload_img'; // 上传图片到服务器
editor.customConfig.uploadImgMaxSize = 3 * 1024 * 1024;// 将图片大小限制为
editor.customConfig.uploadImgMaxLength = 1;//限制一次最多能传几张图片
editor.customConfig.uploadFileName = 'userfile';//自定义 fileName
editor.customConfig.uploadImgHooks = {
  success: function (xhr, editor, result) {
    // 图片上传并返回结果，图片插入成功之后触发
    // xhr 是 XMLHttpRequst 对象，editor 是编辑器对象，result 是服务器端返回的结果
    console.log(result);
  },
  fail: function (xhr, editor, result) {
    // 图片上传并返回结果，但图片插入错误时触发
    // xhr 是 XMLHttpRequst 对象，editor 是编辑器对象，result 是服务器端返回的结果
    console.log(result);
  }
};
editor.create();

$('#save').click(function () {
  //标题
  var title = $('#title').val();
  if(!title.trim()){
    alert('文章标题不能为空！');
    return false;
  }
  //text内容
  var text = editor.txt.text();
  if(!text.trim()){
    alert('保存内容不能为空');
    return false;
  }
  //html内容
  var html = editor.txt.html();
  //保存内容
  $.ajax('/post/add',{
    method:'post',
    data:{
      title:title,
      content:html
    },
    success:function () {
      alert('保存成功');
    }
  })
});