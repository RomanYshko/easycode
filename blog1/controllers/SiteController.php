<?php 
include_once ROOT. '/models/Category.php';
include_once ROOT. '/models/News.php';
class SiteController
{
    public function actionIndex()
    {
        $categories = [];
        $categories = Category::getCategoriesList();

        $news = [];
        $news = News::getLatestProducts(3);
        require_once ROOT. '/views/site/index.php';
        return true;
    }
}

?>