<?php

use App\Http\Controllers\API\InvoiceController;
use App\Http\Controllers\API\ItemController;
use App\Http\Controllers\API\LoginController;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('save-payment', function(Request $request) {
    Log::debug('request to save payment details', (array) $request->input('payment'));
    $payment = Payment::create([
      "reference_number" =>  $request->input('payment')['id'],
      'status' => $request->input('payment')['status'],
      'amount' => $request->input('payment')['amount'],
      'fee' => $request->input('payment')['fee'],
      'currency' => $request->input('payment')['currency'],
      'refunded' => $request->input('payment')['refunded'],
      'refunded_at' => $request->input('payment')['refunded_at'],
      'captured' => $request->input('payment')['captured'],
      'captured_at' => $request->input('payment')['captured_at'],
      'voided_at' => $request->input('payment')['voided_at'],
      'description' => $request->input('payment')['description'],
      'amount_format' => $request->input('payment')['amount_format'],
      'fee_format' => $request->input('payment')['fee_format'],
      'refunded_format' => $request->input('payment')['refunded_format'],
      'captured_format' => $request->input('payment')['captured_format'],
      'invoice_id' => $request->input('payment')['invoice_id'],
      'ip' => $request->input('payment')['ip'],
      'callback_url' => $request->input('payment')['callback_url'],
      'source' => json_encode($request->input('payment')['source']),
      'user_id' => User::findByUuidOrFail($request->input('user'))->id
    ]);

    if($payment){
      return response()->json([], 200);
    }else{
      return response()->json("payment was not saved", 401);
    }
})->name('payment.save');

Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return $user->createToken($request->device_name)->plainTextToken;
});

Route::middleware('auth:sanctum')->resource('/invoices', InvoiceController::class);
Route::middleware('auth:sanctum')->resource('/items', ItemController::class);
