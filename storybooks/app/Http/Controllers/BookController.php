<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Http\Resources\BooksResource;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\BookDestroyRequest;
use App\Http\Requests\BookIndexRequest;
use App\Http\Requests\BookShowRequest;
use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Repositories\Books\BookIndexDTO;
use App\Repositories\Books\BookStoreDTO;
use App\Repositories\Books\BookUpdateDTO;
use App\Repositories\Books\Iterator\BookIterator;
use App\Servives\Books\BooksService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function __construct(protected BooksService $booksService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(BookIndexRequest $request): JsonResponse
    {
        $dto = new BookIndexDTO(...$request->validated());
        $service = $this->booksService->index($dto);
        $resource = BooksResource::collection($service);
        return $resource->response()->setStatusCode(200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookStoreRequest $request): JsonResponse
    {
        $validatedData = $request->validated();
        $dto = new BookStoreDTO(...$validatedData);
        $service = $this->booksService->store($dto);
        $resource = BooksResource::make($service);

        return $resource->response()->setStatusCode(201);

    }

    /**
     * Display the specified resource.
     */
    public function show(BookShowRequest $request): JsonResponse
    {
        $validatedData = $request->validated();
        $service = $this->booksService->show($validatedData['id']);
        $resource = BooksResource::make($service);

        return $resource->response()->setStatusCode(200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookUpdateRequest $request)
    {
        $dto = new BookUpdateDTO(... $request->validated());
        $service = $this->booksService->update($dto);
        $resource = BooksResource::make($service);

        return $resource->response()->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookDestroyRequest $request)
    {
        $validatedData = $request->validated();
        $service = $this->booksService->destroy($validatedData['id']);
        return response()->noContent();

    }
}
