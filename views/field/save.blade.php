@include('zng::common.header')
<body class="childrenBody">
    <form class="layui-form" action="">

        <div class="layui-form-item">
            <label class="layui-form-label">字段名称</label>
            <div class="layui-input-block">
                <input type="text" name="name"  value="{{$data['name']}}" required  lay-verify="required" placeholder="请输入字段名称 英文" autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">字段别名</label>
            <div class="layui-input-block">
                <input type="text" name="name_alias"  value="{{$data['name_alias']}}"  required  lay-verify="required" placeholder="请输入字段别名" autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">字段长度</label>
            <div class="layui-input-block">
                <input type="text" name="name_length" value="{{$data['name_length']}}"   autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">默认值</label>
            <div class="layui-input-block">
                <input type="text" name="default"  value="{{$data['default']}}"  placeholder="请输入字默认值" autocomplete="off" class="layui-input">
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
                    <option {{$data['type']=='string'?'selected':'' }}  value="string">string</option>
                    <option {{$data['type']=='integer'?'selected':'' }} value="integer">integer</option>
                    <option {{$data['type']=='text'?'selected':'' }} value="text">text</option>
                    <option {{$data['type']=='bigInteger'?'selected':'' }} value="bigInteger">bigInteger</option>
                    <option {{$data['type']=='mediumInteger'?'selected':'' }} value="mediumInteger">mediumInteger</option>
                    <option {{$data['type']=='smallInteger'?'selected':'' }} value="smallInteger">smallInteger</option>
                    <option {{$data['type']=='time'?'selected':'' }} value="time">time</option>
                    <option {{$data['type']=='timeStamp'?'selected':'' }} value="timeStamp">timeStamp</option>
                    <option {{$data['type']=='dateTime'?'selected':'' }} value="dateTime">dateTime</option>
                    <option {{$data['type']=='decimal'?'selected':'' }} value="decimal">decimal</option>
                    <option {{$data['type']=='date'?'selected':'' }} value="date">date</option>
                    <option {{$data['type']=='tinyInteger'?'selected':'' }} value="tinyInteger">tinyInteger</option>
                    <option {{$data['type']=='mediumText'?'selected':'' }} value="mediumText">mediumText</option>
                    <option {{$data['type']=='longText'?'selected':'' }} value="longText">longText</option>
                    <option {{$data['type']=='double'?'selected':'' }} value="double">double</option>
                    <option {{$data['type']=='float'?'selected':'' }} value="float">float</option>
                </select>
            </div>
        </div>


        <div class="layui-form-item">
            <label class="layui-form-label">状态</label>
            <div class="layui-input-block">
                <input type="hidden" name="mod_id" value="{{$data['mod_id']}}">
                <input type="radio" name="status" {{ $data['status']==1?'checked': '' }}  value="1" title="正常" >
                <input type="radio" name="status" {{ $data['status']==1?'checked': '' }}  value="0" title="禁用" >
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">列表显示</label>
            <div class="layui-input-block">
                <input type="radio" name="is_show_list"  {{ $data['is_show_list']==1?'checked': '' }}    value="1" title="是" checked>
                <input type="radio" name="is_show_list"   {{ $data['is_show_list']==1?'checked': '' }}     value="0" title="否" >
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">字段验证</label>
            <div class="layui-input-block">
                @php
                    $verify_arr = explode('|',$data['verify']);
                @endphp
                <input type="checkbox" name="verify[]" {{ in_array('required',$verify_arr)?'checked':''}}   value="required" title="required" lay-skin="primary" >
                <input type="checkbox" name="verify[]" {{ in_array('phone',$verify_arr)?'checked':''}}  value="phone" title="phone" lay-skin="primary">
                <input type="checkbox" name="verify[]" {{ in_array('email',$verify_arr)?'checked':''}}  value="email" title="email" lay-skin="primary">
                <input type="checkbox" name="verify[]" {{ in_array('url',$verify_arr)?'checked':''}}  value="url" title="url" lay-skin="primary">
                <input type="checkbox" name="verify[]" {{ in_array('number',$verify_arr)?'checked':''}}  value="number" title="number" lay-skin="primary">
                <input type="checkbox" name="verify[]" {{ in_array('date',$verify_arr)?'checked':''}}  value="date" title="date" lay-skin="primary">
                <input type="checkbox" name="verify[]" {{ in_array('identity',$verify_arr)?'checked':''}}  value="identity" title="identity" lay-skin="primary">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">表单验证</label>
            <div class="layui-input-block">
                @php
                    $verify_from = explode('|',$data['verify_from']);
                @endphp
                @foreach($list_valid as $v)
                    <input type="checkbox" name="verify_from[]"    {{ in_array($v['name'],$verify_from)?'checked':''}}   value="{{$v['name']}}" title="{{$v['name']}}" lay-skin="primary">
                @endforeach
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
@include('zng::field.js')
