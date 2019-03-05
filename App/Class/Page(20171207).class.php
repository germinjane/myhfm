<?php
/**
 * 分页类
 *
 * @date 2013-6-14
 * @author zhudaijin
 */

	class Page {
		private $total; //数据表中总记录数
		private $listRows; //每页显示行数
		private $limit;
		private $uri;
		private $pageNum; //页数
		private $config=array('header'=>"个记录", "prev"=>"上一页", "next"=>"下一页", "first"=>"第一页", "last"=>"最后页");
		private $listNum=8;
		private $type;

		/**
		 * 构造函数
		 * 
		 */
		public function __construct($total, $listRows=5, $pa='', $type=1){
			$this->total=$total;
			$this->listRows=$listRows;
			$this->uri=$pa;
			$this->pageNum=ceil($this->total/$this->listRows);
			$this->page=!empty($_REQUEST['page']) ? max(1,min($_REQUEST["page"],$this->pageNum)) : 1;
			$this->limit=$this->setLimit();
			$this->type =$type;
		}

		/**
		 * 设置limit
		 */
		private function setLimit(){
			return ($this->page-1)*$this->listRows.','.$this->listRows;
		}

		/**
		 * 魔术方法（允许外部获取$limit）
		 */
		public function __get($args){
			if($args=="limit" || $args=="page")
				return $this->$args;
			else
				return null;
		}

		/**
		 * 开始页
		 */
		private function start(){
			if($this->total==0)
				return 0;
			else
				return ($this->page-1)*$this->listRows+1;
		}

		/**
		 * 结束页
		 */
		private function end(){
			return min($this->page*$this->listRows,$this->total);
		}

		/**
		 * 首页
		 */
		private function first(){
			if($this->type){
				$html='<a href="javascript:;" p_id="1" class="pre">'.$this->config['first'].'</a>';
			}else{
				if($this->page==1)
					$html='';
				else
					$html='<a href="'.$this->uri.'page/1.html">'.$this->config['first'].'</a>';
			}
			return $html;
		}

		/**
		 * 上一页
		 */
		private function prev(){
			$page = ($this->page == 1)?1:$this->page-1;
			if($this->type){
				$html = '<li id="example1_previous" class="paginate_button previous disabled"><a class="prev" data-p="'.$page.'" href="javascript:void(0)">上一页</a></li>';
			}else{
				$html = '<a href="'.$this->uri.'page/'.$page.'.html" class="pre">'.$this->config['prev'].'</a>';
			}
			return $html;			
		}

		/**
		 * 页码
		 */
		private function pageList(){
			$linkPage='';
			$inum=floor($this->listNum/2);
			for($i=$inum; $i>=1; $i--){
				$page=$this->page-$i;
				if($page<1) continue;
				if($this->type){
					$linkPage .= '<li class="paginate_button"><a class="num" data-p="'.$page.'" href="javascript:void(0)">'.$page.'</a></li>';					
				}else{
					$linkPage.='<a href="'.$this->uri.'page/'.$page.'.html">'.$page.'</a>';
				}
			}
		
			$linkPage .= '<li class="paginate_button active"><a tabindex="0" data-dt-idx="1" aria-controls="example1" data-p="'.$this->page.'" href="javascript:void(0)">'.$this->page.'</a></li>';

			for($i=1; $i<=$inum; $i++){
				$page=$this->page+$i;
				if($page>$this->pageNum) break;	
				if($this->type){
					$linkPage .= '<li class="paginate_button"><a class="num" data-p="'.$page.'" href="javascript:void(0)">'.$page.'</a></li>';					
				}else{
					$linkPage.='<a href="'.$this->uri.'page/'.$page.'.html">'.$page.'</a>';
				}
			}
			return $linkPage;
		}

		/**
		 * 下一页
		 */
		private function next(){
			$page = ($this->page==$this->pageNum)?$this->page:$this->page+1;
			if($this->type){
				$html = '<li id="example1_next" class="paginate_button next"><a class="next" data-p="'.$page.'" href="javascript:void(0)">下一页</a></li>';
			}else{
				$html = '<a href="'.$this->uri.'page/'.$page.'.html" class="pre">'.$this->config['next'].'</a>';
			}
			return $html;
		}

		/**
		 * 尾页
		 */
		private function last(){
			if($this->type){
				$html='<a href="javascript:;" p_id="'.$this->pageNum.'" class="next">'.$this->config['last'].'</a>';
			}else{
				if($this->page==$this->pageNum)
					$html='';
				else
					$html='<a href="'.$this->uri.'page/'.$this->pageNum.'".html>'.$this->config['last'].'</a>';
			}
			return $html;
		}

		/**
		 * 输出分页
		 */
		public function fpage($display=array(0,1,2,3,4,5,6,7,8)){
			//$html[0]="&nbsp;&nbsp;共有<b>{$this->total}</b>{$this->config["header"]}&nbsp;&nbsp;";
			//$html[1]="&nbsp;&nbsp;每页显示<b>".($this->end()-$this->start()+1)."</b>条，本页<b>{$this->start()}-{$this->end()}</b>条&nbsp;&nbsp;";
			//$html[2]="&nbsp;&nbsp;<b>{$this->page}/{$this->pageNum}</b>页&nbsp;&nbsp;";
			
			//$html[3]=$this->first();
			$html[4]=$this->prev();
			$html[5]=$this->pageList();
			$html[6]=$this->next();
			//$html[7]=$this->last();
			//$html[8]=$this->goPage();
			$fpage='';
			foreach($display as $index){
				$fpage.=$html[$index];
			}
			return $fpage;
		}

	}
