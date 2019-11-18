<?php
/*
先解釋補齊一些變數，以及 function 來幫助 try & error;
過程中的 echo 多半是用來 debug 用。可以注解掉。
*/

interface ArticleInterface {
    public function getArticle($blog);
    // public function Exception();
}

interface BlogInterface {
    public function sendBlog($user);
    // public function Exception();
}

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

class User {
    static function getUser($user_id) {
        $root = "root";
        // echo $root.'<br />'; // root
        return 1;
    }
}

function checkArticle($status) {
    if ($status) {
        throw new Exception("There is no article here!.".'<br />');
    }
    return true;
}

function checkBlog($status) {
    if ($status) {
        throw new Exception("There is no blog here!.".'<br />');
    }
    return true;
}

function checkUser($status) {
    if ($status) {
        throw new Exception("There is no user here!.".'<br />');
    }
    return true;
}

/* try {
    check(1);
}

catch(Exception $e) {
    echo 'Message: '.$e -> getMessage();
}
*/

/*
這裡我沒有特別寫 getUser funcion，而是直接 call get_current_user()。
*/
// echo 'Current script owner: ' . get_current_user();
function getUserArticles($user_id, $article_id) { 
    echo $user_id.', '.$article_id.'<br />'; // SYSTEM, 0123
    if ($user_id && $article_id) {
        if ($user = User::getUser($user_id)) { // Class User 內去取用 getUser 這個 function
            $blog = new FunctionInterface2();
            $blockname = $blog -> sendBlog($user); // PJs
            if ($blockname != 0) {// 這邊改寫一下 $user -> blog，因為還在研究 MVC in Laravel，blog 建立之後會補上。
                $article = new FunctionInterface1();
                $articlename = $article -> getArticle($blog); // Quiz1
                if ($articlename != 0) {
                    return $articlename;
                }
                else {
                    // echo "There is no article!".'<br />';
                    checkArticle(1);
                }
            }
            else {
                // echo "There is no blog!".'<br />';
                checkBlog(1);
            }
        }
        else {
            // echo "There is no user!<br />";
            checkUser(1);
        }
    }
    return null;
}

$user_id = get_current_user();
$article_id = "0123";
getUserArticles($user_id, $article_id);
?>