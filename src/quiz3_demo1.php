<?php
/*
參考自
[使用php完成最短路径查找](https://blog.csdn.net/weixin_39009993/article/details/79117651)
*/
$list=[
	'a'=>['b'=>1,'c'=>2,'d'=>3,],
	'b'=>['a'=>1,'c'=>4,'e'=>9],
	'c'=>['a'=>2,'b'=>4,'d'=>5,'e'=>6],
	'd'=>['a'=>3,'c'=>5,'e'=>8],
	'e'=>['b'=>9,'c'=>6,'d'=>8],
];
function find($node,$list,$next,$a=[]){	
	if(count($next)==count($list)){
		return $_GET=[array_merge($next,$a)];
	}	 
	foreach($list[$node[strlen($node)-1]] as $k=>$v){
		foreach($next as $n=>$m){
			if($k==$n[strlen($n)-1]){
				unset($list[$node][$k]);
			}	
		}
	}
	foreach($list[$node[strlen($node)-1]] as $k=>$v){	
		$a[$node.$k]=$next[$node]+$v;	
	}
	foreach($a as $k=>$v){
		foreach($next as $n=>$m){
			if($k[strlen($k)-1]==$n[strlen($n)-1]){
				unset($a[$k]);
			}
		}	
	}
	foreach($a as $k=>$v){
		if(!isset($smallest) || $smallest>$v ){
			$smallest=$v ;
			$node=$k ;
		}	
	}		
	$next[$node]=$smallest;  
	unset($smallest);	
	find($node,$list,$next,$a);
}
find('b',$list,['b'=>0]);	 
print_r($_GET);
?>