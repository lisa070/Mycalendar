<?php

function get_event($data) {
    global $db;

    $result = $db->query("SELECT name, date_beg, date_end, id FROM events
                WHERE  date_beg >= '$data[0]' AND date_beg <= '$data[1]'");
    if (!$result) {
        exit("Произошла ошибка при выполнении запроса".'<br>');
    }

    $result = $result->fetch_all( MYSQLI_ASSOC );

    return $result;
}


function get_info($id) {
    global $db;

    $result = $db->query("SELECT e.name, e.date_beg, e.date_end, e.description, e.link, b.first_name, b.last_name, b.link, o.org_name, p.place_name, p.address
                FROM events e, king b, organizationisu o, placeirk p
                WHERE e.id_org=o.id AND e.id_king=b.id AND e.id_place=p.id  AND (e.id=$id)");
    if (!$result) {
        exit("Произошла ошибка при выполнении запросаа".'<br>');
    }

    $result = $result->fetch_all( MYSQLI_ASSOC );

    if (count($result) == 0) {
        exit('Нет результатаа'.'<br>');
    }

    return $result[0];
}

function login($password){
    global $db;

    $result = $db->query("SELECT id FROM organizationisu o WHERE o.org_name='$password[0]' AND o.password='$password[1]'");
    if (!$result) {
        exit("Произошла ошибка при выполнении запросаа".'<br>');
    }

    $result = $result->fetch_all( MYSQLI_ASSOC );

    if (count($result) == 0) {
        $row="NO";
        return $row;
    }

    return $result[0][ "id" ];
}

function get_org($id){
    global $db;

    $result = $db->query("SELECT o.org_name, e.name, e.date_beg, e.date_end, e.description, e.link, b.first_name, b.last_name, b.link, p.place_name, p.address
                FROM events e, king b, organizationisu o, placeirk p
                WHERE e.id_org=o.id AND e.id_king=b.id AND e.id_place=p.id  AND (o.id=$id)");
    if (!$result) {
        exit("Произошла ошибка при выполнении запроса".'<br>');
    }

    $result = $result->fetch_all( MYSQLI_ASSOC );

    return $result;
}

