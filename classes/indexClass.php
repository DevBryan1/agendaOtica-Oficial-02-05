<?php
class Index{

    public function tempo(){
        $url = "https://api.hgbrasil.com/weather?woeid=455892";
        $conteudo = self::getUrl($url);
        $clima = json_decode($conteudo, true);


        $infoClimatico = [];

        $infoClimatico['img'] = 'http://assets.api.hgbrasil.com/weather/images/'.$clima['results']['img_id'].'.png';
        $infoClimatico['temperatura'] = $clima['results']['temp'];
        $infoClimatico['descricao'] = $clima['results']['description'];
        $infoClimatico['cidade'] = $clima['results']['city'];

        return $infoClimatico;
    }

    public function ouro(){
        $url = 'https://openexchangerates.org/api/latest.json?app_id=a6b7644d4bf7422b96affcb873a992b1&base=XAU&symbols=BRL';
        $conteudo = self::getUrl($url);
        $infoOuro = json_decode($conteudo, true);
        $ouroOnca = $infoOuro['rates']['BRL'];
        $ouroGrama = 31.10349;

        $resultado = $ouroOnca / $ouroGrama;
        $ouroReal = self::converterMoeda($resultado);

        return $ouroReal;
    }

    static function getUrl($link){
        $context = stream_context_create(
            array(
                'http' => array(
                    'header' => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36"
                )
            )
        );
        $url = file_get_contents($link, false, $context);

        return $url;
    }

    static function converterMoeda($moeda){
        $val = round(floatval($moeda), 2);
        $m = explode('.', $val);
        if(count($m) > 1){
            if(strlen($m[1]) == 1){
                $value = $m[0].','.$m[1].'0';
            }else{
                $value = $m[0].','.$m[1];
            }
        }else{
            $value = $m[0].',00';
        }

        return $value;
    }

}