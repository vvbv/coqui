<?php 
    function println( $arr ){
        $line = "";
        foreach( $arr as $key => $element ){
            $line .= $element;
        }
        return $line . "<br>";
    }
?>