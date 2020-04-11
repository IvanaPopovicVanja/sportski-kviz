<?php
    Route::set('users', function ($id) {
        HomeController::CreateView();
    });

    Route::set('users/{id}', function ($id) {
        echo "user id route";
    });
?>