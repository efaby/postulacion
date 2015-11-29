<?php


class paginator {

	/**
	 * @var int current displayed page
	 */
	protected $currentPage;
	
	/**
	 * @var int items limit (items per page)
	 */
	protected $limit;
	
	/**
	 * @var int total number of pages
	 */
	protected $numPages;
	
	/**
	 * @var int items limit (items per page)
	 */
	protected $itemsCount;
	
	/**
	 * @var int offset
	 */
	protected $offset;
	
	/**
	 * @var int pages to show at left and right of current page
	 */
	protected $midRange;
	
	/**
	 * @var array range
	 */
	protected $range;
	/**
	 * @var string form_name Nombre del formulario
	 */
	protected $form_name;
	
	/**
	 * @param int $itemsCount
	 * @param int $currentPage
	 * @param int $limit
	 * @param int $midRange
	 */
	function __construct($form_name, $itemsCount, $currentPage = 1, $limit = 20, $midRange = 4)
	{
		//set total items count from controller
		$this->itemsCount = $itemsCount;
		$this->currentPage = $currentPage;
		$this->limit = $limit;
		$this->midRange= $midRange;
		$this->form_name = $form_name;
	
		//Set defaults
		$this->setDefaults();
	
		//Calculate number of pages total
		$this->getInternalNumPages();
	
		//Calculate first shown item on current page
		$this->calculateOffset();
		$this->calculateRange();
	}
	
	private function calculateRange()
	{
		$startRange = $this->currentPage - floor($this->midRange/2);
		$endRange = $this->currentPage + floor($this->midRange/2);
	
		if($startRange <= 0)
		{
			$endRange += abs($startRange)+1;
			$startRange = 1;
		}
	
		if($endRange > $this->numPages)
		{
			$startRange -= $endRange-$this->numPages;
			$endRange = $this->numPages;
		}
	
		$this->range = range($startRange, $endRange);
	}
	
	private function setDefaults()
	{
		//If currentPage is set to null or is set to 0 or less
		//set it to default (1)
		if ($this->currentPage == null || $this->currentPage < 1)
		{
			$this->currentPage = 1;
		}
		//if limit is set to null set it to default (20)
		if ($this->limit == null)
		{
			$this->limit = 20;
			//if limit is any number less than 1 then set it to 0 for displaying
			//items without limit
		}
		else if ($this->limit < 1)
		{
			$this->limit = 0;
		}
	}
	
	private function getInternalNumPages()
	{
		//If limit is set to 0 or set to number bigger then total items count
		//display all in one page
		if ($this->limit < 1 || $this->limit > $this->itemsCount)
		{
			$this->numPages = 1;
		}
		else
		{
			//Calculate rest numbers from dividing operation so we can add one
			//more page for this items
			$restItemsNum = $this->itemsCount % $this->limit;
			//if rest items > 0 then add one more page else just divide items
			//by limit
			$this->numPages = $restItemsNum > 0 ? intval($this->itemsCount / $this->limit) + 1 : intval($this->itemsCount / $this->limit);
		}
	}
	
	private function calculateOffset()
	{
		//Calculet offset for items based on current page number
		$this->offset = ($this->currentPage - 1) * $this->limit;
	}
	
	/**
	 * @return int number of pages
	 */
	public function getNumPages()
	{
		return $this->numPages;
	}
	
	/**
	 * @return int current page
	 */
	public function getCurrentPage()
	{
		return $this->currentPage;
	}
	
	/**
	 * @return string current url
	 */
	public function getCurrentUrl()
	{
		return $this->currentUrl;
	}
	
	/**
	 * @return int limit items per page
	 */
	public function getLimit()
	{
		return $this->limit;
	}
	
	/**
	 * @return int offset
	 */
	public function getOffset()
	{
		return $this->offset;
	}
	
	/**
	 * @return array range
	 */
	public function getRange()
	{
		return $this->range;
	}
	
	/**
	 * @return int mid range
	 */
	public function getMidRange()
	{
		return $this->midRange;
	}
	
	/**
	 * @return int ItemsCount
	 */
	public function getItemsCount()
	{
		return $this->itemsCount;
	}
	/**
	 * @return String Form_name
	 */
	public function getForm_name()
	{
		return $this->form_name;
	}
	
	public function viewPaginator()
	{ 
		echo '<script type="text/javascript">
		function submit_form(formName, page)
		{
			var forms = document.getElementById(formName);
			var offset = document.getElementById(formName+"_offset");
			offset.value = page;
			forms.submit();
		}
		</script>
		<div class="paginator">';
		if ($this->currentPage != 1)
		{
			echo'<span> <a class="previous" style="color: #AFB9CB" href="javascript:submit_form(\''.$this->form_name.'\','.($this->currentPage-1).')">Anterior</a></span>';
		}
		for ($i= 1; $i <= $this->numPages; $i++)
		{
			if(in_array($i,$this->range))
			{
				if ($i == $this->currentPage)
				{
					echo '<span class="select-page">'.$i.'</span>';
				} else {
					echo '<span> <a class="number_next" style="color: #AFB9CB" href="javascript:submit_form(\''.$this->form_name.'\','.$i.')">'.$i.'</a></span>';
				}
			}
		}
		if (($this->currentPage * $this->limit) < $this->itemsCount)
		{
			echo '<span>  <a class="next" style="color: #AFB9CB" href="javascript:submit_form(\''.$this->form_name.'\','.($this->currentPage+1).')">Siguiente</a></span>';
		}
		echo'</div>';
	}
}