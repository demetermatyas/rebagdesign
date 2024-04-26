function disableButton(item){
    if(item == 1){
        answer = confirm('Termék a kosárhoz adva.');
        var button = document.getElementById("buyButton");
        button.disabled = true;
    }
    else{
        //answer = confirm('Egy terméket csak egyszer lehet hozzáadni');
        alert("Egy terméket csak egyszer lehet hozzáadni");
    }
}