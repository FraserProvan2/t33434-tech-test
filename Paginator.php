<?php

require_once 'Types/PaginationInterface.php'; 
require_once 'Entities/Pagination.php'; 

class Paginator
{
  public $elements = [];
  public $per_page;
  public $total_pages;
  public $current_page;
  public $items = [];
  
  public function __construct($elements, int $per_page)
  {
    $this->elements = $elements; // sadly need reference to this
    $this->per_page = $per_page;
    $this->total_pages = ceil(count($this->elements) / $this->per_page);
  }

  public function paginate(int $page_num)
  {
    if ($page_num < 1) throw new Exception('Invalid page number');

    $this->current_page = $page_num;
    $this->setItems();

    return new Pagination($this);
  }
  
  protected function setItems()
  {
    $startpos = ($this->current_page * $this->per_page) - $this->per_page;
    $this->items = array_slice((array) $this->elements, $startpos, $this->per_page);
  }
}
