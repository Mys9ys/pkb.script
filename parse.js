function repeatFunc(fn, delay) {
    setTimeout(function() {
        fn();
        repeatFunc(fn, timedelay());
    }, delay);
}

function timedelay() {
    return 3000
}

function sendAjax(){
    data = {type: 'text'}
    $.ajax({
        // url: "https://toto.mys9ys9ka.ru/bot/",
        url: "https://vk.script/bot/",
        // dataType: "json", // Для использования JSON формата получаемых данных
        method: "POST", // Что бы воспользоваться POST методом, меняем данную строку на POST
        data,
        success: function (data) {

            console.log(data); // Возвращаемые данные выводим в консоль
        }
    })
}

function parse() {
    last = $('.im-mess').last()

    if(last.data('peer') === '-182985865'){
        console.log('step', last.data('msgid'))
    }
}


repeatFunc(function() {
    parse()
},timedelay());

