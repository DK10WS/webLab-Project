const display = document.getElementById("display");

function add(input){
    display.value += input;
}
function ClearDisplay(){
    display.value = "";
}
function calculate(){
    if(display.value==707){
    window.location.href = "index.php";

  }

    try{
        display.value = eval(display.value);
    }
    catch(error){
        display.value = "Error";
    }
}

  
