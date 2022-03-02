<?php

namespace App\Contracts;

interface DispatcherContract
{
    public function create($dispatcher);
    public function getByUserId($id);
}
