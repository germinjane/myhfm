<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2009 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// |         lanfengye <zibin_5257@163.com>
// +----------------------------------------------------------------------

class Page {
    
    // 分页栏每页显示的页数
    public $rollPage = 5;
    // 页数跳转时要带的参数
    public $parameter  ;
    // 分页URL地址
    public $url     =   '';
    // 默认列表每页显示行数
    public $listRows = 20;
    // 起始行数
    public $firstRow    ;
    // 分页总页面数
    protected $totalPages  ;
    // 总行数
    protected $totalRows  ;
    // 当前页数
    protected $nowPage    ;
    // 分页的栏的总页数
    protected $coolPages   ;
    // 分页显示定制
    protected $config  =    array(
        'header'=>'条记录',
        'prev'=>'上一页',
        'next'=>'下一页',
        'first'=>'第一页',
        'last'=>'最后一页',
        'widget'=>array(
            'UpDown'  =>true,
            'PreNext'  =>false,
            'FirstEnd'  =>true,
            'PageLink'  =>true,
            'JumpPage'  =>true,
        ),
        'theme'=>' %totalRow% %header% %nowPage%/%totalPage% 页 %first% %prePage% %upPage% %linkPage% %downPage% %nextPage% %end% %jumppage%'
    );
    // 默认分页变量名
    protected $varPage;
    /**
     * 架构函数
     * @access public
     * @param array $totalRows  总的记录数
     * @param array $listRows  每页显示记录数
     * @param array $parameter  分页跳转的参数
     */
    public function __construct($totalRows,$listRows='',$parameter='',$url='') {
        $this->totalRows    =   $totalRows;
        $this->parameter    =   $parameter;
        $this->varPage      =   C('VAR_PAGE') ? C('VAR_PAGE') : 'p' ;
        if(!empty($listRows)) {
            $this->listRows =   intval($listRows);
        }
        $this->totalPages   =   ceil($this->totalRows/$this->listRows);     //总页数
        $this->coolPages    =   ceil($this->totalPages/$this->rollPage);
        $this->nowPage      =   !empty($_GET[$this->varPage])?intval($_GET[$this->varPage]):1;
        if($this->nowPage<1){
            $this->nowPage  =   1;
        }elseif(!empty($this->totalPages) && $this->nowPage>$this->totalPages) {
            $this->nowPage  =   $this->totalPages;
        }
        $this->firstRow     =   $this->listRows*($this->nowPage-1);
		
		if(!empty($url))    $this->url  =   $url; 
    }
	
    public function setConfig($name,$value) {
        if(isset($this->config[$name])) {
            $this->config[$name]    =   $value;
        }
    }
    /**
     * 分页显示输出
     * @access public
     */
    public function show() {
        if(0 == $this->totalRows) return '';
        $p              =   $this->varPage;
        $nowCoolPage    =   ceil($this->nowPage/$this->rollPage);
        // 分析分页参数
        if($this->url){
            $depr       =   C('URL_PATHINFO_DEPR');
            $url        =   rtrim(U('/'.$this->url,'',false),$depr).$depr.'__PAGE__';
        }else{
            if($this->parameter && is_string($this->parameter)) {
                parse_str($this->parameter,$parameter);
            }elseif(empty($this->parameter)){
                unset($_GET[C('VAR_URL_PARAMS')]);
				$var =  !empty($_POST)?$_POST:$_GET;
                if(empty($var)) {
                    $parameter  =   array();
                }else{
                    $parameter  =   $var;
                }
            }
            $parameter[$p]  =   '__PAGE__';
            $url            =   U('',$parameter);
        }
        //上下翻页字符串
        if($this->config['widget']['UpDown']){
            $upRow          =   $this->nowPage-1;
            $downRow        =   $this->nowPage+1;
            if ($upRow>0){
                $upPage     =   "<a href='".str_replace('__PAGE__',$upRow,$url)."'>".$this->config['prev']."</a>";
            }else{
                $upPage     =   '';
            }
            if ($downRow <= $this->totalPages){
                $downPage   =   "<a href='".str_replace('__PAGE__',$downRow,$url)."'>".$this->config['next']."</a>";
            }else{
                $downPage   =   '';
            }
        }
        // << < > >>
        if($this->config['widget']['PreNext']){
            if($nowCoolPage == 1){
                $prePage    =   '';
            }else{
                $preRow     =   $this->nowPage-$this->rollPage;
                $prePage    =   "<a href='".str_replace('__PAGE__',$preRow,$url)."' >上".$this->rollPage."页</a>";
            }
            if($nowCoolPage == $this->coolPages){
                $nextPage   =   '';
            }else{
                $theEndRow  =   $this->totalPages;
                $nextPage   =   "<a href='".str_replace('__PAGE__',$nextRow,$url)."' >下".$this->rollPage."页</a>";
            }
        }
        if($this->config['widget']['FirstEnd']){
            if($this->nowPage == 1){
                $theFirst   =   '';
            }else{
                $theFirst   =   "<a href='".str_replace('__PAGE__',1,$url)."' >".$this->config['first']."</a>";
            }
            if($this->nowPage == $this->totalPages){
                if($this->config['widget']['FirstEnd']) $theEnd     =   '';
            }else{
                $theEndRow  =   $this->totalPages;
                $theEnd     =   "<a href='".str_replace('__PAGE__',$theEndRow,$url)."' >".$this->config['last']."</a>";
            }
        }
        
        // 1 2 3 4 5
        if($this->config['widget']['PageLink']){
            $linkPage = "";
            for($i=1;$i<=$this->rollPage;$i++){
                $page       =   ($nowCoolPage-1)*$this->rollPage+$i;
                if($page!=$this->nowPage){
                    if($page<=$this->totalPages){
                        $linkPage .= " <a href='".str_replace('__PAGE__',$page,$url)."'> ".$page." </a>";
                    }else{
                        break;
                    }
                }else{
                    if($this->totalPages != 1){
                        $linkPage .= " <b>".$page."</b>";
                    }
                }
            }
        }
        if($this->config['widget']['JumpPage']){
            $jumppage='<select onchange="var PageJumpUrl=\''.$url.'\';window.location=PageJumpUrl.replace(\'__PAGE__\',this.value);">';
            for ($j=1; $j <=$this->totalPages ; $j++) {
                $select= ($this->nowPage==$j) ? 'selected' : '';
                $jumppage.='<option value="'.$j.'" '.$select.'>'.$j.'</option>';
            }
            $jumppage.='</select>';
        }
        $pageStr     =   str_replace(
            array('%header%','%nowPage%','%totalRow%','%totalPage%','%upPage%','%downPage%','%first%','%prePage%','%linkPage%','%nextPage%','%end%','%jumppage%'),
            array($this->config['header'],$this->nowPage,$this->totalRows,$this->totalPages,$upPage,$downPage,$theFirst,$prePage,$linkPage,$nextPage,$theEnd,$jumppage),$this->config['theme']);
        return $pageStr;
    }
}
