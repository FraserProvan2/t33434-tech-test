<?php

require_once 'Paginator.php';

use PHPUnit\Framework\TestCase;

class PaginatorTest extends TestCase
{
  /** @test */
  public function array_can_create_paginator()
  {
    $input = ['alpha', 'beta', 'delta', 'gamma']; 
    $paginator = new Paginator($input, 2);

    $this->assertCount(2, $paginator->paginate(1)->elements());
  }

  /** @test */
  public function object_can_create_paginator()
  {
    $input = new \ArrayObject(['alpha', 'beta', 'delta', 'gamma']); 
    $paginator = new Paginator($input, 2);

    $this->assertCount(2, $paginator->paginate(1)->elements());
  }

  /** @test */
  public function catch_when_invalid_page_number_is_paginated()
  {
    $input = ['alpha', 'beta', 'delta', 'gamma'];
    $paginator = new Paginator($input, 2);

    $this->expectException(Exception::class);
    $this->expectExceptionMessage('Invalid page number');
    $paginator->paginate(0)->elements();
  }
}
