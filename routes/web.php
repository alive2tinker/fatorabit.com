<?php

use App\Http\Controllers\ChangeLocaleController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PostController;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\ConfirmablePasswordController;
use Laravel\Fortify\Http\Controllers\ConfirmedPasswordStatusController;
use Laravel\Fortify\Http\Controllers\EmailVerificationNotificationController;
use Laravel\Fortify\Http\Controllers\EmailVerificationPromptController;
use Laravel\Fortify\Http\Controllers\NewPasswordController;
use Laravel\Fortify\Http\Controllers\PasswordController;
use Laravel\Fortify\Http\Controllers\PasswordResetLinkController;
use Laravel\Fortify\Http\Controllers\ProfileInformationController;
use Laravel\Fortify\Http\Controllers\RecoveryCodeController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Laravel\Fortify\Http\Controllers\TwoFactorAuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\TwoFactorAuthenticationController;
use Laravel\Fortify\Http\Controllers\TwoFactorQrCodeController;
use Laravel\Fortify\Http\Controllers\VerifyEmailController;
use Laravel\Jetstream\Http\Controllers\CurrentTeamController;
use Laravel\Jetstream\Http\Controllers\Inertia\ApiTokenController;
use Laravel\Jetstream\Http\Controllers\Inertia\CurrentUserController;
use Laravel\Jetstream\Http\Controllers\Inertia\OtherBrowserSessionsController;
use Laravel\Jetstream\Http\Controllers\Inertia\PrivacyPolicyController;
use Laravel\Jetstream\Http\Controllers\Inertia\ProfilePhotoController;
use Laravel\Jetstream\Http\Controllers\Inertia\TeamController;
use Laravel\Jetstream\Http\Controllers\Inertia\TeamMemberController;
use Laravel\Jetstream\Http\Controllers\Inertia\TermsOfServiceController;
use Laravel\Jetstream\Http\Controllers\Inertia\UserProfileController;
use Laravel\Jetstream\Http\Controllers\TeamInvitationController;
use Laravel\Jetstream\Jetstream;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/change-locale/{locale}', ChangeLocaleController::class)->name('locale.change');
Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
    Route::get('/', function () {
        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    });

    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
        return Inertia::render('Dashboard', [
            'stats' => [
                [
                    'name' => "Invoices",
                    'stat' => Auth::user()->invoices->count()
                ],
                [
                    'name' => "Invoices Total",
                    'stat' => Auth::user()->invoices->sum('total')
                ],
                [
                    'name' => "Items",
                    'stat' => Auth::user()->items->count()
                ]
            ],
            'posts' => PostResource::collection(Post::with('user','categories')->orderby('created_at','desc')->get())
        ]);
    })->name('dashboard');

    Route::get('/invoices/{invoice}/print', [InvoiceController::class, 'print'])->name('invoices.print');
    Route::get('/invoices/{invoice}/printPdf', [InvoiceController::class, 'printPdf'])->name('invoices.printPdf');

    Route::middleware(['auth:sanctum'])->resource('items', ItemController::class);

    Route::middleware(['auth:sanctum'])->resource('invoices', InvoiceController::class);

    Route::get('/posts/{post}',[PostController::class, 'show'])->name('posts.show');

    Route::group(['middleware' => config('fortify.middleware', ['web'])], function () {
        $enableViews = config('fortify.views', true);

        // Authentication...
        if ($enableViews) {
            Route::get('/login', [AuthenticatedSessionController::class, 'create'])
                ->middleware(['guest:' . config('fortify.guard')])
                ->name('login');
        }

        $limiter = config('fortify.limiters.login');
        $twoFactorLimiter = config('fortify.limiters.two-factor');
        $verificationLimiter = config('fortify.limiters.verification', '6,1');

        Route::post('/login', [AuthenticatedSessionController::class, 'store'])
            ->middleware(array_filter([
                'guest:' . config('fortify.guard'),
                $limiter ? 'throttle:' . $limiter : null,
            ]));

        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('logout');

        // Password Reset...
        if (Features::enabled(Features::resetPasswords())) {
            if ($enableViews) {
                Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
                    ->middleware(['guest:' . config('fortify.guard')])
                    ->name('password.request');

                Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
                    ->middleware(['guest:' . config('fortify.guard')])
                    ->name('password.reset');
            }

            Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->middleware(['guest:' . config('fortify.guard')])
                ->name('password.email');

            Route::post('/reset-password', [NewPasswordController::class, 'store'])
                ->middleware(['guest:' . config('fortify.guard')])
                ->name('password.update');
        }

        // Registration...
        if (Features::enabled(Features::registration())) {
            if ($enableViews) {
                Route::get('/register', [RegisteredUserController::class, 'create'])
                    ->middleware(['guest:' . config('fortify.guard')])
                    ->name('register');
            }

            Route::post('/register', [RegisteredUserController::class, 'store'])
                ->middleware(['guest:' . config('fortify.guard')]);
        }

        // Email Verification...
        if (Features::enabled(Features::emailVerification())) {
            if ($enableViews) {
                Route::get('/email/verify', [EmailVerificationPromptController::class, '__invoke'])
                    ->middleware(['auth:' . config('fortify.guard')])
                    ->name('verification.notice');
            }

            Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['auth:' . config('fortify.guard'), 'signed', 'throttle:' . $verificationLimiter])
                ->name('verification.verify');

            Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware(['auth:' . config('fortify.guard'), 'throttle:' . $verificationLimiter])
                ->name('verification.send');
        }

        // Profile Information...
        if (Features::enabled(Features::updateProfileInformation())) {
            Route::put('/user/profile-information', [ProfileInformationController::class, 'update'])
                ->middleware(['auth:' . config('fortify.guard')])
                ->name('user-profile-information.update');
        }

        // Passwords...
        if (Features::enabled(Features::updatePasswords())) {
            Route::put('/user/password', [PasswordController::class, 'update'])
                ->middleware(['auth:' . config('fortify.guard')])
                ->name('user-password.update');
        }

        // Password Confirmation...
        if ($enableViews) {
            Route::get('/user/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->middleware(['auth:' . config('fortify.guard')])
                ->name('password.confirm');
        }

        Route::get('/user/confirmed-password-status', [ConfirmedPasswordStatusController::class, 'show'])
            ->middleware(['auth:' . config('fortify.guard')])
            ->name('password.confirmation');

        Route::post('/user/confirm-password', [ConfirmablePasswordController::class, 'store'])
            ->middleware(['auth:' . config('fortify.guard')]);

        // Two Factor Authentication...
        if (Features::enabled(Features::twoFactorAuthentication())) {
            if ($enableViews) {
                Route::get('/two-factor-challenge', [TwoFactorAuthenticatedSessionController::class, 'create'])
                    ->middleware(['guest:' . config('fortify.guard')])
                    ->name('two-factor.login');
            }

            Route::post('/two-factor-challenge', [TwoFactorAuthenticatedSessionController::class, 'store'])
                ->middleware(array_filter([
                    'guest:' . config('fortify.guard'),
                    $twoFactorLimiter ? 'throttle:' . $twoFactorLimiter : null,
                ]));

            $twoFactorMiddleware = Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword')
                ? ['auth:' . config('fortify.guard'), 'password.confirm']
                : ['auth:' . config('fortify.guard')];

            Route::post('/user/two-factor-authentication', [TwoFactorAuthenticationController::class, 'store'])
                ->middleware($twoFactorMiddleware)
                ->name('two-factor.enable');

            Route::delete('/user/two-factor-authentication', [TwoFactorAuthenticationController::class, 'destroy'])
                ->middleware($twoFactorMiddleware)
                ->name('two-factor.disable');

            Route::get('/user/two-factor-qr-code', [TwoFactorQrCodeController::class, 'show'])
                ->middleware($twoFactorMiddleware)
                ->name('two-factor.qr-code');

            Route::get('/user/two-factor-recovery-codes', [RecoveryCodeController::class, 'index'])
                ->middleware($twoFactorMiddleware)
                ->name('two-factor.recovery-codes');

            Route::post('/user/two-factor-recovery-codes', [RecoveryCodeController::class, 'store'])
                ->middleware($twoFactorMiddleware);
        }
    });
    Route::group(['middleware' => config('jetstream.middleware', ['web'])], function () {
        if (Jetstream::hasTermsAndPrivacyPolicyFeature()) {
            Route::get('/terms-of-service', [TermsOfServiceController::class, 'show'])->name('terms.show');
            Route::get('/privacy-policy', [PrivacyPolicyController::class, 'show'])->name('policy.show');
        }

        Route::group(['middleware' => ['auth', 'verified']], function () {
            // User & Profile...
            Route::get('/user/profile', [UserProfileController::class, 'show'])
                ->name('profile.show');

            Route::delete('/user/other-browser-sessions', [OtherBrowserSessionsController::class, 'destroy'])
                ->name('other-browser-sessions.destroy');

            Route::delete('/user/profile-photo', [ProfilePhotoController::class, 'destroy'])
                ->name('current-user-photo.destroy');

            if (Jetstream::hasAccountDeletionFeatures()) {
                Route::delete('/user', [CurrentUserController::class, 'destroy'])
                    ->name('current-user.destroy');
            }

            // API...
            if (Jetstream::hasApiFeatures()) {
                Route::get('/user/api-tokens', [ApiTokenController::class, 'index'])->name('api-tokens.index');
                Route::post('/user/api-tokens', [ApiTokenController::class, 'store'])->name('api-tokens.store');
                Route::put('/user/api-tokens/{token}', [ApiTokenController::class, 'update'])->name('api-tokens.update');
                Route::delete('/user/api-tokens/{token}', [ApiTokenController::class, 'destroy'])->name('api-tokens.destroy');
            }

            // Teams...
            if (Jetstream::hasTeamFeatures()) {
                Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
                Route::post('/teams', [TeamController::class, 'store'])->name('teams.store');
                Route::get('/teams/{team}', [TeamController::class, 'show'])->name('teams.show');
                Route::put('/teams/{team}', [TeamController::class, 'update'])->name('teams.update');
                Route::delete('/teams/{team}', [TeamController::class, 'destroy'])->name('teams.destroy');
                Route::put('/current-team', [CurrentTeamController::class, 'update'])->name('current-team.update');
                Route::post('/teams/{team}/members', [TeamMemberController::class, 'store'])->name('team-members.store');
                Route::put('/teams/{team}/members/{user}', [TeamMemberController::class, 'update'])->name('team-members.update');
                Route::delete('/teams/{team}/members/{user}', [TeamMemberController::class, 'destroy'])->name('team-members.destroy');

                Route::get('/team-invitations/{invitation}', [TeamInvitationController::class, 'accept'])
                    ->middleware(['signed'])
                    ->name('team-invitations.accept');

                Route::delete('/team-invitations/{invitation}', [TeamInvitationController::class, 'destroy'])
                    ->name('team-invitations.destroy');
            }
        });
    });
});
