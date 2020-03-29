<?php

require_once 'Paginator.php';
require_once 'Entities/Pagination.php';

use PHPUnit\Framework\TestCase;

class PaginationTest extends TestCase
{
  /** @test */
  public function result_of_paginate_is_instance_of_pagination()
  {
    $input = ['alpha', 'beta', 'delta', 'gamma']; 
    $paginator = new Paginator($input, 2);
    $pagination = $paginator->paginate(1);

    $this->assertInstanceOf('Pagination', $pagination);
  }

  /** @test */
  public function pagination_values_are_as_expected()
  {
    $input = ['alpha', 'beta', 'delta', 'gamma']; 
    $paginator = new Paginator($input, 2);
    
    $page1 = $paginator->paginate(1)->elements();
    $this->assertEquals('alpha', $page1[0]);
    $this->assertEquals('beta', $page1[1]);
    
    $page2 = $paginator->paginate(2)->elements();
    $this->assertEquals('delta', $page2[0]);
    $this->assertEquals('gamma', $page2[1]);

    $page3 = $paginator->paginate(3)->elements();
    $this->assertEmpty($page3);
  }

  /** @test */
  public function elements_method_returns_items()
  {
    $input = ['alpha', 'beta', 'delta', 'gamma']; 
    $paginator = new Paginator($input, 2);
    $elements = $paginator->paginate(1)->elements();

    $this->assertCount(2, $elements);
  }

  /** @test */
  public function currentPage_method_returns_current_page()
  {
    $input = ['alpha', 'beta', 'delta', 'gamma']; 
    $paginator = new Paginator($input, 2);
    $current_page = $paginator->paginate(2)->currentPage();

    $this->assertEquals(2, $current_page);
  }

  /** @test */
  public function pages_method_returns_total_pages()
  {
    $input = ['alpha', 'beta', 'delta', 'gamma']; 
    $paginator = new Paginator($input, 2);
    $total_pages = $paginator->paginate(1)->pages();

    $this->assertEquals(2, $total_pages);
  }

  /** @test */
  public function totalElements_method_returns_total_elements()
  {
    $input = ['alpha', 'beta', 'delta', 'gamma']; 
    $paginator = new Paginator($input, 2);
    $total_elements = $paginator->paginate(1)->totalElements();

    $this->assertEquals(4, $total_elements);
  }

  /** @test */
  public function totalElementsOnCurrentPage_method_returns_total_elements_on_current_page()
  {
    $input = ['alpha', 'beta', 'delta', 'gamma']; 
    $paginator = new Paginator($input, 3);
    $total_elements_on_page = $paginator->paginate(2)->totalElementsOnCurrentPage();

    $this->assertEquals(1, $total_elements_on_page);
  }

  /** @test */
  public function totalElementsPerPage_method_returns_total_elements_per_page()
  {
    $input = ['alpha', 'beta', 'delta', 'gamma']; 
    $paginator = new Paginator($input, 2);
    $total_elements_per_page = $paginator->paginate(1)->totalElementsPerPage();

    $this->assertEquals(2, $total_elements_per_page);
  }
}
