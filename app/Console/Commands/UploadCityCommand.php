<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Gyms;
use App\Models\Cities;

class UploadCityCommand extends Command
{
    protected $signature = 'custom:upload-cities {filename}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update cities from CSV file';

    /** csv data file delimiter */
    const DATA_FILE_DELIMITER = ",";
    
    const DATA_DIR = 'datafiles/cities';
    
    /** field mapping */
    protected $map = [
        'city'  => 0,
        'country'   => 5,
        'country2'   => 6,
        'latitude'  => 2,
        'longitude' => 3,
        // 'state' => 2,
    ];
    
    public function handle()
    {
        $fileName = base_path('/' . self::DATA_DIR . '/' . $this->argument('filename') . '.csv');
        $file     = new \SplFileInfo($fileName);
        
        // check file extension
        if (strtolower($file->getExtension()) !== 'csv') {
            $this->info('<fg=red>Please use CSV file for uploading data</>');
            return;
        }
        
        // check if file can be opened
        if (($fileResource = @fopen($fileName, 'r')) === false) {
            $this->info('<fg=red>Unable to open data file</>');
            return;
        }

        $skipped = $newDataCounter = $updateDataCounter = $line = 0;
        while (($data = fgetcsv($fileResource, 1024, self::DATA_FILE_DELIMITER)) !== FALSE) {
            if ($line++ === 0) {
                continue;
            }
            
            $city = trim($data[$this->map['city']]);
            $country = trim($data[$this->map['country']]);
            $country2 = trim($data[$this->map['country2']]);
            // $state   = trim($data[$this->map['state']]);
            $latitude  = trim($data[$this->map['latitude']]);
            $longitude = trim($data[$this->map['latitude']]);
            $importedData = [
                'latitude'  => $latitude,
                'longitude' => $longitude,
            ];
            
            if ($country == 'US' || $country == "CA") {
                $skipped++;
                continue;
            }
            $cities  = $this->findCitiesByNameAndCountry($city, $country);
            if (!$cities) {
                $newData = [
                    'city'  => $city,
                    // 'statefile'  => \Application\Domain\Entity\City::createStatefile($state),
                    'filename'   => $this->createFilename($city, null, $country2),
                    'country_id' => $country,
                    'created_at' => date('Y-m-d H:i:s')
                ];
                DB::table('cities')->insert((array) array_merge($newData, $importedData));
                $newDataCounter++;
                $this->info('New City: ' . $city . ' (' . $country . ')');
            } else {
                $arrayData = (array) $cities;
                DB::table('cities')->where('id', $cities->id)->update((array) array_merge($arrayData, $importedData));
                $updateDataCounter++;
                $this->info('Updated City: ' . $city . ' (' . $country . ')');
            }
        }
        $this->info('<fg=yellow>Skipped Record: ' . $skipped . '</>');
        $this->info('<fg=blue>New Record: ' . $newDataCounter . '</>');
        $this->info('<fg=green>Updated Record: ' . $updateDataCounter . '</>');
        fclose($fileResource);
    }

    /*
     * Find Cities by name & address 
     * 
     * @param   string  $city
     * @param   string  $country
     * 
     * @return  \stdClass | boolean
     * 
     */
    private function findCitiesByNameAndCountry($city, $country)
    {
        $result = DB::table('cities')
                    ->whereRaw('LOWER(city) = ?', [strtolower(trim($city))])
                    ->where('country_id', '=', trim($country))
                    ->first();

        return $result;
    }

    public static function createFilename($city, $state = null, $country = null)
    {
        $removedChars = [" ", "'", "_", "\"", "’", "‘"];
        $filename = $city;
        $addition = '';
        if (!is_null($state)) {
            $addition = $state;
        }
        
        if (!is_null($country)) {
            $addition = $country;
        }
        
        if (!empty($addition)) {
            $filename .= '-' . $addition;
        }
        $filename = str_replace($removedChars, '-', strtolower($filename));
        return str_replace("--", "-", $filename);
    }
}
