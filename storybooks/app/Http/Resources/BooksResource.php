<?php

namespace App\Http\Resources;

use App\Repositories\Books\Iterator\BookIterator;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BooksResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var BookIterator $resource */
        $resource = $this->resource;

        return [
            'id'    => $resource->getId(),
            'name'  => $resource->getName(),
            'year'  => $resource->getYear(),
            'lang'  => $resource->getLang(),
            'pages' => $resource->getPages(),
        ];
    }
}
