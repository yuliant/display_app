<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\ContohController;
use App\Http\Middleware\CheckRole;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ImportExportController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\AllRole;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DisplaySettingController;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\StudentOfTheMonthController;
use App\Http\Controllers\SchoolMessageController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NewsFeedController;
use App\Http\Controllers\TimetableController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\JamKeController;
use App\Http\Controllers\JadwalPelajaranController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\JadwalSalatController;
use App\Http\Controllers\HadisNabiController;
use App\Http\Controllers\JadwalJumatController;
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
Route::middleware(['auth', AllRole::class])->group(function () {
    Route::resource('employees', EmployeeController::class);
    Route::get('/employees/{id}', 'EmployeeController@show')->name('employees.show');
    Route::get('/employees/{id}/edit', 'EmployeeController@edit')->name('employees.edit');
    Route::put('/employees/{id}', 'EmployeeController@update')->name('employees.update');
    Route::delete('/employees/{id}', 'EmployeeController@destroy')->name('employees.destroy');
    Route::get('/silit', [ImportExportController::class, 'silit'])->name('employees.export');
    Route::post('/upload/employees',[ImportExportController::class,'upload'])->name('employees.upload');

    Route::get('/student-of-the-month', [StudentOfTheMonthController::class,'index'])->name('students.index');
    Route::get('/student-of-the-month/create',[StudentOfTheMonthController::class,'create'])->name('students.create');
    Route::get('/student-of-the-month/{student}/edit',[StudentOfTheMonthController::class,'edit'])->name('students.edit');
    Route::delete('/student-of-the-month/{id}',[StudentOfTheMonthController::class,'destroy'])->name('students.destroy');
    Route::post('/students', [StudentOfTheMonthController::class,'store'])->name('students.store');
    Route::put('/students/{student}', [StudentOfTheMonthController::class,'update'])->name('students.update');

    Route::get('/messages', [SchoolMessageController::class,'index'])->name('messages.index');
    Route::get('/messages/create', [SchoolMessageController::class,'create'])->name('messages.create');
    Route::get('/messages/{message}/edit', [SchoolMessageController::class,'edit'])->name('messages.edit');
    Route::delete('/messages/{message}', [SchoolMessageController::class,'destroy'])->name('messages.destroy');
    Route::post('/messages', [SchoolMessageController::class,'store'])->name('messages.store');
    Route::put('/messages/{message}', [SchoolMessageController::class,'update'])->name('messages.update');

    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');

    Route::get('/news-feed', [NewsFeedController::class, 'index'])->name('news-feed.index');
    Route::get('/news-feed/create', [NewsFeedController::class, 'create'])->name('news-feed.create');
    Route::post('/news-feed', [NewsFeedController::class, 'store'])->name('news-feed.store');
    Route::get('/news-feed/{id}/edit', [NewsFeedController::class, 'edit'])->name('news-feed.edit');
    Route::put('/news-feed/{id}', [NewsFeedController::class, 'update'])->name('news-feed.update');
    Route::delete('/news-feed/{id}', [NewsFeedController::class, 'destroy'])->name('news-feed.destroy');

    Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');
    Route::get('/guru/create', [GuruController::class, 'create'])->name('guru.create');
    Route::post('/guru', [GuruController::class, 'store'])->name('guru.store');
    Route::get('/guru/{id}', [GuruController::class, 'show'])->name('guru.show');
    Route::get('/guru/{id}/edit', [GuruController::class, 'edit'])->name('guru.edit');
    Route::put('/guru/{id}', [GuruController::class, 'update'])->name('guru.update');
    Route::delete('/guru/{id}', [GuruController::class, 'destroy'])->name('guru.destroy');
    Route::get('/guru/export/blanko', [GuruController::class, 'exportBlanko'])->name('guru.export.blanko');
    Route::post('/guru/import', [GuruController::class, 'import'])->name('guru.import');

    Route::get('/rombels', [RombelController::class, 'index'])->name('rombels.index');
    Route::get('/rombels/create', [RombelController::class, 'create'])->name('rombels.create');
    Route::post('/rombels', [RombelController::class, 'store'])->name('rombels.store');
    Route::get('/rombels/{id}/edit', [RombelController::class, 'edit'])->name('rombels.edit');
    Route::put('/rombels/{id}', [RombelController::class, 'update'])->name('rombels.update');
    Route::delete('/rombels/{id}', [RombelController::class, 'destroy'])->name('rombels.destroy');

    Route::get('/jamkes', [JamKeController::class, 'index'])->name('jamkes.index');
    Route::get('/jamkes/create', [JamKeController::class, 'create'])->name('jamkes.create');
    Route::post('/jamkes', [JamKeController::class, 'store'])->name('jamkes.store');
    Route::get('/jamkes/{id}/edit', [JamKeController::class, 'edit'])->name('jamkes.edit');
    Route::put('/jamkes/{id}', [JamKeController::class, 'update'])->name('jamkes.update');
    Route::delete('/jamkes/{id}', [JamKeController::class, 'destroy'])->name('jamkes.destroy');
    
    Route::get('/jadwal-pelajaran', [JadwalPelajaranController::class, 'index'])->name('jadwal.index');
    Route::post('/jadwal/simpan', [JadwalPelajaranController::class, 'store'])->name('simpan.jadwal');

    Route::get('/videos', [VideoController::class, 'index'])->name('videos.index');
    Route::get('/videos/create', [VideoController::class, 'create'])->name('videos.create');
    Route::post('/videos', [VideoController::class, 'store'])->name('videos.store');
    Route::get('/videos/{id}', [VideoController::class, 'show'])->name('videos.show');
    Route::get('/videos/{id}/edit', [VideoController::class, 'edit'])->name('videos.edit');
    Route::put('/videos/{id}', [VideoController::class, 'update'])->name('videos.update');
    Route::delete('/videos/{id}', [VideoController::class, 'destroy'])->name('videos.destroy');    

    Route::get('/jadwal-salat', [JadwalSalatController::class, 'getJadwalSalat']);

    Route::get('/hadis', [HadisNabiController::class, 'index'])->name('hadis.index');
    Route::get('/hadis/create', [HadisNabiController::class, 'create'])->name('hadis.create');
    Route::post('/hadis/store', [HadisNabiController::class, 'store'])->name('hadis.store');
    Route::get('/hadis/{id}/edit', [HadisNabiController::class, 'edit'])->name('hadis.edit');
    Route::put('/hadis/{id}/update', [HadisNabiController::class, 'update'])->name('hadis.update');
    Route::delete('/hadis/{id}/destroy', [HadisNabiController::class, 'destroy'])->name('hadis.destroy');   
    
    // Menampilkan semua jadwal Jumat
    Route::get('/jadwal-jumat', [JadwalJumatController::class, 'index'])->name('jadwal-jumat.index');
    
    // Menampilkan formulir untuk membuat jadwal Jumat baru
    Route::get('/jadwal-jumat/create', [JadwalJumatController::class, 'create'])->name('jadwal-jumat.create');
    
    // Menyimpan jadwal Jumat baru ke database
    Route::post('/jadwal-jumat', [JadwalJumatController::class, 'store'])->name('jadwal-jumat.store');
    
    // Menampilkan formulir untuk mengedit jadwal Jumat
    Route::get('/jadwal-jumat/{jadwalJumat}/edit', [JadwalJumatController::class, 'edit'])->name('jadwal-jumat.edit');
    
    // Mengupdate jadwal Jumat yang telah diedit ke dalam database
    Route::put('/jadwal-jumat/{jadwalJumat}', [JadwalJumatController::class, 'update'])->name('jadwal-jumat.update');
    
    // Menghapus jadwal Jumat dari database
    Route::delete('/jadwal-jumat/{jadwalJumat}', [JadwalJumatController::class, 'destroy'])->name('jadwal-jumat.destroy');
    
});

Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/master/users',[UserController::class,'index'])->name('users.data');  
    Route::get('/master/user/{id}',[UserController::class,'show'])->name('user.show');
    Route::get('/master/user/{id}/edit',[UserController::class,'edit'])->name('user.edit');
    Route::put('/master/user/{id}',[UserController::class,'update'])->name('user.update');
    Route::get('/master/create-user',[UserController::class,'create'])->name('user.create');
    Route::post('/master/user/new',[UserController::class,'store'])->name('user.store');  
    Route::get('/settings',[SettingController::class,'index'])->name('settings.index');    
    Route::post('/settings', [SettingController::class,'update'])->name('settings.update');
    Route::get('display-settings', [DisplaySettingController::class, 'index'])->name('display-settings.index');
    Route::get('display-settings/{id}/edit', [DisplaySettingController::class, 'edit'])->name('display-settings.edit');
    //Route::put('display-settings/{id}', [DisplaySettingController::class, 'update'])->name('display-settings.update'); 
    Route::put('/display-settings/update-all', [DisplaySettingController::class, 'update_all'])->name('display-settings.update-all');  
    
    Route::get('/link-storage',function(){
        Artisan::call('storage:link');
    })->name('link.storage');;
    // ... rute admin lainnya ...
});

Route::middleware(['auth', UserMiddleware::class])->group(function () {
    Route::get('/user/dashboard', [UserDashboardController::class,'index'])->name('user.dashboard');
    // ... rute user lainnya ...
});

Route::get('/', function () {
    if(Auth::check()){
        if(Auth::user()->role==='admin'){
            return redirect('admin/dashboard');
        }elseif(Auth::user()->role==='user'){
            return redirect('user/dashboard');
        }
    }
    return view('auth.login');
});

Route::get('/contoh',[ContohController::class,'index']);
Route::get('/download',[ContohController::class,'download']);


Route::get('/login', [AuthController::class, 'showLoginForm'], function(){
    if(Auth::check()){
        if(Auth::user()->role==='admin'){
            return redirect('admin.dashboard');
        }elseif(Auth::user()->role==='user'){
            return redirect('user.dashboard');
        }
    }
    return view('auth.login');    
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/unauthorized',function(){
    return view('auth.unauthorized');
});

Route::get('/display-screen',[DisplayController::class,'index'])->name('display.screen');
Route::get('/check-updates', [DisplayController::class,'checkUpdates']);








Route::get('/timetables', [TimetableController::class, 'index'])->name('timetables.index');
Route::get('/timetables/create', [TimetableController::class, 'create'])->name('timetables.create');
Route::post('/timetables', [TimetableController::class, 'store'])->name('timetables.store');
Route::get('/timetables/{timetable}/edit', [TimetableController::class, 'edit'])->name('timetables.edit');
Route::put('/timetables/{timetable}', [TimetableController::class, 'update'])->name('timetables.update');
Route::delete('/timetables/{timetable}', [TimetableController::class, 'destroy'])->name('timetables.destroy');
Route::post('/timetables/import', [TimetableController::class, 'import'])->name('timetables.import');
Route::get('/timetables/download-blanko', [TimetableController::class, 'downloadBlanko'])->name('timetables.download-blanko');












