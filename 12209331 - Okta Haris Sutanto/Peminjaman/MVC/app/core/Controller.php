<?php
// file ini akan menyimpan controller utama, sedangkan file-file yang nantinya ada pada folder controllers akan extends pada Controller.php ini
class Controller
{
  public function view($view, $data = [])
  {
    require_once '../app/views/' . $view . '.php';
  }
  public function model($model)
  {
    require_once '../app/models/' . $model . '.php';
    return new $model;
  }
}
