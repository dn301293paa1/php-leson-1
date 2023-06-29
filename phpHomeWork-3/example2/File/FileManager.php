<?php

class FileManager
{


    public function __construct(private File\File $file)
    {
        $this->file = $file;
    }

    public function readFile($filename)
    {
        $ext = $this->getFileExtension($filename);

        if ($ext === 'txt') {
            $this->file->readTxt($filename);
        } elseif ($ext === 'csv') {
            $this->file->readCsv($filename);
        } else {
            $this->file->readOther($filename);
        }
    }

    private function getFileExtension($filename)
    {
        return pathinfo($filename,);
    }
}
