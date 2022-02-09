<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class SubscriptionController extends Controller
{
    public function upgrade()
    {
        return Inertia::render('Subscriptions/Upgrade');
    }
}
