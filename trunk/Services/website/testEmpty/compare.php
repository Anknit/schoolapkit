<?php
	$rule	=	array(
					array(
						'name'=>'fees',
						'check'=>'low',
						'indicator'=>true
					),
					array(
						'name'=>'teacherCount',
						'check'=>'high',
						'indicator'=>true
					),
					array(
						'name'=>'establishedYear',
						'check'=>'low',
						'indicator'=>false
					)
				);
				
	$itemsArr	=	array(
						array(
							'itemId'=>1,
							'itemName'=>'Kothari School',
							'fees'	=>	12000,
							'teacherCount'	=>	55,
							'establishedYear'=>1990
						),
						array(
							'itemId'=>2,
							'itemName'=>'Ramagya School',
							'fees'	=>	8000,
							'teacherCount'	=>	35,
							'establishedYear'=>1996
						),
						array(
							'itemId'=>3,
							'itemName'=>'Delhi Public School',
							'fees'	=>	15000,
							'teacherCount'	=>	72,
							'establishedYear'=>1985
						)
					);
	function compareItems(){
		global $itemsArr;
		global $rule;
		$Newarray	=	array();
		if(count($itemsArr)>=2){
			for($i=0;$i<count($rule);$i++){
				$ruleName	=	$rule[$i]['name'];
				$ruleCheck	=	$rule[$i]['check'];
				if($ruleCheck){
					for($j=0;$j<count($itemsArr);$j++){
						if($j==0)
							$rule[$i]['itemIndex'] = $j;
						else{
							if($ruleCheck == 'low' && $itemsArr[$j][$ruleName] < $itemsArr[$rule[$i]['itemIndex']][$ruleName]){
								$rule[$i]['itemIndex'] = $j;
							}
							else if($ruleCheck == 'high' && $itemsArr[$j][$ruleName] > $itemsArr[$rule[$i]['itemIndex']][$ruleName]){
								$rule[$i]['itemIndex'] = $j;
							}
						}
					}
					$rule[$i]['itemIndex'] = $itemsArr[$rule[$i]['itemIndex']]['itemId'];
				}
			}
		}
		return $rule;
	}
	
	var_dump(compareItems());
?>