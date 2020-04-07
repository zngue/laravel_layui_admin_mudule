##  安装
```
composer 命令直接安装
```
## 发布命令
```
php artisan zng:module
```
### 权限添加
#### uri 跳转地址
#### route_name 权限地址
#### name 权限名称
```
[
    {
        "name": "模型管理",
        "uri": "module.index",
        "route_name": "module.index"
    },
    {
        "name": "模型列表",
        "uri": "module.index",
        "route_name": "module.index"
    },
    {
        "name": "添加模型",
        "uri": "module.add",
        "route_name": "module.add|module.doAdd"
    },
    {
        "name": "修改模型",
        "uri": "module.save",
        "route_name": "module.save|module.doSave|module.status"
    },
    {
        "name": "字段列表",
        "uri": "field.index",
        "route_name": "field.index"
    },
    {
        "name": "删除模型",
        "uri": "module.del",
        "route_name": "module.del"
    },
    {
        "name": "添加字段",
        "uri": "field.add",
        "route_name": "field.add|field.doAdd"
    },
    {
        "name": "修改字段",
        "uri": "field.save",
        "route_name": "field.save|field.doSave|field.status"
    }
]

```
##运行命令
```
php artisan serve
```
