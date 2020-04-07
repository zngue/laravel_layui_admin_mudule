@include('zng::common.header')
<body class="childrenBody">
<form class="layui-form" action="">
    <div class="layui-form-item">
        <label class="layui-form-label">名称</label>
        <div class="layui-input-block">
            <input type="text" name="name" required  lay-verify="required" placeholder="请输入名称"  value="{{$data['name']}}" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">编辑模板</label>
        <div class="layui-input-block">
            <textarea name="edit_content" placeholder="请输入内容" class="layui-textarea">{{$data['edit_content']}}</textarea>
        </div>
    </div>
    <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">js模板</label>
        <div class="layui-input-block">
            <textarea name="js_content" placeholder="请输入内容" class="layui-textarea">{{$data['js_content']}}</textarea>
        </div>
    </div>
    <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">执行js</label>
        <div class="layui-input-block">
            <textarea name="ex_js_content" placeholder="请输入内容" class="layui-textarea">{{$data['ex_js_content']}}</textarea>
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
        <div class="layui-input-block">
            <input type="hidden" name="id" value="{{$data['id']}}">
            <button class="layui-btn" lay-submit lay-filter="save">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>
</body>
@include('zng::common.footer')
<script>

</script>
@include('zng::template.js')
