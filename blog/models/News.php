<?php


class News
{
    // Количество отображаемых товаров по умолчанию
    const SHOW_BY_DEFAULT = 6;


    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT id, name, description FROM product '
            . 'WHERE status = "1" ORDER BY id DESC '
            . 'LIMIT :count';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':count', $count, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        $i = 0;
        $productsList = [];
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['description'] = $row['description'];
            $i++;
        }
        return $productsList;
    }
    public static function getProductsListByCategory($categoryId, $page = 1)
    {
        $limit = News::SHOW_BY_DEFAULT;
        // Смещение (для запроса)
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT id, name, description FROM product '
            . 'WHERE status = 1 AND category_id = :category_id '
            . 'ORDER BY id ASC LIMIT :limit OFFSET :offset';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        $i = 0;
        $products = array();
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['description'] = $row['description'];
            $i++;
        }
        return $products;
    }
    public static function getProductById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM product WHERE id = :id';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        return $result->fetch();
    }

}