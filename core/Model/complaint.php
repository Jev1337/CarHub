<?php
    class complaint{
        private string $title;
        private string $description;
        private string $isPending;
        private string $isRejected;
        private string $CIN;
        public function __construct(string $title, string $description, string $CIN){
            $this->title = $title;
            $this->description = $description;
            $this->isPending = 1;
            $this->isRejected = 0;
            $this->CIN = $CIN;
        }
        public function settitle(string $title){
            $this->title = $title;
        }
        public function setdescription(string $description){
            $this->description = $description;
        }
        public function setisPending(string $isPending){
            $this->isPending = $isPending;
        }
        public function setisRejected(string $isRejected){
            $this->isRejected = $isRejected;
        }
        public function setCIN(string $CIN){
            $this->CIN = $CIN;
        }

        public function gettitle(){
            return $this->title;
        }
        public function getdescription(){
            return $this->description;
        }
        public function getisPending(){
            return $this->isPending;
        }
        public function getisRejected(){
            return $this->isRejected;
        }
        public function getCIN(){
            return $this->CIN;
        }
        
    }
?>