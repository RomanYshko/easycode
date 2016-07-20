<?php

include_once ROOT. '/models/Category.php';
include_once ROOT. '/models/News.php';
class NewsController
{
    public function actionView($categoryId)
    {
        $categories = Category::getCategoriesList();
        
        $news = News::getProductById($categoryId);
        require_once ROOT. '/views/news/view.php';
        return true;
    }

}