<?php 

include 'core/functions.php';
include 'model/article/articleDbConnection.php';
include 'model/article/article.php';
include 'model/category/categoryDbConnection.php';
include 'core/logging.php';
include 'app/core/router.php';
require 'vendor/autoload.php';

const BASE_URL = "/ma_projects/my_hw2/lavrik_hw2-1/";

const DB_HOST = 'localhost';
const DB_NAME = 'lavrik_social_network_v2';
const DB_USER = 'root';
const DB_PASS = '';