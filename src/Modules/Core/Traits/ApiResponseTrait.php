<?php

namespace Modules\Core\Traits;

trait ApiResponseTrait
{
    /**
     * Add success message to the response
     *
     * @param string $message
     * @return $this
     */
    public function withSuccessMessage(string $message = 'Operation successful')
    {
        return $this->additional([
            'message' => $message,
            'status' => 'success',
        ]);
    }

    /**
     * Add error message to the response
     *
     * @param string $message
     * @return $this
     */
    public function withErrorMessage(string $message = 'Operation failed')
    {
        return $this->additional([
            'message' => $message,
            'status' => 'error',
        ]);
    }
}