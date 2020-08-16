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
            'discibe' => 'unsere unterschrift gericht.süße und würzige knuspriges huhn beißt unsere  pikanten-sauce.',
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
            'discibe' => 'knusprige-goldene hähnchen streifen.mit eine ausgewählt soße.',
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
            'name' => 'CocaCola',
            'img' => '/酒水/CocaCola.jpg',
            'discibe' => '',
            'type' => 'getranke',
            'sprice' => 1.5,
            'bprice' => 2.5,
        ),
        array(
            'name' => 'CocaCola Light',
            'img' => '/酒水/cocacolalight1l.png',
            'discibe' => '',
            'type' => 'getranke',
            'sprice' => 1.5,
            'bprice' => 2.5,
        ),
        array(
            'name' => 'CocaCola Zero',
            'img' => '/酒水/colazero1l.png',
            'discibe' => '',
            'type' => 'getranke',
            'sprice' => 1.5,
            'bprice' => 2.5,
        ),
        array(
            'name' => 'Fanta',
            'img' => '/酒水/fanta1l.png',
            'discibe' => '',
            'type' => 'getranke',
            'sprice' => 1.5,
            'bprice' => 2.5,
        ),
        array(
            'name' => 'Sprite',
            'img' => '/酒水/sprite1l.png',
            'discibe' => '',
            'type' => 'getranke',
            'sprice' => 1.5,
            'bprice' => 2.5,
        ),
        /*
        array(
            'name' => 'Lift APFERLSCHORLE',
            'img' => '/酒水/Liftapferlschorle1l.png',
            'discibe' => '',
            'type' => 'getranke',
            'sprice' => 1.5,
            'bprice' => 2.5,
        ),
        array(
            'name' => 'BONAQA TABLEWATER',
            'img' => '/酒水/Bonaqatablwater1l.png',
            'discibe' => '',
            'type' => 'getranke',
            'sprice' => 1.5,
            'bprice' => 2.5,
        ),
        array(
            'name' => 'Vio STELL',
            'img' => '/酒水/Viostell1l.png',
            'discibe' => '',
            'type' => 'getranke',
            'sprice' => 1.5,
            'bprice' => 2.5,
        ),
        */
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
            'name' => 'Hähnchen streifen
                           mit Reis',
            'img' => '/主餐/鸡条.png',
            'discibe' => 'knusprige-goldene hähnchen streifen.
                  mit eine ausgewählt soße.',
            'subtype' => 'h',
            'type' => 'carte',
            'sprice' => 9.20,
        ),
        array(
            'name' => 'Hähnchen brust
                         mit Reis',
            'img' => '/主餐/炸鸡胸.png',
            'discibe' => 'gebratene-goldene hähnchenbrust, mit eine ausgewählt soße.',
            'type' => 'carte',
            'subtype' => 'h',
            'sprice' => 9.20,
        ),
        array(
            'name' => 'Knusprige Enten
                          mit Reis ',
            'img' => '/主餐/鸭子.png',
            'discibe' => 'knusprige ente, mit verschidene gemüse und eine ausgewählt soße.',
            'type' => 'carte',
            'subtype' => 'h',
            'sprice' => 12.50,

        ),
        array(
            'name' => '8 Kostbarkeiten
                         mit Reis',
            'img' => '/主餐/炒八宝.png',
            'discibe' => 'Acht Kostbarkeiten: Versch.Fleisch mit Gemüse und Knoblauch (scharf) / mit gedämpfter reis.',
            'type' => 'carte',
            'subtype' => 'h',
            'sprice' => 13.50
        ),
        array(
            'name' => 'GongBao Chicken
                          mit Reis',
            'img' => '/主餐/宫保鸡.png',
            'discibe' => 'ein sichuan-inspiriertes gericht mit huhn, und gemüse, verfeinert',
            'type' => 'carte',
            'subtype' => 'h',
            'sprice' => 8.80,
        ),
        array(
            'name' => 'HongKong Chicken
                          mit Reis',
            'img' => '/主餐/甜鸡.png',
            'discibe' => 'unsere unterschrift gericht.
            süße und würzige knuspriges huhn beißt unsere  pikanten-sauce.',
            'type' => 'carte',
            'subtype' => 'h',
            'sprice' => 9.20,
        ),
        array(
            'name' => 'ShangHai Rindfleisch
                          mit Reis',
            'img' => '/主餐/牛肉.png',
            'discibe' => 'steaks mit frische bohnen, zwiebeln und champignons in einer würzigen sauce.',
            'type' => 'carte',
            'subtype' => 'h',
            'sprice' => 9.80,
        ),
        array(
            'name' => 'Rotes Curry Chicken
                           mit Reis',
            'img' => '/主餐/红咖喱鸡.png',
            'discibe' => 'weißer gedünsteter reis',
            'type' => 'carte',
            'subtype' => 'h',
            'sprice' => 12.50
        ),
        array(

            'name' => 'Shrimpps
                       mit Reis',
            'img' => '/主餐/炒大虾.png',
            'discibe' => 'Shrimps mit Brokkoli Zwiebeln Paprika und in einer würzigen Sauce',
            'subtype' => 'h',
            'sprice' => 14.80,
        ),
        array(
            'name' => 'BeiJing Schweinfleisch
                            mit Reis',
            'img' => '/主餐/甜酸猪.png',
            'discibe' => 'knusprige mariniertes schweinfleisch, mit zwiebeln, rote paprika und einem berühmte sauce.',
            'type' => 'carte',
            'subtype' => 'h',
            'sprice' => 9.80,
        ),
        array(
            'name' => 'Tofu
                      mit Reis',
            'img' => '/主餐/炒豆腐.png',
            'discibe' => 'Toufu mit Gemüse .',
            'type' => 'carte',
            'subtype' => 'h',
            'sprice' => 9.80,
        ),
        array(
            'name' => 'Champignons
                        mit Reis ',
            'img' => '/主餐/炒毛菇.png',
            'discibe' => 'frische champignons knoblauch körner, mit austern-sauce.',
            'type' => 'carte',
            'subtype' => 'h',
            'sprice' => 9.20,
        ),
        array(
            'name' => 'Gemüse
                       mit Reis',
            'img' => '/主餐/炒蔬菜.png',
            'discibe' => 'eine gesunde medley aus brokkoli, zucchini, karotten, bohnen und kohl.',
            'type' => 'carte',
            'subtype' => 'h',
            'sprice' => 9.20,
        ),
        array(
            'name' => 'Gebr Nudeln 
                        mit Enten',
            'img' => '/套餐/鸭子炒面.png',
            'discibe' => 'gebratene nudeln mit zwiebein,karotten und kohl.mit Enten',
            'type' => 'carte',
            'subtype' => 'h',
            'sprice' => 10.60,
        ),
        array(
            'name' => 'Gebr Reis 
                       mit Enten',
            'img' => '/套餐/鸭子炒饭.png',
            'discibe' => 'zubereitete gedünstete weiße reis mit sojasauce, eier, erbsen, karotten.mit Enten',
            'type' => 'carte',
            'subtype' => 'h',
            'sprice' => 10.60,
        ),
        array(
            'name' => 'Gebr Nudeln 
                  mit Hähnchen streifen',
            'img' => '/套餐/鸡条炒面.png',
            'discibe' => 'gebratene nudeln mit zwiebein,karotten und kohl.mit Hähnchen streifen',
            'type' => 'carte',
            'subtype' => 'h',
            'sprice' => 9.90,
        ),
        array(
            'name' => 'Gebr Reis 
                 mit Hähnchen streifen',
            'img' => '/套餐/鸡条炒饭.png',
            'discibe' => 'zubereitete gedünstete weiße reis mit sojasauce, eier, erbsen, karotten.mit Hähnchen streifen',
            'type' => 'carte',
            'subtype' => 'h',
            'sprice' => 9.90,
        ),
        array(
            'name' => 'Gebr Nudeln 
                   mit Hähnchen brust',
            'img' => '/套餐/炸鸡胸炒面.png',
            'discibe' => 'gebratene nudeln mit zwiebein,karotten und kohl.mit Hähnchen brust',
            'type' => 'carte',
            'subtype' => 'h',
            'sprice' => 9.90,
        ),
        array(
            'name' => 'Gebr Reis 
                  mit Hähnchen brust',
            'img' => '/套餐/炸鸡胸炒饭.png',
            'discibe' => 'zubereitete gedünstete weiße reis mit sojasauce, eier, erbsen, karotten.mit Hähnchen brust',
            'type' => 'carte',
            'subtype' => 'h',
            'sprice' => 9.90,
        ),
        array(
            'name' => 'Gebr.Nudeln 
                    mit Hühnerfleisch',
            'img' => '/主餐/鸡肉炒面.png',
            'discibe' => 'Gebratene Nudeln 
                          mit Hühnerfleisch,Sojasauce,
                          Eier,Zwiebeln,und Kohl.',
            'type' => 'carte',
            'subtype' => 'h',
            'sprice' => 8.20,
        ),
        array(
            'name' => 'Gebr.Reis 
                    mit Hühnerfleisch',
            'img' => '/主餐/鸡肉炒饭.png',
            'discibe' => 'Gebratene Reis mit Hühnerfleisch,Sojasauce,Eier,Erbsen,Karotten.',
            'type' => 'carte',
            'subtype' => 'h',
            'sprice' => 8.20,
        ),
        array(
            'name' => 'Gebr Nudeln 
                        mit Gemüse',
            'img' => '/主餐/蔬菜炒面.png',
            'discibe' => 'gebratene nudeln mit zwiebein, und kohl.',
            'type' => 'carte',
            'subtype' => 'h',
            'sprice' => 7.90,
        ),
        array(
            'name' => 'Gebr Reis 
                       mit Gemüse',
            'img' => '/主餐/蔬菜炒饭.png',
            'discibe' => 'zubereitete gedünstete weiße reis mit sojasauce, eier, erbsen, karotten.',
            'type' => 'carte',
            'subtype' => 'h',
            'sprice' => 7.9,
        ),
        array(
            'name' => 'Kimbi-Menü 1
                       für 1 Person',
            'img' => '/套餐/套餐1.png',
            'discibe' => 'Gong Bao Chicken mit knusprige Hähnchen und Gebr.Reis',
            'type' => 'carte',
            'subtype' => 'h',
            'sprice' => 14.80,
        ),
        array(
            'name' => 'Kimbi-Menü 2
                       für 1 Person',
            'img' => '/套餐/套餐2.png',
            'discibe' => 'Knusprige Ente mit Knusprige Hähnchen und Gebr.Nudeln',
            'type' => 'carte',
            'subtype' => 'h',
            'sprice' => 14.80,
        ),

        array(
            'name' => 'Beilage
                      Weise Reis',
            'img' => '/跟餐/白饭.png',
            'discibe' => 'weißer gedünsteter reis',
            'type' => 'carte',
            'subtype' => 'b',
            'sprice' => 2.50,
            'mprice' => 5.00,
            'bprice' => 7.50
        ),
        array(
            'name' => 'Beilage
                       Pommes',
            'img' => '/跟餐/薯条.png',
            'discibe' => 'Pommes',
            'type' => 'carte',
            'subtype' => 'b',
            'sprice' => 3.50,
        ),
        array(
            'name' => 'VORSPEISEN
                      Peking Suppe',
            'img' => '/前餐/北京汤.png',
            'discibe' => 'Peking Suppe: Sauer-scharf Suppe ist eine traditionelle Chinesische Suppe mit Gemüsebrühe,Eiern,und Hühnerfleisch',
            'type' => 'carte',
            'subtype' => 'v',
            'sprice' => 2.80
        ),
        array(
            'name' => 'VORSPEISEN
                    Gemischier Salat',
            'img' => '/前餐/沙拉菜.png',
            'discibe' => 'Gemischier Salat',
            'type' => 'carte',
            'subtype' => 'v',
            'sprice' => 3.20
        ),
        array(
            'name' => 'VORSPEISEN
                    Knusprige Shrimps',
            'img' => '/前餐/炸大虾.png',
            'discibe' => 'crisp-golden butterflied garnelen.',
            'type' => 'carte',
            'subtype' => 'v',
            'sprice' => 2.90,
            'bprice' => 10.50,
        ),
        array(
            'name' => 'VORSPEISEN
                    Chickens Rollen',
            'img' => '/前餐/鸡肉卷.png',
            'discibe' => 'kohl, karotten pilze, zwiebeln und hühnerfleisch in einer knusprigen wan-tan-wrapper.',
            'type' => 'carte',
            'subtype' => 'v',
            'sprice' => 2.90,
            'bprice' => 10.50,
        ),
        array(
            'name' => 'VORSPEISEN
                     Frühlingspollen',
            'img' => '/前餐/小春卷.png',
            'discibe' => 'kohl, sellerie, karotten, zwiebeln und chinesische nudeln in einem knusprigen wan-tan-wrapper.',
            'type' => 'carte',
            'subtype' => 'v',
            'sprice' => 2.90,
            'bprice' => 10.50,
        ),

        array(
            'name' => 'VORSPEISEN
                      Hühnerspieße',
            'img' => '/前餐/鸡串.png',
            'discibe' => 'Hühnerfleisch am Spieß in Erdnussoße',
            'type' => 'carte',
            'subtype' => 'v',
            'sprice' => 4.20
        ),
        array(
            'name' => 'VORSPEISEN
                     Tintenfisch Ring',
            'img' => '/前餐/炸鱿鱼圈.png',
            'discibe' => 'Tinfenfisch Ring',
            'type' => 'carte',
            'subtype' => 'v',
            'sprice' => 4.20
        ),
        array(
            'name' => 'VORSPEISEN
                      Krabbenchips',
            'img' => '/前餐/虾片.png',
            'discibe' => 'Krabbenchips',
            'type' => 'carte',
            'subtype' => 'v',
            'sprice' => 2.20
        ),
        array(
            'name' => 'Nachspeisen
                 Gebr.Bananen mit Honig',
            'img' => '/甜点/香蕉.png',
            'discibe' => 'Gebr.Bananen mit Honig',
            'type' => 'carte',
            'subtype' => 'v',
            'sprice' => 3.20
        ),
        array(
            'name' => 'Nachspeisen
                    Gemischte Früchte',
            'img' => '/甜点/水果.png',
            'discibe' => 'Gemischte Früchte',
            'type' => 'carte',
            'subtype' => 'v',
            'sprice' => 3.20
        ),
        array(
            'name' => 'Nachspeisen 
                  Tiramisu mit Alkohol',
            'img' => '/甜点/蛋糕.png',
            'discibe' => 'Tiramisu mit Alkohol',
            'type' => 'carte',
            'subtype' => 'v',
            'sprice' => 3.20
        ),

        array(
            'name' => 'SAUCE
                   Süß-Sauer-Soße',
            'img' => '/汁水/甜酸汁.png',
            'discibe' => '',
            'type' => 'carte',
            'subtype' => 's',
            'sprice' => 1.5,

        ),
        array(
            'name' => 'SAUCE
                    Erdnuss-Soße',
            'img' => '/汁水/花生汁.png',
            'discibe' => '',
            'type' => 'carte',
            'subtype' => 's',
            'sprice' => 1.5,
        ),
        array(
            'name' => 'SAUCE
                  Knoblauch-Soße',
            'img' => '/汁水/黑汁.png',
            'discibe' => '',
            'type' => 'carte',
            'subtype' => 's',
            'sprice' => 1.5,
        ),
        array(
            'name' => 'SAUCE
                     Curry-Soße',
            'img' => '/汁水/咖喱汁.png',
            'discibe' => '',
            'type' => 'carte',
            'subtype' => 's',
            'sprice' => 1.5,
        ),
        array(
            'name' => 'SAUCE
                    Scharf-Soße',
            'img' => '/汁水/辣汁.png',
            'discibe' => '',
            'type' => 'carte',
            'subtype' => 's',
            'sprice' => 1.5,
        ),
        array(
            'name' => 'Rot thai Curry und
                       Kokosnussmilch-Soße',
            'img' => '/汁水/红咖喱汁.png',
            'discibe' => '',
            'type' => 'carte',
            'subtype' => 's',
            'sprice' => 1.5,
        ),
        array(
            'name' => 'GETRÄNKE
                      CocaCola 1L',
            'img' => '/酒水/CocaCola1l.png',
            'discibe' => '',
            'type' => 'carte',
            'subtype' => 'g',
            'sprice' => 2.5,
            /*'bprice' => 2.5,*/
        ),
        array(
            'name' => 'GETRÄNKE
                    CocaCola Light 1L',
            'img' => '/酒水/cocacolalight1l.png',
            'discibe' => '',
            'type' => 'carte',
            'subtype' => 'g',
            'sprice' => 2.5,
            /*'bprice' => 2.5,*/
        ),
        array(
            'name' => 'GETRÄNKE
                     CocaCola Zero 1L',
            'img' => '/酒水/colazero1l.png',
            'discibe' => '',
            'type' => 'carte',
            'subtype' => 'g',
            'sprice' => 2.5,
            /*'bprice' => 2.5,*/
        ),
        array(
            'name' => 'GETRÄNKE
                       Fanta 1L',
            'img' => '/酒水/fanta1l.png',
            'discibe' => '',
            'type' => 'carte',
            'subtype' => 'g',
            'sprice' => 2.5,
            /*'bprice' => 2.5,*/
        ),
        array(
            'name' => 'GETRÄNKE
                      Sprite 1L',
            'img' => '/酒水/sprite1l.png',
            'discibe' => '',
            'type' => 'carte',
            'subtype' => 'g',
            'sprice' => 2.5,
            /*'bprice' => 2.5,*/
        ),
        /*
        array(
            'name' => 'Lift APFERLSCHORLE',
            'img' => '/酒水/Liftapferlschorle1l.png',
            'discibe' => '',
            'type' => 'carte',
            'subtype' => 'g',
            'sprice' => 2.5,
            'bprice' => 2.5,
        ),
        array(
            'name' => 'BONAQA TABLEWATER',
            'img' => '/酒水/Bonaqatablwater1l.png',
            'discibe' => '',
            'type' => 'carte',
            'subtype' => 'g',
            'sprice' => 2.5,
            'bprice' => 2.5,
        ),
        array(
            'name' => 'Vio STELL',
            'img' => '/酒水/Viostell1l.png',
            'discibe' => '',
            'type' => 'carte',
            'subtype' => 'g',
            'sprice' => 2.5,
            'bprice' => 2.5,
        ),
        */




        array(
            'name' => 'Nudeln mit Chicken',
            'img' => '/外卖/nudeln.png',
            'discibe' => 'Gebratene Nudeln mit Hühnerfleisch, Sojasauce Eier Zwiebeln und Kohl',
            'type' => 'takeaway',
            'subtype' => 't',
            'sprice' => 6.90

        ),
        array(
            'name' => 'Reis mit Chicken',
            'img' => '/外卖/reis.png',
            'discibe' => 'Gebratene Reis mit Hühnerfleisch, Sojasauce Eier Erbsen Karotten',
            'type' => 'takeaway',
            'subtype' => 't',
            'sprice' => 6.90
        ),
        array(
            'name' => '8 Kostbarkeiten
                          mit Reis',
            'img' => '/外卖/8Kostbarkeiten.png',
            'discibe' => 'Acht Kostbarkeiten: Verschidene Fleisch mit Gemüse und Knoblauch (scharf). mit gedämpfter Reis',
            'type' => 'takeaway',
            'subtype' => 't',
            'sprice' => 7.90
        ),
        array(
            'name' => 'GongBao Chicken
                          mit Reis',
            'img' => '/外卖/gongbaochicken.png',
            'discibe' => 'GongBao Chicken: Ein Sichuan-inspiriertes Gericht mit Huhn und Gemüse verfeinert. mit gedämpfter Reis',
            'type' => 'takeaway',
            'subtype' => 't',
            'sprice' => 6.90
        ),
        array(
            'name' => 'HongKong Chicken
                          mit Reis',
            'img' => '/外卖/hongkongchicken.png',
            'discibe' => 'HongKong Chicken: Unsere Unterschrift Gericht. Süße und würzige Knuspriges Huhn, beißt unsere Pikanten-Sauce. mit gedämpfter Reis',
            'type' => 'takeaway',
            'subtype' => 't',
            'sprice' => 6.90
        ),
        array(
            'name' => 'ShangHai Rindfleisch
                            mit Reis',
            'img' => '/外卖/rindfleisch.png',
            'discibe' => 'ShangHai Rindfleisch: Rindfleisch mit Zwiebeln und Champignons Paprika in einer würzigen Sauce. mit gedämpfter Reis',
            'type' => 'takeaway',
            'subtype' => 't',
            'sprice' => 7.90
        ),
        array(
            'name' => 'Rotes Curry Chicken
                           mit Reis',
            'img' => '/外卖/rotemchicken.png',
            'discibe' => 'Rotes Curry Chicken: Gebr. Hühnerfleisch mit scharf rotem Curry und Kokosnussmilch, Gemüse. mit gedämpfter Reis',
            'type' => 'takeaway',
            'subtype' => 't',
            'sprice' => 6.90
        ),
        array(
            'name' => 'Schrimps
                       mit Reis',
            'img' => '/外卖/schrimps.png',
            'discibe' => 'Schrimps mit Lange Bohne Zwiebeln Paprika und in einer würzige Sauce. mit gedämpfter Reis',
            'type' => 'takeaway',
            'subtype' => 't',
            'sprice' => 7.90
        ),
        array(
            'name' => 'Beijing Schweinefleisch
                             mit Reis',
            'img' => '/外卖/schweinefleisch.png',
            'discibe' => 'BeiJing Schweinefleisch: Knusprige mariniertes Schweinfleisch. mit Zwiebeln Paprika und einem berühmte Sauce. mit gedämpfter Reis',
            'type' => 'takeaway',
            'subtype' => 't',
            'sprice' => 6.90
        ),
        array(
            'name' => 'ToFu
                     mit Reis',
            'img' => '/外卖/tofu.png',
            'discibe' => 'Tofu gebraten mit Gemüse in Austernsoße. mit gedämpfter Reis',
            'type' => 'takeaway',
            'subtype' => 't',
            'sprice' => 6.90
        ),
        array(
            'name' => 'Peking Suppe',
            'img' => '/外卖/Pekingsuppeschale.png',
            'discibe' => 'Peking Suppe: Sauer Scharf Suppe ist eine traditionelle Chinesische Suppe, mit Gemüsebrühe Eiern und Hühnerfleisch',
            'type' => 'takeaway',
            'subtype' => 't',
            'sprice' => 2.80
        ),
        array(
            'name' => 'Gemischter Salat',
            'img' => '/外卖/salat.png',
            'discibe' => 'Gemischter Salat',
            'type' => 'takeaway',
            'subtype' => 'a',
            'sprice' => 3.20
        ),
        array(
            'name' => 'Sushi Menü 1',
            'img' => '/外卖/sushimenu1.png',
            'discibe' => '3 Paprika Maki 3 Gurken Maki 3 Avocado Maki 3 Rettich Maki Ingwer Wasabi und Soja Sauce',
            'type' => 'takeaway',
            'subtype' => 'u',
            'sprice' => 6.90
        ),
        array(
            'name' => 'Sushi Menü 2',
            'img' => '/外卖/sushimenu2.png',
            'discibe' => '3 Lachs Maki 3 Garnele Maki 3 Avocado Maki 3 Gurken Maki Ingwer Wasabi und Soja Sauce',
            'type' => 'takeaway',
            'subtype' => 'u',
            'sprice' => 8.20
        ),
        array(
            'name' => 'Sushi Menü 3',
            'img' => '/外卖/sushimenu3.png',
            'discibe' => '3 Lachs Maki 4 Garnele Maki 3 Avocado Maki 3 Paprika Maki 3 Gurken Maki Ingwer Wasabi und Soja Sauce',
            'type' => 'takeaway',
            'subtype' => 'u',
            'sprice' => 10.80
        ),

        array(
            'name' => 'Sushi Menü 4',
            'img' => '/外卖/sushimenu4.png',
            'discibe' => '2 Lachs Nigiri 1 Garnele Nigiri 1 Japanische Omelette Nigiri 1fpegender fisch kaviar 2 Aal gegrillt Maki 2 Avokado Maki 2 Garnele Maki Ingwer Wasabi und Soja Sauce',
            'type' => 'takeaway',
            'subtype' => 't',
            'sprice' => 12.80
        ),




        array(
            'name' => 'Gemischter Salat',
            'img' => '/salat/salat.png',
            'discibe' => 'Gemischter Salat',
            'type' => 'salat',
            'subtype' => 'salat',
            'sprice' => 3.20
        ),
        array(
            'name' => 'Sushi Menü 1',
            'img' => '/sushi/sushimenu1.png',
            'discibe' => '3 Paprika Maki 3 Gurken Maki 3 Avocado Maki 3 Rettich Maki Ingwer Wasabi und Soja Sauce',
            'type' => 'sushi',
            'subtype' => 'sushi',
            'sprice' => 6.90
        ),
        array(
            'name' => 'Sushi Menü 2',
            'img' => '/sushi/sushimenu2.png',
            'discibe' => '3 Lachs Maki 3 Garnele Maki 3 Avocado Maki 3 Gurken Maki Ingwer Wasabi und Soja Sauce',
            'type' => 'sushi',
            'subtype' => 'sushi',
            'sprice' => 8.20
        ),
        array(
            'name' => 'Sushi Menü 3',
            'img' => '/sushi/sushimenu3.png',
            'discibe' => '3 Lachs Maki 4 Garnele Maki 3 Avocado Maki 3 Paprika Maki 3 Gurken Maki Ingwer Wasabi und Soja Sauce',
            'type' => 'sushi',
            'subtype' => 'sushi',
            'sprice' => 10.80
        ),
        array(
            'name' => 'Sushi Menü 4',
            'img' => '/sushi/sushimenu4.png',
            'discibe' => '2 Lachs Nigiri 1 Garnele Nigiri 1 Japanische Omelette Nigiri 1fpegender fisch kaviar 2 Aal gegrillt Maki 2 Avokado Maki 2 Garnele Maki Ingwer Wasabi und Soja Sauce',
            'type' => 'sushi',
            'subtype' => 'sushi',
            'sprice' => 12.80
        ),












        array(
            'name' => '海天-草菇老抽-500ml',
            'img' => '/yachao/海天-草菇老抽-500ml.jpg',
            'discibe' => '海天-草菇老抽-500ml',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '李锦记豉汁226g',
            'img' => '/yachao/李锦记豉汁226g.jpg',
            'discibe' => '李锦记豉汁226g',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '海天-老抽王175l',
            'img' => '/yachao/海天-老抽王175l.jpg',
            'discibe' => '海天-老抽王175l.',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '海天-招牌蚝油-725g',
            'img' => '/yachao/海天-招牌蚝油-725g.jpg',
            'discibe' => '海天-招牌蚝油-725g',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '海天-味极鲜酱油750ml',
            'img' => '/yachao/海天-味极鲜酱油750ml.jpg',
            'discibe' => '海天-味极鲜酱油750ml.jpg',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '海天-芝麻香油-150ml',
            'img' => '/yachao/海天-芝麻香油-150ml.jpg',
            'discibe' => '海天-芝麻香油-150ml',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '李锦记豉汁226g',
            'img' => '/yachao/李锦记豉汁226g.jpg',
            'discibe' => '李锦记豉汁226g',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '达利-镇江香醋-550ml',
            'img' => '/yachao/达利-镇江香醋-550ml.jpg',
            'discibe' => '达利-镇江香醋-550ml',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '海天-老抽王-酱油500ml',
            'img' => '/yachao/海天-老抽王-酱油500ml.jpg',
            'discibe' => '海天-老抽王-酱油500ml',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '珠江桥生抽王500ml',
            'img' => '/yachao/珠江桥生抽王500ml.jpg',
            'discibe' => '珠江桥生抽王500ml',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '海天鲜味生抽酱油500ml-',
            'img' => '/yachao/海天鲜味生抽酱油500ml-.jpg',
            'discibe' => '海天鲜味生抽酱油500ml-',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '珠江桥生抽王500ml',
            'img' => '/yachao/珠江桥生抽王500ml.jpg',
            'discibe' => '珠江桥生抽王500ml',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '海天-味极鲜-酱油-大瓶-19l',
            'img' => '/yachao/海天-味极鲜-酱油-大瓶-19l.jpg',
            'discibe' => '海天-味极鲜-酱油-大瓶-19l',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '保宁-一级保宁醋-430ml',
            'img' => '/yachao/保宁-一级保宁醋-430ml.jpg',
            'discibe' => '保宁-一级保宁醋-430ml',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '王致和-混合花生芝麻酱225g',
            'img' => '/yachao/王致和-混合花生芝麻酱225g.jpg',
            'discibe' => '王致和-混合花生芝麻酱225g',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '海天-蒸鱼豉油-450ml',
            'img' => '/yachao/海天-蒸鱼豉油-450ml.jpg',
            'discibe' => '海天-蒸鱼豉油-450ml',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '海天黄豆酱340g大瓶装',
            'img' => '/yachao/海天黄豆酱340g大瓶装.jpg',
            'discibe' => '海天黄豆酱340g大瓶装',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '吉香居-麻辣酱-358g',
            'img' => '/yachao/吉香居-麻辣酱-358g.jpg',
            'discibe' => '吉香居-麻辣酱-358g',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '李锦记排骨酱397g',
            'img' => '/yachao/李锦记排骨酱397g.jpg',
            'discibe' => '李锦记排骨酱397g',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '李锦记特级鲜味生抽酱油-500ml',
            'img' => '/yachao/李锦记特级鲜味生抽酱油-500ml.jpg',
            'discibe' => '李锦记特级鲜味生抽酱油-500ml',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '李锦记-凉拌酱226g',
            'img' => '/yachao/李锦记-凉拌酱226g.jpg',
            'discibe' => '李锦记-凉拌酱226g',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '李锦记混合芝麻油-香油207ml',
            'img' => '/yachao/李锦记混合芝麻油-香油207ml.jpg',
            'discibe' => '李锦记混合芝麻油-香油207ml',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '老干妈辣三丁油辣椒280g',
            'img' => '/yachao/老干妈辣三丁油辣椒280g.jpg',
            'discibe' => '老干妈辣三丁油辣椒280g',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '老干妈红油腐乳260g',
            'img' => '/yachao/老干妈红油腐乳260g.jpg',
            'discibe' => '老干妈红油腐乳260g',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '老干妈-香辣酱200g',
            'img' => '/yachao/老干妈-香辣酱200g.jpg',
            'discibe' => '老干妈-香辣酱200g',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '吉香居-香辣酱-358g',
            'img' => '/yachao/吉香居-香辣酱-358g.jpg',
            'discibe' => '吉香居-香辣酱-358g',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '康师傅黑胡椒铁板牛排桶面108g',
            'img' => '/yachao/康师傅黑胡椒铁板牛排桶面108g.jpg',
            'discibe' => '康师傅黑胡椒铁板牛排桶面108g',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '康师傅香菇炖鸡桶面-105g',
            'img' => '/yachao/康师傅香菇炖鸡桶面-105g.jpg',
            'discibe' => '康师傅香菇炖鸡桶面-105g',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '康师傅-经典桶面-老坛酸菜牛肉味-122g',
            'img' => '/yachao/康师傅-经典桶面-老坛酸菜牛肉味-122g.jpg',
            'discibe' => '康师傅-经典桶面-老坛酸菜牛肉味-122g',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '康师傅香辣牛肉桶面-112g',
            'img' => '/yachao/康师傅香辣牛肉桶面-112g.jpg',
            'discibe' => '康师傅香辣牛肉桶面-112g',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '康师傅鲜虾鱼板桶面-101g',
            'img' => '/yachao/康师傅鲜虾鱼板桶面-101g.jpg',
            'discibe' => '康师傅鲜虾鱼板桶面-101g',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '康师傅雪菜肉丝煨桶面-129g',
            'img' => '/yachao/康师傅雪菜肉丝煨桶面-129g.jpg',
            'discibe' => '康师傅雪菜肉丝煨桶面-129g',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '康师傅-经典老坛酸菜牛肉面-117g',
            'img' => '/yachao/康师傅-经典老坛酸菜牛肉面-117g.jpg',
            'discibe' => '康师傅-经典老坛酸菜牛肉面-117g',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '康师傅-经典鲜虾鱼板面-96g',
            'img' => '/yachao/康师傅-经典鲜虾鱼板面-96g.jpg',
            'discibe' => '康师傅-经典鲜虾鱼板面-96g',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '康师傅-香辣牛肉拌面-126g',
            'img' => '/yachao/康师傅-香辣牛肉拌面-126g.jpg',
            'discibe' => '康师傅-香辣牛肉拌面-126g',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '韩国-nongshim农心-kimchi辣白菜拉面120g',
            'img' => '/yachao/韩国-nongshim农心-kimchi辣白菜拉面120g.jpg',
            'discibe' => '韩国-nongshim农心-kimchi辣白菜拉面120g',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '白家牌方便粉丝经典正宗酸辣味105g',
            'img' => '/yachao/白家牌方便粉丝经典正宗酸辣味105g.jpg',
            'discibe' => '白家牌方便粉丝经典正宗酸辣味105g',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '长寿-快熟面500g',
            'img' => '/yachao/长寿-快熟面500g.jpg',
            'discibe' => '长寿-快熟面500g',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '春丝山东拉面340g',
            'img' => '/yachao/春丝山东拉面340g.jpg',
            'discibe' => '春丝山东拉面340g',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '晶星温州碱水面干-454g-',
            'img' => '/yachao/晶星温州碱水面干-454g-.jpg',
            'discibe' => '晶星温州碱水面干-454g-',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '泰国特选-cock-优质糯米粉-400g',
            'img' => '/yachao/泰国特选-cock-优质糯米粉-400g.jpg',
            'discibe' => '泰国特选-cock-优质糯米粉-400g',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '海底捞-全新包装-清汤火锅底料-110g',
            'img' => '/yachao/海底捞-全新包装-清汤火锅底料-110g.jpg',
            'discibe' => '海底捞-全新包装-清汤火锅底料-110g',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '重庆三五火锅底料精品底料150g',
            'img' => '/yachao/重庆三五火锅底料精品底料150g.jpg',
            'discibe' => '重庆三五火锅底料精品底料150g',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '重庆特产-桥头-麻辣水煮鱼调料-200g',
            'img' => '/yachao/重庆特产-桥头-麻辣水煮鱼调料-200g.jpg',
            'discibe' => '重庆特产-桥头-麻辣水煮鱼调料-200g',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '老干妈香辣菜袋装80g',
            'img' => '/yachao/老干妈香辣菜袋装80g.jpg',
            'discibe' => '老干妈香辣菜袋装80g',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '康师傅-绿茶-蜂蜜茉莉味-500ml',
            'img' => '/yachao/康师傅-绿茶-蜂蜜茉莉味-500ml.jpg',
            'discibe' => '康师傅-绿茶-蜂蜜茉莉味-500ml',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => 'golden-chef优选绿豆400g',
            'img' => '/yachao/golden-chef优选绿豆400g.jpg',
            'discibe' => 'golden-chef优选绿豆400g',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '韩国原产热销-haitai-蜂蜜黄油薯片-60g',
            'img' => '/yachao/韩国原产热销-haitai-蜂蜜黄油薯片-60g.jpg',
            'discibe' => '韩国原产热销-haitai-蜂蜜黄油薯片-60g',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '台湾原产-九福-葡萄芝麻沙琪玛227g',
            'img' => '/yachao/台湾原产-九福-葡萄芝麻沙琪玛227g.jpg',
            'discibe' => '台湾原产-九福-葡萄芝麻沙琪玛227g',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '真心核桃味瓜子-110g-',
            'img' => '/yachao/真心核桃味瓜子-110g-.jpg',
            'discibe' => '真心核桃味瓜子-110g-',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '真心焦糖味瓜子-110g',
            'img' => '/yachao/真心焦糖味瓜子-110g.jpg',
            'discibe' => '真心焦糖味瓜子-110g',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '真心-美客多甘栗仁-50g',
            'img' => '/yachao/真心-美客多甘栗仁-50g.jpg',
            'discibe' => '真心-美客多甘栗仁-50g',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '真心五香味瓜子-250g',
            'img' => '/yachao/真心五香味瓜子-250g.jpg',
            'discibe' => '真心五香味瓜子-250g',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '双枪-捞面筷-2双',
            'img' => '/yachao/双枪-捞面筷-2双.jpg',
            'discibe' => '双枪-捞面筷-2双',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '双枪-天然竹筷子原竹家用筷子-10双装',
            'img' => '/yachao/双枪-天然竹筷子原竹家用筷子-10双装.jpg',
            'discibe' => '双枪-天然竹筷子原竹家用筷子-10双装',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '双枪-竹木筷子-浅色10双',
            'img' => '/yachao/双枪-竹木筷子-浅色10双.jpg',
            'discibe' => '双枪-竹木筷子-浅色10双',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
        ),
        array(
            'name' => '鸳鸯锅-锅具-1个-32cm',
            'img' => '/yachao/鸳鸯锅-锅具-1个-32cm.jpg',
            'discibe' => '鸳鸯锅-锅具-1个-32cm',
            'type' => 'aaaaa',
            'subtype' => 'y',
            'sprice' => 0
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
