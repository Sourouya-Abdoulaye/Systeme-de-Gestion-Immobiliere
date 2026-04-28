<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BienController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProposController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard',[AdminController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

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






// Les biens Pour les administrateurs
Route::prefix("admin")
    ->middleware("auth")
    ->name("admin.")
    ->group(function () {

        Route::get("/biens", [BienController::class, "index"])->name("biens.index");
        Route::get("/biens/create", [BienController::class, "create"])->name("biens.create");
        Route::post("/biens", [BienController::class, "store"])->name("biens.store");
        Route::get("/biens/{id}/edit", [BienController::class, "edit"])->name("biens.edit");
        Route::put("/biens/{id}", [BienController::class, "update"])->name("biens.update");
        Route::delete("/biens/{id}", [BienController::class, "destroy"])->name("biens.delete");

    });

// Route::resource("admin/biens", BienController::class); //->middleware("auth")->names("admin.biens");








// pour les users
Route::get("/", [BienController::class, "index"])->name("biens.index");
Route::get("/biens/{id}", [BienController::class, "show"])->name("biens.show");




// propos
Route::get("/contact", [ProposController::class, "contact"])->name("contact");
Route::post("/send/email", [ProposController::class, "sendMessage"])->name("contact.send");



