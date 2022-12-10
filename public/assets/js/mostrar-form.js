var btn = document.querySelector('#show-or-hide');

var container = document.querySelector('.form-registro');

btn.addEventListener('click', function() {
    
    if(container.style.display === 'block') {
        container.style.display = 'none';
        container.style.transition = 'width 2s';
        document.getElementById("show-or-hide").innerHTML="Adicionar Registro";

    }else {
     container.style.display = 'block';
     container.style.transition = 'width 2s';

     document.getElementById("show-or-hide").innerHTML="Esconder Formulário";

    }
});