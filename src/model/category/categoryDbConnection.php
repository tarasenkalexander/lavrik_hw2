<?php
//include('core/functions.php');
function getCategories()
{
    $sql = "SELECT * FROM categories";
    $query = runSqlQuery($sql);
    $resultFromDB = $query->fetchAll(PDO::FETCH_ASSOC);

    return setArrayKeyWithId($resultFromDB);
}

function editCategory(int $id, array $newCategory)
{
    $sql = "UPDATE categories
            SET name = :name
            WHERE id=$id";
    $query = runSqlQuery($sql, $newCategory);

    return getErrors($query);
}

function deleteCategory(int $id)
{
    $sql = "DELETE FROM categories WHERE id=$id";
    $query = runSqlQuery($sql);

    return getErrors($query);
}

function deleteCategoryByName(string $name)
{
    $sql = "DELETE FROM categories WHERE name=:name";
    $query = runSqlQuery($sql, ["name" => $name]);

    return getErrors($query);
}

function addCategory(array $newCategory)
{
    $sql = "INSERT INTO categories(name) VALUES (:name);";
    $query = runSqlQuery($sql, $newCategory);

    return getErrors($query);
}
