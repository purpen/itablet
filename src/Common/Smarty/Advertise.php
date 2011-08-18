<?php
/**
 * Smarty Advertise Plugin
 * 
 * @author purpen
 * @version $Id$
 */
class Common_Smarty_Advertise extends Anole_Object {
	
	/**
	 * 获取多条广告记录
	 * 
	 * @param array $params
	 * @param string $content
	 * @param Anole_Util_Smarty_Base $smarty
	 * @param bool $repeat
	 * @return string
	 */
	public static function smarty_block_findAdmany($params,$content,$smarty,&$repeat){
		$var='advertises';
		$item='ad';
		$number=null; //广告编号
		$size=1;
		$page=1;
		
		extract($params,EXTR_IF_EXISTS);
		
		if(empty($number)){
			self::warn("find advertise 's number is null!", __METHOD__);
			return false;
		}
		static $_index;
		if(is_null($content)){
			$advertise = new Common_Model_Advertise();
			$options = array(
			    'condition'=>'number=? AND state=?',
			    'vars'=>array($number,Common_Model_Advertise::CHECKED_STATE),
			    'pagg'=>$page,
			    'size'=>$size,
			    'order'=>'updated_on DESC'
			);
			$advertises = $advertise->find($options)->getResultArray();
			
			$asset = new Common_Model_Asset();
			$advertise_list = array();
			$adoptions = array(
	           'condition'=>'parent_id=? AND parent_type=?',
	           'order'=>'created_on DESC'
	        );
			if(count($advertises) > 0){
				foreach ($advertises as $ads){
					$id = $ads['id'];
					
					$adoptions['vars'] = array($id, Common_Model_Constant::ADVERTISE);
					$asset->findFirst($adoptions);
					if($asset->count()){
						$ads['thumb'] = $asset['asset_url'];
					}
					
					$advertise_list[] = $ads;
				}
			}
			unset($asset);
			unset($advertise);
			
			$smarty->assign($var, $advertise_list);
			
			$_index = 0;
		}
		
		$advertise_list = $smarty->get_template_vars($var);
		if(!empty($advertise_list[$_index])){
			$smarty->assign($item,$advertise_list[$_index]);
			$_index++;
			$repeat=true;
			if($_index == 1){
				$first = true;
			}else{
				$first = false;
			}
			if($_index == count($advertise_list)){
				$last = true;
			}else{
				$last = false;
			}
			$smarty->assign('first', $first);
			$smarty->assign('last', $last);
			$smarty->assign('loop',$_index);
		}else{
			$repeat=false;
			$smarty->assign($item,null);
		}
		
		return $content;
	}
	
    /**
     * 获取广告图
     * 
     * @param array $params
     * @param Anole_Util_Smarty_Base $smarty
     * @return string
     */
    public static function smarty_function_findAdone($params,&$smarty){
        $var='advertise';
		$type='image';
        $number=null;
        
        extract($params,EXTR_IF_EXISTS);
        
        if(empty($number)){
            self::warn("find advertise 's number is null!", __METHOD__);
            return false;
        }
        
        $advertise = new Common_Model_Advertise();
        $options = array(
            'condition'=>'number=? AND state=?',
            'vars'=>array($number, Common_Model_Advertise::CHECKED_STATE)
        );
        $data = $advertise->findFirst($options)->getResultArray();
        if(count($data) <= 0){
        	$smarty->assign($var, null);
        	return false;
        }
		if($type == 'image'){
			$id = $data['id'];
	        $asset = new Common_Model_Asset();
	        $adoptions = array(
	            'condition'=>'parent_id=? AND parent_type=?',
	            'vars'=>array($id,Common_Model_Constant::ADVERTISE),
	            'order'=>'created_on DESC'
	        );
	        $asset->findFirst($adoptions);
	        if($asset->count()){
	            $data['thumb'] = $asset['asset_url'];
	        }
	        unset($asset);
		}elseif($type == 'text'){
			$data['words'] = explode('|',$data['body']);
		}
        
        unset($advertise);
        
        if(!empty($var)){
            $smarty->assign($var,$data);
        }else{
            return $data;
        }
    }
}
/**vim:sw=4 et ts=4 **/
?>