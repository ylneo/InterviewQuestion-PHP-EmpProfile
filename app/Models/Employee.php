<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class Employee
{
    
    protected static function storagePath(): string
    {
        return storage_path('app/employees.json');
    }

  
    protected static function ensureFileExists(): void
    {
        $path = static::storagePath();

        if (! File::exists($path)) {
            File::ensureDirectoryExists(dirname($path));
            File::put($path, json_encode([]));
        }
    }

   
    public static function all(): array
    {
        static::ensureFileExists();

        $contents = File::get(static::storagePath());
        $records = json_decode($contents, true);

        return is_array($records) ? $records : [];
    }

   
    public static function create(array $data): array
    {
        $records = static::all();

        $data['employee_id'] = static::generateEmployeeId($records);
        $data['created_at'] = now()->toDateTimeString();

        $records[] = $data;

        File::put(
            static::storagePath(),
            json_encode($records, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
        );

        return $data;
    }

   
    protected static function generateEmployeeId(array $existingRecords): string
    {
        $maxNumber = 0;

        foreach ($existingRecords as $record) {
            $id = $record['employee_id'] ?? '';

            if (preg_match('/^EMP-(\d+)$/', $id, $matches)) {
                $maxNumber = max($maxNumber, (int) $matches[1]);
            }
        }

        if ($maxNumber === 0 && count($existingRecords) > 0) {
           
            return 'EMP-' . strtoupper(Str::random(6));
        }

        return sprintf('EMP-%04d', $maxNumber + 1);
    }
}