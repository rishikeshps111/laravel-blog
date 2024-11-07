<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::controller(FrontendController::class)->group(function () {
    Route::get("", "index")->name("BlogList");

    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get("blog/{id}", "blog_info")->name("BlogInfo");
        Route::post("comment", "comment")->name("BlogComment");
        Route::post("edit-comment/{id}", "edit_comment")->name("EditComment");
        Route::post("delete-comment/{id}", "delete_comment")->name("DeleteComment");

        Route::post("subcomment", "subcomment")->name("BlogSubComment");
        Route::post("edit-subcomment/{id}", "edit_subcomment")->name("EditSubComment");
        Route::post("delete-subcomment/{id}", "delete_subcomment")->name("DeleteSubComment");

    });
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
