<?php

namespace App\Http\Controllers;

use App\Imports\MunicipalitiesImport;
use App\Imports\ParishesImport;
use App\Models\Parish;
use Illuminate\Http\Request;
use Excel;

class ParishController extends Controller
{
    //
    public function index()
    {
        $parishes = Parish::whereHas('municipality', function ($query) {
            $query->whereId(request()->input('municipality_id', 0));
        })->get();

        return response()->json($parishes);
    }

    /**
     * Summary of store
     * @param \Illuminate\Http\Request $request
     * @return string
     */
    public function store(Request $request)
    {
        Excel::import(new ParishesImport(), $request->file('import'));

        return 'done';
    }

    public function getParishWithRelatedData(Request $request)
    {
        $parish = Parish::where('code', $request->query('parish_id'))
            ->whereHas('municipality', function ($query) use ($request) {
                $municipalityCode = ltrim($request->query('municipality_id'), '0');

                $query->where(function ($subQuery) use ($municipalityCode, $request) {
                    $subQuery->where('code', $request->query('municipality_id'))
                        ->orWhere('code', $municipalityCode);
                });
            })
            ->whereHas('municipality.district', function ($query) use ($request) {
                $districtCode = ltrim($request->query('district_id'), '0');

                $query->where(function ($subQuery) use ($districtCode, $request) {
                    $subQuery->where('code', $request->query('district_id'))
                        ->orWhere('code', $districtCode);
                });
            })
            ->with('municipality.district')
            ->first();

        if ($parish === null) {
            return response()->json([
                'success' => 'false',
            ]);
        }

        return response()->json($parish);
    }
}
