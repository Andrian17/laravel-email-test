<?php

use App\Jobs\SendEmailJob;
use App\Mail\SendEmailTest;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/email-test', function () {
    // $data = [
    //     'name' => 'User Test aja',
    //     'body' => 'Testing Kirim OK'
    // ];
    // Mail::to('cimenmandada999@gmail.com')->send(new SendEmailTest($data));

    $output = new \Symfony\Component\Console\Output\ConsoleOutput(2);

    $val = 0;
    for ($i=0; $i < 100000; $i++) {
        $val++;
    }

    $userTarget = 'andriancimen123@gmail.com';
    dispatch(new SendEmailJob($userTarget));

    $output->writeln($val);

    // dd("Email Test Kirim aja");
});
