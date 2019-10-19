<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tracker;

class StatisticController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function visits()
    {
        $sessions = Tracker::sessions(60 * 24);

        $sessions = $sessions->unique('agent.name_hash');

        return view('statistics.visits', ['sessions' => $sessions]);
    }
}
