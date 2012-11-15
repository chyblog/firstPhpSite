<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
  public function index() {
    $this->display();  }
  
  public function login() {
    $username = $_POST["username"];
    $password = $_POST["password"];
    if($username == 'cjc') {
      session_start();
      $_SESSION['userinfo']=$username;
      $this->display('main');
    } else {
      $this->loginFlag = 'false';
      $this->display('index');
    }
  }
}
