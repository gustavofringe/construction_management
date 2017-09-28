<?php
class View {

  private $file;
  private $rendered = false;
  public $layout = 'default';
  public $request;
  public $errors;

  public function __construct($controller, $action) {
    $this->file = ROOT."/views/".$controller.'/' . $action . ".php";
  }

  public function render(array $data,$errors=null) {
    $this->errors = $errors;
    $content = $this->renderFile($this->file, $data);
    $view = $this->renderFile(ROOT.'/views/layouts/'.$this->layout.'.php',
      array('content' => $content));
      return $view;
      return $errors;
  }

  private function renderFile($file, $data) {
    if (file_exists($file)) {
        extract($data);
        ob_start();
        require $file;
        $content = ob_get_clean();
        require_once ROOT.'/views/layouts/'.$this->layout.'.php';
        $this->rendered = true;
    }
    else {
      throw new Exception("Fichier '$file' introuvable");
    }
  }
}