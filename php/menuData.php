<?php
header('Content-type: application/json');
header("Access-Control-Allow-Origin: *");
$response = array(
    'code' => 0,
    'message' =>'all Green',
    'data' => array(
        array(
            'name'=>'reis',
            'img'=>'/跟餐/白饭.png',
            'discibe'=>'weißer gedünsteter reis',
            'type'=>'beilag',

        ),


        array(
            'name'=>'gebr, nudeln',
            'img'=>'/跟餐/炒面.png',
            'discibe'=>'gebratene nudeln mit zwiebein, und kohl.',
            'type'=>'beilag',

        ),
        array(
            'name'=>'gemüse',
            'img'=>'/跟餐/蔬菜.png',
            'discibe'=>'eine gesunde medley aus brokkoli, zucchini, karotten, bohnen und kohl.',
            'type'=>'beilag',

        ),
        array(
            'name'=>'gebr, reis',
            'img'=>'/跟餐/炒饭.png',
            'discibe'=>'zubereitete gedünstete weiße reis mit sojasauce, eier, erbsen, karotten.',
            'type'=>'beilag',

        ),
        array(
            'name'=>'beijing beef',
            'img'=>'/主餐/洋葱niu.png',
            'discibe'=>'knusprige mariniertes rindfleisch, mit zwiebeln, rote paprika und einem berühmte sauce.',
            'type'=>'hauptgericht',


        ),
        array(
            'name'=>'hongkong chicken',
            'img'=>'/主餐/甜子鸡.png',
            'discibe'=>'unsere unterschrift gericht.
süße und würzige knuspriges huhn beißt unsere  pikanten-sauce.',
            'type'=>'hauptgericht',

        ),
        array(
            'name'=>'orange huhn würzig',
            'img'=>'/主餐/橙子鸡.png',
            'discibe'=>'knuspriges hähnchen in einer süß-scharfen-würzige orangensauce.',
            'type'=>'hauptgericht',

        ),


        array(
            'name'=>'shanghai steaks',
            'img'=>'/主餐/长豆牛1.png',
            'discibe'=>'steaks mit frische bohnen, zwiebeln und champignons in einer würzigen sauce.',
            'type'=>'hauptgericht',
            'addPrice'=>1.25,

        ),


        array(
            'name'=>'gong bao chicken',
            'img'=>'/主餐/宫保鸡.png',
            'discibe'=>'ein sichuan-inspiriertes gericht mit huhn, und gemüse, verfeinert',
            'type'=>'hauptgericht',

        ),


        array(
            'name'=>'grüne bohnen-hänchenbrust',
            'img'=>'/主餐/长豆鸡.png',
            'discibe'=>'hähnchenbrust,bohnen und zwiebeln in einer milden lngver-sojasauce würzen.',
            'type'=>'hauptgericht',

        ),


        array(
            'name'=>'hähnchen streifen',
            'img'=>'/主餐/炸鸡条.png',
            'discibe'=>'knusprige-goldene hähnchen streifen.
mit eine ausgewählt soße.',
            'type'=>'hauptgericht',

        ),


        array(
            'name'=>'hähnchen brust',
            'img'=>'/主餐/炸鸡胸1.png',
            'discibe'=>'gebratene-goldene hähnchenbrust, mit eine ausgewählt soße.',
            'type'=>'hauptgericht',

        ),


        array(
            'name'=>'champignons',
            'img'=>'/主餐/毛菇.png',
            'discibe'=>'frische champignons knoblauch körner, mit austern-sauce.',
            'type'=>'hauptgericht',

        ),


        array(
            'name'=>'knusprige enten',
            'img'=>'/主餐/炸鸭.png',
            'discibe'=>'knusprige ente, mit verschidene gemüse und eine ausgewählt soße.',
            'type'=>'hauptgericht',
            'addPrice'=>1.25,

        ),




        array(
            'name'=>'knusprige shrimps',
            'img'=>'/前餐/炸大虾.png',
            'discibe'=>'crisp-golden butterflied garnelen.',
            'type'=>'vorspeisen',
            'sprice'=>1.95,
            'bprice'=>9.75,
        ),


        array(
            'name'=>'chickensrollen',
            'img'=>'/前餐/肉卷.png',
            'discibe'=>'kohl, karotten pilze, zwiebeln und hühnerfleisch in einer knusprigen wan-tan-wrapper.',
            'type'=>'vorspeisen',
            'sprice'=>1.95,
            'bprice'=>9.75,
        ),


        array(
            'name'=>'frühlingspollen',
            'img'=>'/前餐/蔬菜卷.png',
            'discibe'=>'kohl, sellerie, karotten, zwiebeln und chinesische nudeln in einem knusprigen wan-tan-wrapper.',
            'type'=>'vorspeisen',
            'sprice'=>1.95,
            'bprice'=>9.75,
        ),


        array(
            'name'=>'süß-sauer-soße',
            'img'=>'/汁水/甜酸汁.png',
            'discibe'=>'',
            'type'=>'sauce',
            'sprice'=>0.8,

        ),


        array(
            'name'=>'erdnuss-soße',
            'img'=>'/汁水/花生汁.png',
            'discibe'=>'',
            'type'=>'sauce',
            'sprice'=>0.8,
        ),


        array(
            'name'=>'knoblauch-soße',
            'img'=>'/汁水/黑汁.png',
            'discibe'=>'',
            'type'=>'sauce',
            'sprice'=>0.8,
        ),


        array(
            'name'=>'curry-soße',
            'img'=>'/汁水/咖喱汁1.png',
            'discibe'=>'',
            'type'=>'sauce',
            'sprice'=>0.8,
        ),


        array(
            'name'=>'scharf-soße',
            'img'=>'/汁水/辣汁.png',
            'discibe'=>'',
            'type'=>'sauce',
            'sprice'=>0.8,
        ),


        array(
            'name'=>'orange-soße',
            'img'=>'/汁水/橙子.png',
            'discibe'=>'',
            'type'=>'sauce',
            'sprice'=>0.8,
        ),
        array(
            'name'=>'BONAQA TABLEWATER',
            'img'=>'/酒水/BONAQATABLEWATER.png',
            'discibe'=>'',
            'type'=>'getranke',
            'sprice'=>1.5,
            'bprice'=>2.5,
        ),
        array(
            'name'=>'CocaCola Light',
            'img'=>'/酒水/CocaColalight.png',
            'discibe'=>'',
            'type'=>'getranke',
            'sprice'=>1.5,
            'bprice'=>2.5,
        ),      array(
            'name'=>'CocaCola Zero',
            'img'=>'/酒水/CocaColaZero.png',
            'discibe'=>'',
            'type'=>'getranke',
            'sprice'=>1.5,
            'bprice'=>2.5,
        ),      array(
            'name'=>'CocaCola',
            'img'=>'/酒水/CocaCola.png',
            'discibe'=>'',
            'type'=>'getranke',
            'sprice'=>1.5,
            'bprice'=>2.5,
        ),      array(
            'name'=>'Fanta',
            'img'=>'/酒水/Fanta.png',
            'discibe'=>'',
            'type'=>'getranke',
            'sprice'=>1.5,
            'bprice'=>2.5,
        ),      array(
            'name'=>'Lift APFERLSCHORLE',
            'img'=>'/酒水/LiftAPFERLSCHORLE.png',
            'discibe'=>'',
            'type'=>'getranke',
            'sprice'=>1.5,
            'bprice'=>2.5,
        ),      array(
            'name'=>'Sprite',
            'img'=>'/酒水/Sprite.png',
            'discibe'=>'',
            'type'=>'getranke',
            'sprice'=>1.5,
            'bprice'=>2.5,
        ),
        array(
            'name'=>'Vio STELL',
            'img'=>'/酒水/VioSTELL.png',
            'discibe'=>'',
            'type'=>'getranke',
            'sprice'=>1.5,
            'bprice'=>2.5,
        ),
        array(
            'name'=>'Orange Huhn mit gebr.Reis',
            'img'=>'/套餐/R-OH.png',
            'discibe'=>'',
            'type'=>'menu',
            'sprice'=>6.80
        ),
        array(
            'name'=>'Knusprige Ente mit Mix-Gemüse',
            'img'=>'/套餐/TC-Bowl.png',
            'discibe'=>'',
            'type'=>'menu',
            'sprice'=>8.00
        ),
        array(
            'name'=>'Hähnchenbrust mit Bohnen und Reis',
            'img'=>'/套餐/R-H.png',
            'discibe'=>'',
            'type'=>'menu',
            'sprice'=>6.80
        ),
        array(
            'name'=>'Gong Bao Chicken mit gebr.Reis',
            'img'=>'/套餐/KPC-Bowl.png',
            'discibe'=>'',
            'type'=>'menu',
            'sprice'=>6.80
        ),
        array(
            'name'=>'Beijing Beef mit gebr.Nudeln',
            'img'=>'/套餐/BB-Bowl.png',
            'discibe'=>'',
            'type'=>'menu',
            'sprice'=>6.80
        ),
        array(
            'name'=>'Frische Champignons mit gebr.Nudeln',
            'img'=>'/套餐/HWS-Bowl.png',
            'discibe'=>'',
            'type'=>'menu',
            'sprice'=>6.80
        ),
        array(
            'name'=>'Orange Huhn mit gebr.Reis & Nudeln',
            'img'=>'/套餐/OC-BB.png',
            'discibe'=>'',
            'type'=>'menu',
            'sprice'=>9.90
        ),
        array(
            'name'=>'Beef mit Chicken.gebr.Reis mix Gemüse',
            'img'=>'/套餐/BB-SBC.png',
            'discibe'=>'',
            'type'=>'menu',
            'sprice'=>10.90
        ),
        array(
            'name'=>'Rindfleisch & Ente mit gebr.Nudeln',
            'img'=>'/套餐/SAS-HWS.png',
            'discibe'=>'',
            'type'=>'menu',
            'sprice'=>13.40
        ),
        array(
            'name'=>'Orange Huhn mit gebr.Reis & Nudeln',
            'img'=>'/套餐/OC-BB1.png',
            'discibe'=>'',
            'type'=>'menu',
            'sprice'=>10.90
        ),
        array(
            'name'=>'Chicken strifen mit Reis & gebr Nudeln',
            'img'=>'/套餐/HWS-TC1.png',
            'discibe'=>'',
            'type'=>'menu',
            'sprice'=>10.90
        ),
        array(
            'name'=>'Gong Bao Chicken mit Hähnchenbrust,Reis',
            'img'=>'/套餐/KPC-TC.png',
            'discibe'=>'',
            'type'=>'menu',
            'sprice'=>10.90
        ),
        array(
            'name'=>'reis',
            'img'=>'/跟餐/白饭.png',
            'discibe'=>'weißer gedünsteter reis',
            'type'=>'carte',
            'subtype'=>'b',
            'sprice'=>2.5,
            'mprice'=>5,
            'bprice'=>7.5
        ),
        array(
            'name'=>'gebr, nudeln',
            'img'=>'/跟餐/炒面.png',
            'discibe'=>'gebratene nudeln mit zwiebein, und kohl.',
            'type'=>'carte',
            'subtype'=>'b',
            'sprice'=>2.5,
            'mprice'=>5,
            'bprice'=>7.5
        ),
        array(
            'name'=>'gemüse',
            'img'=>'/跟餐/蔬菜.png',
            'discibe'=>'eine gesunde medley aus brokkoli, zucchini, karotten, bohnen und kohl.',
            'type'=>'carte',
            'subtype'=>'b',
            'sprice'=>2.5,
            'mprice'=>5,
            'bprice'=>7.5
        ),
        array(
            'name'=>'gebr, reis',
            'img'=>'/跟餐/炒饭.png',
            'discibe'=>'zubereitete gedünstete weiße reis mit sojasauce, eier, erbsen, karotten.',
            'type'=>'carte',
            'subtype'=>'b',
            'sprice'=>2.5,
            'mprice'=>5,
            'bprice'=>7.5
        ),
        array(
            'name'=>'beijing beef',
            'img'=>'/主餐/洋葱niu.png',
            'discibe'=>'knusprige mariniertes rindfleisch, mit zwiebeln, rote paprika und einem berühmte sauce.',
            'type'=>'carte',
            'subtype'=>'h',
            'sprice'=>3.5,
            'mprice'=>7,
            'bprice'=>10.5

        ),
        array(
            'name'=>'hongkong chicken',
            'img'=>'/主餐/甜子鸡.png',
            'discibe'=>'unsere unterschrift gericht.
süße und würzige knuspriges huhn beißt unsere  pikanten-sauce.',
            'type'=>'carte',
            'subtype'=>'h',
            'sprice'=>3.5,
            'mprice'=>7,
            'bprice'=>10.5
        ),
        array(
            'name'=>'orange huhn würzig',
            'img'=>'/主餐/橙子鸡.png',
            'discibe'=>'knuspriges hähnchen in einer süß-scharfen-würzige orangensauce.',
            'type'=>'carte',
            'subtype'=>'h',
            'sprice'=>3.5,
            'mprice'=>7,
            'bprice'=>10.5
        ),


        array(
            'name'=>'shanghai steaks',
            'img'=>'/主餐/长豆牛1.png',
            'discibe'=>'steaks mit frische bohnen, zwiebeln und champignons in einer würzigen sauce.',
            'type'=>'carte',
            'subtype'=>'h',
            'addPrice'=>1.25,
            'sprice'=>4.75,
            'mprice'=>9.5,
            'bprice'=>14.25
        ),


        array(
            'name'=>'gong bao chicken',
            'img'=>'/主餐/宫保鸡.png',
            'discibe'=>'ein sichuan-inspiriertes gericht mit huhn, und gemüse, verfeinert',
            'type'=>'carte',
            'subtype'=>'h',
            'sprice'=>3.5,
            'mprice'=>7,
            'bprice'=>10.5
        ),


        array(
            'name'=>'grüne bohnen-hänchenbrust',
            'img'=>'/主餐/长豆鸡.png',
            'discibe'=>'hähnchenbrust,bohnen und zwiebeln in einer milden lngver-sojasauce würzen.',
            'type'=>'carte',
            'subtype'=>'h',
            'sprice'=>3.5,
            'mprice'=>7,
            'bprice'=>10.5
        ),


        array(
            'name'=>'hähnchen streifen',
            'img'=>'/主餐/炸鸡条.png',
            'discibe'=>'knusprige-goldene hähnchen streifen.
mit eine ausgewählt soße.',
            'subtype'=>'h',
            'type'=>'carte',
            'sprice'=>3.5,
            'mprice'=>7,
            'bprice'=>10.5
        ),


        array(
            'name'=>'hähnchen brust',
            'img'=>'/主餐/炸鸡胸1.png',
            'discibe'=>'gebratene-goldene hähnchenbrust, mit eine ausgewählt soße.',
            'type'=>'carte',
            'subtype'=>'h',
            'sprice'=>3.5,
            'mprice'=>7,
            'bprice'=>10.5
        ),


        array(
            'name'=>'champignons',
            'img'=>'/主餐/毛菇.png',
            'discibe'=>'frische champignons knoblauch körner, mit austern-sauce.',
            'type'=>'carte',
            'subtype'=>'h',
            'sprice'=>3.5,
            'mprice'=>7,
            'bprice'=>10.5
        ),


        array(
            'name'=>'knusprige enten',
            'img'=>'/主餐/炸鸭.png',
            'discibe'=>'knusprige ente, mit verschidene gemüse und eine ausgewählt soße.',
            'type'=>'carte',
            'subtype'=>'h',
            'addPrice'=>1.25,
            'sprice'=>4.75,
            'mprice'=>9.5,
            'bprice'=>14.25
        ),



        array(
            'name'=>'knusprige shrimps',
            'img'=>'/前餐/炸大虾.png',
            'discibe'=>'crisp-golden butterflied garnelen.',
            'type'=>'carte',
            'subtype'=>'v',
            'sprice'=>1.95,
            'bprice'=>9.75,
        ),


        array(
            'name'=>'chickensrollen',
            'img'=>'/前餐/肉卷.png',
            'discibe'=>'kohl, karotten pilze, zwiebeln und hühnerfleisch in einer knusprigen wan-tan-wrapper.',
            'type'=>'carte',
            'subtype'=>'v',
            'sprice'=>1.95,
            'bprice'=>9.75,
        ),


        array(
            'name'=>'frühlingspollen',
            'img'=>'/前餐/蔬菜卷.png',
            'discibe'=>'kohl, sellerie, karotten, zwiebeln und chinesische nudeln in einem knusprigen wan-tan-wrapper.',
            'type'=>'carte',
            'subtype'=>'v',
            'sprice'=>1.95,
            'bprice'=>9.75,
        ),


        array(
            'name'=>'süß-sauer-soße',
            'img'=>'/汁水/甜酸汁.png',
            'discibe'=>'',
            'type'=>'carte',
            'subtype'=>'s',
            'sprice'=>0.8,

        ),


        array(
            'name'=>'erdnuss-soße',
            'img'=>'/汁水/花生汁.png',
            'discibe'=>'',
            'type'=>'carte',
            'subtype'=>'s',
            'sprice'=>0.8,
        ),


        array(
            'name'=>'knoblauch-soße',
            'img'=>'/汁水/黑汁.png',
            'discibe'=>'',
            'type'=>'carte',
            'subtype'=>'s',
            'sprice'=>0.8,
        ),


        array(
            'name'=>'curry-soße',
            'img'=>'/汁水/咖喱汁1.png',
            'discibe'=>'',
            'type'=>'carte',
            'subtype'=>'s',
            'sprice'=>0.8,
        ),


        array(
            'name'=>'scharf-soße',
            'img'=>'/汁水/辣汁.png',
            'discibe'=>'',
            'type'=>'carte',
            'subtype'=>'s',
            'sprice'=>0.8,
        ),


        array(
            'name'=>'orange-soße',
            'img'=>'/汁水/橙子.png',
            'discibe'=>'',
            'type'=>'carte',
            'subtype'=>'s',
            'sprice'=>0.8,
        ),
        array(
            'name'=>'BONAQA TABLEWATER',
            'img'=>'/酒水/BONAQATABLEWATER.png',
            'discibe'=>'',
            'type'=>'carte',
            'subtype'=>'g',
            'sprice'=>1.5,
            'bprice'=>2.5,
        ),
        array(
            'name'=>'CocaCola Light',
            'img'=>'/酒水/CocaColalight.png',
            'discibe'=>'',
            'type'=>'carte',
            'subtype'=>'g',
            'sprice'=>1.5,
            'bprice'=>2.5,
        ),      array(
            'name'=>'CocaCola Zero',
            'img'=>'/酒水/CocaColaZero.png',
            'discibe'=>'',
            'type'=>'carte',
            'subtype'=>'g',
            'sprice'=>1.5,
            'bprice'=>2.5,
        ),      array(
            'name'=>'CocaCola',
            'img'=>'/酒水/CocaCola.png',
            'discibe'=>'',
            'type'=>'carte',
            'subtype'=>'g',
            'sprice'=>1.5,
            'bprice'=>2.5,
        ),      array(
            'name'=>'Fanta',
            'img'=>'/酒水/Fanta.png',
            'discibe'=>'',
            'type'=>'carte',
            'subtype'=>'g',
            'sprice'=>1.5,
            'bprice'=>2.5,
        ),      array(
            'name'=>'Lift APFERLSCHORLE',
            'img'=>'/酒水/LiftAPFERLSCHORLE.png',
            'discibe'=>'',
            'type'=>'carte',
            'subtype'=>'g',
            'sprice'=>1.5,
            'bprice'=>2.5,
        ),      array(
            'name'=>'Sprite',
            'img'=>'/酒水/Sprite.png',
            'discibe'=>'',
            'type'=>'carte',
            'subtype'=>'g',
            'sprice'=>1.5,
            'bprice'=>2.5,
        ),
        array(
            'name'=>'Vio STELL',
            'img'=>'/酒水/VioSTELL.png',
            'discibe'=>'',
            'type'=>'carte',
            'subtype'=>'g',
            'sprice'=>1.5,
            'bprice'=>2.5,
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