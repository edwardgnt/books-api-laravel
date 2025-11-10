<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Book;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BooksService
{
    // List books with pagination
    public function list(int $perPage = 15): LengthAwarePaginator
    {
        return Book::orderByDesc('id')->paginate($perPage);
    }

    public function create(array $data): Book
    {
        $data['is_archived'] = $data['is_archived'] ?? false;

        return Book::create($data);
    }

    public function update(Book $book, array $data): Book
    {
        $book->update($data);
        return $book;
    }

    public function delete(Book $book): void
    {
        $book->delete();
    }
}
