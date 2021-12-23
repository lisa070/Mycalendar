way = [];

window.onload = function () {

    document.querySelector('button').onclick = function () {
        var log = document.getElementById('log').value;
        var psw = document.getElementById('psw').value;
        way.push(log);
        way.push(psw);
        var lap = [log, psw];
        $.ajax({
            type: 'POST',
            url: 'login.php',
            dataType: "json",
            data: "param=" + JSON.stringify(lap),
            error: function (xhr, textStatus, error) {
                console.log(xhr.statusText);
                console.log(textStatus);
                console.log(error);
            },
            success: function (data1) {
                way.push(data1);
                if (data1==="NO")
                    document.querySelector('#msg').innerHTML = "Неверный пароль";
                else {
                    document.getElementById('form').id = 'form2';
                    document.getElementById('content').id = 'content2';
                    get_org(data1);
                }
            }
        });
    };

    document.querySelector('#logo').onclick = function () {
        console.log(way);
    };
};

function get_org(id) {
    $.ajax({
        type: 'POST',
        url: 'login.php',
        dataType: "json",
        data: "id=" + JSON.stringify(id),
        error: function (xhr, textStatus, error) {
            console.log(xhr.statusText);
            console.log(textStatus);
            console.log(error);
        },
        success: function (data1) {
            way.push(data1[0]['org_name']);
            var content='<h1>'+data1[0]["org_name"]+'</h1><br><h2>Мероприятия</h2><br><table id="inf"><thead><tr><th>Название</th><th>Дата начала</th><th>Дата окончания</th><th>Ответственный</th><th>Ссылка</th><th>Место</th><th>Описание</th></tr></thead><tbody>';
            
            for(var i=0; i<data1.length; i++){
                content+="<tr><td id='name'>"+data1[i]["name"]+"</td>"+"<td>"+data1[i]["date_beg"]+"</td>"+"<td>"+data1[i]["date_end"]+"</td>"+"<td>"+data1[i]["first_name"]+" "+data1[i]["last_name"]+" "+"</td>"+"<td>"+data1[i]["link"]+"</td>"+"<td>"+data1[i]["place_name"]+" "+data1[i]["address"]+"</td>"+"<td>"+data1[i]["description"]+"</td>";
            }
            content+="</tbody></table>";
            document.querySelector('#content2').innerHTML = content;
        }
    });
}
