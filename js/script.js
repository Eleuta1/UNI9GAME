// Exemplo de código JavaScript
document.addEventListener("DOMContentLoaded", function() {
    console.log("Página carregada!");
});

document.addEventListener("DOMContentLoaded", function(){
    //Message = true
    const successMessage = document.getElementById("success-message");
    if (successMessage){
        setTimeout(function(){
            successMessage.style.display = 'none'
        }, 2500);
    }
});