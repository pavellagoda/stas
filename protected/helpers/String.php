<?php

/**
 * Description of File
 *
 * @author Ivan
 */
class String {
    public static function truncate($s, $l, $e = '...', $isHTML = false){
        //if ($link) $e .= " <__>"; 
        $i = 0;
        $tags = array();
        if($isHTML){
            preg_match_all('/<[^>]+>([^<]*)/', $s, $m, PREG_OFFSET_CAPTURE | PREG_SET_ORDER);
            foreach($m as $o){
                if($o[0][1] - $i >= $l)
                    break;
                $t = mb_substr(strtok($o[0][0], " \t\n\r\0\x0B>"), 1);
                if($t[0] != '/')
                    $tags[] = $t;
                elseif(end($tags) == mb_substr($t, 1))
                    array_pop($tags);
                $i += $o[1][1] - $o[0][1];
            }
        }
        return mb_substr($s, 0, $l = min(mb_strlen($s),  $l + $i)) . (count($tags = array_reverse($tags)) ? '</' . implode('></', $tags) . '>' : '') . (mb_strlen($s) > $l ? $e : '');
    }
    
    public static function removeSymbols($string){
    	$aSymbols[] = range(153,191);
    	
    	$chars = array();
    	foreach($aSymbols as $v){
    		$chars = array_merge($chars,$v);
    	}
    	$chars = array_map('chr',$chars);
    	
    	
    	$aTr = array();
    	foreach($chars as $v){
    		$aTr[$v]='';
    	}
    	$string = strtr($string, $aTr);
    	return $string;
    }
    
    public static function createUrlFromText($string)
    {
        $string = preg_replace("`\[.*\]`U", "", $string);
        $string = preg_replace('`&(amp;)?#?[a-z0-9]+;`i', '-', $string);
        $string = htmlentities($string, ENT_COMPAT, 'utf-8');
        $string = preg_replace("`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);`i", "\\1", $string);
        $string = preg_replace(array("`[^a-z0-9]`i", "`[-]+`"), "-", $string);
        return strtolower(trim($string, '-'));
    }
}