<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookDestroyRequest;
use App\Http\Requests\BookIndexRequest;
use App\Http\Requests\BookShowRequest;
use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Http\Resources\BookResource;
use App\Repositories\BookIndexDTO;
use App\Repositories\BookStoreDTO;
use App\Repositories\BookUpdateDTO;
use App\Services\BookService;
use Illuminate\Http\JsonResponse;


use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(
        protected BookService $bookService
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(BookIndexRequest $request): JsonResponse
    {
        $dto = new BookIndexDTO(...$request->validated());
        $service = $this->bookService->index($dto);
        $resource = BookResource::collection($service);

        return $resource->response()->setStatusCode(200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookStoreRequest $request): JsonResponse
    {
        $dto = new BookStoreDTO(...$request->validated());
        $service = $this->bookService->store($dto);
        $resource = BookResource::make($service);

        return $resource->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id) //: JsonResponse
    {

        $service = $this->bookService->show($id);
        $resource = BookResource::make($service);
        return $resource->response()->setStatusCode(200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookUpdateRequest $request, int $id)
    {
        $dtoData = $request->validated();
        $dtoData['id'] = $id;

        $dto = new BookUpdateDTO(
            $dtoData['id'],
            $dtoData['name'],
            $dtoData['year'],
            $dtoData['lang'],
            $dtoData['pages']
        );

        $service = $this->bookService->update($dto);
        $resource = BookResource::make($service);

        return $resource->response()->setStatusCode(201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(  int $id)
    {

        $this->bookService->destroy($id); // Передаем только значение 'id' в метод destroy() сервиса.

        return response()->noContent();
    }

}
