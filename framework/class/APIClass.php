<?php

    class API {
        
        private $_xml;
        private $_json;

        // 2013-09-06 13:24
        public function XMLEncode($input){
            
            $xml = new SimpleXMLElement('<?xml version="1.0" ?> <concerts />');
            
            foreach ($input as $key => $value) {
                $concert = $xml->addChild($key);
                foreach ($value as $values) {
                    foreach ($values as $key2 => $values2) {
                         $concert->addChild($key2,$values2);
                    }

                }
            }

            $this->_xml = $xml->asXML();

        }
        // 2013-09-06 13:24
        public function XMLFileDecode($xmlUrl,$arrSkipIndices = array()){
            
            $xmlStr = file_get_contents($xmlUrl);  
            $xmlObj = simplexml_load_string($xmlStr); // สร้างเป็น xml object   
            
            $arrData = array();  
            // if input is object, convert into array  
            if (is_object($xmlObj)) {  
                $xmlObj = get_object_vars($xmlObj);  
            }  

            if (is_array($xmlObj)) {  
                foreach ($xmlObj as $index => $value) {  
//                    if (is_object($value) || is_array($value)) {  
//                        $value = $this->XMLFileDecode($value, $arrSkipIndices); // recursive call  
//                    }  
                    if (in_array($index, $arrSkipIndices)) {  
                        continue;  
                    }  
                    $arrData[$index] = $value;  
                }  
            }  
            return $arrData;
        }
        // 2013-09-06 13:24
        public function getXML(){
            return $this->_xml;
        }
        // 2013-09-06 13:24
        public function JSONEncode($input){
            $this->_json = json_encode($input);  
            return $this->_json;
        }
        // 2013-09-06 13:24
        public function JSONDecode($input){
            $this->_json = json_decode($input,true);  
            return $this->_json;
        }
        // 2013-09-06 13:24
        public function getJSON(){
            return $this->_json;
        }
        
    }
    
    
    
?>
