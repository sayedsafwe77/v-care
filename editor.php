<?php

class SimpleEditor
{
    public $text = '';
    public $selection = '';
    public $clipboard = '';

    // We add a simple stack for history
    private $history = [];

    public function copy()
    {
        $this->clipboard = $this->selection;
        echo "Copied: " . $this->clipboard . "\n";
    }

    public function cut()
    {
        $this->saveBackup();

        $this->clipboard = $this->selection;

        // Delete the selection from text
        $this->text = str_replace($this->selection, '', $this->text);

        // Clear selection
        $this->selection = '';

        echo "Cut: " . $this->clipboard . "\n";
    }

    public function paste()
    {
        $this->saveBackup();

        // For simplicity, append clipboard at the end
        $this->text .= $this->clipboard;

        echo "Pasted: " . $this->clipboard . "\n";
    }

    public function undo()
    {
        if (empty($this->history)) {
            echo "Nothing to undo!\n";
            return;
        }

        // Restore the last state
        $this->text = array_pop($this->history);
        echo "Undo executed!\n";
    }

    private function saveBackup()
    {
        // Save current text in history
        $this->history[] = $this->text;
    }

    public function show()
    {
        echo "Editor text: " . $this->text . "\n";
    }
}

echo "🟥 SimpleEditor with Undo (no Command pattern)\n";

$editor = new SimpleEditor();
$editor->text = "Hello World!";
$editor->selection = "World";

$editor->show();

// Copy "World"
$editor->copy();

// Cut "World"
$editor->cut();
$editor->show();

// Undo Cut
$editor->undo();
$editor->show();

// Paste "World" at the end
$editor->paste();
$editor->show();

// Undo Paste
$editor->undo();
$editor->show();