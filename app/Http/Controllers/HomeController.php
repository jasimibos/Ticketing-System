<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\PaymentModel;
use App\Models\ApplicationModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::where('role',2)->get();
        $paid = PaymentModel::where('month', date('m'))->where('Year', date('Y'))->get();
        $app_count = ApplicationModel::where('client_id', auth()->user()->id)->count();
        $due = collect($user)->whereNotIn('id', $paid->pluck('client_id')->unique()->toArray());
        $de_active_acc = collect($user)->where('status', 0);
        return view('home', compact('user', 'paid', 'due', 'de_active_acc','app_count'));
    }
}
