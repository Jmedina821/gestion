<?php

namespace App\Http\Controllers;

use App\Http\Services\BudgetService;
use App\Models\BudgetSource;
use Illuminate\Http\Request;

class BudgetSourceController extends Controller
{

    private $budgetService;

    public function index()
    {
        $this->budgetService = new BudgetService;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BudgetSource  $budgetSource
     * @return \Illuminate\Http\Response
     */
    public function show(BudgetSource $budgetSource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BudgetSource  $budgetSource
     * @return \Illuminate\Http\Response
     */
    public function edit(BudgetSource $budgetSource)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BudgetSource  $budgetSource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BudgetSource $budgetSource)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BudgetSource  $budgetSource
     * @return \Illuminate\Http\Response
     */
    public function destroy(BudgetSource $budgetSource)
    {
        //
    }
}
