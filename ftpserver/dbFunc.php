<?php

function dbConnect() {
   $result = new mysqli('localhost', 'bang', 'bfjbfj', 'ftpmng');
   if (!$result) {
     throw new Exception('Could not connect to database server');
   } else {
     return $result;
   }
}

function findUser($username) {
    // connect to db
    $dbConn = dbConnect();

    // check if username is unique
    $result = $dbConn->query("select * from user
                         where username='".$username."'");

    if (!$result) {
        throw new Exception('Could not find user.');
    }

    if ($result->num_rows>0) {
        return true;
    } else {
        return false;
    }
}

function regUser($username, $password) {
    $dbConn = dbConnect();

    // check if username is unique
    $result = $dbConn->query("select * from user where username='".$username."'");
    if (!$result) {
        throw new Exception('Could not execute query');
    }

    if ($result->num_rows>0) {
        throw new Exception('That username is taken - go back and choose another one.');
    }

    // if ok, put in db
    $result = $dbConn->query("insert into user values
                         ('".$username."', '".$password."')");
    if (!$result) {
        throw new Exception('Could not register you in database - please try again later.');
    }

    return true;
}


function loginUser($username, $password) {
    // connect to db
    $dbConn = dbConnect();

    // check if username is unique
    $result = $dbConn->query("select * from user
                              where username='".$username."'
                              and password = '".$password."'");

    if (!$result) {
        throw new Exception('Could not find user.');
    }

    if ($result->num_rows>0) {
    //    $userfind = array();
    //    for ($count=0; $row = $result->fetch_object(); $count++) {
    //        $userfind[$count] = $row->username;
    //    }
        return true;
    } else {
        return false;
    }    
}
?>
