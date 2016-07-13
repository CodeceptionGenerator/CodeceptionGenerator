<?php
namespace CodeceptionGenerator\Lib\File;

class Csv
{
    const REGEX_FILE_NAME = '/\A[A-Za-z][A-Za-z0-9_]+\.csv\z/';

    protected $filePath;

    /**
     * Convert a csv to an array
     *
     * @param $filePath
     * @param bool $skipEmptyRowflag
     * @param bool $useHeaderFlag
     * @return array
     * @throws Exception
     * @throws \Exception
     */
    public function convertArray($filePath = '', $skipEmptyRowflag = true, $useHeaderFlag = true)
    {
        try {
            $this->confirmFilePath($filePath);
            $fileName = $this->getFileNameByFilePath($filePath);
            $this->validateFileName($fileName);

            $file = new \SplFileObject($filePath);
            $file->setFlags(\SplFileObject::READ_CSV);

            $header = [];
            $result = [];

            foreach ($file as $line) {

                // Skip an empty row.
                if ($skipEmptyRowflag === true && $line[0] === null) {
                    continue;
                }

                // Get line number.
                $lineNumber = $file->key();

                // If you do not use csv's header
                if ($useHeaderFlag !== true) {
                    $result[$lineNumber] = $line;
                    continue;
                }

                // If you use csv's header
                if ($lineNumber === 0) {
                    $header = $line;
                    continue;
                }

                $result[$lineNumber] = array_combine($header, $line);
            }

            return $result;

        } catch (\Exception $e) {
            echo $e->getMessage(), PHP_EOL;
        }
    }

    /**
     * Confirm a file path.
     *
     * @param $filePath
     * @throws \Exception
     */
    protected function confirmFilePath($filePath)
    {
        if (!file_exists($filePath)) {
            throw new \Exception('The file path is invalid. ' . $filePath);
        }

        if (!is_file($filePath)) {
            throw new \Exception('It is not a file. ' . $filePath);
        }
    }

    /**
     * Get a file name by a file path.
     *
     * @param $filePath
     * @return string
     */
    protected function getFileNameByFilePath($filePath)
    {
        return basename($filePath);
    }

    /**
     * Validation of a file name.
     * A Security measure of NULL byte attack and directory travasal attack.
     *
     * @param $fileName
     * @throws Exception
     */
    protected function validateFileName($fileName)
    {
        if (preg_match(self::REGEX_FILE_NAME, $fileName) !== 1) {
            throw new Exception('The file name is invalid. ' . $fileName);
        }
    }
}