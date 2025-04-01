<?php

namespace App\Http\Controllers;

use Response;

class AppBaseController extends Controller
{
    public function sentResponseIndex($status, $message, $totalRecords, $totalPages, $currentPage, $data = [])
    {
        if ($totalRecords) {
            return Response::json([
                'status_code' => $status,
                'message' => $message,
                'total_records' => $totalRecords,
                'total_pages' => $totalPages,
                'current_page' => $currentPage,
                'data' => $data,
            ],$status);
        } else {
            return Response::json([
                'status_code' => $status,
                'message' => $message,
                'data' => $data,
            ],$status);
        }
    }

    public function sentResponse($status, $message, $data = [])
    {
        if ($data) {
            return Response::json([
                'status_code' => $status,
                'message' => $message,
                'data' => $data,
            ],$status);
        } else {
            return Response::json([
                'status_code' => $status,
                'message' => $message,
            ],$status);
        }
    }

    public function sentResponseToken($status, $message, $errorToken)
    {
        return Response::json([
            'status_code' => $status,
            'message' => $message,
            'error_token' => $errorToken,
        ],$status);
    }
}
