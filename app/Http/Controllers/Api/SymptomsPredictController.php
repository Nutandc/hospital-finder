<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SymptomsPredictController extends Controller
{
    public function predict(Request $request)
    {
        $request->validate( [
            'symptoms' => 'required'
        ]);
        return response(
            $request->all()
        );

    }
}
