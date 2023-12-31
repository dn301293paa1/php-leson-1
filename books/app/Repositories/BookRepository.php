<?php

namespace App\Repositories;


use App\Repositories\BookIndexDTO;
use App\Repositories\BookIterator;
use App\Repositories\BookStoreDTO;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class BookRepository
{
    public function index(BookIndexDTO $data): Collection
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

    public function store(BookStoreDTO $data): int
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

    public function destroy(int $id): int
    {
        return DB::table('books')->where('id', '=', $id)->delete();
    }


    public function getByQuery(Collection $query): Collection
    {
        return $query->map(function ($item) {
            return new BookIterator($item);
        });
    }

    public function getById(int $id): \App\Repositories\BookIterator
    {
        return new BookIterator(
            DB::table('books')
                ->where('id', '=', $id)
                ->first()
        );
    }


}
