var events = new Map();
var way = [];
window.onload = function () {
    Calendar2("calendar2", new Date().getFullYear(), new Date().getMonth());
    // переключатель минус месяц
    document.querySelector('#calendar2 thead tr:nth-child(1) td:nth-child(1)').onclick = function () {
        Calendar2("calendar2", document.querySelector('#calendar2 thead td:nth-child(2)').dataset.year, parseFloat(document.querySelector('#calendar2 thead td:nth-child(2)').dataset.month) - 1);
    };
    // переключатель плюс месяц
    document.querySelector('#calendar2 thead tr:nth-child(1) td:nth-child(3)').onclick = function () {
        Calendar2("calendar2", document.querySelector('#calendar2 thead td:nth-child(2)').dataset.year, parseFloat(document.querySelector('#calendar2 thead td:nth-child(2)').dataset.month) + 1);
    };
    
    document.querySelector('.close').onclick = function () {
        document.getElementById('info1').id = 'info';
        document.getElementById('fon2').id = 'fon';
    };
    
    document.querySelector('#calendar2 tbody').onclick = function(event) {
        let target = event.target; 
        if (target.tagName === 'A'){
            console.log(target.id);
        }
        $.ajax({
        type: 'POST',
        url: 'index.php',
        data: "id=" + JSON.stringify(target.id),
        dataType: "json",
        error: function (xhr, textStatus, error) {
            way.push(xhr.statusText);
            way.push(textStatus);
            way.push(error);
        },
        success: function (data1) {
            getInfo(data1);
        }
    });
    };
};

function getInfo(data){
    var content='<div class="post"><p class="super">Название:</p> <p>'+data["name"]+'</p></div>'+'<div class="post"><p class="super">Дата:</p> <p>';
    if(data["date_beg"]===data["date_end"]) content+= data["date_beg"].slice(0, 4)+'.'+data["date_beg"].slice(5, 7)+'.'+data["date_beg"].slice(8)+'</p></div>';
    else content+= data["date_beg"].slice(0, 4)+'.'+data["date_beg"].slice(5, 7)+'.'+data["date_beg"].slice(8)+' - '+data["date_end"].slice(0, 4)+'.'+data["date_end"].slice(5, 7)+'.'+data["date_end"].slice(8)+'</p></div>';
    content+='<div class="post"><p class="super">Организация:</p> <p>'+data['org_name']+'</p></div>'+'<div class="post"><p class="super">Ссылка:</p> <a href='+data['link']+'> Тут интересно</a></div><div class="post"><p class="super">Место:</p> <p>'+data['place_name']+'</p>, <p>'+data['address']+'</p></div><div class="post"><p class="super">Опиcание:</p> <p id="des">'+data['description']+'</p></div>';
    console.log(content);
    document.querySelector('#info').innerHTML = content;
    document.getElementById('fon').id = 'fon2';
    document.getElementById('info').id = 'info1';
}



function inerData(data, DNfirst, DNlast, Dlast, D, id) {
    var names = [];
    for (var i = 0; i < data.length; i++) {
        var df = Number((data[i]["date_beg"]).charAt(8)) * 10 + Number((data[i]["date_beg"]).charAt(9));
        var dl = Number((data[i]["date_end"]).charAt(8)) * 10 + Number((data[i]["date_end"]).charAt(9));
        var d = (data[i]["date_beg"]).slice(0, 8);
        var n = dl - df;
        for (var j = 0; j <= n; j++) {
            if (df < 10) {
                var nd = d + "0" + String(df);
            } else {
                var nd = d + String(df);
            }
            if (events.has(nd)) {
                names = events.get(nd);
            }
            names.push(data[i]["name"]+data[i]["id"]);
            events.set(nd, names);
            names = [];
            df++;
        }
    }
    setCalendar(DNfirst, DNlast, Dlast, D, id);
}
;

function event(data, DNfirst, DNlast, Dlast, D, id) {
    $.ajax({
        type: 'POST',
        url: 'index.php',
        data: "param=" + JSON.stringify(data),
        dataType: "json",
        error: function (xhr, textStatus, error) {
            way.push(xhr.statusText);
            way.push(textStatus);
            way.push(error);
        },
        success: function (data1) {
            inerData(data1, DNfirst, DNlast, Dlast, D, id);
        }
    });
};

function Calendar2(id, year, month) {
    way = [];
    events.clear();
    var Dlast = new Date(year, month + 1, 0).getDate(),
            D = new Date(year, month, Dlast),
            DNlast = new Date(D.getFullYear(), D.getMonth(), Dlast).getDay(),
            DNfirst = new Date(D.getFullYear(), D.getMonth(), 1).getDay();
    var fday = year + "-" + (month + 1) + "-" + 1;
    var lday = year + "-" + (month + 1) + "-" + Dlast;
    var data = new Array(fday, lday);
    event(data, DNfirst, DNlast, Dlast, D, id);
}
;

function setCalendar(DNfirst, DNlast, Dlast, D, id) {
    calendar = '<tr>',
            months = ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"];
    if (DNfirst !== 0) {
        for (var i = 1; i < DNfirst; i++)
            calendar += '<td>';
    } else {
        for (var i = 0; i < 6; i++)
            calendar += '<td>';
    }
    for (var i = 1; i <= Dlast; i++) {
        var day = D.getFullYear() + "-";
        if ((D.getMonth() + 1) < 10) {
            day += "0" + (D.getMonth() + 1) + "-";
        } else {
            day += (D.getMonth() + 1) + "-";
        }
        if (i < 10) {
            day += "0" + i;
        } else {
            day += i;
        }
        if (i === new Date().getDate() && D.getFullYear() === new Date().getFullYear() && D.getMonth() === new Date().getMonth()) {
            calendar += '<td class="today">' + '<div class="date">' + i + '</div>';
            if (events.has(day)) {
                for (var j = 0; j < (events.get(day)).length; j++) {
                    var s=(events.get(day))[j];
                    calendar += '<div class="event">' + '<p id="'+s.slice(-1)+'">' +s.slice(0, -1) + '</p>' + '</div>';
                }
            }
        } else {
            calendar += '<td>' + '<div class="date">' + i + '</div>';
            if (events.has(day)) {
                for (var j = 0; j < (events.get(day)).length; j++) {
                    var s=(events.get(day))[j];
                    calendar += '<div class="event">' + '<p id="'+s.slice(-1)+'">' +s.slice(0, -1) + '</p>' + '</div>';
                }
            }
        }
        if (new Date(D.getFullYear(), D.getMonth(), i).getDay() === 0) {
            calendar += '<tr>';
        }
    }
    for (var i = DNlast; i < 7; i++)
        calendar += '<td>&nbsp;';
    document.querySelector('#' + id + ' tbody').innerHTML = calendar;
    document.querySelector('#' + id + ' thead td:nth-child(2)').innerHTML = months[D.getMonth()] + ' ' + D.getFullYear();
    document.querySelector('#' + id + ' thead td:nth-child(2)').dataset.month = D.getMonth();
    document.querySelector('#' + id + ' thead td:nth-child(2)').dataset.year = D.getFullYear();
    if (document.querySelectorAll('#' + id + ' tbody tr').length < 6) {
        document.querySelector('#' + id + ' tbody').innerHTML += '<tr><td>&nbsp;<td>&nbsp;<td>&nbsp;<td>&nbsp;<td>&nbsp;<td>&nbsp;<td>&nbsp;';
    }
    
};