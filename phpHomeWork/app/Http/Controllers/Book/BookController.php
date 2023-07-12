<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\BookDestroyRequest;
use App\Http\Requests\Book\BookShowRequest;
use App\Http\Requests\Book\BookStoreRequest;
use App\Http\Requests\Book\BookUpdateRequest;
use App\Http\Resources\BookResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\JsonResponse;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        $books = [
            (object)[
                'id' => 1,
                'name' => 'Andrii',
                'author' => 'Garcia',
                'year' => 2023,
                'countPages' => 100
            ],
        ];


        return BookResource::collection($books);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(BookStoreRequest $request): BookResource
    {
        $data = $request->validated();
        $data['id'] = uniqid();

        return BookResource::make((object)$data);
    }

    /**
     * Display the specified resource.
     */
    public function show(BookShowRequest $request): JsonResponse
    {
        $data = $request->validated();
        // код для получения данных на основе $data
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookUpdateRequest $request, int $id): BookResource
    {
        $data = $request->validated();
        return BookResource::make((object)$data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookDestroyRequest $request): JsonResponse
    {
        return response()->json(['message' => 'Книгу успішно видалено.'], 200);
    }
}
