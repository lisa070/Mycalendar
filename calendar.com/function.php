<?php

function get_event($data) {
    $result = mysql_query("SELECT name, date_beg, date_end, id FROM events
                WHERE  date_beg >= '$data[0]' AND date_beg <= '$data[1]'");
    if (!$result) {
        exit("Произошла ошибка при выполнении запроса".'<br>');
    }
    if (mysql_num_rows($result) == 0) {
        $row = array();
        return $row;
    }
    $row = array();
    for ($i = 0; $i < mysql_num_rows($result); $i++) {
        $row[$i] = mysql_fetch_array($result, MYSQL_ASSOC);
    }
    return $row;
}


function get_info($id) {
    $result = mysql_query("SELECT e.name, e.date_beg, e.date_end, e.description, e.link, b.first_name, b.last_name, b.link, o.org_name, p.place_name, p.address
                FROM events e, king b, organizationisu o, placeirk p
                WHERE e.id_org=o.id AND e.id_king=b.id AND e.id_place=p.id  AND (e.id=$id)");
    if (!$result) {
        exit("Произошла ошибка при выполнении запросаа".'<br>');
    }
    if (mysql_num_rows($result) == 0) {
        exit('Нет результатаа'.'<br>');
    }
    $row = mysql_fetch_array($result, MYSQL_ASSOC);
    return $row;
}

function login($password){
    $result = mysql_query("SELECT id FROM organizationisu o WHERE o.org_name='$password[0]' AND o.password='$password[1]'");
    if (!$result) {
        exit("Произошла ошибка при выполнении запросаа".'<br>');
    }
    if (mysql_num_rows($result) == 0) {
        $row="NO";
        return $row;
    }
    $row = mysql_fetch_array($result, MYSQL_ASSOC);
    $row2=$row[id];
    return $row2;
}

function get_org($id){
    $result = mysql_query("SELECT o.org_name, e.name, e.date_beg, e.date_end, e.description, e.link, b.first_name, b.last_name, b.link, p.place_name, p.address
                FROM events e, king b, organizationisu o, placeirk p
                WHERE e.id_org=o.id AND e.id_king=b.id AND e.id_place=p.id  AND (o.id=$id)");
    if (!$result) {
        exit("Произошла ошибка при выполнении запроса".'<br>');
    }
    if (mysql_num_rows($result) == 0) {
        $row = array();
        return $row;
    }
    $row = array();
    for ($i = 0; $i < mysql_num_rows($result); $i++) {
        $row[$i] = mysql_fetch_array($result, MYSQL_ASSOC);
    }
    return $row;
}

