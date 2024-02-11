<?php
namespace Tools;
use PDO;

class queryBuilder{
     public function sanitizerData($columns, $values)
     {
          $icols = 1;
          $cColumns = count($columns);
          $cols = '(';
          foreach($columns as $col)
          {
               if($cColumns == $icols)
               {
                    $cols .= "`$col`)";
               } else{
                    $cols .= "`$col`, ";
                    ++$icols;        
               }
          }

          $ivalues = 1;
          $cValues = count($values);
          $data = '('; 

          foreach($values as $val)
          {
               if($cValues == $ivalues)
               {    
                    $data .= "'$val')";
               } else{
                    $data .= "'$val', ";
                    ++$ivalues;        
               }
          }

          $sanitizer['columns'] = $cols;
          $sanitizer['data'] = $data;

          return $sanitizer;
     }
}