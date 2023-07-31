<?php

namespace App\Servives\Books;

use App\Http\Controllers\BookUp;
use App\Repositories\Books\BookIndexDTO;
use App\Repositories\Books\BookRepository;
use App\Repositories\Books\BookStoreDTO;
use App\Repositories\Books\BookUpdateDTO;
use App\Repositories\Books\Iterator\BookIterator;
use Illuminate\Support\Collection;

class BooksService
{
    public function __construct(protected BookRepository $bookRepository)
    {
    }

    public function store(BookStoreDTO $data): BookIterator
    {
        $dataId = $this->bookRepository->store($data);
        $data = $this->bookRepository->getById($dataId);
        return $data;


    }

    public function show(int $id): BookIterator
    {
        return $this->bookRepository->getById($id);
    }

    public function update(BookUpdateDTO $data) : BookIterator
    {
        $this->bookRepository->update($data);
        return $this->bookRepository->getById($data->getId());
    }

    public function destroy(int $id): int
    {
        return $this->bookRepository->destroy($id);
    }

    public function index(BookIndexDTO $data): Collection
    {

        $query = $this->bookRepository->index($data);
        return $this->bookRepository->getByQuery($query);
    }


}
