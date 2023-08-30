<!DOCTYPE html>
<html>
    <head>
        <title>Catalogo de Livro</title>
        <link rel="stylesheet" href="css/basicStyle.css">
        <style>
            th {
                color: white;
                border: 1px solid #ccc;
            }
        </style>
    </head>
    <body>
        <div class="conteinerBox">
            <div class="box">
                <div class="boxTable">
                    <table class="tableCenter">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Autor</th>
                                <th>Data de Lançamento</th>
                                <th>Valor do Aluguel</th>
                                <th>Data de Cadastro</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($livros as $livro)
                                <tr>
                                    <th>{{ $livro->id }}</th>
                                    <th>{{ $livro->nome }}</th>
                                    <th>{{ $livro->descricao }}</th>
                                    <th>{{ $livro->autor }}</th>
                                    <th>{{ $livro->data_lancamento }}</th>
                                    <th>{{ $livro->valor_aluguel }}</th>
                                    <th>{{ $livro->data_cadastro }}</th>
                                    <th>
                                        <button class="button" onclick="setForm('{{ $livro->id }}', '{{ $livro->nome}}', '{{ $livro->descricao }}', '{{ $livro->autor }}', '{{ $livro->data_lancamento }}', '{{ $livro->valor_aluguel }}', '{{ $livro->data_cadastro }}')">Editar</button>
                                        <form style="display:inline-block" action="/excluirLivro/{{ $livro->id }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="button buttonRed">Excluir</button>
                                        </form>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="conteinerButton">
                    <div class="adjustButton">
                        <a href="{{ route('site.main') }}" class="button buttonVoltar">Voltar</a>
                        <button class="button buttonBottomBox" onclick="openWindowFetch()">Buscar</button>
                        <button class="button buttonGreen buttonBottomBox" onclick="openWindowSave()">Novo Livro</button>
                    </div>
                </div>
                <div class="windowOverlaySave">
                    <div class="windowModel">
                        <div class="windowContent">
                            <h2 class="centerTextAlign">Novo Livro</h2>
                            <p class="centerTextAlign">Preencha os dados</p>
                            <div class="borderBox">
                                <div class="insertBox">
                                    <form action="/insereLivro" class="form">
                                        @csrf
                                        <div class="formControll">
                                            <label for="title">Nome:</label>
                                            <input type="text" name="nome" class="formControllFile">
                                        </div>
                                        <div class="formControll">
                                            <label for="title">Descricao:</label>
                                            <input type="text" name="descricao" class="formControllFile">
                                        </div>
                                        <div class="formControll">
                                            <label for="title">Autor:</label>
                                            <input type="text" name="autor" class="formControllFile">
                                        </div>
                                        <div class="formControll">
                                            <label for="title">Data de Lançamento:</label>
                                            <input type="text" name="data_lancamento" class="formControllFile" value="ano-mes-dia">
                                        </div>
                                        <div class="formControll">
                                            <label for="title">Valor do Aluguel:</label>
                                            <input type="text" name="valor_aluguel" class="formControllFile">
                                        </div>
                                        <div class="formControll">
                                            <label for="title">Data de Cadastro:</label>
                                            <input type="text" name="data_cadastro" class="formControllFile" value="{{ date('Y-m-d') }}">
                                        </div>
                                        <div class="buttonExitSave">
                                            <button class="button buttonBottomBox" onclick="closeWindowSave(); return false;">Sair</button>
                                            <button class="button buttonBottomBox buttonGreen">Salvar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="windowOverlayEdit">
                    <div class="windowModel">
                        <div class="windowContent">
                            <h2 class="centerTextAlign">Edite o Livro</h2>
                            <p class="centerTextAlign">Preencha os dados</p>
                            <div class="borderBox">
                                <div class="insertBox">
                                    <form action="" class="form" id="editForm">
                                        @csrf
                                        <div class="formControll">
                                            <label for="title">Nome:</label>
                                            <input type="text" id="nome" name="nome" class="formControllFile">
                                        </div>
                                        <div class="formControll">
                                            <label for="title">Descricao:</label>
                                            <input type="text" id="descricao" name="descricao" class="formControllFile">
                                        </div>
                                        <div class="formControll">
                                            <label for="title">Autor:</label>
                                            <input type="text" id="autor" name="autor" class="formControllFile">
                                        </div>
                                        <div class="formControll">
                                            <label for="title">Data de Lançamento:</label>
                                            <input type="text" id="data_lancamento" name="data_lancamento" class="formControllFile">
                                        </div>
                                        <div class="formControll">
                                            <label for="title">Valor do Aluguel:</label>
                                            <input type="text" id="valor_aluguel" name="valor_aluguel" class="formControllFile">
                                        </div>
                                        <div class="formControll">
                                            <label for="title">Data de Cadastro:</label>
                                            <input type="text" id="data_cadastro" name="data_cadastro" class="formControllFile">
                                        </div>
                                        <div class="buttonExitSave">
                                            <button class="button buttonBottomBox" onclick="closeWindowEdit(); return false;">Sair</button>
                                            <button class="button buttonBottomBox buttonGreen">Salvar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="windowOverlayFetch">
                    <div class="windowModelFetch">
                        <div class="windowContentFetch">
                            <form action="/buscarLivro">
                                @csrf
                                <h3 class="leftTextAlign">Buscar por nome:</h3>
                                <input type="text" name="nome" class="centerAlign">
                                <div class="buttonExitFetch">
                                    <button class="button buttonBottomBox" onclick="closeWindowFetch(); return false;">Sair</button>
                                    <button class="button buttonBottomBox buttonGreen">Buscar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <script src="{{ asset('js/basicScript.js') }}"></script>
    <script>
        function setForm(id, nome, descricao, autor, data_lancamento, valor_aluguel, data_cadastro)
        {
            document.getElementById('editForm').action = '/editarLivro/' + id;
            document.getElementById('nome').value = nome;
            document.getElementById('descricao').value = descricao;
            document.getElementById('autor').value = autor;
            document.getElementById('data_lancamento').value = data_lancamento;
            document.getElementById('valor_aluguel').value = valor_aluguel;
            document.getElementById('data_cadastro').value = data_cadastro;
            
            openWindowEdit();
        }
    </script>
</html>