<?php

namespace App\Http\Controllers;

use App\Http\Services\InvestmentAreaService;
use App\Models\InvestmentArea;
use Illuminate\Http\Request;

class InvesmentAreaController extends Controller
{

    private $invesmentAreaService;

    public function index()
    {
        $this->invesmentAreaService = new InvestmentAreaService;
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
     * @param  \App\Models\InvesmentArea  $invesmentArea
     * @return \Illuminate\Http\Response
     */
    public function show(InvestmentArea $invesmentArea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InvesmentArea  $invesmentArea
     * @return \Illuminate\Http\Response
     */
    public function edit(InvestmentArea $invesmentArea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InvesmentArea  $invesmentArea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InvestmentArea $invesmentArea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InvesmentArea  $invesmentArea
     * @return \Illuminate\Http\Response
     */
    public function destroy(InvestmentArea $invesmentArea)
    {
        //
    }
}
