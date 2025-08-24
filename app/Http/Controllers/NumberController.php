<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NumberController extends Controller
{
    public function showForm()
    {
        return view('index');
    }

    public function numberAnalyzer(Request $request)
    {
        $request->validate([
            'number' => 'required|numeric'
        ]);

        $number = $request->number;
        $result = [];
        $isPrime = true;
        $isPerfectSquare = false;
        $squareRoot = sqrt($number);

        // Even / Odd and Positive / Negative
        if ($number > 0 && $number % 2 == 0) {
            $result[] = "Number is Positive and Even";
        } elseif ($number > 0 && $number % 2 != 0) {
            $result[] = "Number is Positive and Odd";
        } elseif ($number < 0 && $number % 2 == 0) {
            $result[] = "Number is Negative and Even";
        } elseif ($number < 0 && $number % 2 != 0) {
            $result[] = "Number is Negative and Odd";
        } else {
            $result[] = "Number is Zero";
            $isPrime = false;
        }

        // Prime Check
        if ($number <= 1) {
            $isPrime = false;
        } else {
            for ($i = 2; $i <= sqrt($number); $i++) {
                if ($number % $i == 0) {
                    $isPrime = false;
                    break;
                }
            }
        }

        if ($isPrime) {
            $result[] = "Number is Prime";
        } else {
            $result[] = "Number is Not Prime";
        }

        // Perfect Square Check
        if (floor($squareRoot) == $squareRoot) {
            $isPerfectSquare = true;
            $result[] = "Number is a Perfect Square";
        } else {
            $result[] = "Number is Not a Perfect Square";
        }

        return view('index', compact('result', 'number', 'squareRoot', 'isPerfectSquare', 'isPrime'));
    }
}
