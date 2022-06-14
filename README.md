# Ade Dwi Prayitno 358
Tugas CP MK3 & MK4

## Tools Version
* Laravel->9.*
* PHP->8.1.6
## MySQL
[Link Database](https://drive.google.com/file/d/1C02UscGWMe4HHqzSxOif-Ih3_7kA5rfm/view?usp=sharing)

## Web Routes

```php
//View
//Halaman Login
Route::get('/', [AuthController::class, 'login']);
//Register
Route::get('/register', [AuthController::class, 'register']);

//create user / register logic/handler
Route::post('/create-user', [AuthController::class, 'createuser']);
//user login logic/handler
Route::post('/user-login', [AuthController::class, 'userlogin']);
```

## Auth Controller
```php
class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function createuser(Request $request)
    {
        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect('/register');
    }

    public function userlogin(Request $request)
    {
        $auth = Auth::attempt([
            'email'=> $request->email,
            'password'=> $request->password
        ]);

        if ($auth){
//            return redirect('/home');
            return "berhasil loginn";
        }else{
            return "Gagal Login Masszeh";
        }
    }
}
```
