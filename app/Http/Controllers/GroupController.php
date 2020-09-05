<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class GroupController extends Controller
{
    /**
     * Display the daily dozen groups, etc.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $groups = Group::all()->groupBy('category_id');

        return view('welcome')->with('groups', $groups);
    }

    /**
     * Display a specific group.
     *
     * @return Application|Factory|View
     */
    public function show(Group $group)
    {
        $servingSizes = $group->servingSizes()->get();
        $detailTypes = $group->detailTypes()->get();

        return view('group')->with([
            'group' => $group,
            'serving_sizes' => $servingSizes,
            'detail_types' => $detailTypes,
        ]);
    }
}
