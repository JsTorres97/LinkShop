$(document).ready(function(){
    var pActual = 0;
    var cardNumber = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '0'];
    var str = "";
    var cnt = 0;
    $("#datos").keyup(function(){
        pActual = $(this).val().length;
        var vActual = $(this).val();
        vActual = vActual.substr(pActual-1, pActual);
        if(pActual < 8){
            for(var i = 0; i <= cardNumber.length-1; i++){
                if(cardNumber[i] == vActual){
                    cnt = pActual;
                    if(cnt === pActual){
                        str += "•";
                        cnt += pActual;
                    }
                    $(this).val(str);
                }
            }
        }
        if($(this).val().length != cnt){
           str = str.substr(0, pActual);
           }
    });
});