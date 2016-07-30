<?php

include_once ROOT. '/models/Category.php';
include_once ROOT. '/models/News.php';
class CategoryController
{
    public function actionIndex()
    {
        // Список категорий для левого меню
        $categories = Category::getCategoriesList();

        // Список последних товаров
        $latestNews = News::getLatestProducts(12);


        require_once ROOT.'/views/category/index.php';
        return true;
    }
    
    public function actionView($categoryId, $page = 1)
    {
        $categories = Category::getCategoriesList();

        // Список товаров в категории
        $categoryNews = News::getProductsListByCategory($categoryId, $page);


        require_once ROOT. '/views/category/view.php';
        return true;
    }

}