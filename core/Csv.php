<?php

class Csv
{
    public static function writeCsv($file, $row_delimiter = PHP_EOL) {
        $fn = fopen($file,'w');
        $model = new ItemModel();
        $items=$model->getDataItems();
        foreach ($items as $item) {
            if (is_object($item)) {
                $item = (array) $item;
            }
        }
        $firstRow = implode(';', array_keys($item));
        fwrite($fn,$firstRow.$row_delimiter);
        foreach ($items as $item) {
            if (is_object($item)) {
                $item = (array) $item;
            }
            $row = implode(';', array_values($item));
            fwrite($fn,$row.$row_delimiter);
        }
        fclose($fn);
    }
    public static function readCsv($file)
    {
        $fn = file($file,FILE_IGNORE_NEW_LINES);
        $key = explode(';',$fn[0]);
        $valueString = array_slice($fn,1,count($fn));
        foreach ($valueString as $val) {
            $value = explode(';',$val);
            $items[] = array_combine($key, $value);
        }
        return $items;
    }

}