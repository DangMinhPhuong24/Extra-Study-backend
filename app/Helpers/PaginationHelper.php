<?php

namespace App\Helpers;

class PaginationHelper
{
    public static function formatPaginationData($index, &$data)
    {
        if ($index->lastPage() > 1) {
            $data['total_records'] = $index->total();
            $data['total_pages'] = $index->lastPage();
            $data['current_page'] = $index->currentPage();
        }
    }
}
