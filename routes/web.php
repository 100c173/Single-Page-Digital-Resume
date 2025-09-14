<?php

use App\DataObjects\Resume;
use App\Http\Controllers\ResumeController;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage ;

Route::get('/', [ResumeController::class,'index']);

Route::post('/download' , [ResumeController::class,'download']);
