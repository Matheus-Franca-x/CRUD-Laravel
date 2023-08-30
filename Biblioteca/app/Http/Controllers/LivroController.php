<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function book(): \Illuminate\View\View
    {
        $livros = Consulta::list('livro');
        
        return view('site.catalogoLivro', ['livros' => $livros]);
    }

    public function insertLine(Request $request): \Illuminate\Http\RedirectResponse
    {

        $newData = [
            'nome' => $request->input('nome'),
            'descricao' => $request->input('descricao'),
            'autor' => $request->input('autor'),
            'data_lancamento' => $request->input('data_lancamento'),
            'valor_aluguel' => $request->input('valor_aluguel'),
            'data_cadastro' => $request->input('data_cadastro')
        ];

        Consulta::insertLine('livro', $newData);

        return redirect('/catalogoDeLivro');
    }

    public function deleteLine(int $ID): \Illuminate\Http\RedirectResponse
    {
        Consulta::deleteLine($ID, 'livro');

        return redirect('/catalogoDeLivro');
    }

    public function editLine(int $ID, Request $request): \Illuminate\Http\RedirectResponse
    {
        $newData = [
            'nome' => $request->input('nome'),
            'descricao' => $request->input('descricao'),
            'autor' => $request->input('autor'),
            'data_lancamento' => $request->input('data_lancamento'),
            'valor_aluguel' => $request->input('valor_aluguel'),
            'data_cadastro' => $request->input('data_cadastro')
        ];

        Consulta::editLine($ID, 'livro', $newData);

        return redirect('/catalogoDeLivro');
    }

    public function findLine(Request $name): \Illuminate\View\View
    {
        $livros = Consulta::findLine('livro', $name->input('nome'));

        return view('site.catalogoLivro', ['livros' =>$livros]);
    }
}
