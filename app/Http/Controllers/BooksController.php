<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Book;
use App\Services\BooksService;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\BookResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class BooksController extends Controller
{
    function __construct(private readonly BooksService $books) {}

    public function index(Request $request): JsonResponse
    {
        $perPage = (int)$request->integer('per_page', 15);
        $perPage = max(1, min($perPage, 100));

        $page = $this->books->list($perPage);

        return response()->json([
            'data' => BookResource::collection($page),
            'links' => [
                'first' => $page->url(1),
                'last' => $page->url($page->lastPage()),
                'prev' => $page->previousPageUrl(),
                'next' => $page->nextPageUrl(),
            ],
            'meta' => [
                'current_page' => $page->currentPage(),
                'per_page' => $page->perPage(),
                'total' => $page->total(),
                'last_page' => $page->lastPage(),
            ],
        ]);
    }

    // POST /api/books
    public function store(StoreBookRequest $request): JsonResponse
    {
        $book = $this->books->create($request->validated());

        return (new BookResource($book))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    // GET /api/books/{book}
    public function show(Book $book): JsonResponse
    {
        return response()->json(new BookResource($book));
    }

    // PUT /api/books/{book}
    public function update(UpdateBookRequest $request, Book $book): JsonResponse
    {
        $updated = $this->books->update($book, $request->validated());
        return response()->json(new BookResource($updated));
    }

    // DELETE /api/books/{book}
    public function destroy(Book $book): JsonResponse
    {
        $this->books->delete($book);
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
