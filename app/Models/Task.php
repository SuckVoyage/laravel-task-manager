<?php

namespace App\Models;

use App\Status;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    private function __construct(
        public private(set) int $id,
        public private(set) string $title,
        public private(set) ?string $description,
        public private(set) int $createdAt,
        public private(set) int $due,
        public private(set) Status $status
    )
    {
    }

    public static function create(
        int $id,
        string $title,
        int $due,
        ?string $description = null,
        ?Status $status = null
    ) : self {
        return new self($id, $title, $description, time(), $due, $status === null ? Status::NOT_STARTED : $status);
    }
}
