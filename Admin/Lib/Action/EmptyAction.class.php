<?php
    class EmptyAction extends CommonAction{
        public function index(){
            $moduleName = MODULE_NAME;
            $this->whereTogo($moduleName);
        }

        public function _empty($name){
            redirect(__APP__.'/Public/login');
        }

        protected function whereTogo($moduleName){
            // echo '系统不知道你要去哪里，或者不认识：' . $moduleName;
            $this->redirect(__APP__.'/Public/login');
        }
    }

?>