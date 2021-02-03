<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('personas')->insert(
            [
                'id' => '777',
                'ci' => '6263473',
                'nombre' => 'Gerson',
                'apellidoP' => 'Oliva',
                'apellidoM' => 'Rojas',
                'direccion' => 'Sevilla los jardines',
                'telefono' => '77884965',
                'fechaNacimiento' => '02/03/1998',
                'fechaRegistro' => '01/02/2021',
                'tipo' => 'empleado',
                'sancion'=> 'inactivo',
                'estado'=>'activo'
            ]
        );
        DB::table('personas')->insert(
            [
                'ci' => '6263473',
                'nombre' => 'Gerson',
                'apellidoP' => 'Oliva',
                'apellidoM' => 'Rojas',
                'direccion' => 'Sevilla los jardines',
                'telefono' => '77884965',
                'fechaNacimiento' => '02/03/1998',
                'fechaRegistro' => '01/02/2021',
                'tipo' => 'empleado',
                'sancion'=> 'inactivo',
                'estado'=>'activo'
            ]
        );
        DB::table('personas')->insert(
            [
                'ci' => '6263473',
                'nombre' => 'Gerson',
                'apellidoP' => 'Oliva',
                'apellidoM' => 'Rojas',
                'direccion' => 'Sevilla los jardines',
                'telefono' => '77884965',
                'fechaNacimiento' => '02/03/1998',
                'fechaRegistro' => '01/02/2021',
                'tipo' => 'empleado',
                'sancion'=> 'inactivo',
                'estado'=>'activo'
            ]
        );
        DB::table('personas')->insert(
            [                
                'ci' => '6263473',
                'nombre' => 'Gerson',
                'apellidoP' => 'Oliva',
                'apellidoM' => 'Rojas',
                'direccion' => 'Sevilla los jardines',
                'telefono' => '77884965',
                'fechaNacimiento' => '02/03/1998',
                'fechaRegistro' => '01/02/2021',
                'tipo' => 'empleado',
                'sancion'=> 'inactivo',
                'estado'=>'activo'
            ]
        );
        DB::table('personas')->insert(
            [                
                'ci' => '6263473',
                'nombre' => 'Gerson',
                'apellidoP' => 'Oliva',
                'apellidoM' => 'Rojas',
                'direccion' => 'Sevilla los jardines',
                'telefono' => '77884965',
                'fechaNacimiento' => '02/03/1998',
                'fechaRegistro' => '01/02/2021',
                'tipo' => 'empleado',
                'sancion'=> 'inactivo',
                'estado'=>'activo'
            ]
        );
        DB::table('personas')->insert(
            [                
                'ci' => '6263473',
                'nombre' => 'Gerson',
                'apellidoP' => 'Oliva',
                'apellidoM' => 'Rojas',
                'direccion' => 'Sevilla los jardines',
                'telefono' => '77884965',
                'fechaNacimiento' => '02/03/1998',
                'fechaRegistro' => '01/02/2021',
                'tipo' => 'empleado',
                'sancion'=> 'inactivo',
                'estado'=>'activo'
            ]
        );
        DB::table('personas')->insert(
            [                
                'ci' => '6263473',
                'nombre' => 'Gerson',
                'apellidoP' => 'Oliva',
                'apellidoM' => 'Rojas',
                'direccion' => 'Sevilla los jardines',
                'telefono' => '77884965',
                'fechaNacimiento' => '02/03/1998',
                'fechaRegistro' => '01/02/2021',
                'tipo' => 'empleado',
                'sancion'=> 'inactivo',
                'estado'=>'activo'
            ]
        );
        DB::table('personas')->insert(
            [                
                'ci' => '6263473',
                'nombre' => 'Gerson',
                'apellidoP' => 'Oliva',
                'apellidoM' => 'Rojas',
                'direccion' => 'Sevilla los jardines',
                'telefono' => '77884965',
                'fechaNacimiento' => '02/03/1998',
                'fechaRegistro' => '01/02/2021',
                'tipo' => 'empleado',
                'sancion'=> 'inactivo',
                'estado'=>'activo'
            ]
        );
        
        DB::table('users')->insert([
            'email' => 'admin@hotmail.com',
            'password' => Hash::make('admin')
        ]);

        DB::table('sancions')->insert([
            'fechaInicio' => '15/05/2020',
            'fechaFin' => '20/06/2020',
            'cantidadDias' => '30',
            'justificacion' => 'se robo un chocolate',
            'estado' => 'activo'
        ]);
    }
}
