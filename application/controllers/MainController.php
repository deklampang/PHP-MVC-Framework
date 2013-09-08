<?php

    class Main_Controller extends BaseController{
        public function main(array $getUri) { 
            $modlename = ucfirst($getUri['controller']) . '_Model';
            $model = new $modlename;
            
//            self::ExTitle();
            #Router {...}
//            self::ExRouter();
            #DateTime {...}
//            self::ExDateTimeClass();
            #String {...}
//            self::ExString();
            #Number {...}
//            self::ExNumber();
            #SpeedTest {...}
//            self::ExSpeedTest();
            #API {...}
//            self::ExAPI();
            #Database {...}
//            self::ExDatabase();
            #FileDirectory {...}
//            self::ExFileDirectory();
            #Form {...}
//            self::ExForm();
            #Session {...}{
//            self::ExSession();
            #Cookies {...}
//            self::ExCookies();
            
//        Error::setLogs('Sorry, something is wrong. Please try again, or contact us if the problem persists');
                    
//             $header = new View_Model(array($getUri['controller'],'Header'));
//             $footer = new View_Model(array($getUri['controller'],'Footer'));
             $master = new View_Model(array($getUri['controller'],'Main'));
//             $master->assign('header',$header->render(FALSE));
//             $master->assign('footer',$footer->render(FALSE));
             $master->render();

        }
        
        
        private function ExTitle(){
            echo '<br>';
            echo 'รายชื่อ Class ทั้งหมด';
            echo '<hr>'; 
            echo '1.Router() {...} ; ใช้จัดการข้อมูลที่อยู่ ลิ้งค์ (Link) ต่าง ๆ ';
            echo '<br>';
            echo '2.DateTime() {...} ; ใช้จัดการข้อมูลเกี่ยวกับ "วันและเวลา"';
            echo '<br>';
            echo '3.String() {...} ; ใช้จัดการข้อมูลเกี่ยวกับ "ข้อความ"';
            echo '<br>';
            echo '4.SpeedTest() {...} ; ใช้วัดความเร็วในการโหลดหน้าเว็บไซต์';
            echo '<br>';
            echo '5.API() {...} ; ใช้จัดการข้อมูลเกี่ยวกับ "XML และ JSON"';
            echo '<br>';
            echo '6.DB() {...} ; ใช้จัดการข้อมูลเกี่ยวกับ "ฐานข้อมูล"';
        }
        
        private function ExSession(){
            
           Main::setConnSession();
           Session::getSession(array('name','address','provice'));
           /*
            * Class Session
            *  - Session::setCreate(array $session); 
            *  - Session::getSession(array $sessionName);
            *  - Session::setUnSession($sessionName);
            *  - Session::setUnSessionAll();
           */
           
            echo '<br>';
            echo 'การใช้งาน Class:Session {...}';
            echo '<hr>';
            echo '1. Main::setConnSession(); // Connect Class';
            echo '<pre>';
            $session = array(
               'name' => 'Eakkabin',
               'address' => 'soemngam',
               'provice' => 'lampang'
           );
            echo '$session = ';
            print_r($session);
            echo '2. Session::setCreate($session);'. Session::setCreate($session);
            $namesession = array('name','address');
            echo '<br>';
            echo '==> $namesession = array("name","address");';
            echo '<br>';
            echo '3. Session::getSession($namesession) = // Output ';
            echo '<br>';
            print_r(Session::getSession($namesession));
            echo '<br>';
            echo '4. Session::setUnSession($namesession) = // Remove Session by Name ';
            echo '<br>';
            echo '5. Session::setUnSessionAll() = // Remove Session All';
            
        }  
        
        private function ExCookies(){
            
           Main::setConnCookies();
           /*
            * Class Cookies
            *  - Cookies::setCreate(array $cookies,$minute); 
           */
           
           $cookies = array(
               'name' => 'Eakkabin',
               'address' => 'soemngam',
               'provice' => 'lampang'
            );
            Cookies::setCreate($cookies);
            echo '<br>';
            echo 'การใช้งาน Class:Cookies {...}';
            echo '<hr>';
            echo '1. Main::setConnCookies(); // Connect Class';
            echo '<pre>';
            echo '$cookies = ';
            print_r($cookies);
            echo '2. Cookies::setCreate($cookies,1); // 1 = Minute ';
            echo '<br>';
            $namecookies = array('name','address');
            echo '==> $namecookies = array("name","address");';
            echo '<br>';
            echo '3. Session::getCookies($namecookies) = // Output ';
            echo '<br>';
            $result = Cookies::getCookies($namecookies);
            print_r($result);
            echo '4. Session::setUnCookies($namecookies) = // Remove Cookies by Name ';
            echo '<br>';
            echo '5. Session::setUnCookiesAll() = // Remove Cookies All';
            
        }
        
        private function ExForm(){
            
           Main::setConnForm();
           /*
            * Class Form
            ******* Format to MD5 and SHA1 ******* 
            *  - Form::getPassFormat($password); 
            *  - Form::setCheckDate(date $date);
            *  - Form::setCheckTelephone($telephone);
            *  - Form::setCheckMoblie($moblie);
            *  - Form::setCheckEmail($email);
            */
           
            echo '<br>';
            echo 'การใช้งาน Class:Form {...}';
            echo '<hr>';
            echo '1. Main::setConnForm(); // Connect Class';
            echo '<br>';
            echo '2. Form::getPassFormat("abc1234") = // Output ' . Form::getPassFormat('abc1234') . ' // "ผ่านการเข้ารหัส MD5 และ SHA1"';
            echo '<br>';
            echo '3. Form::setCheckDate("2013-03-05") = // Output ' . Form::setCheckDate('2013-03-05');
            echo '<br>';
            echo '4. Form::setCheckTelephone("054-123456") = // Output ' . Form::setCheckTelephone('054-123456');
            echo '<br>';
            echo '5. Form::setCheckMoblie("089-123-4567") = // Output ' . Form::setCheckMoblie('089-123-4567');
            echo '<br>';
            echo '5. Form::setCheckEmail("myemail@gmail.com") = // Output ' . Form::setCheckEmail('myemail@gmail.com');
            
        }
        
        private function ExFileDirectory(){
            
           Main::setConnFileDirectory();
           /*
            * Class FileDirectory
            *   - FileDirectory::setFullDelete(string $location); 
            */
           
            echo '<br>';
            echo 'การใช้งาน Class:FileDirectory {...}';
            echo '<hr>';
            echo '1. Main::setConnFileDirectory() // Connect Class';
            echo '<br>';
            echo '2. FileDirectory::setFullDelete($location) = ลบเฉพาะไฟล์หรือไดเรกทอรี่พร้อมกับไฟล์ภายในทั้งหมด ตามที่อยู่ Location ระบุไว้';
            echo '<br>';
            
        }
        
        private function ExRouter(){
            
            /* 
             * Class Router
             *  - Router::getUrl() // Output Array ( [controller] => Main ) 
             *  - Router::getPath() // Output http://localhost/Framework/
             *  - Router::getDir() // Output D:/Appserv/Framework/
             *  - Router::getDirController() // Output D:/Appserv/Framework/application/controllers/
             *  - Router::getDirModel() // Output D:/Appserv/Framework/application/models/
             *  - Router::getDirView() // Output D:/Appserv/Framework/application/views/
             *  - Router::getDirImage() // Output D:/Appserv/Framework/public/images/
             *  - Router::getDirStyle() // Output D:/Appserv/Framework/public/styles/
             *  - Router::getDirScript() // Output D:/Appserv/Framework/public/scripts/
             *  - Router::getDirClass() // Output D:/Appserv/Framework/framework/class/
             *  - Router::getDirException() // Output D:/Appserv/Framework/framework/exceptions/
             *  - Router::getDirLibraries() // Output D:/Appserv/Framework/application/libraries/
             *  - Router::getServerName() // Output localhost
             *  - Router::getRoot() // Output D:/Appserv
             *  - Router::getSite() // Output framework
             *  - Router::getDirConfig() // Output D:/Appserv/Framework/application/configuration/
             *  - Router::getDirFiles() // Output D:/Appserv/Framework/files/
             */
            
            echo '<br>';
            echo 'การใช้งาน Class:Router {...}';
            echo '<hr>';
            echo '1. Router::getUrl() = ';
            print_r(Router::getUrl());
            echo '<br>';
            echo '2. Router::getPath() = ' . Router::getPath();
            echo '<br>';
            echo '3. Router::getDir() = ' . Router::getDir();
            echo '<br>';
            echo '4. Router::getDirController() = ' . Router::getDirController();
            echo '<br>';
            echo '5. Router::getDirModel() = ' . Router::getDirModel();
            echo '<br>';
            echo '6. Router::getDirView() = ' . Router::getDirView();
            echo '<br>';
            echo '7. Router::getDirImage() = ' . Router::getDirImage();
            echo '<br>';
            echo '8. Router::getDirStyle() = ' . Router::getDirStyle();
            echo '<br>';
            echo '9. Router::getDirScript() = ' . Router::getDirScript();
            echo '<br>';
            echo '10. Router::getDirClass() = ' . Router::getDirClass();
            echo '<br>';
            echo '11. Router::getDirException() = ' . Router::getDirException();
            echo '<br>';
            echo '12. Router::getDirLibraries() = ' . Router::getDirLibraries();
            echo '<br>';
            echo '13. Router::getServerName() = ' . Router::getServerName();
            echo '<br>';
            echo '14. Router::getRoot() = ' . Router::getRoot();
            echo '<br>';
            echo '15. Router::getSite() = ' . Router::getSite();
            echo '<br>';
            echo '16. Router::getDirConfig() = ' . Router::getDirConfig();
            echo '<br>';
            echo '17. Router::getDirFiles() = ' . Router::getDirFiles();
            echo '<br><br>';
            
        }
        
        private function ExDateTimeClass(){
            
            Main::setConnDateTime();
            /* Class DateTime
             *  - Example 2013-09-04 10:21:29
             *  - DateTime::getDateTimeNow() //output 2013-09-04
             *  - DateTime::getDateNow() //output 2013-09-04
             *  - DateTime::getTimeNow() //output 10:21:29
             *  - DateTime::getThaiDateTimeNow() //output พุธที่ 04 กันยายน พ.ศ. 2556 เวลา 10:21:29 น.
             *  - DateTime::getThaiDateNow() //output พุธที่ 04 กันยายน พ.ศ. 2556
             *  - DateTime::getThaiTimeNow() //output 10 นาฬิกา 21 นาที 29 วินาที
             *  - DateTime::getThaiDateTime(datetime $datetime) //output พุธที่ 04 กันยายน พ.ศ. 2556 เวลา 10:21:29 น. 
             *  - DateTime::getThaiDate(datetime $datetime) //output พุธที่ 04 กันยายน พ.ศ. 2556 
             *  - DateTime::getThaiTime(datetime $datetime)  //output 10 นาฬิกา 21 นาที 29 วินาที
             *  - DateTime::getThaiDateFacebook(datetime $datetime) //output 2 นาทีที่แล้ว,2 ชั่วโมงที่แล้ว,2 วันที่แล้ว เมื่อเวลา 10:21,เมื่อวันที่ 2 กันยายน เวลา 9:21
             *  - DateTime::getDateNotify(date $date); // output เงื่อนไขรายการจะหมดอายุในอีก 9 วัน
             */
            
            echo '<br>';
            echo 'การใช้งาน Class:DateTime {...}';
            echo '<hr>';
            echo '1. Connect Class = Main::setConnDateTime();';
            echo '<br>';
            echo '2. DateTimes::getDateNow() = ' . DateTimes::getDateNow();
            echo '<br>';
            echo '3. DateTimes::getDateTimeNow() = ' . DateTimes::getDateTimeNow();
            echo '<br>';
            echo '4. DateTimes::getDateNow() = ' . DateTimes::getDateNow();
            echo '<br>';
            echo '5. DateTimes::getTimeNow() = ' . DateTimes::getTimeNow();
            echo '<br>';
            echo '6. DateTimes::getThaiDateTimeNow() = ' . DateTimes::getThaiDateTimeNow();
            echo '<br>';
            echo '7. DateTimes::getThaiDateNow() = ' . DateTimes::getThaiDateNow();
            echo '<br>';
            echo '8. DateTimes::getThaiTimeNow() = ' . DateTimes::getThaiTimeNow();
            echo '<br>';
            echo '9. DateTimes::getThaiDateTime("2013-09-02 09:21:29") = ' . DateTimes::getThaiDateTime('2013-09-02 09:21:29');
            echo '<br>';
            echo '10. DateTimes::getThaiDate("2013-09-02 09:21:29") = ' . DateTimes::getThaiDate('2013-09-02 09:21:29');
            echo '<br>';
            echo '11. DateTimes::getThaiTime("2013-09-02 09:21:29") = ' . DateTimes::getThaiTime('2013-09-02 09:21:29');
            echo '<br>';
            echo '12. DateTimes::getThaiDateFacebook("2013-09-02 09:21:29") = ' . DateTimes::getThaiDateFacebook('2013-09-02 09:21:29');
            echo '<br>';
            echo '13. DateTimes::getDateNotify("2013-09-15") = ' . DateTimes::getDateNotify('2013-09-15');
            echo '<br>';
            echo '14. DateTimes::setCheckDate("2013-09-04") = ' . DateTimes::setCheckDate("2013-09-04");
            echo '<br><br>';
            
        }
        
        private function ExNumber(){
            
            Main::setConnNumber();
            /* 
             * Class Number
             *   Example '250.10'
             *   - Number:getNumber2WordsThai(ing $number) //output สองร้อยห้าสิบจุดหนึ่งศูนย์
             */
            
            echo '<br>';
            echo 'การใช้งาน Class:Number {...}';
            echo '<hr>';
            echo '1. Connect Class = Main::setConnNumber();';
            echo '<br>';
            echo '2.1. Number:getNumber2WordsThai("12345") = ' . Number::getNumber2WordsThai('12345');
            echo '<br>';
            echo '2.2. Number:getNumber2WordsThai("250.10") = ' . Number::getNumber2WordsThai('250.10');
            echo '<br><br>';
            
        }
        
        private function ExString(){
            
            Main::setConnString();
            /* Class String
             *   - Example 'pass1234'
             *   **** Format to MD5 and SHA1 ****
             *   - String:getPassFormat(string $string) //output 724957e721a5375eebc8c5cf9eede5b59974fed7
             *   ********************************
             *   - 
             */
            
            echo '<br>';
            echo 'การใช้งาน Class:String {...}';
            echo '<hr>';
            echo '1. Connect Class = Main::setConnString();';
            echo '<br>';
            echo '2. String::getPassFormat("pass1234") = ' . String::getPassFormat('pass1234');
            echo '<br><br>';
            
        }
        
        private function ExSpeedTest(){
            
            Main::setConnSpeedTest();
            /* Class SpeedTest
             *   - SpeedTest::setTimeStart(); // Start Test Speed
             *   - SpeedTest::setTimeStop(); // End Test Speed 
             *   - SpeedTest::getTime(); // Show Time of Speed Test
             *   - SpeedTest::getTimeFooter(); // Show Time of Speed Test in Footer
             */  
            
            echo '<br>';
            echo 'การใช้งาน Class:SpeedTest {...}';
            echo '<hr>';
            echo '1. Connect Class = Main::setConnSpeedTest();';
            echo '<br>';
            echo '2. SpeedTest::setTimeStart() = // Start Test '.SpeedTest::setTimeStart();
            echo '<br>';
            echo '3. /*..Coding..*/';
            echo '<br>';
            echo '4. SpeedTest::setTimeStop() =  // End Test '.SpeedTest::setTimeStop();
            echo '<br>';
            echo '5. SpeedTest::getTime() = ' . SpeedTest::getTime();
            echo '<br><br>';
            
        }
        
        private function ExAPI(){
            
            Main::setConnAPI();
            /* Class API
             * ---------- XML --------------
             *   - $xml = new API(); // Create Object
             *   - $xml->XMLEncode(array $array); // XML File
             *   - $xml->getXML(); // Output XML File
             *   - $xml->XMLFileDecode(string $uri); // Output Array (XML)
             *---------- JSON --------------  
             *   - $json = new API(); // Create Object
             *   - $json->JSONEncode(array $array); // JSON File
             *   - $json->JSONDecode(JSON $json); // Array to JSON File
             *   - $json->getJSON(); // Output JSON File
             */  
            
            echo '<br>';
            echo 'การใช้งาน Class:API {...}';
            echo '<hr>';

/*
*  **************** XML *******************           
*/ 
            echo '1. Connect Class = Main::setConnAPI();';
            echo '<br>';
            echo '<br>';
            echo '1.1. $xml = new API() = // Create Object ';
            $xml = new API();
            echo '<br>';
//            echo '<pre>';
            $value = array(
                  'concert' => array(
                        array('title' => 'The Magic Flute','time' => '1329636600')
                    )  
              );
//            print_r($value);
//            echo '</pre>';
            echo '1.2. $xml->XMLEncode(array $array) =  // Create XML ';
            echo $xml->XMLEncode($value);
//            echo '<pre>';
            echo '<br>';
            $text = htmlspecialchars('
<?xml version="1.0"?>
    <concerts>
        <concert>
            <title>The Magic Flute</title>
            <time>1329636600</time>
        </concert>
    </concerts>');
            echo '1.3. $xml->getXML() = // Output XML';
//            echo '<br>';
//            echo $text;
            echo '</pre>';
            echo '<br>';
            echo '1.4. $xml->XMLFileDecode(string $uri) =  // Decode Array (XML) ';
            $arrXML = $xml->XMLFileDecode(Router::getDirFiles().'XMLTest.xml');
            echo '<pre>';
            print_r($arrXML);
/*
*  **************** JSON *******************           
*/          
                         
            echo '<br>';
            echo '<br>';
            echo '2.1. $json = new API() = // Create Object ';
            $json = new API();
            echo '<br>';
//            echo '<pre>';
            $value = array(
                  'AdminName' => 'ณัฐรประสิทธิ์ เจริญวิวัฒธนกุล (แม็ก)',
                  'AdminUsername' => 'admin',
                  'AdminPassword' => '935b596e09f7247f608c87df5cf34cfc59e98b26'    
              );
//           print_r($value); 
//           echo '</pre>';
           echo '2.2. $json->JSONEncode(array $array) = // Create JSON ';
//           echo '<pre>';
           $EnJSON = $json->JSONEncode($value);
//           echo $EnJSON;
//           echo '</pre>';
//           echo '<pre>';
           echo '<br>';
           echo '2.3. $json->JSONDecode(JSON $json) = // Output ';
           echo '<br>';
//           print_r($json->JSONDecode($EnJSON));
//           echo '</pre>';
           echo '2.3. $json->getJSON() = // Output JSON/Array File ';
//           echo '<pre>';
//           print_r($json->getJSON());
//           echo '</pre>';
           echo '<br><br>';
        }

        private function ExDatabase(){
            
            Main::setConnDB();
            Main::setConnString();
            Main::setConnDateTime();
            /* Class DB
             *   - Main::setConnDB(); // Connect Class
             *   - DB::getSelectOne(array $array); // Select Database of 1 Table //Output array
             *   - DB::getSelectAll(array $array); // Select Database of Miti Table //Output array
             *   - DB::setInsert(array $array); // Insert (Add) Database // Output array
             *   - DB::setUpdate(array $array); // Update Database // Output array
             *   - DB::setDelete(array $array); // Delete Database // Output array
             *   - DB::getSelectJOIN(array $array); // Comming Soon
             *   - DB::getSelectGroup(array $array); // Comming Soon
             */   
            
            echo '<br>';
            echo 'การใช้งาน Class:DB {...}';
            echo '<hr>';
            echo '<p style="color:red">1.Connect Class = Main::setConnDB();</p> ';
//            echo '<br>';
            echo '<p style="color:red">2.DB::getSelectOne(array $array); = </p>';
            echo '<pre>';
$string = "\$resulf = DB::getSelectOne(array(
    'tbl' => 'tbl_admin',
    'select' => array('AdminName','AdminUsername','AdminPassword'),
    'join' => Null,
    'where' => array('AdminID' => '@Admin01','AdminStatus' => '0'),
    'orderby' => Null,
));";
            $resulf = DB::getSelectOne(array(
                'tbl' => 'tbl_admin',
                'select' => array('AdminName','AdminUsername','AdminPassword'),
                'join' => Null,
                'where' => array('AdminID' => '@Admin01','AdminStatus' => '0'),
                'orderby' => Null,
            ));
            echo htmlspecialchars($string);
            echo '<br><br>// Output $resulf = ';
            print_r($resulf);
            echo '<br>';
            echo '<p style="color:red">3.DB::getSelectAll(array $array); = </p>';
$string2 = "\$resulf = DB::getSelectAll(array(
    'tbl' => 'tbl_admin',
    'select' => array('AdminName','AdminUsername','AdminPassword'),
    'join' => Null,
    'where' => array('AdminID' => '@Admin01','AdminStatus' => '0'),
    'orderby' => Null,
));";            
            echo htmlspecialchars($string2);
            echo '<br><br>// Output $resulf = ';
            $resulf2 = DB::getSelectAll(array(
                'tbl' => 'tbl_admin',
                'select' => array('AdminName','AdminUsername','AdminPassword'),
                'join' => Null,
                'where' => array('AdminID' => '@Admin01','AdminStatus' => '0'),
                'orderby' => Null,
            ));
            print_r($resulf2);
            echo '<br>';
            echo '<p style="color:red"> 4.DB::setInsert(array $array); = </p>';
$string3 = "\$resulf = DB::setInsert(array(
    'tbl' => 'tbl_admin',
    'name' => array('AdminID' => '@deklampang2','AdminName' => 'เอกบิณ ใจแก้วมา','AdminUsername' => 'deklampang',
        'AdminPassword' => String::getPassFormat('deklampang'),'AdminPosition' => 'position','AdminPhoto' => 'photo.jpg',
        'AdminDate' => DateTime::getDateTime(),'AdminStatus' => '0')
));";
            echo htmlspecialchars($string3);
//            $resulf3 = DB::setInsert(array(
//                'tbl' => 'tbl_admin',
//                'name' => array('AdminID' => '@deklampang2','AdminName' => 'เอกบิณ ใจแก้วมา','AdminUsername' => 'deklampang',
//                    'AdminPassword' => String::getPassFormat('deklampang'),'AdminPosition' => 'position','AdminPhoto' => 'photo.jpg',
//                    'AdminDate' => DateTimes::getThaiDateTimeNow(),'AdminStatus' => '0')
//            ));
$resulf33 = "Array
(
    [result] => 1
    [message] => Insert to database Complete!
)";            
            echo '<br><br>// Output $resulf = ';
//            print_r($resulf3);
            echo htmlspecialchars($resulf33);
            echo '<br>';
            echo '<p style="color:red"> 5.DB::setUpdate(array $array); = </p>';
$string4 = "\$resulf = DB::setUpdate(array(
    'tbl' => 'tbl_admin',
    'name' => array('AdminName' => 'เอกบิณ ใจแก้วมา (แก้ไข)','AdminUsername' => 'max'),
    'where' => array('AdminID' => '@deklampang2')
));";
            echo htmlspecialchars($string4);
//            $resulf4 = DB::setUpdate(array(
//                'tbl' => 'tbl_admin',
//                'name' => array('AdminName' => 'เอกบิณ ใจแก้วมา (แก้ไข)','AdminUsername' => 'max'),
//                'where' => array('AdminID' => '@deklampang2')
//            ));
            
$resulf44 = "Array
(
    [result] => 1
    [message] => Update Table \"tbl_admin\" Complete
)";            
            echo '<br><br>// Output $resulf = ';
//            print_r($resulf4);
            echo htmlspecialchars($resulf44);
            echo '<br>';
            echo '<p style="color:red"> 6.DB::setDelete(array $array); = </p>';
$string5 = "\$resulf = DB::setDelete(array(
    'tbl' => 'tbl_admin',
    'where' => array('AdminID' => '@deklampang2'),
));";
            echo htmlspecialchars($string5);
//            $resulf5 = DB::setDelete(array(
//                'tbl' => 'tbl_admin',
//                'where' => array('AdminID' => '@deklampang2'),
//            ));
            
$resulf55 = "Array
(
    [result] => 1
    [message] => 1 row(s) delete Table \"tbl_admin\" Complete
)";            
            echo '<br><br>// Output $resulf = ';
//            print_r($resulf5);
            echo htmlspecialchars($resulf55);
        }
        
    }
    
?>
