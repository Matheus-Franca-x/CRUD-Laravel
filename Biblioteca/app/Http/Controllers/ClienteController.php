<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function client(): \Illuminate\View\View
    {
        $clientes = Consulta::list('cliente');

        return view('site.listagemCliente', ['clientes' => $clientes]);
    }

    public function insertLine(Request $request): \Illuminate\Http\RedirectResponse
    {

        $newData = [
            'nome' => $request->input('nome'),
            'telefone' => $request->input('telefone'),
            'email' => $request->input('email'),
            'data_cadastro' => $request->input('data_cadastro')
        ];

        Consulta::insertLine('cliente', $newData);

        return redirect('/listaCliente');
    }

    public function deleteLine(int $ID): \Illuminate\Http\RedirectResponse
    {
        Consulta::deleteLine($ID, 'cliente');

        return redirect('/listaCliente');
    }

    public function editLine(int $ID, Request $request): \Illuminate\Http\RedirectResponse
    {
        $newData = [
            'nome' => $request->input('nome'),
            'telefone' => $request->input('telefone'),
            'email' => $request->input('email'),
            'data_cadastro' => $request->input('data_cadastro')
        ];

        Consulta::editLine($ID, 'cliente', $newData);

        return redirect('/listaCliente');
    }

    public function findLine(Request $name): \Illuminate\View\View
    {
        $clientes = Consulta::findLine('cliente', $name->input('nome'));

        return view('site.listagemCliente', ['clientes' =>$clientes]);
    }
}
