<?php

/*
這裡做 function interface.
*/
interface ArticleInterface {
    public function getArticle($blog);
    // public function Exception();
}

interface BlogInterface {
    public function sendBlog($user);
    // public function Exception();
}

/*
Function implements from interface.
*/
class FunctionInterface1 implements ArticleInterface {
    public function getArticle($blog) {
        if ($blog = "PJs") {
            $articlename = "Quiz1";
            // echo $articlename.'<br />'; // Quiz1
        }
        return 1;
    }
}

class FunctionInterface2 implements BlogInterface {
    public function sendBlog($user) {
        if ($user = "root") {
            $blogname = "PJs";
            // echo $blogname.'<br />'; // PJs
        }
        return 1;
    }
}

/*
Scope resolution operator 需要用到的 static function.
*/
class User {
    static function getUser($user_id) {
        $root = "root";
        // echo $root.'<br />'; // root
        return 1;
    }
}

/*
Exception handling.
*/
function checkArticle($status) {
    if ($status) {
        throw new Exception("There is no article here!".'<br />');
    }
    return true;
}

function checkBlog($status) {
    if ($status) {
        throw new Exception("There is no blog here!".'<br />');
    }
    return true;
}

function checkUser($status) {
    if ($status) {
        throw new Exception("There is no user here!".'<br />');
    }
    return true;
}

/*
Fixed function.
參考自 [PHP避免使用巢狀條件式] (https://www.webteach.tw/?p=688)
改用此寫法就可以改善可讀性的問題，避免閱讀上的困難。
*/
function getUserArticles($user_id, $article_id) { 
    echo $user_id.', '.$article_id.'<br />'; // SYSTEM, 0123
    if ($user_id && $article_id) {
        if ($user = User::getUser($user_id) != 1) { checkUser($user);}
        $blog = new FunctionInterface2();
        $blockname = $blog -> sendBlog($user);
        if ($blockname != 1) { checkBlog($blockname);}
        $article = new FunctionInterface1();
        $articlename = $article -> getArticle($blog);
        if ($articlename != 1) { checkArticle($articlename);}
    }
    return null;
}

/*
Argument generator.
*/
$user_id = get_current_user();
$article_id = "0123";
getUserArticles($user_id, $article_id);
?>