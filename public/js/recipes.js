$(document).ready(function(){
    'use strict';
    window.addEventListener('load', function() {
        const forms = document.getElementsByClassName('needs-validation');
        const validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);

    $('form').on('submit', function(e) {
        e.preventDefault();
        let ingredients = $('#ingredients').val();
        const spinnerContainer = $('#spinner-container');

        if (spinnerContainer.hasClass('d-none')) {
            if (spinnerContainer.nextAll('*').length > 0) {
                spinnerContainer.nextAll('*').remove()
            }
            $('#spinner-container').removeClass('d-none');
        }

        axios.post('/api/recipes/', { 'i': ingredients })
            .then(function(res) {
                if (res) {
                    $('#spinner-container').addClass('d-none');
                }
                const data = res.data;
                if (data.message) {
                    alert(data.message);
                    return;
                }
                $.each(data.recipes, function(index, recipe) {
                    const ingredients = recipe.ingredients.toString().replaceAll(',', ', ');
                    const card = `
                            <div class="card my-3 mx-3">
                                <div class="row my-3 mx-3">
                                    <img width="280" height="180" src="${recipe.gif}" alt="${recipe.title}"/>
                                    <div class="card-body">
                                        <p>
                                            <strong>Título da receita:</strong> ${recipe.title}
                                        </p>
                                        <p>
                                            <strong>Ingredientes:</strong> ${ingredients}
                                        </p>
                                        <p>
                                            <strong>Link da receita:</strong>
                                            <a target="_blank" href="${recipe.link}">Clique aqui</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        `;
                    $('#results').append(card)
                })
            })
            .catch(function(error){
                console.error('Erro ao realizar a busca', error);
            });
    })
})
