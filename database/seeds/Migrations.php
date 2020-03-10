<?php

class Migrations {

    public const HOSPITALS = [
        ['name' => 'Hospital español', 'location_id' => 1],
        ['name' => 'Hospital schestakow', 'location_id' => 1],
        ['name' => 'Policlinica', 'location_id' => 1],
    ];

    public const LOCATIONS = [
        ['location_name' => 'San Rafael', 'province_id' => 1],
        ['location_name' => 'Lujan de Cuyo', 'province_id' => 1],
        ['location_name' => 'Godoy Cruz', 'province_id' => 1],
        ['location_name' => 'Alvear', 'province_id' => 1],
        ['location_name' => 'Malargue', 'province_id' => 1],
    ];

    public const PROVINCES = [
        ['province_name' => 'Mendoza'],
        ['province_name' => 'Cordoba'],
        ['province_name' => 'San Juan'],
        ['province_name' => 'Santa Cruz'],
        ['province_name' => 'Buenos Aires'],
    ];

    public const BLOOD_TYPES = [
        ['blood_type' => 'AB+'],
        ['blood_type' => 'AB-'],
        ['blood_type' => 'A+'],
        ['blood_type' => 'A-'],
        ['blood_type' => 'B+'],
        ['blood_type' => 'B-'],
        ['blood_type' => 'O+'],
        ['blood_type' => 'O-'],
    ];
}