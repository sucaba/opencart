<?php class clearSEO extends Controller { private $ssb_data;function __construct(){ global $registry;parent::__construct($registry);require_once DIR_CONFIG.'ssb_library/ssb_data.php';$this->ssb_data=ssb_data::getInstance();} static private $Instance =NULL;static public function getInstance() { if(self::$Instance==NULL){ $class=__CLASS__;self::$Instance=new $class;} return self::$Instance;} public function clear($entityData){ $time_start=microtime(true);$count=0;$param=array($entityData['category']['name'],$entityData['entity']['name']);$MD_EntityInDB=$this->ssb_data->getMatadata('EntitiesInDB',$param);foreach($MD_EntityInDB as $category=> $val){ if(!isset($val['clear']) OR !is_array($val['clear']))continue;if($val['clear']['column']=='all'){ $sql="DELETE FROM ".DB_PREFIX.$val['table'];}else{ $sql="UPDATE ".DB_PREFIX.$val['table']." SET ";if(strpos($val['clear']['column'],',') !==false){ $columns=explode(',',$val['clear']['column']);foreach($columns as $column){ if(strpos($column,'=') !==false){ $sql.=$column.',';}else{ $sql.=$column." = '',";} } $sql=substr($sql,0,-1).' ';}else{ $sql.=$val['clear']['column']." = ''";} } if($val['clear']['condition']){ $sql.="  WHERE ".$val['clear']['condition'];} if($entityData['entity']['name']=='CPBI_urls' AND $entityData['internal_entity']['name']){ $internal_entity=$entityData['internal_entity']['name'];if($internal_entity=='info'){ $internal_entity='information';}elseif($internal_entity=='brand'){ $internal_entity='manufacturer';} if($val['clear']['condition']){ $sql.=" AND query LIKE '" . $internal_entity . "_id=%'";}else{ $sql.=" WHERE query LIKE '" . $internal_entity . "_id=%'";} } $do_clear=$this->db->query($sql);$count+=$this->db->countAffected();} $time_end=microtime(true);$time=$time_end-$time_start;return array('total_time'=> $time,'total_count'=> $count);} } ?>
