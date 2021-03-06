<?php
/**
 * @author Antony Kalogeropoulos <anthonykalogeropoulos@gmail.com>
 * @since  10/03/16
 */

namespace App\Controllers\Api;

/**
 * Class ApiController
 *
 * @package App\Controllers\Api
 */
class ApiController
{
    /**
     * @var int
     */
    protected $statusCode = 200;

    /**
     * @param string $message
     *
     * @return mixed
     */
    public function respondUnprocessableEntity($message = 'Parameters validation failed.')
    {
        return $this->setStatusCode(422)->respondWithError($message);
    }

    /**
     * @param $message
     *
     * @return mixed
     */
    public function respondWithError($message)
    {
        return $this->respond([
            'error' => [
                'message'     => $message,
                'status_code' => $this->getStatusCode(),
            ],
        ]);
    }

    /**
     * @param array $data
     *
     * @return mixed
     */
    private function respond(array $data)
    {
        exit(json_encode($data));
    }

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param mixed $statusCode
     *
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @param string $message
     *
     * @return mixed
     */
    public function respondNotFound($message = 'Not Found.')
    {
        return $this->setStatusCode(404)->respondWithError($message);
    }

    /**
     * @param $data
     *
     * @return mixed
     *
     */
    public function respondWithSuccess($data)
    {
        return $this->respond([
            'status_code' => $this->getStatusCode(),
            'data'        => $data,
        ]);
    }

    /**
     * @param string $message
     * @return mixed
     */
    public function respondInternalServerError($message = 'Internal Server Error.')
    {
        return $this->setStatusCode(500)->respondWithError($message);
    }

}
