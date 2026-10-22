<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:5',
            'email' => ['required', 'email'],
            'pertanyaan' => 'required|max:300|min:10',
        ]);
       $request->validate([
            'nama' => 'required|max:10',
            'email' => ['required', 'email'],
            'pertanyaan' => 'required|max:300|min:8'
       ],[
            'nama.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'pertanyaan.required' => 'Pertanyaan wajib diisi.',
       ]);
    }
}