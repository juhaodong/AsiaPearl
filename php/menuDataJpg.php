<?php
header('Content-type: application/json');
header("Access-Control-Allow-Origin: *");
$response = array(
    'code' => 0,
    'message' =>'all Green',
    'data' => array(
        array(
            'name'=>'reis',
            'img'=>'/跟餐/白饭.jpg',
            'discibe'=>'weißer gedünsteter reis',
            'type'=>'beilag',
        ),
        array(
            'name'=>'gebr, nudeln',
            'img'=>'/跟餐/炒面.jpg',
            'discibe'=>'gebratene nudeln mit zwiebein, und kohl.',
            'type'=>'beilag',
        ),
        array(
            'name'=>'gemüse',
            'img'=>'/跟餐/蔬菜.jpg',
            'discibe'=>'eine gesunde medley aus brokkoli, zucchini, karotten, bohnen und kohl.',
            'type'=>'beilag',
        ),
        array(
            'name'=>'gebr, reis',
            'img'=>'/跟餐/炒饭.jpg',
            'discibe'=>'zubereitete gedünstete weiße reis mit sojasauce, eier, erbsen, karotten.',
            'type'=>'beilag',
        ),
        array(
            'name'=>'beijing beef',
            'img'=>'/主餐/洋葱niu.jpg',
            'discibe'=>'knusprige mariniertes rindfleisch, mit zwiebeln, rote paprika und einem berühmte sauce.',
            'type'=>'hauptgericht',
        ),
        array(
            'name'=>'hongkong chicken',
            'img'=>'/主餐/甜子鸡.jpg',
            'discibe'=>'unsere unterschrift gericht.
süße und würzige knuspriges huhn beißt unsere  pikanten-sauce.',
            'type'=>'hauptgericht',
        ),
        array(
            'name'=>'orange huhn würzig',
            'img'=>'/主餐/橙子鸡.jpg',
            'discibe'=>'knuspriges hähnchen in einer süß-scharfen-würzige orangensauce.',
            'type'=>'hauptgericht',
        ),


        array(
            'name'=>'shanghai steaks',
            'img'=>'/主餐/长豆牛1.jpg',
            'discibe'=>'steaks mit frische bohnen, zwiebeln und champignons in einer würzigen sauce.',
            'type'=>'hauptgericht',
        ),


        array(
            'name'=>'gong bao chicken',
            'img'=>'/主餐/宫保鸡.jpg',
            'discibe'=>'ein sichuan-inspiriertes gericht mit huhn, und gemüse, verfeinert',
            'type'=>'hauptgericht',
        ),


        array(
            'name'=>'grüne bohnen-hänchenbrust',
            'img'=>'/主餐/长豆鸡.jpg',
            'discibe'=>'hähnchenbrust,bohnen und zwiebeln in einer milden lngver-sojasauce würzen.',
            'type'=>'hauptgericht',
        ),


        array(
            'name'=>'hähnchen streifen',
            'img'=>'/主餐/炸鸡条.jpg',
            'discibe'=>'knusprige-goldene hähnchen streifen.
mit eine ausgewählt soße.',
            'type'=>'hauptgericht',
        ),


        array(
            'name'=>'hähnchen brust',
            'img'=>'/主餐/炸鸡胸1.jpg',
            'discibe'=>'gebratene-goldene hähnchenbrust, mit eine ausgewählt soße.',
            'type'=>'hauptgericht',
        ),


        array(
            'name'=>'champignons',
            'img'=>'/主餐/毛菇.jpg',
            'discibe'=>'frische champignons knoblauch körner, mit austern-sauce.',
            'type'=>'hauptgericht',
        ),


        array(
            'name'=>'knusprige enten',
            'img'=>'/主餐/炸鸭.jpg',
            'discibe'=>'knusprige ente, mit verschidene gemüse und eine ausgewählt soße.',
            'type'=>'hauptgericht',
        ),


        array(
            'name'=>'Glückskeks',
            'img'=>'/前餐/幸运饼.jpg',
            'discibe'=>'',
            'type'=>'vorspeisen',
            'sprice'=>1.95,
            'bprice'=>7.00,
        ),


        array(
            'name'=>'knusprige shrimps',
            'img'=>'/前餐/炸大虾.jpg',
            'discibe'=>'crisp-golden butterflied garnelen.',
            'type'=>'vorspeisen',
            'sprice'=>1.95,
            'bprice'=>7.00,
        ),


        array(
            'name'=>'chickensrollen',
            'img'=>'/前餐/肉卷.jpg',
            'discibe'=>'kohl, karotten pilze, zwiebeln und hühnerfleisch in einer knusprigen wan-tan-wrapper.',
            'type'=>'vorspeisen',
            'sprice'=>1.95,
            'bprice'=>7.00,
        ),


        array(
            'name'=>'frühlingspollen',
            'img'=>'/前餐/蔬菜卷.jpg',
            'discibe'=>'kohl, sellerie, karotten, zwiebeln und chinesische nudeln in einem knusprigen wan-tan-wrapper.',
            'type'=>'vorspeisen',
            'sprice'=>1.95,
            'bprice'=>7.00,
        ),


        array(
            'name'=>'süß-sauer-soße',
            'img'=>'/汁水/甜酸汁.jpg',
            'discibe'=>'',
            'type'=>'sauce',
            'sprice'=>0.8,

        ),


        array(
            'name'=>'erdnuss-soße',
            'img'=>'/汁水/花生汁.jpg',
            'discibe'=>'',
            'type'=>'sauce',
            'sprice'=>0.8,
        ),


        array(
            'name'=>'knoblauch-soße',
            'img'=>'/汁水/黑汁.jpg',
            'discibe'=>'',
            'type'=>'sauce',
            'sprice'=>0.8,
        ),


        array(
            'name'=>'curry-soße',
            'img'=>'/汁水/咖喱汁1.jpg',
            'discibe'=>'',
            'type'=>'sauce',
            'sprice'=>0.8,
        ),


        array(
            'name'=>'scharf-soße',
            'img'=>'/汁水/辣汁.jpg',
            'discibe'=>'',
            'type'=>'sauce',
            'sprice'=>0.8,
        ),


        array(
            'name'=>'orange-soße',
            'img'=>'/汁水/橙子.jpg',
            'discibe'=>'',
            'type'=>'sauce',
            'sprice'=>0.8,
        ),
        array(
            'name'=>'BONAQA TABLEWATER',
            'img'=>'/酒水/BONAQATABLEWATER.jpg',
            'discibe'=>'',
            'type'=>'getranke',
            'sprice'=>1.5,
            'bprice'=>2.5,
        ),
        array(
            'name'=>'CocaCola Light',
            'img'=>'/酒水/CocaColalight.jpg',
            'discibe'=>'',
            'type'=>'getranke',
            'sprice'=>1.5,
            'bprice'=>2.5,
        ),      array(
            'name'=>'CocaCola Zero',
            'img'=>'/酒水/CocaColaZero.jpg',
            'discibe'=>'',
            'type'=>'getranke',
            'sprice'=>1.5,
            'bprice'=>2.5,
        ),      array(
            'name'=>'CocaCola',
            'img'=>'/酒水/CocaCola.jpg',
            'discibe'=>'',
            'type'=>'getranke',
            'sprice'=>1.5,
            'bprice'=>2.5,
        ),      array(
            'name'=>'Fanta',
            'img'=>'/酒水/Fanta.jpg',
            'discibe'=>'',
            'type'=>'getranke',
            'sprice'=>1.5,
            'bprice'=>2.5,
        ),      array(
            'name'=>'Lift APFERLSCHORLE',
            'img'=>'/酒水/LiftAPFERLSCHORLE.jpg',
            'discibe'=>'',
            'type'=>'getranke',
            'sprice'=>1.5,
            'bprice'=>2.5,
        ),      array(
            'name'=>'Sprite',
            'img'=>'/酒水/Sprite.jpg',
            'discibe'=>'',
            'type'=>'getranke',
            'sprice'=>1.5,
            'bprice'=>2.5,
        ),
        array(
            'name'=>'Vio STELL',
            'img'=>'/酒水/VioSTELL.jpg',
            'discibe'=>'',
            'type'=>'getranke',
            'sprice'=>1.5,
            'bprice'=>2.5,
        ),
        array(
            'name'=>'Orange Huhn mit gebr.Reis',
            'img'=>'/套餐/R-OH.jpg',
            'discibe'=>'',
            'type'=>'menu',
            'price'=>6.80
        ),
        array(
            'name'=>'Knusprige Ente mit Mix-Gemüse',
            'img'=>'/套餐/TC-Bowl.jpg',
            'discibe'=>'',
            'type'=>'menu',
            'price'=>8.00
        ),
        array(
            'name'=>'Hähnchenbrust mit Bohnen und Reis',
            'img'=>'/套餐/R-H.jpg',
            'discibe'=>'',
            'type'=>'menu',
            'price'=>6.80
        ),
        array(
            'name'=>'Gong Bao Chicken mit gebr.Reis',
            'img'=>'/套餐/KPC-Bowl.jpg',
            'discibe'=>'',
            'type'=>'menu',
            'price'=>6.80
        ),
        array(
            'name'=>'Beijing Beef mit gebr.Nudeln',
            'img'=>'/套餐/BB-Bowl.jpg',
            'discibe'=>'',
            'type'=>'menu',
            'price'=>6.80
        ),
        array(
            'name'=>'Frische Champignons mit gebr.Nudeln',
            'img'=>'/套餐/HWS-Bowl.jpg',
            'discibe'=>'',
            'type'=>'menu',
            'price'=>6.80
        ),
        array(
            'name'=>'Orange Huhn mit gebr.Reis & Nudeln',
            'img'=>'/套餐/OC-BB.jpg',
            'discibe'=>'',
            'type'=>'menu',
            'price'=>9.90
        ),
        array(
            'name'=>'Beef mit Chicken.gebr.Reis mix Gemüse',
            'img'=>'/套餐/BB-SBC.jpg',
            'discibe'=>'',
            'type'=>'menu',
            'price'=>10.90
        ),
        array(
            'name'=>'Rindfleisch & Ente mit gebr.Nudeln',
            'img'=>'/套餐/SAS-HWS.jpg',
            'discibe'=>'',
            'type'=>'menu',
            'price'=>13.40
        ),
        array(
            'name'=>'Orange Huhn mit gebr.Reis & Nudeln',
            'img'=>'/套餐/OC-BB1.jpg',
            'discibe'=>'',
            'type'=>'menu',
            'price'=>10.90
        ),
        array(
            'name'=>'Chicken strifen mit Reis & gebr Nudeln',
            'img'=>'/套餐/HWS-TC1.jpg',
            'discibe'=>'',
            'type'=>'menu',
            'price'=>10.90
        ),
        array(
            'name'=>'Gong Bao Chicken mit Hähnchenbrust,Reis',
            'img'=>'/套餐/KPC-TC.jpg',
            'discibe'=>'',
            'type'=>'menu',
            'price'=>10.90
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