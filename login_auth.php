<?php
  class Auth {
    const LOGIN_ID = 'aaa@aaa.com';
    const LOGIN_PASS = '1234';

    // privateだから直接参照
    private $id ='';
    private $pass = '';

    // じゃあどうやってプライベートを取得するの？ 独自関数＝メソッドを自分でつくる

    // IDセットする独自関数
    public function setID ($a) {
      $this->id = $a;
    }
    // +----------------------------------------------------------------------------------------+
    // public function setID ($a) の『$a』はこの独自関数の中でしか使えない引数
    // 『$aiueo』でも『$aidh』でもいい
    // public function setID ($id) にしたとする、この『$id』は16行目の『$id』のことではない
    // +----------------------------------------------------------------------------------------+

    // IDを取得する独自関数
    // getIDを経由することで、直接参照の『private $id ='';』が参照できるようになる
    public function getID() {
      return $this->id;
    }

    // PASSセットする独自関数
    public function setPass ($b) {
      $this->pass = $b;
    }
    // +----------------------------------------------------------------------------------------+
    // public function setPass ($b)  の『$b』はこの独自関数の中でしか使えない引数
    // 『$bibibi』でも『$bpass』でもいい
    // public function setPass ($pass) にしたとする、この『$pass』は17行目の『$pass』のことではない
    // +----------------------------------------------------------------------------------------+

    // PASSを取得する独自関数
    public function getPass() {
      return $this->pass;
    }

    public function checkLogIn() {
      if( self::LOGIN_ID === self::getID() && self::LOGIN_PASS === $this->pass ) {
        echo 'ログイン成功';
      } else {
        echo 'ログイン失敗';
      }
    }
  } // Authクラス終了

  if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {

    // インスタンス化
    $auth = new Auth();

    // 入力値
    $auth->$setID($_POST['id']);
    $auth->$setPass($_POST['pass']);

    $auth->checkLogIn();
  }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="PHPの基礎を学ぼう">
  <title>ログイン認証</title>
</head>
<body>
  <p>ログイン認証機能でPHPのクラスを理解する</p>

  <form method="post" action="./">
    <input type="text" name="id" placeholder="IDを入力してください" style="border:1px #000 solid;padding:10px;">
    <br> 
    <input type="password" name="pass" placeholder="パスを入力してください" style="border:1px #000 solid;padding:10px;">
    <br>
    <input type="submit" value="ログイン">
  </form>
  
</body>
</html>

<!-- localhost/php-basic/login_auth.php -->