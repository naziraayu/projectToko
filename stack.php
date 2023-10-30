<?php
    class Stack {
        public $stack = array();
        public function push($item) {
            array_push($this->stack, $item);
        }
        public function pop () {
            if(!$this->isEmpty()) {
                return array_pop($this->stack);
            }
            return null;
        }
        public function peek() {
            if(!$this->isEmpty()) {
                return end($this->stack);
            }
            return null;
        }
        public function isEmpty() {
            return empty($this->stack);
        }
    }
    $stack = new Stack();
    $stack->push("Baju pertama");
    $stack->push("Baju Kedua");
    $stack->push("Baju Ketiga");
    $stack->push("Baju Keempat");
    $stack->push("Baju Kelima");

    echo "Baju teratas: " . $stack->peek() . "\n";
    $stack->pop();
    echo "Baju teratas setelah pop: " . $stack->peek() . "\n";
    $stack->pop();
    $stack->pop();

    if($stack->isEmpty()) {
        echo "Tumpukan kosong" . "\n";
    } else {
        echo "Tumpukan tidak kosong" . "\n";
    }
?>