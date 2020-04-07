<?php
Route::prefix('module')->name('module.')->group(function (){
    Route::get('index','ModuleController@index')->name('index');
    Route::post('del','ModuleController@del')->name('del');
    Route::get('add','ModuleController@add')->name('add');
    Route::post('doAdd','ModuleController@doAdd')->name('doAdd');
    Route::post('status','ModuleController@changeStatus')->name('status');
    Route::get('save','ModuleController@save')->name('save');
    Route::post('doSave','ModuleController@doSave')->name('doSave');
    Route::post('delAll',"ModuleController@delAll")->name('delAll');
});
Route::prefix('field')->name('field.')->group(function (){//表管理
    Route::get('index','FieldController@index')->name('index');
    Route::post('del','FieldController@del')->name('del');
    Route::get('add','FieldController@add')->name('add');
    Route::post('doAdd','FieldController@doAdd')->name('doAdd');
    Route::post('status','FieldController@changeStatus')->name('status');
    Route::get('save','FieldController@save')->name('save');
    Route::post('doSave','FieldController@doSave')->name('doSave');
    Route::post('delAll',"FieldController@delAll")->name('delAll');
    Route::get('ajaxList',"FieldController@tempAjaxList")->name('ajaxList');

});
Route::prefix('template')->name('template.')->group(function (){
    Route::get('index','TemplateController@index')->name('index');
    Route::post('del','TemplateController@del')->name('del');
    Route::get('add','TemplateController@add')->name('add');
    Route::post('doAdd','TemplateController@doAdd')->name('doAdd');
    Route::post('status','TemplateController@changeStatus')->name('status');
    Route::get('save','TemplateController@save')->name('save');
    Route::post('doSave','TemplateController@doSave')->name('doSave');
    Route::post('delAll',"TemplateController@delAll")->name('delAll');
});
Route::prefix('validator')->name('validator.')->group(function (){
    Route::get('index','ValidatorController@index')->name('index');
    Route::post('del','ValidatorController@del')->name('del');
    Route::get('add','ValidatorController@add')->name('add');
    Route::post('doAdd','ValidatorController@doAdd')->name('doAdd');
    Route::post('status','ValidatorController@changeStatus')->name('status');
    Route::get('save','ValidatorController@save')->name('save');
    Route::post('doSave','ValidatorController@doSave')->name('doSave');
    Route::post('delAll',"ValidatorController@delAll")->name('delAll');
});
