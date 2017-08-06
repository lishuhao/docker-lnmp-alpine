<?php
/**
 * User:  ShuHao
 * Date:  2017/7/8
 */
?>
<div class="row expanded ">
    <form action="">
        <div class="column small-7">
                <!--商品名-->
                <div class="row">
                    <div class="small-3 columns">
                        <label for="name" class="text-right middle">商品名：</label>
                    </div>
                    <div class="small-9 columns">
                        <input type="text" id="name" placeholder="请输入商品名">
                    </div>
                </div>
                <!--商品图片-->
                <div class="row">
                    <div class="small-3 columns">
                        <label for="img" class="text-right middle">商品图片：</label>
                    </div>
                    <div class="small-9 columns">
                        <input type="text" id="img" placeholder="请输入商品图片">
                    </div>
                </div>
                <!--商品详情-->
                <div class="row">
                    <div class="small-3 columns">
                        <label for="detail" class="text-right middle">商品详情：</label>
                    </div>
                    <div class="small-9 columns">
                        <input type="text" id="detail" placeholder="请输入商品详情">
                    </div>
                </div>
        </div>
        <div class="column small-5">
            <!--原价-->
            <div class="row">
                <div class="small-3 columns">
                    <label for="original_price" class="text-right middle">原价／元：</label>
                </div>
                <div class="small-9 columns">
                    <input type="number" id="original_price" placeholder="原价">
                </div>
            </div>
            <!--现价-->
            <div class="row">
                <div class="small-3 columns">
                    <label for="current_price" class="text-right middle">现价／元：</label>
                </div>
                <div class="small-9 columns">
                    <input type="number" id="current_price" placeholder="现价">
                </div>
            </div>
            <!--所属分类-->
            <div class="row">
                <div class="small-3 columns">
                    <label for="cat" class="text-right middle">所属分类：</label>
                </div>
                <div class="small-9 columns">
                    <select id="cat">
                        <option value="husker">Husker</option>
                        <option value="starbuck">Starbuck</option>
                        <option value="hotdog">Hot Dog</option>
                        <option value="apollo">Apollo</option>
                    </select>
                </div>
            </div>
            <!--是否上架-->
            <div class="row">
                <div class="small-3 columns">
                    <label for="active" class="text-right middle">是否上架：</label>
                </div>
                <div class="small-9 columns">
                    <input type="checkbox" checked id="active" >
                </div>
            </div>
        </div>
    </form>
</div>