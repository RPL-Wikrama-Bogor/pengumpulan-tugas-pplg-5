    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\LatesController;
    use App\Http\Controllers\UsersController;
    use App\Http\Controllers\RayonsController;
    use App\Http\Controllers\RombelsController;
    use App\Http\Controllers\StudentsController;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider and all of them will
    | be assigned to the "web" middleware group. Make something great!
    |
    */

    // Route::get('/login', function () {
    //     return view('login');
    // });
    // Route::get('/', function() {
    //     return view('login');
    // });

    // Rute untuk menangani 404
    Route::fallback(function () {
        return view('404');
    });

    Route::get('/', function() {
        return view('login');
    })->name('login')->middleware('guest');
    Route::post('/login-auth', [UsersController::class, 'loginAuth'])->name('login.auth');

    Route::middleware('IsLogin')->group(function() {
        Route::get('/logout', [UsersController::class, 'logout'])->name('logout');
    });
    
    Route::middleware('IsAdmin')->group(function() {
    Route::get('/dashboard', [StudentsController::class, 'home'])->name('admin.home');
    Route::prefix('lates')->name('lates.')->group(function() {
        Route::get('/', [LatesController::class, 'index'])->name('index');
        Route::get('/create', [LatesController::class, 'create'])->name('create'); 
        Route::post('/store', [LatesController::class, 'store'])->name('store');
        Route::get('{id}/edit/', [LatesController::class, 'edit'])->name('edit');
        Route::patch('{id}/update', [LatesController::class, 'update'])->name('update');
        Route::get('/export-excel', [LatesController::class, 'exportExcel'])->name('export-excel');
        Route::get('/search', [LatesController::class, 'search'])->name('search');
        Route::get('/show/{student_id}', [LatesController::class, 'show'])->name('show');
        Route::get('/export-pdf/{student_id}', [LatesController::class, 'exportPdf'])->name('exportPdf');
        Route::delete('/delete/{id}', [LatesController::class, 'delete'])->name('delete');
    });



    Route::prefix('user')->name('user.')->group(function() {
        Route::get('/', [UsersController::class, 'index'])->name('index');
        Route::get('/create', [UsersController::class, 'create'])->name('create'); 
        Route::post('/store', [UsersController::class, 'store'])->name('store');
        Route::get('{id}/edit/', [UsersController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [UsersController::class, 'update'])->name('update');
    });

    Route::prefix('rayon')->name('rayon.')->group(function() {
        Route::get('/', [RayonsController::class, 'index'])->name('index');
        Route::get('/create', [RayonsController::class, 'create'])->name('create'); 
        Route::post('/store', [RayonsController::class, 'store'])->name('store');
        Route::get('{id}/edit', [RayonsController::class, 'edit'])->name('edit');
        Route::patch('{id}/update', [RayonsController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [RayonsController::class, 'destroy'])->name('delete');
        Route::get('/search', [RayonsController::class, 'search'])->name('search');
    });

    Route::prefix('rombel')->name('rombel.')->group(function() {
        Route::get('/', [RombelsController::class, 'index'])->name('index');
        Route::get('/create', [RombelsController::class, 'create'])->name('create'); 
        Route::post('/store', [RombelsController::class, 'store'])->name('store');
        Route::get('{id}/edit', [RombelsController::class, 'edit'])->name('edit');
        Route::patch('{id}/update', [RombelsController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [RombelsController::class, 'delete'])->name('delete');
        Route::get('/search', [RombelsController::class, 'search'])->name('search');
    });

    Route::prefix('students')->name('students.')->group(function() {
        Route::get('/', [StudentsController::class, 'index'])->name('index');
        Route::get('/create', [StudentsController::class, 'create'])->name('create'); 
        Route::post('/store', [StudentsController::class, 'store'])->name('store');
        Route::get('{id}/edit', [StudentsController::class, 'edit'])->name('edit');
        Route::patch('{id}/update', [StudentsController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [StudentsController::class, 'delete'])->name('delete');
        Route::get('/search', [StudentsController::class, 'search'])->name('search');
    });
});

Route::middleware('Ispembimbing')->group(function () {
    Route::get('/dashboard-pemb', [StudentsController::class, 'dash'])->name('pembimbing.dash');
    Route::get('/data-telat', [LatesController::class, 'telat'])->name('pembimbing.telat');
    Route::get('/data-siswa', [StudentsController::class, 'siswa'])->name('pembimbing.siswa');
    Route::get('/search', [StudentsController::class, 'searchPs'])->name('pembimbing.search');
    Route::get('/export-excel', [LatesController::class, 'telatExcel'])->name('pembimbing.export-excel');
    Route::get('/search-telat', [LatesController::class, 'searchTelat'])->name('pembimbing.searchtelat');
    Route::get('/show/{student_id}', [LatesController::class, 'showTelat'])->name('pembimbing.showtelat');
    Route::get('/export-pdf/{student_id}', [LatesController::class, 'exportPsPdf'])->name('pembimbing.pdf');
}); 