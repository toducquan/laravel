<?php

namespace App\Http\Responses\ResponseInterface;

interface ResponseInterface{
    public function getAll();
    public function find($id);
    public function destroy($id);
}
