<?php

class Pagination implements PaginationInterface
{
  protected $paginator;

  public function __construct(Paginator $paginator)
  {
    $this->paginator = $paginator;
  }

  public function elements()
  {
    return $this->paginator->items;
  }

  public function currentPage()
  {
    return $this->paginator->current_page;
  } 

  public function pages()
  {
    return $this->paginator->total_pages;
  }

  public function totalElements()
  {
    return count($this->paginator->elements);
  }

  public function totalElementsOnCurrentPage()
  {
    return count($this->paginator->items);
  }

  public function totalElementsPerPage()
  {
    return $this->paginator->per_page;
  }
}