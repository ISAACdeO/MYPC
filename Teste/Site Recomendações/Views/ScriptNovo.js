document.addEventListener('DOMContentLoaded', function () {
    function chamarRegistrador() {
        event.preventDefault();
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "RecomendacoesDeBuilds.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        var id = event.target.dataset.id;

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var Registros = document.getElementsByClassName("Registro");
                for (var i = 0; i < Registros.length; i++) {
                    Registros[i].innerHTML = xhr.responseText;
                }
            }
        };
        xhr.send("acao=chamarRegistrador&id=" + id);
    }

    var botoes = document.querySelectorAll("button.chamar-registrador");
    botoes.forEach(function(botao) {
        botao.addEventListener('click', chamarRegistrador);
    });
});