<?php
namespace App\Http\Responses;

use App\Http\Responses\ResponseInterface\ResponseInterface;

abstract class BaseResponse implements ResponseInterface {

    private $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract function getModel();

    public function setModel(){
        $this->model = app()->make(
            $this->getModel()
        );
    }

    public function getAll()
    {
        return $this->model::all();
    }

    public function find($id)
    {
        return $this->model::findOrFail($id);
    }

    public function destroy($id)
    {
        $result = $this->model::findOrFail($id);
        $result->delete();
    }

}
