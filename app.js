const display = document.getElementById("display");

function add(input){
    display.value += input;
}
function clearDisplay(){
    display.value = "";
}
function calculate(){
    if(display.value==707){

  }

    try{
        display.value = eval(display.value);
    }
    catch(error){
        display.value = "Error";
    }
}
