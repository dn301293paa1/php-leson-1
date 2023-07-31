<?php

namespace App\Repositories\Books;

use App\Repositories\Books\Iterator\BookIterator;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class BookRepository
{

    public function store(BookStoreDTO $data)
    {

        return DB::table('books')->insertGetId([
            'name' => $data->getName(),
            'year' => $data->getYear(),
            'lang' => $data->getLang(),
            'pages' => $data->getPages(),
            'created_at' => Carbon::now()->timezone('Europe/Kyiv'),
        ]);
    }

    public function update(BookUpdateDTO $data): int
    {
        DB::table('books')
            ->where('id', '=', $data->getId())
            ->update([
                'name' => $data->getName(),
                'year' => $data->getYear(),
                'lang' => $data->getLang(),
                'pages' => $data->getPages(),
                'updated_at' => Carbon::now()->timezone('Europe/Kyiv'),
            ]);
        return $data->getId();

    }

    function index(BookIndexDTO $data): Collection
    {
        $query = DB::table('books')
            ->whereBetween('created_at', [
                $data->getStartDate(),
                $data->getEndDate()
            ]);

        if (is_null($data->getYear()) === false) {
            $query->where('year', '=', $data->getYear());
        }

        if (is_null($data->getLang()) === false) {
            $query->where('lang', '=', $data->getLang());
        }

        return $query->get();
    }


    public function getById(int $id): BookIterator
    {
        return new BookIterator(
            DB::table('books')
                ->where('id', '=', $id)
                ->first()
        );
    }

    public function getByQuery(Collection $query): Collection
    {
        return $query->map(function ($query) {
            return new BookIterator($query);
        });
    }

    public function destroy($id): int
    {
        return DB::table('books')->where('id', '=', $id)->delete();
    }


}
