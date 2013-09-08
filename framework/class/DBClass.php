<?php
    date_default_timezone_set('Asia/Bangkok');
    
    class DB {
        
        public static $_config;
        public static $_sql;
        public static $_setConn = array();

        // 2013-09-06 13:24
        public function __construct($input = Null) {
            self::$_setConn = $input;
        }
        
        // 2013-09-06 13:24
        public static function getSql(){
            return self::$_sql;
        }
        
        // 2013-09-06 13:24
        public static function setConnectDB() {
            try {
                self::$_config = new PDO('mysql:host='.self::$_setConn['host'].';dbname='.self::$_setConn['dbname'].';',self::$_setConn['user'],self::$_setConn['pass'],array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));       
            } catch (PDOException $e) {
//                echo 'Could not connect to database : '.$e->getMessage();
                self::$_config = Null;
                exit;
            } 
            return self::$_config;
        }
        
        // 2013-09-06 13:24
        public static function setInsert(array $input){

            foreach ($input['name'] as $key => $value) {
                $edit[':'.$key] = $value;
            }
            
            $input['value'] = $edit;
            
            $name = array_keys($input['name']);
            $value = array_keys($input['value']);
            $sql = 'INSERT INTO ' . $input['tbl'] . ' (' . implode(', ', $name) . ') VALUES (' . implode(', ', $value) . ' ) ';
            
            try {
                $query = self::setConnectDB()->prepare($sql);  
                $execute = $query->execute($input['value']);
                if(!(empty($execute))){
                    self::$_sql = $sql;
                    $result = TRUE; 
                    $message = 'Insert to database Complete!';
                }else{
                    $result = FALSE; 
                    $message = 'Could not insert failed with message: ' . var_dump($query->errorInfo());
                }          
            } catch (PDOException $e) {
                $result = FALSE;
                $message = 'Colud not query to database with message: ' . $e->getMessage();
            } catch (Exception $e) {
                $result = FALSE;
                $message = 'Colud not connect to database with message: ' . $e->getMessage();
            }      
            
            return array('result' => $result, 'message' => $message);
            
//        return '';
        }
        
        // 2013-09-06 13:24
        public static function setUpdate(array $input){

            foreach ($input['name'] as $key => $value) {
                $edit[':'.$key] = $value;
            }
            
            $input['value'] = $edit;

            $set = '';
            $cols = count($input['name']);
            $num = 1;
            
            foreach ($input['name'] as $key => $val) {
               $num < $cols ? $set = $set . " $key = :$key, " : $set = $set . " $key = :$key";
               ++$num;
            }

            $set2 = '';
            $cols2 = count($input['where']);
            $num2 = 1;
            
            foreach ($input['where'] as $key2 => $val2) {
               $num2 < $cols2 ? $set2 = $set2 . " $key2 = $val2 AND": $set2 = $set2 . " $key2 = $val2";
               ++$num2;
            }
            
           $sql = 'UPDATE ' . $input['tbl'] . ' SET' . $set . ' WHERE ' . $set2;
           
//           echo $sql;
           
            try {
                 $query = self::setConnectDB()->prepare($sql);  
                 $execute = $query->execute($input['value']);
                 if(!(empty($execute))){
                    self::$_sql = $sql;
                    $result = TRUE; 
                    $message = 'Update Table "'.$input['tbl'] . '" Complete';
                 }else{
                    $result = FALSE; 
                    $message = 'Could not update failed with message: ' . var_dump($query->errorInfo());
                 }
            } catch (PDOException $e) {
                $result = FALSE;
                $message = 'Colud not query to database with message: ' . $e->getMessage();
            } catch (Exception $e) {
                $result = FALSE;
                $message = 'Colud not connect to database with message: ' . $e->getMessage();
            }       
            
            return array('result' => $result, 'message' => $message);
            
        }
        
        // 2013-09-06 13:24
        public static function setDelete(array $input){
            
            foreach ($input['where'] as $key => $value) {
                $edit[':'.$key] = $value;
            }
            
            $input['value'] = $edit;
 
            $set = '';
            $cols = count($input['where']);
            $num = 1;
            
            foreach ($input['where'] as $key => $val) {
               $num < $cols ? $set = $set . " $key = :$key AND": $set = $set . " $key = :$key";
               ++$num;
            }
            
            $sql = 'DELETE FROM '.$input['tbl'] . ' WHERE ' . $set;
            
            try {
                 $query = self::setConnectDB()->prepare($sql);  
                 $execute = $query->execute($input['value']);
                 if(!(empty($execute))){
                    self::$_sql = $sql;
                    $result = TRUE; 
                    $message = $query->rowCount() . ' row(s) delete Table "'. $input['tbl'] .'" Complete';
                 }else{
                    $result = FALSE; 
                    $message = 'Could not delete failed with message: ' . var_dump($query->errorInfo());
                 }
            } catch (PDOException $e) {
                $result = FALSE;
                $message = 'Colud not query to database with message: ' . $e->getMessage();
            } catch (Exception $e) {
                $result = FALSE;
                $message = 'Colud not connect to database with message: ' . $e->getMessage();
            }       
            return array('result' => $result, 'message' => $message);  
        }
        
        // 2013-09-06 13:24
        public static function getSelectOne(array $value){
            
            foreach ($value['where'] as $key => $row3) {
                $rows[':'.$key] = $row3;
            }

            $value['value'] = $rows;
            
            $where = '';
            $cols = count($value['where']);
            $num = 1;
            
            foreach ($value['where'] as $val => $keys) {
               $num < $cols ? $where = $where . " $val = :$val AND": $where = $where . " $val = :$val";
               ++$num;
            }

            if(!empty($value['orderby'])){
                $sql = 'SELECT ' . implode(',',$value['select']) . ' FROM ' . $value['tbl'] . $value['join'] . ' WHERE ' . $where . ' ORDER BY ' . $value['orderby'][0] . ' ' . $value['orderby'][1];
            }else{
                $sql = 'SELECT ' . implode(',',$value['select']) . ' FROM ' . $value['tbl'] . $value['join'] . ' WHERE ' . $where;
            }

             try {
                 $query = self::setConnectDB()->prepare($sql);
                 foreach ($value['value'] as $key => $value) {
                    $query->bindValue($key,mysql_real_escape_string($value));
                 }    
                 $query->execute();
                 $result = $query->fetch(PDO::FETCH_ASSOC);
                 if(!empty($result)){
                    self::$_sql = $sql;
                    $message = 'Select to database Complete';
                 }else{
                    $result = FALSE; 
                    $message = 'Could not select failed';
                 }
            } catch (PDOException $e) {
                $result = FALSE;
                $message = 'Colud not query to database with message: ' . $e->getMessage();
            } catch (Exception $e) {
                $result = FALSE;
                $message = 'Colud not connect to database with message: ' . $e->getMessage();
            }                   
           return array('result' => $result, 'message' => $message); 
        }
        
        // 2013-09-06 13:24
        public static function getSelectAll(array $value){

            foreach ($value['where'] as $key => $row3) {
                $rows[':'.$key] = $row3;
            }

            $value['value'] = $rows;
            
            $where = '';
            $cols = count($value['where']);
            $num = 1;
            
            foreach ($value['where'] as $val => $keys) {
               $num < $cols ? $where = $where . " $val = :$val AND": $where = $where . " $val = :$val";
               ++$num;
            }

            if(!empty($value['orderby'])){
                $sql = 'SELECT ' . implode(',',$value['select']) . ' FROM ' . $value['tbl'] . $value['join'] . ' WHERE ' . $where . ' ORDER BY ' . $value['orderby'][0] . ' ' . $value['orderby'][1];
            }else{
                $sql = 'SELECT ' . implode(',',$value['select']) . ' FROM ' . $value['tbl'] . $value['join'] . ' WHERE ' . $where;
            }

             try {
                 $query = self::setConnectDB()->prepare($sql);
                 foreach ($value['value'] as $key => $value) {
                    $query->bindValue($key,mysql_real_escape_string($value));
                 }    
                 $query->execute();
                 $result = $query->fetchAll(PDO::FETCH_ASSOC);
                 if(!empty($result)){
                    self::$_sql = $sql;
                    $message = 'Select to database Complete';
                 }else{
                    $result = FALSE; 
                    $message = 'Could not select failed';
                 }
            } catch (PDOException $e) {
                $result = FALSE;
                $message = 'Colud not query to database with message: ' . $e->getMessage();
            } catch (Exception $e) {
                $result = FALSE;
                $message = 'Colud not connect to database with message: ' . $e->getMessage();
            }           
           return array('result' => $result, 'message' => $message);  
        }
        
        // 2013-06-08 00:22
        public static function getSelectJOIN(array $value){
            print_r($value);
        }
        
        // 2013-09-08 00ซ23
        public static function getSelectGroup(array $value){
           print_r($value);
        }
    }
    
?>
