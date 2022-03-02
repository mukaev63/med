<?php

session_start();
require('connect.php');

function tt($value) {
    echo "<pre>";
    print_r($value);
    "</pre>";
}

// Проверка ошибок запросов к БД
function dbCheckError($query) {
    $errInfo = $query->errorInfo();
    if($errInfo[0] !== PDO::ERR_NONE) {
        echo $errInfo[2];
        exit();
    }
    return true;
}
// Получить всю таблицу
function selectAll($table, $params = []) {
    global $pdo;
    $sql = "SELECT * FROM $table";
    if(!empty($params)) {
        $i = 0;
        foreach ($params as $key => $value) {
            if(!is_numeric($value)) {
                $value = "'".$value."'";
            }
            if($i === 0) {
                $sql = $sql . " WHERE $key = $value";
            } else {
                $sql = $sql . " AND $key = $value";
            }
            $i++;
        }
    }

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

// Получение одной строки из таблицы
function selectOne($table, $params = []) {
    global $pdo;
    $sql = "SELECT * FROM $table";

    if(!empty($params)) {
        $i = 0;
        foreach ($params as $key => $value) {
            if(!is_numeric($value)) {
                $value = "'" . $value . "'";
            }
            if($i === 0) {
                $sql = $sql . " WHERE $key=$value";
            } else {
                $sql = $sql . " AND $key=$value";
            }
            $i++;
        }
    }
//    $sql = $sql . " LIMIT 1";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetch();
}


// Добавление в таблицу
function insert($table, $params) {
    global $pdo;
    $i = 0;
    $col = '';
    $mask = '';
    foreach ($params as $key => $value) {
        if($i === 0) {
            $col = $col . "$key";
            $mask = $mask . "'" ."$value" . "'";
        } else {
            $col = $col . ", $key";
            $mask = $mask . ", '" . "$value" . "'";
        }
        $i++;
    }
    $sql = "INSERT INTO $table ($col) VALUES ($mask)";

    $query = $pdo->prepare($sql);
    $query->execute($params);
    dbCheckError($query);
    return $pdo->lastInsertId();
}

// Редактирование в таблице
function update($table, $id, $params) {
    global $pdo;
    $i = 0;
    $str = '';
    foreach ($params as $key => $value) {
        if($i === 0) {
            $str = $str . $key . " =  '" . $value . "'";
        } else {
            $str = $str . ", " . $key . " =  '" . $value . "'";
        }
        $i++;
    }
    $sql = "UPDATE $table SET $str WHERE id = $id";
    $query = $pdo->prepare($sql);
    $query->execute($params);
    dbCheckError($query);
}

// Удаление
function delete($table, $id) {
    global $pdo;
    $sql = "DELETE FROM $table WHERE id = $id";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}
// нужно получить всех пользователей у которых лечащий врач кто-то
function selectAllFromPostsWithUsers($table1, $table2, $id_doctor) {
    global $pdo;
    $sql = "SELECT * FROM $table1 AS p JOIN $table2 AS u ON p.id_doctor = u.id";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}
function selectAllFromUsersWithUsers($table1, $table2, $id_doctor) {
    global $pdo;
    $sql = "SELECT * FROM $table1 AS p JOIN $table2 AS u ON p.id = u.card_id WHERE p.id_doctor = $id_doctor";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}



