<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use SaltBookmarks\Controllers\BookmarksResourcesController;

$version = config('app.API_VERSION', 'v1');

Route::middleware(['api'])
    ->prefix("api/{$version}")
    ->group(function () {

    // API: BOOKMARKS RESOURCES
    Route::get("bookmarks", [BookmarksResourcesController::class, 'index']); // get entire collection
    Route::post("bookmarks", [BookmarksResourcesController::class, 'store']); // create new collection

    Route::get("bookmarks/trash", [BookmarksResourcesController::class, 'trash']); // trash of collection

    Route::post("bookmarks/import", [BookmarksResourcesController::class, 'import']); // import collection from external
    Route::post("bookmarks/export", [BookmarksResourcesController::class, 'export']); // export entire collection
    Route::get("bookmarks/report", [BookmarksResourcesController::class, 'report']); // report collection

    Route::get("bookmarks/{id}/trashed", [BookmarksResourcesController::class, 'trashed'])->where('id', '[a-zA-Z0-9-]+'); // get collection by ID from trash

    // RESTORE data by ID (id), selected IDs (selected), and All data (all)
    Route::post("bookmarks/{id}/restore", [BookmarksResourcesController::class, 'restore'])->where('id', '[a-zA-Z0-9-]+'); // restore collection by ID

    // DELETE data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("bookmarks/{id}/delete", [BookmarksResourcesController::class, 'delete'])->where('id', '[a-zA-Z0-9-]+'); // hard delete collection by ID

    Route::get("bookmarks/{id}", [BookmarksResourcesController::class, 'show'])->where('id', '[a-zA-Z0-9-]+'); // get collection by ID
    Route::put("bookmarks/{id}", [BookmarksResourcesController::class, 'update'])->where('id', '[a-zA-Z0-9-]+'); // update collection by ID
    Route::patch("bookmarks/{id}", [BookmarksResourcesController::class, 'patch'])->where('id', '[a-zA-Z0-9-]+'); // patch collection by ID
    // DESTROY data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("bookmarks/{id}", [BookmarksResourcesController::class, 'destroy'])->where('id', '[a-zA-Z0-9-]+'); // soft delete a collection by ID

});
