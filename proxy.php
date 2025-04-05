<?php
interface Image {
    public function display();
}
class RealImage implements Image {
    private $filename;

    public function __construct($filename) {
        $this->filename = $filename;
        $this->loadFromDisk();
    }

    private function loadFromDisk() {
        echo "Loading image: {$this->filename}\n";
    }

    public function display() {
        echo "Displaying image: {$this->filename}\n";
    }
}
class ProxyImage implements Image {
    private $filename;
    private $realImage;

    public function __construct($filename) {
        $this->filename = $filename;
    }

    public function display() {
        if (!$this->realImage) {
            $this->realImage = new RealImage($this->filename);
        }
        $this->realImage->display();
    }
}
$image1 = new ProxyImage("dog.jpg");
$image2 = new ProxyImage("cat.jpg");

echo "Showing first image:\n";
$image1->display();

echo "\nShowing first image again:\n";
$image1->display();

echo "\nShowing second image:\n";
$image2->display();