<?php
header('Content-type: application/json');
header("Access-Control-Allow-Origin: *");
$response = array(
    'code' => 0,
    'message' => 'all Green',
    'data' => array(
        array(
            'name' => 'reis',
            'img' => '/跟餐/白饭.jpg',
            'discibe' => 'weißer gedünsteter reis',
            'type' => 'beilag',
        ),

        array(
            'name' => 'gebr, nudeln',
            'img' => '/跟餐/炒面.jpg',
            'discibe' => 'gebratene nudeln mit zwiebein, und kohl.',
            'type' => 'beilag',
        ),
        array(
            'name' => 'gemüse',
            'img' => '/跟餐/蔬菜.jpg',
            'discibe' => 'eine gesunde medley aus brokkoli, zucchini, karotten, bohnen und kohl.',
            'type' => 'beilag',
        ),
        array(
            'name' => 'gebr, reis',
            'img' => '/跟餐/炒饭.jpg',
            'discibe' => 'zubereitete gedünstete weiße reis mit sojasauce, eier, erbsen, karotten.',
            'type' => 'beilag',
        ),
        array(
            'name' => 'beijing schweinfleisch',
            'img' => '/主餐/洋葱牛2.jpg',
            'discibe' => 'knusprige mariniertes schweinfleisch, mit zwiebeln, rote paprika und einem berühmte sauce.',
            'type' => 'hauptgericht',

        ),
        array(
            'name' => 'hongkong chicken',
            'img' => '/主餐/甜子鸡.jpg',
            'discibe' => 'unsere unterschrift gericht.
süße und würzige knuspriges huhn beißt unsere  pikanten-sauce.',
            'type' => 'hauptgericht',
        ),
        array(
            'name' => 'brokkoli Shrimpps',
            'img' => '/主餐/橙子鸡.jpg',
            'discibe' => 'Shrimps mit Brokkoli Zwiebeln Paprika und in einer würzigen Sauce',
            'type' => 'hauptgericht',
            'addPrice'=>1.25
        ),


        array(
            'name' => 'shanghai RindFleisch',
            'img' => '/主餐/洋葱niu.jpg',
            'discibe' => 'Rindfleisch mit zwiebeln und Champignons, Paprika in einer würzigen Sauce',
            'type' => 'hauptgericht',
            'addPrice' => 1.25
        ),


        array(
            'name' => 'gong bao chicken',
            'img' => '/主餐/宫保鸡.jpg',
            'discibe' => 'ein sichuan-inspiriertes gericht mit huhn, und gemüse, verfeinert',
            'type' => 'hauptgericht',
        ),


        array(
            'name' => 'grüne bohnen-hänchenbrust',
            'img' => '/主餐/长豆鸡.jpg',
            'discibe' => 'hähnchenbrust,bohnen und zwiebeln in einer milden lngver-sojasauce würzen.',
            'type' => 'hauptgericht',
        ),


        array(
            'name' => 'hähnchen streifen',
            'img' => '/主餐/炸鸡条.jpg',
            'discibe' => 'knusprige-goldene hähnchen streifen.
mit eine ausgewählt soße.',
            'type' => 'hauptgericht',
        ),


        array(
            'name' => 'hähnchen brust',
            'img' => '/主餐/炸鸡胸1.jpg',
            'discibe' => 'gebratene-goldene hähnchenbrust, mit eine ausgewählt soße.',
            'type' => 'hauptgericht',
        ),


        array(
            'name' => 'champignons',
            'img' => '/主餐/毛菇.jpg',
            'discibe' => 'frische champignons knoblauch körner, mit austern-sauce.',
            'type' => 'hauptgericht',
        ),


        array(
            'name' => 'knusprige enten',
            'img' => '/主餐/炸鸭.jpg',
            'discibe' => 'knusprige ente, mit verschidene gemüse und eine ausgewählt soße.',
            'type' => 'hauptgericht',
            'addPrice' => 1.25
        ),


        array(
            'name' => 'knusprige shrimps',
            'img' => '/前餐/炸大虾.jpg',
            'discibe' => 'crisp-golden butterflied garnelen.',
            'type' => 'vorspeisen',
            'sprice' => 1.95,
            'bprice' => 10.50,
        ),


        array(
            'name' => 'chickensrollen',
            'img' => '/前餐/肉卷.jpg',
            'discibe' => 'kohl, karotten pilze, zwiebeln und hühnerfleisch in einer knusprigen wan-tan-wrapper.',
            'type' => 'vorspeisen',
            'sprice' => 1.95,
            'bprice' => 10.50,
        ),


        array(
            'name' => 'frühlingspollen',
            'img' => '/前餐/蔬菜卷.jpg',
            'discibe' => 'kohl, sellerie, karotten, zwiebeln und chinesische nudeln in einem knusprigen wan-tan-wrapper.',
            'type' => 'vorspeisen',
            'sprice' => 1.95,
            'bprice' => 10.50,
        ),


        array(
            'name' => 'süß-sauer-soße',
            'img' => '/汁水/甜酸汁.jpg',
            'discibe' => '',
            'type' => 'sauce',
            'sprice' => 0.8,

        ),


        array(
            'name' => 'erdnuss-soße',
            'img' => '/汁水/花生汁.jpg',
            'discibe' => '',
            'type' => 'sauce',
            'sprice' => 0.8,
        ),


        array(
            'name' => 'knoblauch-soße',
            'img' => '/汁水/黑汁.jpg',
            'discibe' => '',
            'type' => 'sauce',
            'sprice' => 0.8,
        ),


        array(
            'name' => 'curry-soße',
            'img' => '/汁水/咖喱汁1.jpg',
            'discibe' => '',
            'type' => 'sauce',
            'sprice' => 0.8,
        ),


        array(
            'name' => 'scharf-soße',
            'img' => '/汁水/辣汁.jpg',
            'discibe' => '',
            'type' => 'sauce',
            'sprice' => 0.8,
        ),



        array(
            'name' => 'BONAQA TABLEWATER',
            'img' => '/酒水/BONAQATABLEWATER.jpg',
            'discibe' => '',
            'type' => 'getranke',
            'sprice' => 1.5,
            'bprice' => 2.5,
        ),
        array(
            'name' => 'CocaCola Light',
            'img' => '/酒水/CocaColalight.jpg',
            'discibe' => '',
            'type' => 'getranke',
            'sprice' => 1.5,
            'bprice' => 2.5,
        ), array(
            'name' => 'CocaCola Zero',
            'img' => '/酒水/CocaColaZero.jpg',
            'discibe' => '',
            'type' => 'getranke',
            'sprice' => 1.5,
            'bprice' => 2.5,
        ), array(
            'name' => 'CocaCola',
            'img' => '/酒水/CocaCola.jpg',
            'discibe' => '',
            'type' => 'getranke',
            'sprice' => 1.5,
            'bprice' => 2.5,
        ), array(
            'name' => 'Fanta',
            'img' => '/酒水/Fanta.jpg',
            'discibe' => '',
            'type' => 'getranke',
            'sprice' => 1.5,
            'bprice' => 2.5,
        ), array(
            'name' => 'Lift APFERLSCHORLE',
            'img' => '/酒水/LiftAPFERLSCHORLE.jpg',
            'discibe' => '',
            'type' => 'getranke',
            'sprice' => 1.5,
            'bprice' => 2.5,
        ), array(
            'name' => 'Sprite',
            'img' => '/酒水/Sprite.jpg',
            'discibe' => '',
            'type' => 'getranke',
            'sprice' => 1.5,
            'bprice' => 2.5,
        ),
        array(
            'name' => 'Vio STELL',
            'img' => '/酒水/VioSTELL.jpg',
            'discibe' => '',
            'type' => 'getranke',
            'sprice' => 1.5,
            'bprice' => 2.5,
        ),
        array(
            'name' => 'Hongkong Huhn mit gebr.Reis',
            'img' => '/套餐/R-OH.jpg',
            'discibe' => '',
            'type' => 'menu',
            'sprice' => 9.90
        ),
        array(
            'name' => 'Knusprige Ente mit Mix-Gemüse',
            'img' => '/套餐/TC-Bowl.jpg',
            'discibe' => '',
            'type' => 'menu',
            'sprice' => 11.15
        ),
        array(
            'name' => 'Hähnchenbrust mit Bohnen und Reis',
            'img' => '/套餐/R-H.jpg',
            'discibe' => '',
            'type' => 'menu',
            'sprice' => 9.90
        ),
        array(
            'name' => 'Gong Bao Chicken mit gebr.Reis',
            'img' => '/套餐/KPC-Bowl.jpg',
            'discibe' => '',
            'type' => 'menu',
            'sprice' => 9.90
        ),
        array(
            'name' => 'Beijing Shweinfleisch mit gebr.Nudeln',
            'img' => '/套餐/BB-Bowl.jpg',
            'discibe' => '',
            'type' => 'menu',
            'sprice' => 9.90
        ),
        array(
            'name' => 'Frische Champignons mit gebr.Nudeln',
            'img' => '/套餐/HWS-Bowl.jpg',
            'discibe' => '',
            'type' => 'menu',
            'sprice' => 9.90
        ),
        array(
            'name' => 'Hongkong Huhn mit gebr.Reis & Nudeln',
            'img' => '/套餐/OO-RN.jpg',
            'discibe' => '',
            'type' => 'menu',
            'sprice' => 10.90
        ),
        array(
            'name' => 'Beijing Shweinfleisch mit Chicken.gebr.Reis mix Gemüse',
            'img' => '/套餐/BB-SBC.jpg',
            'discibe' => '',
            'type' => 'menu',
            'sprice' => 10.90
        ),
        array(
            'name' => 'Rindfleisch & Ente mit gebr.Nudeln',
            'img' => '/套餐/SAS-HWS.jpg',
            'discibe' => '',
            'type' => 'menu',
            'sprice' => 13.40
        ),
        array(
            'name' => 'Hongkong Huhn mit gebr.Reis & Nudeln',
            'img' => '/套餐/OC-BB1.jpg',
            'discibe' => '',
            'type' => 'menu',
            'sprice' => 10.90
        ),
        array(
            'name' => 'Chicken strifen mit Reis & gebr Nudeln',
            'img' => '/套餐/HWS-TC1.jpg',
            'discibe' => '',
            'type' => 'menu',
            'sprice' => 10.90
        ),
        array(
            'name' => 'Gong Bao Chicken mit Hähnchenbrust,Reis',
            'img' => '/套餐/KPC-TC.jpg',
            'discibe' => '',
            'type' => 'menu',
            'sprice' => 10.90
        ),
        array(
            'name' => 'reis',
            'img' => '/跟餐/白饭.jpg',
            'discibe' => 'weißer gedünsteter reis',
            'type' => 'carte',
            'subtype' => 'b',
            'sprice' => 2.5,
            'mprice' => 5,
            'bprice' => 7.5
        ),
        array(
            'name' => 'gebr, nudeln',
            'img' => '/跟餐/炒面.jpg',
            'discibe' => 'gebratene nudeln mit zwiebein, und kohl.',
            'type' => 'carte',
            'subtype' => 'b',
            'sprice' => 2.5,
            'mprice' => 5,
            'bprice' => 7.5
        ),
        array(
            'name' => 'gemüse',
            'img' => '/跟餐/蔬菜.jpg',
            'discibe' => 'eine gesunde medley aus brokkoli, zucchini, karotten, bohnen und kohl.',
            'type' => 'carte',
            'subtype' => 'b',
            'sprice' => 2.5,
            'mprice' => 5,
            'bprice' => 7.5
        ),
        array(
            'name' => 'gebr, reis',
            'img' => '/跟餐/炒饭.jpg',
            'discibe' => 'zubereitete gedünstete weiße reis mit sojasauce, eier, erbsen, karotten.',
            'type' => 'carte',
            'subtype' => 'b',
            'sprice' => 2.5,
            'mprice' => 5,
            'bprice' => 7.5
        ),
        array(
            'name' => 'beijing schweinfleisch',
            'img' => '/主餐/洋葱niu.jpg',
            'discibe' => 'knusprige mariniertes schweinfleisch, mit zwiebeln, rote paprika und einem berühmte sauce.',
            'type' => 'carte',
            'subtype' => 'h',
            'sprice' => 3.5,
            'mprice' => 7,
            'bprice' => 10.5

        ),
        array(
            'name' => 'hongkong chicken',
            'img' => '/主餐/甜子鸡.jpg',
            'discibe' => 'unsere unterschrift gericht.
            süße und würzige knuspriges huhn beißt unsere  pikanten-sauce.',
            'type' => 'carte',
            'subtype' => 'h',
            'sprice' => 3.5,
            'mprice' => 7,
            'bprice' => 10.5
        ),
        array(

            'name' => 'brokkoli Shrimpps',
            'img' => '/主餐/橙子鸡.jpg',
            'discibe' => 'Shrimps mit Brokkoli Zwiebeln Paprika und in einer würzigen Sauce',

            'subtype' => 'h',
            'sprice' => 3.5,
            'mprice' => 7,
            'bprice' => 10.5
        ),


        array(
            'name' => 'shanghai steaks',
            'img' => '/主餐/长豆牛1.jpg',
            'discibe' => 'steaks mit frische bohnen, zwiebeln und champignons in einer würzigen sauce.',
            'type' => 'carte',
            'subtype' => 'h',
            'addPrice' => 1.25,
            'sprice' => 4.75,
            'mprice' => 8.25,
            'bprice' => 11.75
        ),


        array(
            'name' => 'gong bao chicken',
            'img' => '/主餐/宫保鸡.jpg',
            'discibe' => 'ein sichuan-inspiriertes gericht mit huhn, und gemüse, verfeinert',
            'type' => 'carte',
            'subtype' => 'h',
            'sprice' => 3.5,
            'mprice' => 7,
            'bprice' => 10.5
        ),


        array(
            'name' => 'grüne bohnen-hänchenbrust',
            'img' => '/主餐/长豆鸡.jpg',
            'discibe' => 'hähnchenbrust,bohnen und zwiebeln in einer milden lngver-sojasauce würzen.',
            'type' => 'carte',
            'subtype' => 'h',
            'sprice' => 3.5,
            'mprice' => 7,
            'bprice' => 10.5
        ),


        array(
            'name' => 'hähnchen streifen',
            'img' => '/主餐/炸鸡条.jpg',
            'discibe' => 'knusprige-goldene hähnchen streifen.
mit eine ausgewählt soße.',
            'subtype' => 'h',
            'type' => 'carte',
            'sprice' => 3.5,
            'mprice' => 7,
            'bprice' => 10.5
        ),


        array(
            'name' => 'hähnchen brust',
            'img' => '/主餐/炸鸡胸1.jpg',
            'discibe' => 'gebratene-goldene hähnchenbrust, mit eine ausgewählt soße.',
            'type' => 'carte',
            'subtype' => 'h',
            'sprice' => 3.5,
            'mprice' => 7,
            'bprice' => 10.5
        ),


        array(
            'name' => 'champignons',
            'img' => '/主餐/毛菇.jpg',
            'discibe' => 'frische champignons knoblauch körner, mit austern-sauce.',
            'type' => 'carte',
            'subtype' => 'h',
            'sprice' => 3.5,
            'mprice' => 7,
            'bprice' => 10.5
        ),


        array(
            'name' => 'knusprige enten',
            'img' => '/主餐/炸鸭.jpg',
            'discibe' => 'knusprige ente, mit verschidene gemüse und eine ausgewählt soße.',
            'type' => 'carte',
            'subtype' => 'h',
            'addPrice' => 1.25,
            'sprice' => 4.75,
            'mprice' => 8.25,
            'bprice' => 11.75
        ),


        array(
            'name' => 'knusprige shrimps',
            'img' => '/前餐/炸大虾.jpg',
            'discibe' => 'crisp-golden butterflied garnelen.',
            'type' => 'carte',
            'subtype' => 'v',
            'sprice' => 1.95,
            'bprice' => 10.50,
        ),


        array(
            'name' => 'chickensrollen',
            'img' => '/前餐/肉卷.jpg',
            'discibe' => 'kohl, karotten pilze, zwiebeln und hühnerfleisch in einer knusprigen wan-tan-wrapper.',
            'type' => 'carte',
            'subtype' => 'v',
            'sprice' => 1.95,
            'bprice' => 10.50,
        ),


        array(
            'name' => 'frühlingspollen',
            'img' => '/前餐/蔬菜卷.jpg',
            'discibe' => 'kohl, sellerie, karotten, zwiebeln und chinesische nudeln in einem knusprigen wan-tan-wrapper.',
            'type' => 'carte',
            'subtype' => 'v',
            'sprice' => 1.95,
            'bprice' => 10.50,
        ),


        array(
            'name' => 'süß-sauer-soße',
            'img' => '/汁水/甜酸汁.jpg',
            'discibe' => '',
            'type' => 'carte',
            'subtype' => 's',
            'sprice' => 0.8,

        ),


        array(
            'name' => 'erdnuss-soße',
            'img' => '/汁水/花生汁.jpg',
            'discibe' => '',
            'type' => 'carte',
            'subtype' => 's',
            'sprice' => 0.8,
        ),


        array(
            'name' => 'knoblauch-soße',
            'img' => '/汁水/黑汁.jpg',
            'discibe' => '',
            'type' => 'carte',
            'subtype' => 's',
            'sprice' => 0.8,
        ),


        array(
            'name' => 'curry-soße',
            'img' => '/汁水/咖喱汁1.jpg',
            'discibe' => '',
            'type' => 'carte',
            'subtype' => 's',
            'sprice' => 0.8,
        ),


        array(
            'name' => 'scharf-soße',
            'img' => '/汁水/辣汁.jpg',
            'discibe' => '',
            'type' => 'carte',
            'subtype' => 's',
            'sprice' => 0.8,
        ),



        array(
            'name' => 'BONAQA TABLEWATER',
            'img' => '/酒水/BONAQATABLEWATER.jpg',
            'discibe' => '',
            'type' => 'carte',
            'subtype' => 'g',
            'sprice' => 1.5,
            'bprice' => 2.5,
        ),
        array(
            'name' => 'CocaCola Light',
            'img' => '/酒水/CocaColalight.jpg',
            'discibe' => '',
            'type' => 'carte',
            'subtype' => 'g',
            'sprice' => 1.5,
            'bprice' => 2.5,
        ), array(
            'name' => 'CocaCola Zero',
            'img' => '/酒水/CocaColaZero.jpg',
            'discibe' => '',
            'type' => 'carte',
            'subtype' => 'g',
            'sprice' => 1.5,
            'bprice' => 2.5,
        ), array(
            'name' => 'CocaCola',
            'img' => '/酒水/CocaCola.jpg',
            'discibe' => '',
            'type' => 'carte',
            'subtype' => 'g',
            'sprice' => 1.5,
            'bprice' => 2.5,
        ), array(
            'name' => 'Fanta',
            'img' => '/酒水/Fanta.jpg',
            'discibe' => '',
            'type' => 'carte',
            'subtype' => 'g',
            'sprice' => 1.5,
            'bprice' => 2.5,
        ), array(
            'name' => 'Lift APFERLSCHORLE',
            'img' => '/酒水/LiftAPFERLSCHORLE.jpg',
            'discibe' => '',
            'type' => 'carte',
            'subtype' => 'g',
            'sprice' => 1.5,
            'bprice' => 2.5,
        ), array(
            'name' => 'Sprite',
            'img' => '/酒水/Sprite.jpg',
            'discibe' => '',
            'type' => 'carte',
            'subtype' => 'g',
            'sprice' => 1.5,
            'bprice' => 2.5,
        ),
        array(
            'name' => 'Vio STELL',
            'img' => '/酒水/VioSTELL.jpg',
            'discibe' => '',
            'type' => 'carte',
            'subtype' => 'g',
            'sprice' => 1.5,
            'bprice' => 2.5,
        ),
        array(
            'name' => 'Peking Suppe',
            'img' => '/外卖/Pekingsuppe.png',
            'discibe' => 'Peking Suppe: Sauer Scharf Suppe ist eine traditionelle Chinesische Suppe, mit Gemüsebrühe Eiern und Hühnerfleisch',
            'type' => 'takeaway',
        ),
        array(
            'name' => 'Nudeln mit Chicken',
            'img' => '/外卖/nudeln.png',
            'discibe' => 'Gebratene Nudeln mit Hühnerfleisch, Sojasauce Eier Zwiebeln und Kohl',
            'type' => 'takeaway',
        ),
        array(
            'name' => 'Reis mit Chicken',
            'img' => '/外卖/reis.png',
            'discibe' => 'Gebratene Reis mit Hühnerfleisch, Sojasauce Eier Erbsen Karotten',
            'type' => 'takeaway',
        ),
        array(
            'name' => '8 Kostbarkeiten
                          mit Reis',
            'img' => '/外卖/8Kostbarkeiten.png',
            'discibe' => 'Acht Kostbarkeiten: Verschidene Fleisch mit Gemüse und Knoblauch (scharf). mit gedämpfter Reis',
            'type' => 'takeaway',
        ),
        array(
            'name' => 'GongBao Chicken
                          mit Reis',
            'img' => '/外卖/gongbaochicken.png',
            'discibe' => 'GongBao Chicken: Ein Sichuan-inspiriertes Gericht mit Huhn und Gemüse verfeinert. mit gedämpfter Reis',
            'type' => 'takeaway',
        ),
        array(
            'name' => 'HongKong Chicken
                          mit Reis',
            'img' => '/外卖/hongkongchicken.png',
            'discibe' => 'HongKong Chicken: Unsere Unterschrift Gericht. Süße und würzige Knuspriges Huhn, beißt unsere Pikanten-Sauce. mit gedämpfter Reis',
            'type' => 'takeaway',
        ),
        array(
            'name' => 'ShangHai Rindfleisch
                            mit Reis',
            'img' => '/外卖/rindfleisch.png',
            'discibe' => 'ShangHai Rindfleisch: Rindfleisch mit Zwiebeln und Champignons Paprika in einer würzigen Sauce. mit gedämpfter Reis',
            'type' => 'takeaway',
        ),
        array(
            'name' => 'Rotes Curry Chicken
                           mit Reis',
            'img' => '/外卖/rotemchicken.png',
            'discibe' => 'Rotes Curry Chicken: Gebr. Hühnerfleisch mit scharf rotem Curry und Kokosnussmilch, Gemüse. mit gedämpfter Reis',
            'type' => 'takeaway',
        ),
        array(
            'name' => 'Schrimps
                       mit Reis',
            'img' => '/外卖/schrimps.png',
            'discibe' => 'Schrimps mit Lange Bohne Zwiebeln Paprika und in einer würzige Sauce. mit gedämpfter Reis',
            'type' => 'takeaway',
        ),
        array(
            'name' => 'Beijing Schweinefleisch
                             mit Reis',
            'img' => '/外卖/schweinefleisch.png',
            'discibe' => 'BeiJing Schweinefleisch: Knusprige mariniertes Schweinfleisch. mit Zwiebeln Paprika und einem berühmte Sauce. mit gedämpfter Reis',
            'type' => 'takeaway',
        ),
        array(
            'name' => 'ToFu
                     mit Reis',
            'img' => '/外卖/tofu.png',
            'discibe' => 'Tofu gebraten mit Gemüse in Austernsoße. mit gedämpfter Reis',
            'type' => 'takeaway',
        ),








        array(
            'name' => 'salat mit Reis',
            'img' => '/salat/Gemischter-Salat.jpg',
            'discibe' => 'Tofu gebraten mit Gemüse in Austernsoße. mit gedämpfter Reis',
            'type' => 'salat',
        ),
        array(
            'name' => 'sushi mit Reis',
            'img' => '/sushi/sushi-rolls.jpg',
            'discibe' => 'weißer gedünsteter reis',
            'type' => 'sushi',
        ),
        array(
            'name' => 'aaaaa mit Reis',
            'img' => '/sushi/sushi-rolls.jpg',
            'discibe' => 'weißer gedünsteter reis',
            'type' => 'aaaaa',
        ),
        array(
            'name' => 'bbbbb mit Reis',
            'img' => '/sushi/sushi-rolls.jpg',
            'discibe' => 'weißer gedünsteter reis',
            'type' => 'bbbbb',
        ),
        array(
            'name' => 'ccccc mit Reis',
            'img' => '/sushi/sushi-rolls.jpg',
            'discibe' => 'weißer gedünsteter reis',
            'type' => 'ccccc',
        ),
        array(
            'name' => 'ddddd mit Reis',
            'img' => '/sushi/sushi-rolls.jpg',
            'discibe' => 'weißer gedünsteter reis',
            'type' => 'ddddd',
        ),
        array(
            'name' => 'eeeee mit Reis',
            'img' => '/sushi/sushi-rolls.jpg',
            'discibe' => 'weißer gedünsteter reis',
            'type' => 'eeeee',
        ),
        array(
            'name' => 'fffff mit Reis',
            'img' => '/sushi/sushi-rolls.jpg',
            'discibe' => 'weißer gedünsteter reis',
            'type' => 'fffff',
        ),






    ),
);

echo json_encode($response, JSON_FORCE_OBJECT);



/**
 * Created by PhpStorm.
 * User: Juhaodong
 * Date: 2018/1/14
 * Time: 11:32
 */
