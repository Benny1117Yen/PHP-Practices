<?php
/*
先解釋補齊一些變數，以及 function 來幫助 try & error;
過程中的 echo 多半是用來 debug 用。可以注解掉。
*/
class User {
    public $article = "456";
    public function getArticle() {
        echo $this -> article;
    }
    public $blog = "PJs";
    public function sendblog() {
        echo $this -> blog;
    }
    static function getUser($user_id) {
        // echo $this -> blog;
        $root = "root";
        return $root;
    }
}

/*
這裡我沒有特別寫 getUser funcion，而是直接 call get_current_user()。
*/
// echo 'Current script owner: ' . get_current_user();
function getUserArticles($user_id, $article_id) { 
    echo $user_id.', '.$article_id.'<br>';
    $blog = new User();
    $article = new User();
    if ($user_id && $article_id) {
        if ($user = User::getUser($user_id)) { // Class User 內去取用 getUser 這個 function
            echo $user.'<br>';
            if ($blog -> sendblog()) {// 這邊改寫一下 $user -> blog，因為還在研究 MVC in Laravel，blog 建立之後會補上。
                $blog -> sendblog();
                if ($article -> getArticle()) {
                    // $article -> getArticle();
                    echo "XXX";
                }
                else {
                    // throw new Exception("XXXNOXXXBLOG");
                    echo "XXX";
                }
            }
        }
    }
}

$user_id = get_current_user();
$article_id = "0123";
getUserArticles($user_id, $article_id);
?>