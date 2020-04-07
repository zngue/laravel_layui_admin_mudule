@include('zng::common.header')
<body class="childrenBody">
    <form class="layui-form" action="">

        <div class="layui-form-item">
            <label class="layui-form-label">字段名称</label>
            <div class="layui-input-block">
                <input type="text" name="name" required  lay-verify="required" placeholder="请输入字段名称 英文" autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">字段别名</label>
            <div class="layui-input-block">
                <input type="text" name="name_alias" required  lay-verify="required" placeholder="请输入字段别名" autocomplete="off" class="layui-input">
            </div>
        </div>


        <div class="layui-form-item">
            <label class="layui-form-label">字段长度</label>
            <div class="layui-input-block">
                <input type="text" name="name_length"   autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">默认值</label>
            <div class="layui-input-block">
                <input type="text" name="default"  placeholder="请输入字默认值" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">模板选择</label>
            <div id="temp_id">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">选择框</label>
            <div class="layui-input-block">
                <select name="type" lay-verify="required">
                    <option value=""></option>
                    <option value="string">string</option>
                    <option value="bigInteger">bigInteger</option>
                    <option value="integer">integer</option>
                    <option value="mediumInteger">mediumInteger</option>
                    <option value="smallInteger">smallInteger</option>
                    <option value="time">time</option>
                    <option value="timeStamp">timeStamp</option>
                    <option value="dateTime">dateTime</option>
                    <option value="decimal">decimal</option>
                    <option value="date">date</option>
                    <option value="tinyInteger">tinyInteger</option>
                    <option value="text">text</option>
                    <option value="mediumText">mediumText</option>
                    <option value="longText">longText</option>
                    <option value="double">double</option>
                    <option value="float">float</option>
                </select>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">状态</label>
            <div class="layui-input-block">
                <input type="radio" name="status" value="1" title="正常" checked>
                <input type="radio" name="status" value="0" title="禁用" >
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">列表显示</label>
            <div class="layui-input-block">
                <input type="radio" name="is_show_list" value="1" title="是" checked>
                <input type="radio" name="is_show_list" value="0" title="否" >
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">字段验证</label>
            <div class="layui-input-block">
                <input type="checkbox" name="verify[]" value="required" title="required" lay-skin="primary" checked>
                <input type="checkbox" name="verify[]" value="phone" title="phone" lay-skin="primary">
                <input type="checkbox" name="verify[]" value="email" title="email" lay-skin="primary">
                <input type="checkbox" name="verify[]" value="url" title="url" lay-skin="primary">
                <input type="checkbox" name="verify[]" value="number" title="number" lay-skin="primary">
                <input type="checkbox" name="verify[]" value="date" title="date" lay-skin="primary">
                <input type="checkbox" name="verify[]" value="identity" title="identity" lay-skin="primary">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">表单验证</label>
            <div class="layui-input-block">
                @foreach($list_valid as $v)
                    <input type="checkbox" name="verify_from[]" value="{{$v['name']}}" title="{{$v['name']}}" lay-skin="primary">
                @endforeach
            </div>
        </div>

        <div class="layui-form-item">
            <div class="layui-input-block">
                <input type="hidden" name="mod_id" value="{{$mid}}">
                <button class="layui-btn" lay-submit lay-filter="add">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>
</body>
@include('zng::common.footer')
@include('zng::field.js')
<script>
    /*var roleEditUrl = "{{route('permission.editRole')}}"
        ajaxListUrl = "{{route('permission.ajaxList')}}"
    layui.use(['form','jquery','layer','selectN'],function () {
        var form = layui.form,$ = layui.jquery,layer = parent.layer === undefined ? layui.layer : top.layer,selectN= layui.selectN,pid=0


        form.on('submit(addPermission)',function (d) {
            $.post(roleEditUrl,d.field,function (r) {
                if(r.statusCode===200){
                    top.layer.msg(r.message);
                    layer.closeAll("iframe");
                    parent.location.reload();
                }else{
                    top.layer.msg(r.message);
                }
                return false
            },'json')
            return false
        })

    })*/

</script>
