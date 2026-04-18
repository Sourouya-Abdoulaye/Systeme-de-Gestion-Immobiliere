<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';





Route::get("envoyer/email", function () {
    // Mail::to("issofa@gmail.com")->send(new nom_controller());

     Mail::raw("Merci pour votre visite sur mon site d'immobilier ", function ($message) {
        $message->to('issofa@example.com')
                ->subject("c'est un Test rapide de sourouya  ");
    });

    return 'Email envoyé';

});

