<?php
require_once ("database.php");

class News {
    var $news_id;
    var $news_text;

    public function __construct($args=[])
    {
        $this->news_id = $args['news_id'] ?? '';
        $this->news_text = $args['news_text'] ?? '';
    }

    public static function create($text) {
        global $conn;
        $sql = "INSERT INTO news (text) VALUES ('$text'))";
        $conn->exec($sql);
    }

    public static function get_news() {
        global $conn;
        $newss = [];

        $sql = "SELECT * FROM news";
        $result = $conn->query($sql, PDO::FETCH_ASSOC);

        foreach ($result as $row) {
            $news = new News(['news_id' => $row['id'],
                'news_text' => $row['text']
            ]);
            $newss[] = $news;
        }
        return $newss;
    }

    public static function totalNews() {
        global $conn;
        $totalnews = 0;

        $sql = "SELECT * FROM news";
        $result = $conn->query($sql, PDO::FETCH_ASSOC);

        foreach ($result as $row) {
            $news = new News(['news_id' => $row['id'],
                'news_text' => $row['text']
            ]);
            $totalnews += 1;
        }
        return $totalnews;
    }

}
