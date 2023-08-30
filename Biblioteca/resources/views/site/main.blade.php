<!DOCTYPE html>
<html>
    <head>
        <title>Biblioteca</title>
        <link rel="stylesheet" href="css/basicStyle.css">
        <style>
            .conteinerButton {
                display: flex;
                justify-content: space-between;
                margin-top: 20px;
                width: 60%;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }

            .button, a.button {
                width: 300px;
                height: 130px;
                background-color: #1F2D48;
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                border: none;
                border-radius: 20px;
                cursor: pointer;
                font-size: 20px;
                text-decoration: none;
            }
            
        </style>
    </head>

    <body>
        <div class="conteinerBox">
            <div class="box">
                <div class="conteinerButton">
                    <a class="button" href="{{ route('site.listagemCliente') }}">Lista de Clientes</a>
                    <a class="button" href="{{ route('site.catalogoLivro') }}">Catálogo de livros</a>
                </div>
            </div>
        </div>
    </body>
</html>