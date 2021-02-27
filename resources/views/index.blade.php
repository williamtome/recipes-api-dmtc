<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <title>Delivery Much - Buscador de receitas</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/recipes.css') }}">
</head>
<body>

<div class="container">
    <nav id="header">
        <div class="row">
            <div class="col-md-6 text-center">
                <img src="{{('images/logo-deliverymuch.svg')}}" alt="">
            </div>
            <div class="col-md-6">
                <h3 class="m-3 text-white">Buscador de Receitas</h3>
            </div>
        </div>
    </nav>

    <section>
        <form method="get" class="needs-validation" novalidate>
            <div class="row">
                <div class="my-3 mx-auto text-center">
                    <h4 class="description">Informe os ingredientes (caso seja mais de um, coloque vírgula no fim):</h4>
                </div>
            </div>
            <div class="form-row justify-content-center">
                <div class="col-sm-8">
                    <div class="form-group">
                        <input type="text"
                               placeholder="Insira os ingredientes..."
                               id="ingredients"
                               name="i"
                               class="form-control"
                               required>
                        <div class="invalid-feedback">
                            Por favor, informe no mínimo 1 ingrediente.
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="form-group">
                        <button class="btn btn-danger px-5">Buscar</button>
                    </div>
                </div>
            </div>
        </form>

        <div id="results">
            <div id="spinner-container" class="d-none">
                <div class="spinner"></div>
            </div>
        </div>
    </section>
</div>

<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/recipes.js') }}"></script>
</body>
</html>
