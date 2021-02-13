<?php

namespace App\Http\Services;

use App\Models\Project;
use Illuminate\Support\Arr;

class ReportService
{
    public function reporteGeneralPPA(string $id)
    {
        $data = Project::with(
            'program.institution',
            'activities.parroquia.municipio',
            'activities.images',
            'investmentSubAreas.investmentArea',
            'project_status',
            'budgets.budgetSource')->where('id', $id)
            ->first();
        $data['total_budget'] = array_reduce($data->budgets->toArray(),
            function ($carry, $budget) {
                $carry += $budget['value'];
                return $carry;
        });
        $data["budget_sources"] = implode(", ", $data->budgets->pluck('budgetSource.name')->all());
        $data["investment_areas"] = implode(", ", $data->investmentSubAreas->pluck('name')->all());
        $data["images"] = $data->activities->pluck('images.*.path')->first();
        return $data;
    }
}
