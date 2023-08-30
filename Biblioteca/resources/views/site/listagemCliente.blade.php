<!DOCTYPE html>
<html>
    <head>
        <title>Lista de cliente</title>
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
                                <th>Telefone</th>
                                <th>Email</th>
                                <th>Data de Cadastro</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clientes as $cliente)
                                <tr>
                                    <th>{{ $cliente->id }}</th>
                                    <th>{{ $cliente->nome }}</th>
                                    <th>{{ $cliente->telefone }}</th>
                                    <th>{{ $cliente->email }}</th>
                                    <th>{{ $cliente->data_cadastro }}</th>
                                    <th>
                                        <button class="button" onclick="setForm('{{ $cliente->id }}', '{{ $cliente->nome}}', '{{ $cliente->telefone }}', '{{ $cliente->email }}', '{{ $cliente->data_cadastro }}')">Editar</button>
                                        <form style="display:inline-block" action="/excluirCliente/{{ $cliente->id }}" method="post">
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
                        <button class="button buttonGreen buttonBottomBox" onclick="openWindowSave()">Novo Cliente</button>
                    </div>
                </div>
                <div class="windowOverlaySave">
                    <div class="windowModel">
                        <div class="windowContent">
                            <h2 class="centerTextAlign">Novo cliente</h2>
                            <p class="centerTextAlign">Preencha os dados</p>
                            <div class="borderBox">
                                <div class="insertBox">
                                    <form action="/insereCliente" class="form">
                                        @csrf
                                        <div class="formControll">
                                            <label for="title">Nome:</label>
                                            <input type="text" name="nome" class="formControllFile">
                                        </div>
                                        <div class="formControll">
                                            <label for="title">Telefone:</label>
                                            <input type="text" name="telefone" class="formControllFile">
                                        </div>
                                        <div class="formControll">
                                            <label for="title">Email:</label>
                                            <input type="text" name="email" class="formControllFile">
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
                            <h2 class="centerTextAlign">Edite o cliente</h2>
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
                                            <label for="title">Telefone:</label>
                                            <input type="text" id="telefone" name="telefone" class="formControllFile">
                                        </div>
                                        <div class="formControll">
                                            <label for="title">Email:</label>
                                            <input type="text" id="email" name="email" class="formControllFile">
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
                            <form action="/buscarCliente">
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
        function setForm(id, nome, telefone, email, data_cadastro)
        {
            document.getElementById('editForm').action = '/editarCliente/' + id;
            document.getElementById('nome').value = nome;
            document.getElementById('telefone').value = telefone;
            document.getElementById('email').value = email;
            document.getElementById('data_cadastro').value = data_cadastro;
            
            openWindowEdit();
        }
    </script>
</html>