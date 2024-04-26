<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function showAddForm()
    {
        return view('clients.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email',
        ]);

        // Certifique-se de usar o namespace completo para o modelo Client
        \App\Models\Client::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect('/clientes/adicionar')->with('success', 'Cliente adicionado com sucesso!');
    }

    public function index()
    {
        $clients = Client::all();
        return view('clients.clientes', compact('clients'));
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
