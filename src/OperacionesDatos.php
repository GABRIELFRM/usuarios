<?php

namespace App;

use LionDatabase\Drivers\MySQL\MySQL as DB;

class OperacionesDatos
{
    public function insertarDatos($datos)
    {
        return DB::table('users')->insert($datos)->execute();
    }

    public function obtenerDatos()
    {
        return DB::table('users')->select()->getAll();
    }

    public function actualizarDatos($id, $nuevosDatos): object
    {
        return DB::table('users')
            ->update($nuevosDatos)
            ->where(DB::equalTo('id_user'), $id)
            ->execute();
    }

    public function getLastOperationResult(): array|object
    {
        return DB::table('users')->select()->getAll();
    }

    public function delete($id): object
    {
        return DB::table('users')
            ->delete()
            ->where(DB::equalTo('id_user'), $id)
            ->execute();
    }
}
