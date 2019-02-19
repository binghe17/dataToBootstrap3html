<?php

//data to bsTab
$tabData = array(
    'data'=> [
        //tabName, tabContent
        ['menu1','aaaaaa'],
        ['menu2','bbb'],
        ['menu3','ccc']
    ],
    'boxName' => 'tab1',
    'activeNum' => 0
);
$tabData['data'][0][0] = '메뉴1';//탭 이름
$tabData['data'][0][1] = '내용1111111111111';//탭 내용

function bs_tabHtml($tabData){
    $str1=''; 
    $str2='';
    $boxname =  ( $tabData['boxName'] ) ? ' id="'. $tabData['boxName'] .'"' : '';
    $prename =  ( $tabData['boxName'] ) ? $tabData['boxName'].'_' : '';

    for ($i = 0, $leng = count($tabData['data']); $i < $leng; $i++) {
        $str1 .= '<li'. ( $tabData['activeNum'] == $i ? ' class="active"' : '') .'><a data-toggle="tab" href="#'. $prename .'tab_'. $i .'">'. $tabData['data'][$i][0] .'</a></li>';
        $str2 .= '<div id="'. $prename .'tab_'. $i .'" class="tab-pane'.  ( $tabData['activeNum'] == $i ? ' active' : '') .'">'. $tabData['data'][$i][1] .'</div>';
    }

    $rs = <<<HTML
        <div {$boxname}>
            <ul class="nav nav-tabs">
                {$str1}
            </ul>
            <div class="tab-content">
                {$str2}
            </div>
        </div>
HTML;
    return $rs;
}


echo <<<HTML
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
HTML;
echo bs_tabHtml($tabData);
