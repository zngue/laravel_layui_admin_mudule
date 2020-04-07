<?php
$namespace = 'Zngue\Module\Http\Controller';
Route::namespace($namespace)->prefix('admin')->middleware(['web'])->group(function (){
    Route::middleware(['checkLogin','UserPermission'])->group(__DIR__.'/resources.php');
});


