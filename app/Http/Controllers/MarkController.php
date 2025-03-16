<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if (!$user->can('gestao de marcas')) {
            return response()->view('errors.403', [], Response::HTTP_FORBIDDEN);
        }

        return view('common.brands');
    }
}
