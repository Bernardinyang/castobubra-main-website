<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Illuminate\Http\Request;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $e
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $e)
    {
        // Handle PostTooLargeException with a user-friendly message
        if ($e instanceof PostTooLargeException) {
            if ($request->expectsJson()) {
                return response()->json([
                    'status_type' => 'danger',
                    'status_message' => 'The total size of uploaded files is too large. Please ensure all files combined are less than 30MB, and individual files do not exceed their limits (5MB for documents, 2MB for passport photo).'
                ], 413);
            }

            return redirect()->back()->with([
                'status_type' => 'danger',
                'status_message' => 'The total size of uploaded files is too large. Please ensure all files combined are less than 30MB, and individual files do not exceed their limits (5MB for documents, 2MB for passport photo).'
            ]);
        }

        return parent::render($request, $e);
    }
}
