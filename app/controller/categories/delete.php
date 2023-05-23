<?php

$id = (int)PARAMS_URL['categoryId'];
deleteCategory($id);

echo "Deleted successfully";

/*
Шлю запрос в бд, удаляю категорию

Перенаправление на /categories
*/