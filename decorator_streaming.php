<?php

interface Stream
{
    public function read(int $bytes): string;
}

class FileStream implements Stream
{
    protected string $filename;
    protected $handle;

    public function __construct(string $filename)
    {
        $this->filename = $filename;
        $this->handle = fopen($filename, 'rb');
    }

    public function read(int $bytes): string
    {
        return fread($this->handle, $bytes);
    }


    public function __destruct()
    {
        fclose($this->handle);
    }
}

abstract class StreamFeature{
    public function __construct(protected Stream $stream)
    {
    }
}
class CompressionStream extends StreamFeature implements Stream
{
    public function read(int $bytes): string
    {
        $data = $this->stream->read($bytes);
        return gzcompress($data);  // PHP's gzip compression
    }
}

class EncryptionStream extends StreamFeature implements Stream
{
    public function read(int $bytes): string
    {
        $data = $this->stream->read($bytes);
        return base64_encode($data);
    }
}


$file = new FileStream('video.mp4');

$compressedStream = new CompressionStream($file);
$encryptedStream = new EncryptionStream($compressedStream);

$data = $encryptedStream->read(1024);

echo $data;