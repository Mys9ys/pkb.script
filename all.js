console.log('init')

let lastMesId = ''

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

    console.log('step')
    if(last.data('peer') == '-182985865' && lastMesId != last.data('msgid')){
        console.log('id', last.data('msgid'))
    }

    lastMesId = last.data('msgid')
}

repeatFunc(function() {
    parse()
},timedelay());


function createMonitor(arr){

    data = {
        trophy: {title: 'Трофеи', value: 45},
        taskTime: {title: 'До обновления заданий', value: '7:55'},
        foodTime: {title: 'До приема пищи', value: '2:12'},
    }

    html = ''

    $.each(data, function (id, el) {
        html += '<p>'+el.title+': <b>'+el.value+'</b></p>'
    })

    html = '<div class="pkb-monitor">'+html+'</div>'

    $('.im-right-menu').append(html)

}

createMonitor()