<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SymptomsPredictController extends Controller
{
    public function NaiveBayes(Request $request)
    {
        $request->validate([
            'symptoms.*' => 'required'
        ]);
        return response(
            $request->all()
        );

    }

    public function RandomForest(Request $request)
    {
        $request->validate([
            'symptoms.*' => 'required'
        ]);
        return response(
            $request->all()
        );

    }

    public function DesignTree(Request $request)
    {
        $request->validate([
            'symptoms.*' => 'required'
        ]);
        return response(
            $request->all()
        );

    }
}
