<?php
//include('core/functions.php');
function getCategories(){
    $sql = 'SELECT * FROM categories;';
    $query = runSqlQuery($sql);
    $resultFromDB = $query->fetchAll(PDO::FETCH_ASSOC);

    return setArrayKeyWithId($resultFromDB);
}
