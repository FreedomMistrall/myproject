<?php

class Csv
{
    public static function writeCsv($file, $row_delimiter = PHP_EOL) {
        $fn = fopen($file,'w');
        $some = new ItemModel();
        $items=$some->getDataItems();
        foreach ($items as $item) {
            if (is_object($item)){
                $item = (array) $item;
            }
        }
        $firstRow = implode(';', array_keys($item));
        fwrite($fn,$firstRow.$row_delimiter);
        foreach ($items as $item) {
            if (is_object($item)){
                $item = (array) $item;
            }
            $row = implode(';', array_values($item));
            fwrite($fn,$row.$row_delimiter);
        }
        fclose($fn);
    }
    public static function readCsv($file){
        $fn = fopen($file, 'r');
        while (!feof($fn)) {
            $array[] = fgetcsv($fn, 0, ";");
        }
        array_pop($array);
        return $array;
        fclose($file);
    }

}