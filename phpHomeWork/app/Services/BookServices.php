<?php

namespace App\Services;

use App\Repositories\Book\BookRepository;
use App\Repositories\Book\BookStoreDTO;

class BookServices
{
  public function __construct(protected BookRepository $bookRepository)
  {
  }


  public function store(BookStoreDTO $data){
      $bookId = $this->bookRepository->store($data);
  }
}
