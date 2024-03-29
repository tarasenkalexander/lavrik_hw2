<?php
//include_once ('core/functions.php');
define("DEFAULT_CATEGORY_ID", '3');

function getArticles(): array
{
    $sql = "SELECT * FROM articles;";
    $query = runSqlQuery($sql);
    $resultFromDB = $query->fetchAll(PDO::FETCH_ASSOC);

    return setArrayKeyWithId($resultFromDB);
}

function getArticle(int $id): array | false
{
    $sql = "SELECT * FROM articles WHERE id=:id";
    $query = runSqlQuery($sql, ['id' => $id]);
    $result = $query->fetch();

    return $result;
}

function addArticle(array $newArticle): bool
{
    $sql = "INSERT INTO articles(title, content, category_id, user_id)
            VALUES (:title, :content, :category, :user_id);";
    $query = runSqlQuery($sql, $newArticle);

    return getErrors($query);
}

function removeArticle(int $id): bool
{
    $sql = "DELETE FROM articles WHERE id=:id";
    $query = runSqlQuery($sql, ['id' => $id]);

    return getErrors($query);
}

function editArticle(int $id, array $newArticle): bool
{
    $sql = "UPDATE articles
            SET title=:title, content=:content, category_id=:category_id
            WHERE id=$id";
    $query = runSqlQuery($sql, $newArticle);

    return getErrors($query);
}

function getArticlesByCategory(int $category_id)
{
    $sql = "SELECT articles.title as title, articles.id as id
            FROM articles
            LEFT JOIN categories ON articles.category_id = categories.id
            WHERE articles.category_id = :category_id;";

    $query = runSqlQuery($sql, ['category_id' => $category_id]);
    $resultFromDB = $query->fetchAll(PDO::FETCH_ASSOC);

    return setArrayKeyWithId($resultFromDB);
}
