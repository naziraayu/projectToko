<?php

class Song {
    public $judul;
    public $artis;
    
    public function __construct($judul, $artis) {
        $this->judul = $judul;
        $this->artis = $artis;
    }
}

class spotifyQueue {
    private $stack;
    
    public function __construct() {
        $this->stack = [];
    }
    
    public function enqueue($judul, $artis) {
        $lagu = new Song($judul, $artis);
        array_push($this->stack, $lagu);
    }
    
    public function dequeue() {
        if (empty($this->stack)) {
            echo "Antrian kosong." . PHP_EOL;
            return;
        }
        
        $lagu = array_shift($this->stack);
        echo "Sekarang Main: {$lagu->judul} - {$lagu->artis}" . "\n" . PHP_EOL;
    }
    
    public function printQueue() {
        if (empty($this->stack)) {
            echo "Antrian Kosong." . PHP_EOL;
            return;
        }
        
        echo "Antrian saat ini: " . PHP_EOL;
        foreach ($this->stack as $lagu) {
            echo "- {$lagu->judul} - {$lagu->artis}" . "\n" . PHP_EOL;
        }
    }
}

// Example usage
$queue = new spotifyQueue();

$queue->enqueue("greedy", "Tate McRae");
$queue->enqueue("Wicked Games", "Kiana Lede");
$queue->enqueue("Water", "Tyla");
$queue->enqueue("High Hopes", "Panic Disco!");
$queue->enqueue("Without Me", "Halsey");
$queue->enqueue("7 Rings", "Ariana Grande");

echo "\n";
$queue->printQueue(); // Current queue
echo "\n";
$queue->dequeue(); // Now playing
echo "\n";
$queue->printQueue(); // Current queue