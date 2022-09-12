

function createMonitor(arr){

    data = {
        trophy: {title: 'Трофеи', value: 45},
        taskTime: {title: 'До обновления заданий', value: '7:55'},
        foodTime: {title: 'До приема пищи', value: '2:12'},
    }

    html = '<p>Отключить: <input type="checkbox" class="PKBDisable" checked></p>'

    $.each(data, function (id, el) {
        html += '<p>'+el.title+': <b>'+el.value+'</b></p>'
    })

    html = '<div class="pkb-monitor">'+html+'</div>'

    $('.im-right-menu').append(html)

}