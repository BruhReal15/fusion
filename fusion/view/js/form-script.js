const btnsend = document.querySelector("#submit-btn");

btnsend.addEventListener("click", function(e){

    e.preventDefault();
    var name = document.getElementById("first-name").value;
    var idade = document.getElementById("idade").value;
    var email1 = document.getElementById("email").value;
    var email2 = document.getElementById("confirm-email").value;
    var celNumber = document.getElementById("cel-number").value;


    if(name.length > 40){
        alert("Tamanho de nome excessivo!");
    }

    if(idade <= 0){
        alert("Idade inválida!");
    }

    //console.log(email1);
    //console.log(email2);
    if(email1 != email2){
        alert("Emails inseridos diferentes!");
    }

    
    if(!isNumber(celNumber)){
        alert("Só é aceito números no campo de telefone!");
    }

    if(!isNumber(idade)){
        alert("Só é aceito números no campo de idade!");
    }

    function isNumber(n) {
        return !isNaN(parseFloat(n)) && isFinite(n);
    }
});

