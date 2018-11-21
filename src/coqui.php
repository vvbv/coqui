<?php

    $CONFIG_TAG = "[self";
    $VALID_OPENED_TAGS = ["[self","[var:","[e:"];
    $VALID_CLOSED_TAGS = ["[/self]","[/var]","[/e]"];

    $DOCS_FOLDER = "docs";
    $file_name = "demo.md";

    $file_uri = $DOCS_FOLDER."/".$file_name;

    //Cargamos el documento en md extendido.
    $file = fopen($file_uri, "r");

    $document = [];
    
    //Iteramos sobre cada linea del documento buscando los coqui-tags
    while( $line = fgets($file) ){
        array_push( $document, $line );
    };

    //Cerramos el archivo.
    fclose($file);

    //Renderizamos el documento.
    renderDocument( $document );

    /**
     * renderDocument Genera una salida en Markdown con los tags coqui procesados
     * @param array $document Arreglo de lineas que forman un documento
     * @return array
     */
    function renderDocument( $document ){  
        $to_return = [];
        foreach( $document as $key => $line ){
            array_push( $to_return, renderLine( $line ) );
        }
        return $to_return;
    }   

    function renderLine( $line ){
        $to_return = null;
        //Iteramos sobre los tags válidos buscando si la línea debe ser procesada
        foreach( $GLOBALS['VALID_OPENED_TAGS'] as $key => $tag ){
            $start_pos = strpos( $line, $tag );
            if( $start_pos !== false ){
                //Adicionamos el tamaño del tag a la posición inicial para identificar donde termina
                $end_pos = $start_pos + strlen( $tag );
                if( $tag === $GLOBALS['CONFIG_TAG'] ){
                    $properties = getConfigProperties( $line );
                }
                //ünicamente es válido tener un coqui-tag por linea
                break;
            }
        }
    }

    function getConfigProperties( $line ){
       
        //Obtenemos la posición de inicio de la zona de propiedades
        $start_pos = strpos( $line, $GLOBALS['CONFIG_TAG'] ) + strlen( $GLOBALS['CONFIG_TAG'] );
        $end_pos = strpos( $line, "]" ) ;
        $offset = $end_pos - $start_pos;
        $prop_block = substr ( $line , $start_pos, $offset );
        $prop_block = trim( $prop_block );

        echo $prop_block . "\n";
    }

?>