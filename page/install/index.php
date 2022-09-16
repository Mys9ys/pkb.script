<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Как установить бота</title>
</head>
<body>
    <div class="container">
        <h4>Версия бота: 1.1.5</h4>
        <p>Для установки требуется скачать плагин для браузера</p>
        <a href="https://chrome.google.com/webstore/detail/user-javascript-and-css/nbhcbdghjpllgmfilhnhkllmkecfmpld?hl=ru" target="_blank">Плагин</a>
        <br>
        <br>
        <img class="pkb_plugin" src="/page/install/img/pkb_instruction.png" alt="">
        <p>После этого необходимо выполнить следующие шаги:</p>
        <ol>
            <li>Ввести страницы для которых он должен работать (вырезать и вставить):</li>
            <textarea name="" id="" cols="200" rows="4">
https://vk.com/im?*&sel=-182985865, https://vk.com/im?sel=-182985865
            </textarea>
            <li>Скопировать тело скрипта: (ctrl+a ctrl+c)</li>
            <textarea name="" id="" cols="200" rows="120">
                console.log('pkb.init')

let lastMesId = ''

let myId = $('#l_ph a').attr('href').replace('/albums', '');

function repeatFunc(fn, delay) {
    setTimeout(function() {
        fn();
        repeatFunc(fn, timedelay());
    }, delay);
}

function timedelay() {
    return 3000
}

function sendAjax(mes, btn =''){

    data = {type: 'send'}
    data.id = myId
    data.mes = mes
	data.btn = btn

    console.log(data);
    $.ajax({
        // url: "https://toto.mys9ys9ka.ru/bot/",
        url: "https://pkb.script/bot/",
        // dataType: "json", // Для использования JSON формата получаемых данных
        method: "POST", // Что бы воспользоваться POST методом, меняем данную строку на POST
        data,
        success: function (result) {

        	console.log(result)

        	if(result) {
        		res = JSON.parse(result)

        			if(res.active === 'click_btn'){
        			clickBtn(res.btn)
        		}
        	}

            // console.log('res',JSON.parse(result));
            // Возвращаемые данные выводим в консоль

        }
    })
}


function parse() {

    toggle = document.getElementById('PKBDisable').checked

    console.log('step', toggle)

    if(toggle) {// выключатель
		last = $('.im-mess').last()

	    let btn = []

	    $.each( $('.Keyboard__row').eq(1).find('.BotButtonLabel'), function(i, val){
	    	btn[i] = $(this).text()
	    })

	    if(!last.hasClass('im-mess_out') && lastMesId != last.data('msgid')){
	        console.log('mes:', last.find('.im-mess--text').html())
	        sendAjax(last.find('.im-mess--text').html(), btn)
	    }

	    lastMesId = last.data('msgid')
    } else {
    	lastMesId = ''
    }

}

repeatFunc(function() {
    parse()
},timedelay());


function createMonitor(arr){

    monitor = {
        trophy: {title: 'Трофеи', value: 45},
        taskTime: {title: 'До обновления заданий', value: '7:55'},
        foodTime: {title: 'До приема пищи', value: '2:12'},
    }

    html = '<p>Отключить: <input type="checkbox" id="PKBDisable"></p>'

    $.each(monitor, function (id, el) {
        html += '<p>'+el.title+': <b>'+el.value+'</b></p>'
    })

    html = '<div class="pkb-monitor">'+html+'</div>'

    $('.page_header_wrap').append(html)

}

createMonitor()

function clickBtn(btn){
	$('.im-chat-input--text').text(btn).focus()
	$('.im-chat-input--send').click()
}
            </textarea>
            <li>Скопировать ссылку на стили монитора(выключателя):</li>
            <textarea name="" id="" cols="300" rows="2">
@import url(https://pkb.mys9ys9ka.ru/script/monitor.css)
            </textarea>
            <li>Открыть опции и поставить галочку перед jQuery 3 (выпадающий список при наведении)</li>
            <li>Сохранить внесенные изменения</li>
        </ol>

        <p>Для включения плагина на странице диалога с подземельем колодца включить плагин и перезагрузить страницу, должно появится черное окошко с монитором слева в углу</p>
        <br><br>
        <img class="pkb_plugin" src="/page/install/img/pkb_instruction2.png" alt="">
    </div>
</body>
<style>
    .container{
        display: block;
        max-width: 1200px;
        width: 100%;
        margin: 10px auto;
    }
    .pkb_plugin{
        width: 100%;
    }
</style>
</html>
