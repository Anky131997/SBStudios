<!-- 1 -->
use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');

<!-- 2 -->
Route::get('/register', [RegisteredUserController::class, 'create'])
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store']);





Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('can:access-registration-form')
    ->name('register');



    use Illuminate\Support\Facades\Gate;

public function boot()
{
    $this->registerPolicies();

    Gate::define('access-registration-form', function ($user) {
        // Your custom logic here
        return true; // or false based on your conditions
    });
}




public function create()
{
    // Your code here
}

public function store(Request $request)
{
    // Your code here
}
