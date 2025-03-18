<?php

// Command Interface
interface Command
{
    public function execute(): bool;
    public function undo();
}

// Receiver: The actual editor
class Editor
{
    public $text = '';
    public $clipboard = '';
    public $selection = '';

    public function getSelection(): string
    {
        return $this->selection;
    }

    public function deleteSelection()
    {
        $this->text = str_replace($this->selection, '', $this->text);
        $this->selection = '';
    }

    public function replaceSelection(string $text)
    {
        $this->text = str_replace($this->selection, $text, $this->text);
        $this->selection = $text;
    }

    public function showContent()
    {
        echo "Editor Content: " . $this->text . "\n";
    }
}

// Base class for common functionality
abstract class EditorCommand implements Command
{
    protected $backup;

    public function __construct(protected Editor $editor)
    {
    }

    public function saveBackup()
    {
        $this->backup = $this->editor->text;
    }

    public function undo()
    {
        $this->editor->text = $this->backup;
    }

    abstract public function execute(): bool;
}

// Concrete Commands
class CopyCommand extends EditorCommand
{
    public function execute(): bool
    {
        $this->editor->clipboard = $this->editor->getSelection();
        echo "Copied to clipboard: " . $this->editor->clipboard . "\n";
        return false; // Nothing to undo
    }
}

class CutCommand extends EditorCommand
{
    public function execute(): bool
    {
        $this->saveBackup();
        $this->editor->clipboard = $this->editor->getSelection();
        $this->editor->deleteSelection();
        echo "Cut selection. Clipboard now: " . $this->editor->clipboard . "\n";
        return true;
    }
}

class PasteCommand extends EditorCommand
{
    public function execute(): bool
    {
        $this->saveBackup();
        $this->editor->replaceSelection($this->editor->clipboard);
        echo "Pasted from clipboard: " . $this->editor->clipboard . "\n";
        return true;
    }
}

// Invoker: Button or UI triggers commands
class CommandHistory
{
    private $history = [];

    public function push(Command $command)
    {
        $this->history[] = $command;
    }

    public function pop(): ?Command
    {
        return array_pop($this->history);
    }
}

class Application
{
    public $editor;
    private $history;

    public function __construct()
    {
        $this->editor = new Editor();
        $this->history = new CommandHistory();
    }

    public function setEditorText(string $text)
    {
        $this->editor->text = $text;
    }

    public function setSelection(string $selection)
    {
        $this->editor->selection = $selection;
    }

    public function executeCommand(Command $command)
    {
        if ($command->execute()) {
            $this->history->push($command);
        }
    }

    public function undo()
    {
        $command = $this->history->pop();
        if ($command !== null) {
            $command->undo();
            echo "Undo executed.\n";
        }
    }

    public function showEditor()
    {
        $this->editor->showContent();
    }
}

// Client Code
$app = new Application();

// Initial text
$app->setEditorText("Hello World!");

// Select "World"
$app->setSelection("World");
$app->showEditor();

// Copy "World"
$app->executeCommand(new CopyCommand($app->editor));

// Cut "World"
$app->executeCommand(new CutCommand($app->editor));
$app->showEditor();

// Undo Cut (restore "World")
$app->undo();
$app->showEditor();

// Paste "World" over "Hello"
$app->setSelection("Hello");
$app->executeCommand(new PasteCommand($app->editor));
$app->showEditor();

// Undo Paste
$app->undo();
$app->showEditor();


$app->setSelection('World');
$app->executeCommand(new CopyCommand($app->editor));
// clipboard World
$app->setSelection('Hello');
$app->executeCommand(new PasteCommand($app->editor));
