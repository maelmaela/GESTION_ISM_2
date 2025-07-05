<?php
require_once "../config/Validator.php";
    abstract class Controller{
        protected Validator $validator;
        public function __construct()
        {
            $this->validator=new Validator();
        }
        protected abstract function handleRequest();
        protected function render(string $path, array $data=[]){
            extract($data);
            require_once "../views/$path";
        }
    }
?>