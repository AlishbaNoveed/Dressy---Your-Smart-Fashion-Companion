<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class RecommendationController extends Controller
{
    public function index()
    {
        return view('recommendation.index');
    }

    public function fetch(Request $request)
    {
        $skinTone = $request->input('skin_tone');
        $age = $request->input('age');

        // Basic validation
        if (!$skinTone || !$age) {
            return response()->json(['error' => 'Skin tone and age are required.'], 400);
        }

        // Map to age range
        $ageRange = $this->mapAgeToRange($age);

        if (!$ageRange) {
            return response()->json(['error' => 'Invalid age.'], 400);
        }

        // Fetch products matching criteria
        $products = Product::whereJsonContains('skin_tone', $skinTone)
                    ->whereJsonContains('age_range', $ageRange)
                    ->get();

        return view('recommendation._products', compact('products'))->render();
    }

    private function mapAgeToRange($age)
    {
        $age = (int) $age;

        if ($age >= 18 && $age <= 25) return '18-25';
        if ($age >= 26 && $age <= 35) return '26-35';
        if ($age >= 36 && $age <= 45) return '36-45';
        if ($age >= 46 && $age <= 60) return '46-60';

        return null;
    }
}
